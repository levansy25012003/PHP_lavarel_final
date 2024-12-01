@extends('frontend.layout')

@section('content')
    <div class="container" style="margin-top: 50px; margin-bottom: 50px">
        @include('frontend.note')
        <div class="row">
            <center><p style="color: #3c71ec; font-size: 2em">Các Đơn Hàng Của Tôi</p></center>
        </div>
        <br>
        <div class="row mt-5">
            <div class="col-md-3 ">
                @include('frontend.customer.menu')
                <form action="/customer/logout" method="post">
                    @csrf
                    <button class="btn" style="color: #3c71ec; border: 1px solid #3c71ec; background: transparent; border-radius: 0">Đăng Xuất</button>
                </form>
            </div>
            <div class="col-md-9">
                <div class="row">
                    <div class="col-md-12">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Ngày đặt</th>
                                    <th>Tống giá</th>
                                    <th>Trạng thái</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr>
                                    <td>{{date('d/m/Y',strtotime($item->created_at))}}</td>
                                    <td>{{number_format($item->order_total)}}</td>
                                    <td>{!! \App\Helpers\OrderStatusHelper::Status($item->order_status) !!}</td>
                                    <td><a class="btn btn-primary" href="/customer/orderdetail/{{$item->order_id}}">Xem chi tiết</a></td>
                                </tr>
                                @endforeach
                                
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection