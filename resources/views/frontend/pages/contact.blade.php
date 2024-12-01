@extends('frontend.layout')

@section('content')
<section class="htc__contact__area ptb--100 bg__white">
    @include('frontend.note')
    <div class="container">
        <div class="row">
        <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                <h2 class="title__line--6">LIÊN HỆ</h2>
                <div class="address">
                    <div class="address__icon">
                        <i class="icon-location-pin icons"></i>
                    </div>
                    <div class="address__details">
                        <h2 class="ct__title">Địa Chỉ</h2>
                        <p>43 Cao Thắng,Thanh Bình, Hải Châu, Đà Nẵng</p>
                    </div>
                </div>
                <div class="address">
                    <div class="address__icon">
                        <i class="icon-phone icons"></i>
                    </div>
                    <div class="address__details">
                        <h2 class="ct__title">Số Điện Thoại</h2>
                        <p>0942.896.469</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12">
                <div class="map-contacts--2">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d51579.72613165061!2d108.18027809418238!3d16.081771750594566!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31421847feb7f495%3A0x84b93f191711965a!2zNDMgQ2FvIFRo4bqvbmcsIFRoYW5oIELDrG5oLCBI4bqjaSBDaMOidSwgxJDDoCBO4bq1bmcgNTUwMDAwLCBWaeG7h3QgTmFt!5e0!3m2!1svi!2s!4v1731741917828!5m2!1svi!2s" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>
            </div>
                  
        </div>
        <div class="row">
            <!-- <div class="contact-form-wrap mt--60">
                <div class="col-xs-12">
                    <div class="contact-title">
                        <h2 class="title__line--6">GỬI LỜI NHẮN ĐẾN HOUSEW</h2>
                    </div>
                </div> -->
                <!-- <div class="col-xs-12">
                    <form id="contact-form" action="/contact/send" method="post">
                        @csrf
                        <div class="single-contact-form">
                            <div class="contact-box name">
                                <input type="text" value="{{old('name')}}" name="name" placeholder="Họ Và Tên*"><br>
                                @error('name')
                                    <span class="text-danger">{{$message}}</span><br>
                                @enderror
                                <input type="email" value="{{old('email')}}" name="email" placeholder="Email*"><br>
                                @error('email')
                                    <span class="text-danger">{{$message}}</span><br>
                                @enderror
                            </div>
                        </div>
                        <div class="single-contact-form">
                            <div class="contact-box subject">
                                <input type="text" value="{{old('title')}}" name="title" placeholder="Tiêu Đề*">
                                @error('title')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="single-contact-form">
                            <div class="contact-box message">
                                <textarea name="value" placeholder="Lời Nhắn">{{old('value')}}</textarea>
                                @error('value')
                                    <span class="text-danger">{{$message}}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="contact-btn">
                            <button type="submit" class="fv-btn">Gửi</button>
                        </div>
                    </form>
                    <div class="form-output">
                        <p class="form-messege"></p>
                    </div>
                </div> -->
            </div> 
        </div>
    </div>
</section>
@endsection