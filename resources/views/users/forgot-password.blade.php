<!-- Layout mater -->
@extends('layouts.master')

<!-- Title -->
@section('title', 'Forgot passowrd')

<!-- Content -->
@section('content')
<div class="container mx-auto mt-5">
    <form id="forgot-pass" class="text-center border border-green-400 shadow-md flex flex-col rounded w-1/2 mx-auto"
        action="{{ route('users.send-mail') }}" method="post">
        @csrf
        <label class="w-4/5 text-left mx-auto mt-5 mb-3" for="">Enter your email</label>
        <input type="text" name="email"
            class="border border-black focus:border-green-500 rounded w-4/5 mx-auto p-2 mb-3" placeholder="Email">
        <button type="submit" class="bg-green-300 w-2/5 mx-auto shadow-lg rounded-lg mt-3 p-2 mb-5">Send</button>
    </form>
    <div id="result"></div>
</div>
@endsection

<!-- Script -->
@section('js')
<script src="{{ asset('js/forgot-pass.js') }}"></script>
@endsection