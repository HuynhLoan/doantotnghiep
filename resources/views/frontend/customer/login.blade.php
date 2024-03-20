@extends('frontend.layout')

@section('content')
    <div class="container" style="margin-top: 50px; margin-bottom: 50px">
        <div class="row">
           @include('frontend.note')
            <div class="col-md-5">
                <p style="color: #c43b68; font-size: 2em">Đăng Nhập</p>
                <form action="/customer/login" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Email (*)</label>
                        <input type="email" name="user_email" class="form-control">
                        @error('user_email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Password (*)</label>
                        <input type="password" name="user_password" class="form-control">
                        @error('user_password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>                    
                    <div class="form-group row mb-0">
                        <div class="col-md-12 offset-md-2">
                            <button type="submit" class="btn">Đăng nhập</button> Hoặc
                            <a href="/auth/redirect/google" class="btn btn-primary"><i class="fa fa-google"></i> Google</a>
                            <a href="{{ route('password.request') }}" style=" color: #c43b68; text-decoration: none;  float: right; margin-top: 5px;">Quên mật khẩu?</a>
                        </div>
                    </div>
                </form>                
            </div>
            <div class="col-md-2">
                <center>
                    <div class="or" style="text-align: center; width: 50px; height: 50px; background: #c43b68; color: #fff; border-radius: 50%; line-height: 50px">
                        OR
                    </div>
                </center>                
            </div>
            <div class="col-md-5">
                <p style="color: #c43b68; font-size: 2em">Đăng Ký</p>

                <form action="/customer/register" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Họ Tên (*)</label>
                        <input type="text" name="user_name" class="form-control">
                        @error('user_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email (*)</label>
                        <input type="email" name="user_email" class="form-control">
                        @error('user_email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Password (*)</label>
                        <span class="password-hint">(bắt đầu bằng chữ hoa, bao gồm số và kí tự đặc biệt)</span>
                        <input type="password" name="user_password" class="form-control">
                        @error('user_password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Xác Nhận Password (*)</label>
                        <input type="password" name="user_password_again" class="form-control">
                        @error('user_password_again')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn">Đăng ký</button>
                </form>
            </div>
        </div>
    </div>
@endsection