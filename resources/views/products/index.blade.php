@extends('layouts.master')

{{-- Title --}}
@section('title', 'Products')

{{-- Content --}}
@section('content')
<div class="container mt-20 mx-auto">
    <div>
        <p class="text-center font-bold underline text-5xl text-in bg-indigo-100 rounded-lg p-5 text-blue-400">Products
        </p>
    </div>
</div>
<div class="container mt-20 mx-auto grid grid-cols-4 gap-y-10 gap-4">
    @if(!empty($products))
    @foreach ($products as $product)
    @php
    $tempPrice = $product->price;
    $product->price -= floor(15*$product->price / 100);
    @endphp
    <div
        class="flex flex-col justify-between border-4 border-blue-300 border-opacity-75 rounded-lg transform transition duration-300 ease-liner hover:scale-105 hover:border-pink-300 bg-blue-100">
        <div>
            <div>
                <p class="p-2 truncate overflow-hidden hover:overflow-visible">Tên sản phẩm: {{ $product->name }}</p>
            </div>
            <div>
                <p class="p-2">Còn lại: {{ $product->quantity }} sản phẩm</p>
            </div>
            <div>
                <p class="p-2">Giá gốc: <span class="line-through text-red-500">{{ $tempPrice . ' VND' }}</span></p>
            </div>
            <div>
                <p class="p-2">Giá khuyến mãi: {{ $product->price . ' VND' }}</p>
            </div>
        </div>

        <div class="text-center h-full">
            <a class="font-bold text-blue-900" href="{{ route('products.show', ['product' => $product->name]) }}">
                Detail
            </a>
        </div>
    </div>
    @endforeach
    @endif
</div>
@endsection

{{-- JS --}}
@section('js')
<script src="{{ asset('js/add-product-cart.js') }}"></script>
@endsection