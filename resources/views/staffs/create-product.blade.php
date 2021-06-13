@extends('layouts.master')
@section('title', '| create product')

{{-- Body content --}}
@section('content')
<div class="container mx-auto">
    <section>
        <div>
            <p class="my-5 text-center text-5xl">{{ __('Create new product') }}</p>
        </div>
        <form class="text-center mt-5 border-4 border-green-400 flex flex-col rounded w-1/2 mx-auto" action=""
            method="post">
            @csrf
            {{-- Product name --}}
            <input type="text" name="name" id="product-name"
                class="mt-4 mb-3 border-b border-blue-200 w-4/5 mx-auto outline-none transition duration-700 focus:border-blue-500 subpixel-antialiased placeholder-yellow-500"
                placeholder="Product name">
            {{-- Product price --}}

            <input type="text" name="name" id="product-price"
                class="mt-4 mb-3 border-b border-blue-200 w-4/5 mx-auto outline-none transition duration-700 forcus:border-2 focus:border-blue-500 subpixel-antialiased placeholder-yellow-500"
                placeholder="Product price">
            {{-- Product quantity --}}
            <input type="text" name="name" id="product-price"
                class="mt-4 mb-3 border-b border-blue-200 w-4/5 mx-auto outline-none transition duration-700 forcus:border-2 focus:border-blue-500 subpixel-antialiased placeholder-yellow-500"
                placeholder="Product price">
        </form>
    </section>
</div>
@endsection