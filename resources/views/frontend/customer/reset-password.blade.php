@extends('frontend.layout')

@section('content')
<div class="container" style="margin-top: 50px; margin-bottom: 50px">
    <div class="row">
<div class="col-md-5">
    <p style="color: #3c71ec; font-size: 2em; text-align: center;">Đặt lại mật khẩu</p>
    <form action="{{ route('password.update', ['token' => $token]) }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">

        {{-- <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="form-control" required>
            @error('email')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div> --}}

        <div class="form-group">
            <label for="password">Mật khẩu mới:</label>
            <input type="password" id="password" name="password" class="form-control" required>
            @error('password')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation">Xác nhận mật khẩu:</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
            @error('password')
                <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <button type="submit" class="btn">Đặt lại mật khẩu</button>
    </form>
</div>
</div>
</div>
@endsection
