@extends('layouts.master')
{{-- Title --}}
@section('title', '| Hoá đơn')

@section('content')

@if(!empty($customer) && !empty($products))
<div class="container mt-40 mx-auto flex flex-col ">
    <div class="">
        <h1 class="text-center">Đơn hàng đã được ghi nhận vào hệ thống, chúng tôi sẽ sớm liên hệ với bạn. Cảm ơn bạn đã
            tin tưởng và sử dụng
            dịch vụ của chúng tôi. Chúc bạn một ngày mới vui vẻ ❤️</h1>
        <h3 class="text-center text-5xl mb-3">Thông tin nhận hàng</h3>
    </div>
    <div class="mx-auto bcustomer-b-2 divide-y-4 divide-yellow-600 divide-dashed w-3/6 bg-blue-200 p-20 rounded-lg">
        <p>Tên khách hàng: {{ $customer['name'] }}</p>
        <p>Email: {{ $customer['email']}}</p>
        <p>Số điện thoại: {{ $customer['phone']}}</p>
        <p>Địa chỉ giao hàng: {{ $customer['address']}}</p>
        @foreach ($products as $product)
        @php
        $totalPrice = 0;
        $totalPrice += ($product['price'] * $product['quantity']);

        @endphp
        @endforeach
        <p>Tổng tiền: {{ $totalPrice }} VND</p>
    </div>
</div>
@endif

@endsection