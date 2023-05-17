@extends('layout.app')

@section('title') ALL POSTS @endsection

@section('body') 
<table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">title</th>
        <th scope="col">postedby</th>
        <th scope="col">createdAt</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>
@foreach ($posts as $item)
      <tr>
        <td>{{$item['id']}}</td>
        <td>{{$item['Title']}}</td>
        <td>{{$item['postedBy']}}</td>
        <td>{{$item['created_at']}}</td>
        <td> <a class='btn btn-primary' href="{{route('show',$item->id)}}">view</a>
             <a class='btn btn-warning ms-2' href="{{route('edit',$item->id)}}">Edit</a>
             <a class='btn btn-danger ms-2' href="{{route('destroy',$item->id)}}">Delete</a>
        </td>
      </tr>
 
@endforeach

</tbody>
</table>

@endsection