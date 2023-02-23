@extends('layouts.apps')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-8 col-sm-6">
            @can('user-higher') {{-- 一般ユーザーに表示される --}}
            @if($like_model->like_exist(Auth::user()->id,$product->id))
            <p class="favorite-marke">
                <a class="js-like-toggle loved " data-productid="{{ $product->id }}"><i class="fas fa-heart right-5 fa-2x "></i></a>
                <span class="likesCount">{{$product->likes_count}}</span>
            </p>
            @else
            <p class="favorite-marke">
                <a class="js-like-toggle" data-productid="{{ $product->id }}"><i class="fas fa-heart fa-2x"></i></a>
                <span class="likesCount">{{$product->likes_count}}</span>
            </p>
            @endif
            @endcan
            <img src="{{ asset('storage/image/'.$product['image_path']) }}" width="250" height="250">
        </div>


        <div class="col-2 col-sm-5 mt-5">
            <form action="{{ route('cart.add', $product['id']) }}" method="get">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product['id'] }}">

                <dt class="col-sm m-2">
                    商品名：{{$product['title']}}
                </dt>
                <dt class="col-sm m-2">
                    商品説明：{{$product['description']}}
                </dt>
                <dt class="col-sm m-2">
                    サイズ：{{$product['size']}}
                </dt>
                <dt class="col-sm m-2">
                    ¥{{$product['price']}}円
                </dt>
                <button type="submit" class="btn btn-dark btn-lg btn-block mt-5">ADD TO CART</button>
            </form>
        </div>

    </div>
</div>

@endsection