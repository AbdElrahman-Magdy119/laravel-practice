@extends('layouts.app')

@section('title') Posts  @endsection


@section('content')


<div class="text-center">
    <a href="{{ route('posts.deletetwoYearsAgo') }}" class="btn btn-primary mt-3 "> Delete All </a>
    </div>

<table class="table table-striped">
<thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>Posted By</th>
        <th>Created At</th>
        <th>Slug</th>
        <th>Actions</th>
    </tr>
</thead>
<tbody>
    @foreach ($posts as $item)

    <tr>
        <td>{{$item['id']}}</td>
        <td>{{$item['title']}}</td>
{{--        @dd($item)--}}
        @if($item->user)
            <td><a href="{{route('users.show',$item->user->id)}}">{{$item->user->name}} </a></td>
        @else
            <td>N/A</td>
        @endif

        <td>{{$item['created_at']}}</td>
        <td>{{$item['slug']}}</td>
        <td>
            <div class="d-flex justify-content-baseline">
                <a class="btn btn-sm btn-primary ms-1" href="{{route('posts.show',$item['id'])}}">View</a>
                <a class="btn btn-sm btn-warning ms-1" href="{{route('posts.edit',$item['id'])}}">Edit</a>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-danger ms-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Delete
                </button>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                Are You Sure You want to Delete this Post
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form method="post"  action="{{route('posts.destroy', $item->id)}}">
                                    @method('DELETE')
                                    @csrf
                                    <input type="submit" class="btn btn-danger" value="Delete">
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </td>
    </tr>

    
    @endforeach

    <div class="container">
        <div class="row mt-5">
            {{ $posts->links('pagination::bootstrap-5') }}
        </div>
    </div>

</tbody>
</table>


@endsection
