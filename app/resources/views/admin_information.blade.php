@extends('layouts.apps')

@section('content')
<table class="table table-borderless">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>type</th>
            <th>inquiry</th>
            <th>inquirydate</th>
        </tr>
    </thead>
    <tbody>
        @foreach($informations as $information)
        @if($information['type']==1)
        <tr>

            <th scope="row">{{$information['id']}}</th>
            <td>{{$information->user->name}}</td>
            <td>サイズ</td>
            <td>{{$information['inquiry']}}</td>
            <td>{{$information['created_at']}}</td>
        </tr>
        @elseif($information['type']==2)
        <tr>
            <th scope="row">{{$information['id']}}</th>
            <td>{{$information->user->name}}</td>
            <td>配送状況</td>
            <td>{{$information['inquiry']}}</td>
            <td>{{$information['created_at']}}</td>
        </tr>
        @elseif($information['type']==3)
        <tr>
            <th scope="row">{{$information['id']}}</th>
            <td>{{$information->user->name}}</td>
            <td>返品交換</td>
            <td>{{$information['inquiry']}}</td>
            <td>{{$information['created_at']}}</td>
        </tr>
        @elseif($information['type']==4)
        <tr>
            <th scope="row">{{$information['id']}}</th>
            <td>{{$information->user->name}}</td>
            <td>その他</td>
            <td>{{$information['inquiry']}}</td>
            <td>{{$information['created_at']}}</td>
        </tr>
        @endif
        @endforeach
    </tbody>
</table>
@endsection