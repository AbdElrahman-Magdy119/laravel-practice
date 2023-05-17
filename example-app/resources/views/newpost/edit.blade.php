@extends('layout.app')

@section('title') Edit POST @endsection


@section('body') 

<form method="POST" action="/posts/edit">
  @method('post')
  @csrf
    <input type="text" class="form-control"  name="id" value={{$post->id}} hidden>
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Title</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="title" value={{$post->Title}}>
    </div>
  
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">CreatedBy</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="postedby" value={{$post->postedBy}}>
      </div>
   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>



@endsection