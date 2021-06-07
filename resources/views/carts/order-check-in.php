@extends('layouts.master')
@section('title', 'Cart')

{{-- Content --}}
@section('content')
<div class="container mx-auto mt-5">
    <form id="forgot-pass" class="text-center border border-green-400 shadow-md flex flex-col rounded w-1/2 mx-auto" action="{{ route('carts.store') }}" method="post">
        @csrf
        <label class="w-4/5 text-left mx-auto mt-5 mb-3" for="">Enter your email</label>
        <input type="text" name="email" class="border border-black focus:border-green-500 rounded w-4/5 mx-auto p-2 mb-3" placeholder="Email">
        <label class="w-4/5 text-left mx-auto mt-5 mb-3" for="">Enter your address</label>
        <input type="text" name="address" class="border border-black focus:border-green-500 rounded w-4/5 mx-auto p-2 mb-3" placeholder="Address">
        <label class="w-4/5 text-left mx-auto mt-5 mb-3" for="">Enter your phone</label>
        <input type="text" name="phone" class="border border-black focus:border-green-500 rounded w-4/5 mx-auto p-2 mb-3" placeholder="Phone number">
        <button type="submit" class="bg-green-300 w-2/5 mx-auto shadow-lg rounded-lg mt-3 p-2 mb-5">Send</button>
    </form>
</div>
@endsection