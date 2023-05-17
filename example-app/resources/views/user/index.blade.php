@extends('layouts.app')

@section('title') Users  @endsection


@section('content')

<table class="table table-striped">
<thead>
    <tr>
        <th>#</th>
        <th>Name</th>
        <th>Email</th>
        <th>Created At</th>
    </tr>
</thead>
<tbody>
    @foreach ($users as $item)

    <tr>
        <td>{{$item['id']}}</td>
        <td>{{$item['name']}}</td>
        <td>{{$item['email']}}</td>
        <td>{{$item['created_at']}}</td>

    </tr>
    @endforeach
    <div class="container">
        <div class="row mt-5">
            {{ $users->onEachSide(5)->links('pagination::bootstrap-5') }}
        </div>
    </div>



</tbody>
</table>


@endsection
