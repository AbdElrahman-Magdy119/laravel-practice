@extends('layouts.app')

@section('title') Posts  @endsection


@section('content')

<div class="card">
    <div class="card-header">
     <img src="{{asset('images/posts/'.$post->image)}}"/>
    </div>
    <div class="card-body">
      <h5 class="card-title"> Title: {{$post->title}}</h5>
      <p class="card-text"> Description: {{$post->description}}</p>
      <p class="card-text"> Created At : {{$post->created_at}}</p>
        @if($post->user)
            <p class="card-text">Posted By : {{$post->user->name}}</p>
        @else
            <td>N/A</td>
        @endif
      <p class="card-text"> Last Update : {{$post->updated_at}}</p>
      <a href="#" class="btn btn-primary">Go somewhere</a>
    </div>
    
    <div>
      <h1>Post Title</h1>
  
      <p>Post content goes here...</p>
  
      @livewire('comments-section', ['postId' => $post->id])
   </div>

  </div>

@endsection


@section('body')
<form action="{{route('comments.store')}}" method="post">
  @csrf
  <section style="background-color: #eee;">
      <div class="container my-5 py-5">
          <div class="row d-flex justify-content-center">
              <div class="col-md-12 col-lg-10 col-xl-8">
                  <div class="card">
                      <input type="hidden" name="post_id" value="{{$post['id']}}">
                      <div class="card-footer py-3 border-0" style="background-color: #f8f9fa;">
                          <div class="d-flex flex-start w-100">
                              <div class="form-outline w-100">
                        <textarea name="comment" class="form-control" id="textAreaExample" rows="4"
                        style="background: #fff;"></textarea>
                                  <label class="form-label" for="textAreaExample">Message</label>
                              </div>
                          </div>
                          <div class="float-end mt-2 pt-1">
                              <button type="submit" class="btn btn-primary btn-sm">Post comment</button>
                              <button type="button" class="btn btn-outline-primary btn-sm">Cancel</button>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
  </section>
</form>
<section style="background-color: #eee;">
  <div class="container my-5 py-5">
      <div class="row d-flex justify-content-center">
          <div class="col-md-12 col-lg-10 col-xl-8">
              <div class="card">
                  @if($post->comments)
                  @foreach($post->comments as $comment)
                  <div class="card-body">
                          <div class="d-flex flex-start align-items-center">
                              <img class="rounded-circle shadow-1-strong me-3"
                                   src="https://mdbcdn.b-cdn.net/img/Photos/Avatars/img%20(19).webp" alt="avatar" width="60"
                                   height="60" />
                              <div>
                                  <h6 class="fw-bold text-primary mb-1">{{$comment->commentable->name}}</h6>
                                  <p class="text-muted small mb-0">
                                      Shared publicly - {{$comment['created_at']}}
                                  </p>
                              </div>
                          </div>

                          <p class="mt-3 mb-4 pb-2">
                              {{$comment['comment']}}
                          </p>
                      </div>
                  @endforeach
                  @endif
              </div>
          </div>
      </div>
  </div>
</section>
@endsection