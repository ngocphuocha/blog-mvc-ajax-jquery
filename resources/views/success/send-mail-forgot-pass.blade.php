@extends('layouts.master')
@section('title', 'Forgot password')

@section('content')
<div class="containter mx-auto mt-5">
    <p class="text-center">We have send email to <span class="text-bold text-blue-300">{{$email}}</span>, please check it!</p>
</div>
@endsection