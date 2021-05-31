@extends('layouts.master')

<!-- Title -->
@section('title', '| Post-Detail')

<!-- Content -->
@section('content')
<div class="mt-5 container mx-auto grid grid-cols-3 gap-4">
    @isset($post)
    <div class="grid grid-col-1 gap-4">
        <p>{{__('Title: ') . $post->title}}</p>
    </div>
    @endisset
</div>
@endsection