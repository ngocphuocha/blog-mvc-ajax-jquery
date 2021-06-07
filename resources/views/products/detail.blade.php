@extends('layouts.master')

{{-- Title --}}
@section('title', '| Chi tiết sản phẩm')

{{-- CSS --}}
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection

{{-- Content --}}
@section('content')
<div class="container mx-auto">
    <div>
        <p class="text-center font-bold text-5xl text-in bg-indigo-100 p-5 text-blue-400">
            Chi tiết sản phẩm
        </p>
    </div>
</div>
<div class="container mt-20 mx-auto grid grid-cols-1 gap-y-10 gap-4">
    @if(!empty($product))
    <div
        class="mx-auto flex flex-col justify-between border-4 border-blue-300 border-opacity-75 rounded-lg transform transition duration-300 ease-liner hover:scale-105 hover:border-pink-300 bg-blue-100 w-3/4">
        <div>
            <div>
                <p class="p-2 truncate overflow-hidden hover:overflow-visible">Tên sản phẩm: {{ $product->name }}</p>
            </div>
            <div>
                <p class="p-2">Còn lại: {{ $product->quantity }} sản phẩm</p>
            </div>
            <div>
                <p class="p-2">Giá: {{ $product->price . ' VND' }}</p>
            </div>
        </div>

        <div class="text-center">
            <form id="add-cart" class="flex flex-col" action="{{ route('carts.store') }}" method="post">
                @csrf
                {{-- Name --}}
                <input type="hidden" name="product_name" id="product_name" value="{{ $product->name }}">
                {{-- Enter quantity to buy --}}
                <div class="text-left">
                    <label for="" class="p-2 text-left">Nhập số lượng</label>
                    <input
                        class="px-5 text-left w-1/5 border-2 rounded-lg  ml-2 border-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 focus:ring-opacity-50 focus:border-yellow-300"
                        type="number" min="1" name="quantity" id="quantity">
                </div>
                {{-- Price --}}
                <input type="hidden" name="price" id="price" value="{{ $product->price }}">
                <button type="submit"
                    class="mx-auto border-2 border-indigo-600 border-opacity-75 rounded-lg bg-gradient-to-r from-green-400 to-blue-500 transition duration-700  hover:from-pink-500    hover:to-yellow-500  text-center p-2 mb-3">
                    Thêm vào giỏ hàng
                </button>
            </form>
        </div>
    </div>
    @endif
</div>
@endsection

{{-- JS --}}
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script src="{{ asset('js/add-product-cart.js') }}"></script> {{-- add product to cart --}}
@endsection