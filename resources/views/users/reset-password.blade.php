@extends('layouts.master')
@section('title', 'Reset your passowrd')

@section('content')
<div class="container mx-auto mt-5">
    <form class="text-center border border-green-400 flex flex-col rounded w-1/2 mx-auto" action="{{ route('users.change-pass', ['id' => $id]) }}" method="post">
        @csrf
        @method('PUT')
        <label class="w-4/5 text-left mx-auto mt-5 mb-3" for="">Enter your new password</label>
        <input type="password" name="password" class="border border-black focus:border-green-500 rounded w-4/5 mx-auto p-2 mb-3" placeholder="New password">
        <button type="submit" class="bg-green-300 w-2/5 mx-auto shadow-lg rounded-lg mt-3 p-2 mb-5">Confirm</button>
    </form>
</div>
@endsection