@extends('frontend.layout')

@section('content')
    <div class="container" style="margin-top: 50px; margin-bottom: 50px">
        <div class="row">
           @include('frontend.note')
            <div class="col-md-5">
                <p style="color: #3c71ec; font-size: 2em">Đăng Nhập</p>
                <form action="/customer/login" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="user_email" class="form-control">
                        @error('user_email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Mật khẩu</label>
                        <input type="password" name="user_password" class="form-control">
                        @error('user_password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="muteFor" id="privacy-term-agree">
                        <label class="form-check-label" for="privacy-term-agree">Lưu mật khẩu</label>
                        <a href="{{route('password.request')}}" class="link link-primary me-auto" style="margin-left:40%">Quên mật khẩu?</a>
                    </div><!-- .form-check -->
                    
                    
                    <div class="form-group row mb-0">
                    <div class="col-md-8 offset-md-4">
                        <button type="submit w-5" class="btn" style="width: 459px; border-radius: 5px;">Đăng nhập</button> 
                        <a href="/auth/redirect/google" class="btn btn-primary mt-2" style="width: 459px; border-radius: 5px; margin-top: 10px;">
                            <i class="fa fa-google"></i> Google</a>
                    </div>
                    </div>
                </form>
            </div>

            <div class="col-md-2">
                <center>
                    <div class="or" style="text-align: center; width: 50px; height: 50px; background: #3c71ec; color: #fff; border-radius: 50%; line-height: 50px">
                        Hoặc
                    </div>
                </center>
                
            </div>

            <div class="col-md-5">
                <p style="color: #3c71ec; font-size: 2em">Đăng Ký</p>

                <form action="/customer/register" method="post">
                    @csrf
                    <div class="form-group">
                        <label for="">Họ Tên</label>
                        <input type="text" name="user_name" class="form-control">
                        @error('user_name')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" name="user_email" class="form-control">
                        @error('user_email')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Mật khẩu</label>
                        <input type="password" name="user_password" class="form-control">
                        @error('user_password')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Xác Nhận mật khẩu</label>
                        <input type="password" name="user_password_again" class="form-control">
                        @error('user_password_again')
                            <span class="text-danger">{{$message}}</span>
                        @enderror
                    </div>

                    <button type="submit" class="btn" style="width: 459px; border-radius: 5px;">Đăng ký</button>
                </form>
            </div>
        </div>
    </div>
@endsection