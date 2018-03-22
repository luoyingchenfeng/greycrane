﻿<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <title>个人中心</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="renderer" content="webkit">
    <meta name="csrf-param" content="_csrf">
    <meta name="csrf-token" content="RC1MeDhWb3IjYAMSbz88HnZeDgtKGTkcDUEvKgxjNRU8FHsCCRcfNg==">
    <meta http-equiv="mobile-agent" content="format=html5; url=http://m.2.fengniao.com/"/>
    <link href="/Content/globalceiling.css" rel="stylesheet">
    <link href="/Content/jquery-ui.1.11.4.min.css" rel="stylesheet">
    <link href="/Content/jquery.bxslider.css" rel="stylesheet">
    <link href="/Content/header.css" rel="stylesheet">
    <link href="/Content/style.css" rel="stylesheet">
    <script src="/Scripts/jquery.min.js" charset="UTF-8"></script>
    <script src="/Scripts/jqueryui.1.11.4.js" charset="UTF-8"></script>
    <script src="/Scripts/jquery.bxslider.min.js" charset="UTF-8"></script>
    <script src="/Scripts/jquery.tinyscrollbar.2.4.2.min.js" charset="UTF-8"></script>
    <script src="/Scripts/im.js" charset="UTF-8"></script>
    <script src="/Scripts/globalceiling.js" charset="UTF-8"></script>
    <script src="/Scripts/md5.js" charset="UTF-8"></script>
    {{--<script src="/Scripts/common.js" charset="UTF-8"></script>--}}
    <script src="/Scripts/global.js" charset="UTF-8"></script>
    <script src="/Scripts/swfobject.js" charset="UTF-8"></script>
    <link rel="stylesheet" id="WideGoodsSheet" rel="stylesheet">

    <script>
        if (!$.support.leadingWhitespace || /msie 9/.test(navigator.userAgent.toLowerCase())) {
            document.documentElement.className += ' lowIE';
        }

          
     </script>
</head>
<body>
<div id="globalCeiling-topBar" style="height: 44px;background-color: #111111;"></div>
<div class="y-center-header fn-sec-header">
    <div class="y-center-warp clearfix">
                <div class="y-center-logo"><a href="http://2.fengniao.com/" target="_blank">二手交易</a></div>

<!--        <a href="http://2.fengniao.com/" class="home-link" target="_blank"><i class="arrow-icon"></i>返回灰鹤二手首页</a>-->

        <div class="y-center-nav-box ">
            <a class="trigger" href="/"
               style="background-position-y: -19px;">首页</a><font>&nbsp;</font>
        </div>

        <div class="y-center-nav-box y-center-subNav-box">
            <span class="trigger" style="background-position-y: -19px;">账户管理 <i class="arrow-icon"></i></span>
            <div class="account-subLinks-layer">
                <ul class="account-subLinks clearfix">
                    <li>
                        <strong>安全设置</strong>
                        <a href="/user/setting?act=phone">手机绑定</a>
                        <a href="/user/setting?act=idcard">身份绑定</a>
                        <a href="/user/setting?act=email">邮箱绑定</a>
                    </li>
                    <li>
                        <strong>交易保障</strong>
                        <a href="/user/setting?act=password&ok=1">交易密码管理</a>
                        {{--<a href="/user/bank?act=bank">银行卡管理</a>--}}
                        {{--<a href="/user/coupon">优惠券管理</a>--}}
                    </li>
                </ul>
            </div>
        </div>
        <div class="y-center-nav-box ">
            <a class="trigger" href="/user/news" style="background-position-y: -19px;">我的消息</a>
            <font>&nbsp;</font>
        </div>
    </div>
</div>

<div class="y-center-main clearfix">
    <div class="y-center-warp">
        <div class="y-center-bread ptop20">
                        <a href="/">首页</a> &gt; <a href="/home/user?uid={{$user->uid}}">个人中心</a>
                    </div>
                    <div class="y-center-search">
                <div class="y-center-searchBox">
                    <div class="menu">
                        <span>订单</span>
                    </div>
                    <div class="inputBox">
                        <form id="listSearch" action="/price/def-1_1.html" method="get" role="form">                        <input type="text" name="k" class="text1" placeholder="请输入"/>
                            <button type="submit" class="btn1">搜索</button>
                        </form>
                    </div>
                </div>
                <div class="add">
                    <a href="/goods/index">免费发布</a>
                </div>
            </div>
        

        <div class="y-center-main-left mtop20">
            <span>我的二手</span>
            <dl>
                <dd>
                    <ul>
                        <li>
                            <a href="/home/msg/{{$user->uid}}" >消息中心</a>
                        </li>
                        <li>
                            <a href="/user/comment" >我的评价</a>
                        </li>
                    </ul>
                </dd>
            </dl>
            <dl>
                <dt>我是买家</dt>
                <dd>
                    <ul>
                        <li>
                            <a href="/user/buy" >已买到的商品</a>
                        </li>
                        <li>
                            <a href="/user/collect?type=0" >我的收藏</a>
                        </li>
                        <li>
                            <a href="/user/history" >浏览历史</a>
                        </li>
                    </ul>
                </dd>
            </dl>

            <dl>
                <dt>我是卖家</dt>
                <dd>
                    <ul>
                        <li>
                            <a href="/user/myGoods?status=0" >我发布的商品</a>
                        </li>
                        <li>
                            <a href="/user/soldgoods" >已卖出的商品</a>
                        </li>
                        <li>
                            <a href="/user/sellerOffer" >留言咨询</a>
                        </li>
                    </ul>
                </dd>
            </dl>
            <dl>
                <dt>个人设置</dt>
                <dd>
                    <ul>
                        <li>
                            <a href="/user/address" >收货地址管理</a>
                        </li>
                        <li>
                            <a href="/user/setting?act=index" >个人信息设置</a>
                        </li>
                    </ul>
                </dd>
            </dl>
        </div>

@section('content')

@show

<!-- foot -->
<div class="foot">
    <div class="wrapper">
        <p class="link">
    <a rel="nofollow" href="http://www.fengniao.com/about.html" target="_blank">灰鹤简介</a>|
    <a rel="nofollow" href="http://www.fengniao.com/contact.html" target="_blank">联系我们</a>|
    <a rel="nofollow" href="http://www.fengniao.com/sitelinks.php" target="_blank">友情链接</a>|
    <a rel="nofollow" href="http://www.fengniao.com/zhaopin.html" target="_blank">招聘信息</a>|
    <a rel="nofollow" href="http://www.fengniao.com/law.html" target="_blank">用户服务协议</a>|
    <a rel="nofollow" href="http://www.fengniao.com/copyright.html" target="_blank">隐私权声明</a>|
    <a rel="nofollow" href="http://www.fengniao.com/shengming.html" target="_blank">法律投诉声明</a>
</p>
<p class="copyright">©
    <script type="text/javascript">var myDate = new Date();
        document.write(myDate.getFullYear());</script>
    fengniao.com. All rights reserved . 北京灰鹤映像电子商务有限公司（灰鹤网）
</p>
<p>版权所有 京ICP证150110号</p>
<!--<script type="text/javascript" src="/Scripts/msg.js"></script>-->
    </div>
</div><div id="commonLoginDialog" style="display: none;" class="commonLogin-dialog clearfix">
    <ul class="clearfix">
        <li id="scanLoginDialog" class="commonLoginDialog-form scanLogin-dialog" style="display: block">
            <div class="commonLogin-header">
                <h3 class="commonLogin-title">
                    微信扫码，安全登录</h3>
                <p class="commonLogin-sub-title">打开微信，扫一扫</p>
            </div>
            <div class="pic-box">
                <span class="pic-wrap"><img id="wxLoginQR" src="" alt=""></span>
                <span class="default-pic"><img src="/Picture/scan-default.png" alt="" width="247" height="270"></span>
            </div>
        </li>
        <li id="commonUserNameDialog" class="commonLoginDialog-form userName-dialog" style="display: none;">
            <div class="commonLogin-header">
                <h3 class="commonLogin-title">账号密码登录</h3>
                <span class="tip" style="display: none;"></span>
                <span class="exchange-link message-link">短信快捷登录</span>
            </div>
            <ul class="form-items clearfix">
                <li class="form-item clearfix">
                    <i class="user-name-icon"></i><input id="commonLoginUserName" class="user-name error" type="text" placeholder="请输入手机号/用户名/邮箱">
                </li>
                <li class="form-item clearfix">
                    <i class="password-icon"></i><input id="commonLoginPasswd" class="password" type="password" placeholder="请输入密码">
                    <div class="links clearfix">
                        <a rel="nofollow" target="_blank" href="http://my.fengniao.com/resetPassword.php" class="forgot-link">忘记密码？</a>
                    </div>
                </li>
                <li class="form-item clearfix">
                    <input class="commonLogin-button nomal" type="button" value="立即登录">
                </li>
            </ul>

            <div class="register-bar" style="display: none">还没有账号？<a target="_blank" href="http://my.fengniao.com/register.php">立即注册</a></div>

            <dl class="other-commonLogin clearfix" style="display: none">
                <dt>其他登录方式：</dt>
                <dd>
                    <a target="_blank" href="http://my.fengniao.com/user/login-third-party?id=1&url=http%3A%2F%2F2.fengniao.com%2Fuser%2Findex" class="sina-link">新浪</a>
                    <a target="_blank" href="http://my.fengniao.com/user/login-third-party?id=2&url=http%3A%2F%2F2.fengniao.com%2Fuser%2Findex" class="wechat-link">微信</a>
                    <a target="_blank" href="http://my.fengniao.com/user/login-third-party?id=3&url=http%3A%2F%2F2.fengniao.com%2Fuser%2Findex" class="QQ-link">QQ</a>
                </dd>
            </dl>
        </li>
        <li id="otherLoginDialog" class="commonLoginDialog-form otherLogin-dialog" style="display: none;">
            <div class="commonLogin-header">
                <h3 class="commonLogin-title">其他登录方式</h3>
                <p class="commonLogin-sub-title">推荐使用<span class="scan-wechat-link">微信扫码</span>登录，安全快捷</p>
            </div>
            <div class="other-login clearfix">
                <a target="_blank" href="http://my.fengniao.com/user/login-third-party?id=1&url=http%3A%2F%2F2.fengniao.com%2Fuser%2Findex" class="login-link link-sina">新浪微博</a>
                <a href="javascript:;" class="login-link link-scan-wechat">腾讯微信</a>
                <a target="_blank" href="http://my.fengniao.com/user/login-third-party?id=3&url=http%3A%2F%2F2.fengniao.com%2Fuser%2Findex" class="login-link link-QQ">腾讯QQ</a>
                <a href="javascript:;" class="login-link link-message-login">短信验证</a>
            </div>
        </li>
        <li id="commonMessageDialog" class="commonLoginDialog-form message-dialog no-border"  style="display: none;">
            <div class="commonLogin-header">
                <h3 class="commonLogin-title">短信快捷登录</h3>
                <span class="tip" style="display: none;"></span>
                <span class="exchange-link">账号密码登录</span>
            </div>
            <ul class="form-items">
                <li class="form-item clearfix">
                    <i class="mobile-icon"></i><input id="commonLoginUserMobile" class="mobile" type="text" placeholder="请输入大陆手机号">
                </li>
                <li class="form-item clearfix">
                    <button type="button" class="disabled getCodeBtn" time="0" >获取动态密码</button>
                    <input id="commonLoginCode" class="code-input" type="text">
                    <br class="clear">
                    <span class="commonLogin-tip high-tip">注意：如果您已注册过灰鹤账号，请确认该手机号和账号是否做了绑定，否则系统将自动创建新账号。</span>
                </li>
                <li class="form-item clearfix">
                    <input class="commonLogin-button" type="button" value="立即登录">
                </li>
            </ul>
        </li>
    </ul>
    <div class="dialog-link clearfix">
        <span id="otherLink" class="link other-link">其他登录</span>
        <span id="userNameLink" class="link user-name-link">账号密码登录</span>
        <span id="scanLink" class="link scan-link" style="display: none">微信扫码登录</span>
        <a class="link register-link" href="http://my.fengniao.com/register.php">注册新账号</a>
    </div>
</div>
<div id="commonLoginPopupCaptcha"></div>{{--<script language="JavaScript" type="text/javascript" src="/Scripts/pv.js"></script>--}}
<script>
    var _hmt = _hmt || [];
    (function () {
        var hm = document.createElement("script");
        hm.src = "//hm.baidu.com/hm.js?916ddc034db3aa7261c5d56a3001e7c5";
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(hm, s);
    })();
</script><script src="/Scripts/gt.js"></script>
{{--<script src="/Scripts/index.js" 0="frontend\assets\BaseAsset" language="javascript" charset="UTF-8"></script>--}}
<script src="/Scripts/jquery.cookie.1.4.0.js" 0="frontend\assets\BaseAsset" language="javascript" charset="UTF-8"></script>
{{--<script src="/Scripts/user.js" 0="frontend\assets\BaseAsset" language="javascript" charset="UTF-8"></script>--}}
{{--<script src="/Scripts/store.js" 0="frontend\assets\BaseAsset" language="javascript" charset="UTF-8"></script>--}}
{{--<script src="/Scripts/yii.js"></script>--}}
{{--<script src="/Scripts/yii.activeform.js"></script>--}}
{{--<script type="text/javascript">jQuery(document).ready(function () {
jQuery('#listSearch').yiiActiveForm([], []);
});</script><script>
    $('.y-center-goods-list').hover(function () {
        $(this).find('ul').show();
        $(this).find('span').css('background-position', 'right bottom');
    }, function () {
        $(this).find('ul').hide();
        $(this).find('span').css('background-position', 'right top');
    });

    $('.y-center-subNav-box').hover(function () {
        $(this).addClass('showLayerbox');
    }, function () {
        $(this).removeClass('showLayerbox');
    });
</script>--}}
</body>
</html>