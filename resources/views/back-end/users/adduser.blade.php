@extends('back-end.layouts.master')
@section('content')
<!-- main content - noi dung chinh trong chu -->
                <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
                            <div class="row">
                                <ol class="breadcrumb">
                                    <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
                                    <li class="active">Tài khoản</li>
                                </ol>
                            </div><!--/.row-->
                            
                            <div class="row">
                                <div class="col-lg-12">
                                    <h1 class="page-header"><small>Thêm nhân viên</small></h1>
                                </div>
                            </div><!--/.row-->
                            <form class="" id="tryitForm" action="{!! url('admin/khachhang/adduser') !!}" method="post" >
                                <input name="_token" type="hidden" value="{!! csrf_token() !!}">
                                <!--<form role="form" id="tryitForm" action="add_user.html" class="form-horizontal" method="post" auete="on">-->
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group row m-t-25">
                                            <div class="col-lg-3 text-center text-lg-right">
                                                <label class="col-form-label">Ảnh</label>
                                            </div>
                                            <div class="col-lg-6 text-center text-lg-left">
                                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                                    <div class="fileinput-new img-thumbnail text-center">
                                                        <img src="#"  alt="not found"></div>
                                                    <div class="fileinput-preview fileinput-exists img-thumbnail"></div>
                                                    <div class="m-t-20 text-center">
                                                        <span class="btn btn-primary btn-file">
                                                            <span class="fileinput-new">Chọn ảnh</span>
                                                            <span class="fileinput-exists">Chọn</span>
                                                            <input type="file" name="..."></span>
                                                        <a href="#" class="btn btn-warning fileinput-exists"
                                                           data-dismiss="fileinput">Xóa ảnh</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row m-t-25">
                                            <div class="col-lg-3 text-lg-right">
                                                <label for="u-name" class="col-form-label">Họ tên</label>
                                            </div>
                                            <div class="col-xl-6 col-lg-8">
                                                <div class="input-group">
                                    <span class="input-group-addon"></span>
                                                    <input type="text" name="name" id="name" class="form-control">
                                                </div>

                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-3 text-lg-right">
                                                <label for="email" class="col-form-label">Email</label>
                                            </div>
                                            <div class="col-xl-6 col-lg-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon"></span>
                                                    <input type="email" placeholder=" " id="email" name="email" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-3 text-lg-right">
                                                <label for="pwd" class="col-form-label">Mật khẩu*</label>
                                            </div>
                                            <div class="col-xl-6 col-lg-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon"></span>
                                                    <input type="password" name="password" id="pwd" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-3 text-lg-right">
                                                <label for="cpwd" class="col-form-label">Xác nhận mật khẩu</label>
                                            </div>
                                            <div class="col-xl-6 col-lg-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon"></span>
                                                    <input type="password" name="confirmpassword" placeholder=" " id="cpwd"
                                                           class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-3 text-lg-right">
                                                <label for="phone" class="col-form-label">Số điện thoại</label>
                                            </div>
                                            <div class="col-xl-6 col-lg-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon"></span>
                                                    <input type="text" placeholder=" " id="phone" name="cell" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-3 text-lg-right">
                                                <label for="address" class="col-form-label">Địa chỉ</label>
                                            </div>
                                            <div class="col-xl-6 col-lg-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon"></span>
                                                    <input type="text" placeholder=" "  id="address" name="address1"  class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-3 text-lg-right">
                                                <label for="address" class="col-form-label">Phân quyên</label>
                                            </div>
                                            <div class="col-xl-6 col-lg-8">
                                                <div class="input-group">
                                                    <span class="input-group-addon"></span>
                                                    <select name="sltCate" id="inputSltCate" class="form-control">
                                                        <option value="0">- Quản lý --</option>    
                                                        <option value="1">- Nhân viên --</option>       
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-xl-12 col-lg-8 add_user_checkbox_error push-lg-3">
                                                <div>
                                                    <label class="custom-control custom-checkbox">
                                                        <input id="checkbox1" type="checkbox" name="check_active"
                                                               class="custom-control-input">
                                                        <span class="custom-control-indicator"></span>
                                                        <span class="custom-control-description">Kích hoạt tài khoản</span>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-12 push-lg-3">
                                                <button class="btn btn-primary" type="submit">
                                                    Thêm
                                                </button>
                                                <button class="btn btn-warning" type="reset" id="clear">
                                                    Reset
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>    
                        </div>
                </div>
<!-- =====================================main content - noi dung chinh trong chu -->
@endsection