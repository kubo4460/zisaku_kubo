@extends('layouts.apps')

@section('content')
@can('admin-higher') {{-- 管理者に表示される --}}
<div class="card">
    <div class="card-body text-center">
        管理者ページ
        <ul class="list-group">
            <a href="{{ route('admin.user') }}" class="text-secondary pt-5">会員管理</a>
            <a href="{{ route('admin.item') }}" class="text-secondary pt-2">商品管理</a>
            <a href="{{ route('admin.sales') }}" class="text-secondary pt-2">売上管理</a>
            <a href="{{ route('admin.information') }}" class="text-secondary pt-2">お問い合わせ一覧</a>
        </ul>
    </div>
</div>
@endcan


@cannot('admin-higher')
<div class="container-fluid d-flex flex-wrap ">
    <img class="align-items-center" src="{{ asset('storage/image/homeimage.webp') }}" width="1640" height="550">
    @foreach ($products as $product)
    <div class="w-25">
        <div class="col text-center p-4">
            @can('user-higher') {{-- 一般ユーザーに表示される --}}
            @endcan
            <a href="{{ route('product.detail', $product['id']) }}">
                <img src="{{ asset('storage/image/'.$product['image_path']) }}" width="230" height="230">
            </a>
            <h5>{{$product['title']}}</h5>
        </div>
    </div>
    @endforeach
</div>
@endcan
@endsection