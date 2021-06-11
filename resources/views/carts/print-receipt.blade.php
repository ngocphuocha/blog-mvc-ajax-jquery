@extends('layouts.master')
{{-- Title --}}
@section('title', '| Hoá đơn')

@section('content')

@if(!empty($order))
<div class="container mt-40 mx-auto flex flex-col ">
    <div class="">
        <h1 class="text-center">Đơn hàng đã được ghi nhận vào hệ thống, chúng tôi sẽ sớm liên hệ với bạn. Cảm ơn bạn đã
            tin tưởng và sử dụng
            dịch vụ của chúng tôi. Chúc bạn một ngày mới vui vẻ ❤️</h1>
        <h3 class="text-center text-5xl mb-3">Thông tin
            nơi nhận hàng</h3>
    </div>
    <div class="mx-auto border-b-2 divide-y-4 divide-yellow-600 divide-dashed w-3/6 bg-blue-200 p-20 rounded-lg">
        <p>Tên khách hàng: {{ $order['name'] }}</p>
        <p>Email: {{ $order['email']}}</p>
        <p>Số điện thoại: {{ $order['phone']}}</p>
        <p>Địa chỉ giao hàng: {{ $order['address']}}</p>
    </div>
</div>
@endif

@endsection