@extends('layouts.apps')

@section('content')
@can('admin-higher') {{-- 管理者に表示される --}}
    <div class="card">
        <div class="card-body text-center">
            管理者ページ
            <ul class="list-group">
                <a href="{{ route('admin.user') }}" class="text-secondary pt-5">会員管理</a>
                <a href="{{ route('admin.item') }}" class="text-secondary pt-2">商品管理</a>
            </ul>
        </div>
    </div>
@endcan


    @cannot('admin-higher')
        <div class="container d-flex flex-wrap">
            @foreach ($products as $product)
            <div class="w-25">
                <div class="col text-center p-4">
                    @can('user-higher') {{-- 一般ユーザーに表示される --}}
                        @if($like_model->like_exist(Auth::user()->id,$product->id))
                        <p class="favorite-marke">
                            <a class="js-like-toggle loved" data-productid="{{ $product->id }}"><i class="fas fa-heart"></i></a>
                            <span class="likesCount">{{$product->likes_count}}</span>
                        </p>
                        @else
                        <p class="favorite-marke">
                            <a class="js-like-toggle" data-productid="{{ $product->id }}"><i class="fas fa-heart"></i></a>
                            <span class="likesCount">{{$product->likes_count}}</span>
                        </p>
                        @endif
                    @endcan
                    <a href="{{ route('product.detail', $product['id']) }}">
                        <img src="{{ asset('storage/image/'.$product['image_path']) }}" width="200" height="200">
                    </a>
                    <h5>{{$product['title']}}</h5>
                </div>
            </div>
            @endforeach
        </div>
    @endcan
@endsection