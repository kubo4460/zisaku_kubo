@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="row no-gutters">
        <div class="col-6 col-md-4">
            <ul class="list-group">
                <a href="{{ route('users.show', Auth::id()) }}" class="text-secondary pt-5">購入履歴</a>
                <a href="{{ route('users.edit', Auth::id()) }}" class="text-secondary pt-2">配送先住所の閲覧/編集</a>
                <a href="" class="text-secondary pt-2">ウィッシュリスト</a>
                <a href="{{ route('logout') }}" class="text-secondary pt-2">ログアウト</a>
            </ul>

        </div>

        <div class="col-12 col-sm-6 col-md-8">
            <div class="d-flex justify-content-center align-items-center pt-2">
                <h3>購入履歴</h3>
            </div>
        </div>
    </div>
</div>

@endsection