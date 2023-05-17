@extends('layout.app')
@section('title')
    One post from database
@endsection

{{--@dd($products)  --}}

{{--@dump($products)--}}
@section('body')
    <h1 class=" m-auto text-center text-danger h-100"> Post Name : {{$post->Title}} </h1>
  


@endsection
