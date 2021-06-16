@extends('layouts.master')
@section('title', '| create product')
@section('css')
<meta name="csrf-token" content="{{ csrf_token() }}">
@endsection
{{-- Body content --}}
@section('content')
<div class="container mx-auto">
    <section>
        <div>
            <p class="my-5 text-center text-5xl">{{ __('Create new product') }}</p>
        </div>
        <form id="create-product" class="text-center mt-5 border-4 border-green-400 flex flex-col rounded w-1/2 mx-auto"
            action="{{ route('products.store') }}" method="post">
            {{-- Product name --}}
            <input type="text" name="name" id="product-name"
                class="mt-10 p-3 mb-3 border-2 border-black rounded-md border-opacity-50 w-4/5 mx-auto outline-none transition duration-300 ease-liner outline-none focus:ring focus:ring-gray-300 subpixel-antialiased placeholder-gray-500"
                placeholder="Product name" autocomplete="off">

            {{-- Product price --}}
            <input type="text" name="price" id="product-price"
                class="mt-4 p-3 mb-3 border-2 border-black rounded-md border-opacity-50 w-4/5 mx-auto outline-none transition duration-300 ease-liner outline-none focus:ring focus:ring-gray-300 subpixel-antialiased placeholder-gray-500"
                placeholder="Product price" autocomplete="off">

            {{-- Product quantity --}}
            <input type="text" name="quantity" id="product-quantity"
                class="mt-4 p-3 mb-3 border-2 border-black rounded-md border-opacity-50 w-4/5 mx-auto outline-none transition duration-300 ease-liner outline-none focus:ring focus:ring-gray-300 subpixel-antialiased placeholder-gray-500"
                placeholder="Product quantity" autocomplete="off">

            <input type="submit" value="Create"
                class="mt-4 mb-10 w-1/5 mx-auto bg-indigo-400 text-white p-2 rounded-md font-semibold outline-none ring-4 ring-indigo-200"
                placeholder="Product price">
        </form>
    </section>
</div>
@endsection

{{-- js --}}
@section('js')
<script src="{{ asset('js/staff-create-product.js') }}"></script>
@endsection