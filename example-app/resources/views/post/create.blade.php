@extends('layouts.app')

@section('title') Create Post  @endsection

    

@section('content')



<form action="{{route('posts.store')}}" method="POST" enctype="multipart/form-data">
    @method("POST")
    @csrf
    <div class="form-group mt-5">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" placeholder="Title" class="form-control"   value="{{ old('title') }}">
    </div>
    @error('title')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="form-group mt-5">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control" placeholder="Description"  value="{{ old('description') }}"> </textarea>
    </div>
    @error('description')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror


    <div class="form-group mt-5">
        <label for="image">Image</label>
        <input type="file" name="image" id="image" class="form-control" placeholder="image" />
    </div>
    <div class="form-group mt-5">
        <label for="authorName">Author Name</label>
        <select name="user_id" class="form-select" aria-label="Default select example">
            @foreach($users as $user)
                <option value="{{$user->id}}">{{$user->name}}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group mt-5">
        <button type="submit" class="btn btn-info">Add Post</button>
    </div>
</form>


@endsection
