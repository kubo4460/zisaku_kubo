@extends('layouts.apps')

@section('content')
<table class="table table-borderless">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Post</th>
            <th>Address</th>
            <th>Tel</th>
        </tr>
    </thead>
    <tbody>
        @foreach($accounts as $account)
        <tr>
            <th scope="row">{{$account['id']}}</th>
            <td>{{$account['name']}}</td>
            <td>{{$account['post']}}</td>
            <td>{{$account['address']}}</td>
            <td>{{$account['tel']}}</td>
            <form action="{{route('account.destroy',$account->id)}}" method="post">
                @csrf
                @method('DELETE')
                <td><button class="btn btn-outline-secondary btn-sm" b type='submit' onclick="return confirm('このお届け先を本当に削除しますか？')">削除</button></td>
            </form>
        </tr>
        @endforeach
    </tbody>
@endsection