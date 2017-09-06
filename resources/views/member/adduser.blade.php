@extends('layouts.master')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                <div class="table-responsive">

                @if(count($errors) > 0)
                    <div class="alert alert-danger">
                        @foreach($errors->all() as $err)
                            {{$err}}<br />
                        @endforeach
                    </div>
                @endif
                <form action="{!! url('/user/add') !!}" method="post">
                    <input type="hidden" name="_token" value="{!! csrf_token() !!}">
                    <table class="table-edit-user table">
                        <thead>
                            <tr>
                                <th colspan="2">Thêm nhân viên :</th>    
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Họ tên</td>
                                <td>                                    
                                    <input type="text" name="name" value="" placeholder="Nhập họ tên nhân viên">
                                </td>
                            </tr>
                            <tr>
                                <td>Địa chỉ E-mail</td>
                                <td><input type="text" name="email" value="" placeholder="Nhập email"></td>
                            </tr>
                            <tr>
                                <td>Điện thoại</td>
                                <td><input type="text" name="phone" value="" placeholder="Nhập số điện thoại"></td>
                            </tr>
                            <tr>
                                <td>Địa chỉ</td>
                                <td><input type="text" name="address" value="" placeholder="Nhập dịa chỉ"></td>
                            </tr> 
                            <tr>
                                <td>Mật khẩu</td>
                                <td><input type="password" name="password" value="" placeholder="Nhập mật khẩu"></td>
                            </tr> 
                            <tr>
                                <td>Xác nhận mật khẩu</td>
                                <td><input type="password" name="comfirm" value="" placeholder="Nhập lại mật khẩu"></td>
                            </tr>                    
                            <tr>
                                <th colspan="2">
                                    <button  class="btn btn-success" style="float: right;">Thêm mới</button>
                                </th>                                   
                            </tr>
                        </tbody>
                    </table>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
