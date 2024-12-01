@extends('frontend.layout')

@section('content')
<div class="container" style="margin-top: 50px; margin-bottom: 50px; ">
<div class="row">
<div class="col-md-5 " style="margin-left: 20%;" >
    <p style="color: #3c71ec; font-size: 2em;text-align: center;">Quên mật khẩu</p>
    @include('frontend.note')
    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" id="email" name="user_email" class="form-control" required>
            @error('user_email')
                <span>{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn" style="border-radius: 5px;">Gửi link đặt lại mật khẩu</button>
    </form>
</div>
</div>
</div>
@endsection