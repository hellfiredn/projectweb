<!DOCTYPE html>
<html>
<head>
    <title>Đăng nhập</title>
    <link href="{!!url('public/front-end/custom.css')!!}" rel="stylesheet">
    <link href="{!!url('public/bootstrap/css/bootstrap.min.css')!!}" rel="stylesheet">
</head>
<body>
<div class="container wow fadeInDown" data-wow-delay="0.5s" data-wow-duration="2s">
    <div class="row">
        <div class="col-lg-8 push-lg-2 col-md-10 push-md-1 col-sm-10 push-sm-1 login_top_bottom" style=" margin: 50px 0;">
            <div class="row">
                <div class="col-lg-8 push-lg-2 col-md-10 push-md-1 col-sm-12">
                    <div class="login_logo login_border_radius1">
                        <h3 class="text-center">
                            <img src="{!!url('public/images/tt-nguyenkim.png')!!}" alt="josh logo" class="admire_logo">
                        </h3>
                    </div>
                    <div class="bg-white login_content login_border_radius">
                        @if(count($errors)>0)
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $err)
                                    {{ $err }}<br>;
                                @endforeach
                            </div>
                        @endif
                        <form action="{!! url('/dangnhap') !!}" id="login_validator" method="post" class="login_validator">
                            <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                            <div class="form-group">
                                <label for="email" class="col-form-label">Tên đăng nhập:</label>
                                <div class="input-group">
                                    <span class="input-group-addon input_email"><span class="glyphicon glyphicon-user" aria-hidden="true"></span></span>
                                    <input type="text" class="form-control  form-control-md" id="user" name="username" placeholder="">
                                </div>
                            </div>
                            <!--</h3>-->
                            <div class="form-group">
                                <label for="password" class="col-form-label">Mật khẩu:</label>
                                <div class="input-group">
                                    <span class="input-group-addon addon_password"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></span>
                                    <input type="password" class="form-control form-control-md" id="password"   name="password" placeholder="Password">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <button type="submit"  class="btn btn-primary btn-block login_button">ĐĂNG NHẬP</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-6">
                                    <label class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input form-control">
                                        <span class="custom-control-indicator"></span>
                                        <a class="custom-control-description">Nhớ mật khẩu</a>
                                    </label>
                                </div>
                                <div class="col-6 text-right forgot_pwd">
                                    <a href="forgot_password.html" class="custom-control-description forgottxt_clr">Quên mật khẩu?</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>

</html>