@extends('layouts.master')
@section('title', 'Cart')

{{-- Content --}}
@section('content')
<div class="container mx-auto mt-5 grid grid-cols-1 gap-4">
    @if (!empty($cart))
    <div class="flex flex-row justify-end">
        <a href="{{ route('carts.checkout') }}"
            class="p-3 rounded-sm shadow-inner transition duration-700 ease-in-out bg-blue-200 hover:bg-blue-400 transform hover:-translate-y-2">Thanh
            toán</a>
    </div>
    @foreach ($cart['products'] as $product)
    <div class="grid grid-rows-3 border rouded-lg">
        {{-- Product Name --}}
        <div class="px-2">
            <p>
                Tên sản phẩm: {{ $product['product_name'] }}
            </p>
        </div>
        {{-- Product qty --}}
        <div class="px-2">
            <p>
                Số lượng: {{ $product['quantity'] }}
            </p>
        </div>
        {{-- product price --}}
        <div class="px-2">
            <p>Giá sản phẩm: {{ $product['price'] }} VND</p>

        </div>
        <div class="px-2">
            <p>
                Tổng cộng: @php
                echo $price = $product['price'] * $product['quantity'];
                @endphp
                VND
            </p>
        </div>

    </div>
    @endforeach
    @else
    <h1 class="text-5xl text-center font-bold text-blue-500">Cart is empty</h1>
    @endif
</div>
@endsection