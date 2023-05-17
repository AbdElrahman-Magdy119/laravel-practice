@extends('layouts.app')

@section('title') User Posts  @endsection


@section('content')
    <h1> {{$user->name}} Info </h1>
    @if(count($user->posts))
        {{--        @dump($user->posts)--}}
        <h1> Posts wirtten by this user </h1>
        @foreach($user->posts as $post)
            <li> <a href="{{route('posts.show', $post->id)}}"> {{$post->title}}</a></li>
        @endforeach
    @endif

@endsection
