@extends('layouts.master')
@section('title', '| Register')
@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
@endsection
@section('content')
<div class="container mx-auto mt-5 mb-48">
    <div class="mb-5">
        <h1 class="mx-auto text-center text-white text-5xl p-2 border-2 bg-blue-300 w-1/2 rounded-sm">Register new
            account</h1>
    </div>
    <form id="register" class="text-center border border-green-400 shadow-md flex flex-col rounded w-1/2 mx-auto"
        action="{{ route('register') }}" method="post">
        @csrf

        {{-- Email --}}
        <label class="w-4/5 text-left mx-auto mt-5 mb-3" for="">Enter your email</label>
        <input type="text" name="email" id="email"
            class="border border-black focus:border-green-500 rounded w-4/5 mx-auto p-2 mb-3" placeholder="Your email">
        {{-- Email error display --}}
        <p id="email-error" class="text-red-500 w-4/5 text-left mx-auto mt-5 mb-3"></p>

        {{-- Name --}}
        <label class="w-4/5 text-left mx-auto mt-1 mb-3" for="">Enter your name</label>
        <input type="text" name="name" id="name"
            class="border border-black focus:border-green-500 rounded w-4/5 mx-auto p-2 mb-3" placeholder="Your name">
        {{-- Name error display --}}
        <p id="name-error" class="text-red-500 w-4/5 text-left mx-auto mt-5 mb-3"></p>

        {{-- Gender --}}
        <label class="w-4/5 text-left mx-auto mt-1 mb-3" for="">Select your gender</label>
        <select class="border border-black focus:border-green-500 rounded w-4/5 mx-auto p-2 mb-3 bg-white" name="gender"
            id="gender">
            <option value="{{ \App\Profile::MALE_GENDER }}">Male</option>
            <option value="{{ \App\Profile::FEMALE_GENDER }}">Female</option>
            <option value="{{ \App\Profile::ORTHER_GENDER }}">Other</option>
        </select>
        {{-- Name error display --}}


        {{-- Age --}}
        <label class="w-4/5 text-left mx-auto mt-1 mb-3" for="">Enter your age</label>
        <input type="text" name="age" id="age"
            class="border border-black focus:border-green-500 rounded w-4/5 mx-auto p-2 mb-3" placeholder="Your age">
        {{-- Age error display --}}
        <p id="age-error" class="text-red-500 w-4/5 text-left mx-auto mt-1 mb-3"></p>


        {{-- Phone --}}
        <label class="w-4/5 text-left mx-auto mt-1 mb-3" for="">Enter your phone</label>
        <input type="text" name="phone" id="phone"
            class="border border-black focus:border-green-500 rounded w-4/5 mx-auto p-2 mb-3" placeholder="Your phone">
        {{-- Phone error display --}}
        <p id="phone-error" class="text-red-500 w-4/5 text-left mx-auto mt-1 mb-3"></p>


        {{-- Address --}}
        <label class="w-4/5 text-left mx-auto mt-1 mb-3" for="">Enter your address</label>
        <input type="text" name="address" id="address"
            class="border border-black focus:border-green-500 rounded w-4/5 mx-auto p-2 mb-3"
            placeholder="Your address">
        {{-- Address error display --}}
        <p id="address-error" class="text-red-500 w-4/5 text-left mx-auto mt-1 mb-3"></p>

        {{-- Password --}}
        <label class="w-4/5 text-left mx-auto mt-1 mb-3" for="">Enter your password</label>
        <input type="password" name="password" id="password"
            class="border border-black focus:border-green-500 rounded w-4/5 mx-auto p-2 mb-3"
            placeholder="Your password">
        {{-- Password error display --}}
        <p id="password-error" class="text-red-500 w-4/5 text-left mx-auto mt-1 mb-3"></p>

        {{-- Password confirmation --}}
        <label class="w-4/5 text-left mx-auto mt-1 mb-3" for="">Enter your password again</label>
        <input type="password" name="password_confirmation" id="password-confirmation"
            class="border border-black focus:border-green-500 rounded w-4/5 mx-auto p-2 mb-3"
            placeholder="Your password">
        {{-- Password error display --}}
        <p id="password-error" class="text-red-500 w-4/5 text-left mx-auto mt-1 mb-3"></p>

        {{-- Login button --}}
        <button type="submit" class="bg-green-300 w-2/5 mx-auto shadow-lg rounded-lg mt-2 p-2 mb-5">Register</button>
    </form>
</div>
@endsection

{{-- js --}}
@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="{{ asset('js/register.js') }}"></script>
@endsection