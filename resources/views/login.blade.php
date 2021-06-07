@extends('layouts.master')
@section('title', 'Login')
@section('content')
<div class="container mx-auto mt-5">
    <form id="login" class="text-center border border-green-400 shadow-md flex flex-col rounded w-1/2 mx-auto"
        action="{{ route('login') }}" method="post">
        @csrf
        {{-- Email --}}
        <label class="w-4/5 text-left mx-auto mt-5 mb-3" for="">Enter your email</label>
        <input type="text" name="email"
            class="border border-black focus:border-green-500 rounded w-4/5 mx-auto p-2 mb-3" placeholder="Your email">
        {{-- Password --}}
        <label class="w-4/5 text-left mx-auto mt-5 mb-3" for="">Enter your password</label>
        <input type="password" name="password"
            class="border border-black focus:border-green-500 rounded w-4/5 mx-auto p-2 mb-3"
            placeholder="Your password">
        <button type="submit" class="bg-green-300 w-2/5 mx-auto shadow-lg rounded-lg mt-3 p-2 mb-5">Login</button>
    </form>
</div>
@endsection

{{-- JS --}}
@section('js')
<script src="{{ asset('js/login.js') }}"></script>
@endsection