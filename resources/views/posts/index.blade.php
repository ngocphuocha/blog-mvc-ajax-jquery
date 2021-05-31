@extends('layouts.master')

<!-- Title -->
@section('title', '| Posts')

<!-- Content -->
@section('content')
<div class="mt-5 container mx-auto grid grid-cols-1 gap-4">
    @isset($posts)
    @foreach ($posts as $post)
    <div class="grid grid-col-1 gap-4">
        <p>{{__('Title: ') . $post->title}}</p>
        <p>{{__('Detail: ')}}<a class="text-red-500" href="{{ route('posts.show', [$post->title]) }}">Detail</a></p>
    </div>
    @endforeach
    @endisset
</div>
@endsection