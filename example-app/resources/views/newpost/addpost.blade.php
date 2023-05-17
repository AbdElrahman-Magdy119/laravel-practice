@extends('layout.app')

@section('title') ADD POSTS @endsection


@section('body') 

<form method="POST" action="route('newpost.store')">
  @method('post')
  @csrf
    <div class="mb-3">
      <label for="exampleInputEmail1" class="form-label">Title</label>
      <input type="text" class="form-control" id="exampleInputEmail1" name="title">
    </div>

    @error('Title')
    <div class="alert alert-danger">{{ $message }}</div>
    @enderror

    <div class="mb-3">
      <label for="exampleInputPassword1" class="form-label">Description</label>
      <input type="text" class="form-control" id="exampleInputPassword1" >
    </div>

       <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">CreatedBy</label>
        <input type="text" class="form-control" id="exampleInputPassword1" name="postedby">
       </div>

       @error('postedBy')
       <div class="alert alert-danger">{{ $message }}</div>
       @enderror

      <div class="mb-3">
        <label  class="form-label">Image</label>
        <input type="file" class="form-control"  name="image">
      </div>
   
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>






@endsection