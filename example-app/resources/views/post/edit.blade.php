@extends('layouts.app')

@section('title') Posts  @endsection

    

@section('content')

<form action="{{route('posts.update',$post['id'])}}" method="POST" enctype="multipart/form-data">
    @method("PUT")
    @csrf
    <div class="form-group mt-5">
        <label for="title">Title</label>
        <input type="text" name="title" id="title" placeholder="Title" class="form-control" value="{{$post['title']}}">
    </div>
    <div class="form-group mt-5">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control" placeholder="Description">
            {{$post['description']}}
        </textarea>
    </div>
    <div class="form-group mt-5">
        <label for="image">Image</label>
        @if($post['image'])
            <img src="{{asset('images/posts/'.$post->image)}}"/>
        @endif
        <input type="file" name="image" id="image" class="form-control" placeholder="image"  />
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
        <button type="submit" class="btn btn-info">Update Post</button>
    </div>
</form>


@endsection
