@extends('layouts.master')
@section('title', 'Cart')

{{-- Content --}}
@section('content')
<div class="container mx-auto bg-blue-300">
    <div class="p-3">
        <h1 class="text-center text-5xl">
            Điền thông tin liên hệ
        </h1>
    </div>
</div>
@auth
<div class="container mx-auto mt-5">
    <form id="forgot-pass" class="text-center border border-green-400 shadow-md flex flex-col rounded w-1/2 mx-auto"
        action="{{ route('carts.pay') }}" method="post">
        @csrf
        {{-- Email --}}
        <label class="w-4/5 text-left mx-auto mt-5 mb-3" for="">Enter your email</label>
        <input type="text" name="email"
            class="border border-black focus:border-green-500 rounded w-4/5 mx-auto p-2 mb-3" placeholder="Email"
            value="{{ \Auth::user()->email}}">

        {{-- Name --}}
        <label class="w-4/5 text-left mx-auto mt-5 mb-3" for="">Enter your name</label>
        <input type="text" name="name" class="border border-black focus:border-green-500 rounded w-4/5 mx-auto p-2 mb-3"
            placeholder="Your name" value="{{ \Auth::user()->name }}">

        {{-- Phone --}}
        <label class="w-4/5 text-left mx-auto mt-5 mb-3" for="">Enter your phone</label>
        <input type="text" name="phone"
            class="border border-black focus:border-green-500 rounded w-4/5 mx-auto p-2 mb-3" placeholder="Phone number"
            value="{{ \Auth::user()->phone}}">

        {{-- Address --}}
        <label class="w-4/5 text-left mx-auto mt-5 mb-3" for="">Enter your address</label>
        <input type="text" name="address"
            class="border  border-black focus:border-green-500 rounded w-4/5 mx-auto p-2 mb-3" placeholder="Address"
            value="{{ \Auth::user()->address}}">

        {{-- Submit --}}
        <button type="submit" class="bg-green-300 w-2/5 mx-auto shadow-lg rounded-lg mt-3 p-2 mb-5">Send</button>
    </form>
</div>
@endauth
@guest
<div class="container mx-auto mt-5">
    <form id="forgot-pass" class="text-center border border-green-400 shadow-md flex flex-col rounded w-1/2 mx-auto"
        action="{{ route('carts.pay') }}" method="post">
        @csrf
        {{-- Email --}}
        <label class="w-4/5 text-left mx-auto mt-5 mb-3" for="">Enter your email</label>
        <input type="text" name="email"
            class="border border-black focus:border-green-500 rounded w-4/5 mx-auto p-2 mb-3" placeholder="Email"
            value="@if(session()->has('customer')) {{session()->get('customer.email')}} @endif">

        {{-- Name --}}
        <label class="w-4/5 text-left mx-auto mt-5 mb-3" for="">Enter your name</label>
        <input type="text" name="name" class="border border-black focus:border-green-500 rounded w-4/5 mx-auto p-2 mb-3"
            placeholder="Your name" value="@if(session()->has('customer')) {{session()->get('customer.name')}} @endif">

        {{-- Phone --}}
        <label class="w-4/5 text-left mx-auto mt-5 mb-3" for="">Enter your phone</label>
        <input type="text" name="phone"
            class="border border-black focus:border-green-500 rounded w-4/5 mx-auto p-2 mb-3" placeholder="Phone number"
            value="@if(session()->has('customer')) {{session()->get('customer.phone')}} @endif">

        {{-- Address --}}
        <label class="w-4/5 text-left mx-auto mt-5 mb-3" for="">Enter your address</label>
        <input type="text" name="address"
            class="border  border-black focus:border-green-500 rounded w-4/5 mx-auto p-2 mb-3" placeholder="Address"
            value="@if(session()->has('customer')) {{session()->get('customer.address')}} @endif">

        {{-- Submit --}}
        <button type="submit" class="bg-green-300 w-2/5 mx-auto shadow-lg rounded-lg mt-3 p-2 mb-5">Send</button>
    </form>
</div>
@endguest

@endsection