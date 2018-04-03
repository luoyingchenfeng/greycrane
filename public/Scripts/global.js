/**
 * Created by jiabowen on 2017/1/10.
 * global.js
 */

;$(function(){
    
    //check-user-state
    (function () {
        var id = 'global-unify-phone',
            changeId = 'input#global-change-phone',
            codeId   = 'input#global-phone-code',
            token = $('meta[name="csrf-token"]').attr('content'),
            data = {},
            timer = {},
            handler = {},
            actions = {
                //选择手机下一步
                next : function () {
                    if (handler.$list.find('input:checked').length == 0) {
                        return errorTip('请选择手机号');
                    }else{
                        clearTip();
                    }
                    
                    var phone = handler.$list.find('input:checked').parent().text();
                    handler.$list.hide();
                    handler.$bind.find('span.mobile-tag').text('认证手机：'+phone);
                    handler.$bind.show();
                }
                //其他手机
                ,change : function () {
                    handler.$list.hide();
                    handler.$other.show();
                    handler.$other.find('input.mobile').on('blur',function () {
                        if (verifyPhone($(this).val()) === false) {
                            return errorTip('请检查手机号');
                        }else {
                            return clearTip();
                        }
                    }).focus();
                }
                //获取动态密码
                ,code : function ($btn) {
                    var cls  = 'disabled',
                        val  = $btn.attr('data-validate');
                    if($btn.hasClass(cls) || $.inArray(val,['other','bind']) === -1){return false;}

                    if (val === 'other') {
                        if (verifyPhone(handler.$other.find('input.mobile').val()) === false) {
                            return errorTip('请检查手机号');
                        }else {
                            clearTip();
                        }
                    }
                    
                    var callback = val === 'other' ? 'getPhoneCode' : 'sendPhoneCode';
                    $btn.addClass(cls).text('60s后重新获取');

                    timer.i = 60;
                    timer.a = setInterval(function () {
                        timer.i--;
                        
                        if (timer.i <= 0) {
                            clearInterval(timer.a);
                            $btn.text('获取动态密码').removeClass(cls);
                            return; 
                        }
                        $btn.text(timer.i+'s后重新获取');

                    },1000);
                    
                    $.get('/common/geetest-register',{"t" : (new Date()).getTime()},function (json) {
                        if (!json || json.info == 'err') {return false;}
                        initGeetest({
                            gt: json.msg.gt,
                            challenge: json.msg.challenge,
                            product: "popup",
                            offline: !json.msg.success
                        }, function (captchaObj) {
                            // 将验证码插入到dom
                            captchaObj.appendTo("#"+id);
                            captchaObj.onReady(function () {
                                captchaObj.show();

                                return true;
                            });
                            // 成功的回调
                            captchaObj.onSuccess(function () {
                                clearTip();
                                var validate = captchaObj.getValidate();
                                captchaObj.show();

                                $.post('/common/geetest-validate',{
                                    t       : (new Date()).getTime(),
                                    number  : $btn.attr('data-type') === 'choose' ? handler.$list.find('input:checked').val() : 1,
                                    _csrf   : token,
                                    phone   : val === 'other' ? handler.$other.find('input.mobile').val() : '',
                                    callback    : callback,
                                    challenge   : validate.geetest_challenge,
                                    validate    : validate.geetest_validate,
                                    seccode : validate.geetest_seccode
                                },function (data) {
                                    //{info: "ok", msg: 1, options: {code: -3, msg: "试", phone: 18511069869}}
                                    if (!data ||data.info == 'err') {
                                        return errorTip(data.msg);
                                    }else {
                                        clearTip();
                                    }

                                    if (data.info == 'ok' && data.msg == 1) {
                                        if (data.options.code != 1) {
                                            return errorTip(data.options.msg);
                                        }else{
                                            clearTip();
                                        }
                                        $btn.next().focus();

                                        $('#' +id).find(changeId).val(data.options.phone);
                                        $('#' +id).find(codeId).val(data.options['content'].code);
                                    }
                                },'json')
                            });
                        });
                    },'json');
                }
                //立即绑定
                ,binding : function ($self) {
                    var phone = parseInt($('#'+id).find(changeId).val(),10),
                        bd    = $self.attr('data-bind'),
                        ce    = parseInt($('#'+id).find(codeId).val(),10),
                        code  = parseInt($self.parent().prev().find('input.code-input').val(),10);
                    
                    phone = bd === 'other' ? parseInt(handler.$other.find('input.mobile').val(),10) : phone;
                    if ($.inArray(bd,['other','bind']) === -1) {
                        return false;
                    }else if (!phone || !$.isNumeric(phone) || verifyPhone(phone) === false){
                        return errorTip('手机号有误');
                    }else if (!code) {
                        return errorTip('动态密码错误');
                    }else{
                        clearTip();
                    }
                    
                    $.post('/common/check-phone-code',{
                        "phone" : phone,
                        "code"  : code,
                        "_csrf" : token,
                        "callback" : 'changePhone',
                        "t"     : (new Date()).getTime()
                    },function (json) {
                        //{info: "ok", msg: {code: 1, msg: "验证码正确"}, options: true}
                        if (!json || json.info == 'err') {
                            errorTip(json.msg);
                        }else{
                            clearTip();
                        }

                        if (json.msg.code == 1 && json.options) {
                            return successTip(function () {
                                $('#'+id).dialog('close');
                            });
                        }
                    },'json');
                }
            };
        
        var errorTip = function(msg){
            $('#' + id).find('span.tip').text(msg).show();
            return false;
        }
        
        var clearTip = function () {
            $('#' + id).find('span.tip').hide();
            return true;
        }

        var successTip = function (callback) {
            var callback = callback || function(){};
            $('#global-success-tip').dialog({
                width: 200,
                height: 70,
                dialogClass: "no-header",
                modal: true,
                buttons: []
            }).dialog('open');
            callback();

            setTimeout(function () {
                $('#global-success-tip').dialog("close");
            },2000);
            return ;
        }

        var verifyPhone = function (phone) {
            if (!phone) return false;
            var p = parseInt(phone,10);
            return /^1\d{10}$/.test(phone);
        }
        
        //加个延迟,防止样式加载问题
        setTimeout(function () {
            $.get('/common/check-user?t=' + (new Date()).getTime(), data, function (json) {
                if (!json || json.info == 'err') {
                    return false;
                }

                $('body').append(json.options.html);

                var $target = $('#' + id);

                $target.find('[data-action]').on('click', function () {
                    var op = $(this).attr('data-action');
                    if (!op || !actions[op]) return false;
                    return actions[op]($(this));
                });

                handler.$list = $target.find('#global-phone-list');
                handler.$bind = $target.find('#global-phone-bind');
                handler.$other= $target.find('#global-phone-other');

                $target.dialog({
                    width: 470,
                    dialogClass: "commonLogin-dialog-wrap",
                    modal: true,
                    position : { my: "center top", at: "center top+15%", of: window },
                    buttons: []
                }).dialog('open');

            }, 'json');
        },500);
        
    })();
    
});
