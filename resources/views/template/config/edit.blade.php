@extends('template.layout')


@section('title','添加后台用户')

@section('content')
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <div class="tpl-content-wrapper">
        <div class="container-fluid am-cf">
            <div class="row">
                <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
                    <div class="page-header-heading"><span class="am-icon-home page-header-heading-icon"></span> 配置信息模块<small></small></div>
                    <p class="page-header-description"></p>
                </div>

            </div>
        </div>


        <div class="row-content am-cf">


            <div class="row">

                <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                    <div class="widget am-cf">
                        <div class="widget-head am-cf">
                            <div class="widget-title am-fl">添加配置信息</div>
                            <div class="widget-function am-fr">
                                <a href="javascript:;" class="am-icon-cog"></a>
                            </div>
                        </div>
                        @if(session('error'))
                            <div class="alert alert-danger" >
                                <ul>
                                    <li>{{session('error')}}</li>
                                </ul>
                            </div>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger" >
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="widget-body am-fr">
                            <div>
                                <script>
                                    @if(session('msg'))
                                    alert("{{session('msg')}}");
                                    @endif
                                </script>

                            </div>
                            <form action="/config/{{$configs->config_id}}" id="biaodan" class="am-form tpl-form-line-form" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{method_field('PUT')}}
                                <div class="am-form-group">
                                    <label for="user-name" class="am-u-sm-3 am-form-label">配置项标题: <span class="tpl-form-line-small-title">config_title</span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="tpl-form-input" id="user-name" placeholder="" name="config_title" value="{{$configs->config_title}}">
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-email" class="am-u-sm-3 am-form-label" >配置项名称: <span class="tpl-form-line-small-title">config_name</span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="am-form-field tpl-form-no-bg" placeholder="" name="config_name" value="{{$configs->config_name}}">

                                    </div>
                                </div>
                                <script>
                                    $(function () {

                                        $("body").on('change','#file_upload',function () {
                                            uploadImage();
                                        })
                                    })
                                    function uploadImage() {
                                        //判断是否有文件上传
                                        var imgPath = $("#file_upload").val();
                                        if (imgPath == "") {
                                            alert("请选择上传图片！");
                                            return;
                                        }
                                        //判断上传文件的后缀名
                                        var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
                                        if (strExtension != 'jpg' && strExtension != 'gif'
                                            && strExtension != 'png' && strExtension != 'bmp') {
                                            alert("请选择图片文件");
                                            return;
                                        }
                                        // var formData = new FormData($('#biaodan')[0]);
                                        var formData = new FormData();
                                        formData.append('fileupload',$('#file_upload')[0].files[0]);
                                        $.ajax({
                                            type: "POST",
                                            cache: false,
                                            headers: {
                                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                                            },
                                            url: "/template/config/uploads",
                                            data: formData,
                                            contentType: false,
                                            processData: false,
                                            success: function(data) {
                                                console.log(data);
                                                $('#art_thumb').attr('src','/uploads/'+data);
                                                $("input[name='config_desc']").val(data);
                                            },
                                            error:function(data){
                                                alert('添加失败');
                                            },
                                        })

                                    }

                                </script>



                                <div id="flag" class="am-form-group">
                                    <label for="user-email" class="am-u-sm-3 am-form-label ">配置项类型: <span class="tpl-form-line-small-title">file_type</span></label>
                                    <div class="am-u-sm-9">

                                        <li><input type="radio" name="field_type" data-labelauty="文本框" value="input"
                                            @if($configs->field_type=='input')
                                                checked
                                                    @endif



                                            ></li>
                                        <li><input type="radio" name="field_type" data-labelauty="单选框" value="radio"
                                                   @if($configs->field_type=='radio')
                                                   checked
                                                    @endif
                                            ></li>
                                        <li><input type="radio" name="field_type" data-labelauty="文本域" value="textarea"
                                                   @if($configs->field_type=='textarea')
                                                   checked
                                                    @endif
                                            ></li>
                                        <li id="img"><input type="radio" name="field_type" data-labelauty="图片" value="img"
                                                    @if($configs->field_type=='img')
                                                    checked
                                                    @endif
                                            ></li>
                                        <li><input type="radio" name="radio" disabled data-labelauty="不可用"></li>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label for="user-email" class="am-u-sm-3 am-form-label" >配置项排序: <span class="tpl-form-line-small-title">config_order</span></label>
                                    <div class="am-u-sm-9">
                                        <input type="text" class="am-form-field tpl-form-no-bg" placeholder="" name="config_order" value="{{$configs->config_order}}">

                                    </div>
                                </div>


                                <div class="am-form-group">

                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                        <button  class="am-btn am-btn-primary tpl-btn-bg-color-success ">修改</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <script src="/assets/js/amazeui.min.js"></script>
        <script src="/assets/js/amazeui.datatables.min.js"></script>
        <script src="/assets/js/dataTables.responsive.min.js"></script>
        <script src="/assets/js/app.js"></script>
        <script src="/assets/js/jquery.min.js"></script>
        <script src="/assets/js/jquery-labelauty.js"></script>
        <script>
            $(function(){
                $(':input').labelauty();


                //内容,图片类型切换
                $('input[type=radio][name=field_type]').change(function() {
                    if (this.value == 'img') {
                        $('#tianjia').remove();
                        $('#tianjia1').remove();
                        $('#flag').before("<div id='tianjia' class=\"am-form-group\">\n" +
                            "                                        <label for=\"user-weibo\" class=\"am-u-sm-3 am-form-label\">图片: <span class=\"tpl-form-line-small-title\">Images</span></label>\n" +
                            "                                        <div class=\"am-u-sm-9\" style=\"position: relative;\">\n" +
                            "                                            <input id=\"file_upload\" type=\"file\" name=\"fileupload\" value=\"\" style=\"opacity:0.0;position: relative;z-index:99999999\"   >\n" +
                            "                                            <button type=\"button\" class=\"am-btn am-btn-danger am-btn-sm\" style=\"position:absolute;top:0px\">\n" +
                            "                                                <i class=\"am-icon-cloud-upload\"></i> 上传图片</button>\n" +
                            "                                            <p id=\"demoText\"></p>\n" +
                            "                                        </div>\n" +
                            "                                    </div>\n" +
                            "                                    <div id='tianjia1' class=\"layui-form-item layui-form-text\">\n" +
                            "                                        <label class=\"layui-form-label\"></label>\n" +
                            "                                        <div class=\"layui-input-block\" style=\"position:relative;left:270px;top:-30px;width:60px;height:60px\">\n" +
                            "                                            <input type=\"hidden\" name=\"config_desc\" value=\"\">\n" +
                            "                                            <img id=\"art_thumb\" src=\"/uploads/{{$configs->config_desc}}\" style=\"width:60px;\">\n" +
                            "                                        </div>\n" +
                            "                                    </div>")

                    }else{
                        $('#tianjia').remove();
                        $('#tianjia1').remove();
                        $('#flag').before("<div id='tianjia' class=\"am-form-group\">\n" +
                            "                                    <label for=\"user-email\" class=\"am-u-sm-3 am-form-label\">配置项内容: <span class=\"tpl-form-line-small-title\">config_desc</span></label>\n" +
                            "                                    <div class=\"am-u-sm-9\">\n" +
                            "                                        <textarea name=\"config_desc\" placeholder=\"请输入内容\" class=\"layui-textarea\">{{$configs->config_desc}}</textarea>\n" +
                            "\n" +
                            "                                    </div>\n" +
                            "                                </div>");

                    }
                })

                //图片上传

            })






        </script>


@endsection