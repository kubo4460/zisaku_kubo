@extends('layouts.apps')

@section('content')
<table class="table table-borderless">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Birth</th>
            <th>Post</th>
            <th>Address</th>
            <th>Tel</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <th scope="row">{{$user['id']}}</th>
            <td>{{$user['name']}}</td>
            <td>{{$user['birth']}}</td>
            <td>{{$user['post']}}</td>
            <td>{{$user['address']}}</td>
            <td>{{$user['tel']}}</td>
        </tr>
        @endforeach

    </tbody>
</table>

@endsection