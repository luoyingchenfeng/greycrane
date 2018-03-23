@extends('template.layout')


@section('title','添加后台用户')

@section('content')

<div class="tpl-content-wrapper">
    <div class="container-fluid am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
                <div class="page-header-heading"><span class="am-icon-home page-header-heading-icon"></span> 管理员模块<small></small></div>
                <p class="page-header-description"></p>
            </div>

        </div>
    </div>


    <div class="row-content am-cf">


                <div class="row">

                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">添加用户</div>
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
                                <form action="/user" class="am-form tpl-form-line-form" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">用户名: <span class="tpl-form-line-small-title">name</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="text" class="tpl-form-input" id="user-name" placeholder="请输入用户名" name="username">
                                            <small>请填写用户名6-15个字符</small>
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-email" class="am-u-sm-3 am-form-label" >密码: <span class="tpl-form-line-small-title">password</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="password" class="am-form-field tpl-form-no-bg" placeholder="密码" name="userpass">
                                            <small>请牢记密码</small>
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-email" class="am-u-sm-3 am-form-label">确认密码: <span class="tpl-form-line-small-title">password</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="password" class="am-form-field tpl-form-no-bg" placeholder="确认密码" name="reuserpass">
                                            <small>请确保两次密码输入一致</small>
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <label for="user-phone" class="am-u-sm-3 am-form-label">权限: <span class="tpl-form-line-small-title">auth</span></label>
                                        <div class="am-u-sm-9">
                                            <select data-am-selected="" style="display: none;"name="auth">
                                                <option value="1">超级管理员</option>
                                                <option value="2">普通管理员</option>
                                            </select>

                                        </div>
                                    </div>



                                    <div class="am-form-group">
                                        <label for="user-weibo" class="am-u-sm-3 am-form-label">头像: <span class="tpl-form-line-small-title">Images</span></label>
                                        <div class="am-u-sm-9">
                                            <div class="am-form-group am-form-file">

                                                <button type="button" class="am-btn am-btn-danger am-btn-sm">
                                                    <i class="am-icon-cloud-upload"></i> 上传头像
                                                </button>
                                                <input id="doc-form-file" type="file" multiple="" name="profile">
                                            </div>

                                        </div>
                                    </div>

                                    <div class="am-form-group">

                                        <div class="am-u-sm-9 am-u-sm-push-3">
                                            <button  class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
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
@endsection