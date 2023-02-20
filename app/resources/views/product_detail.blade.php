@extends('layouts.apps')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-8 col-sm-6">
            <img src="{{ asset('storage/image/'.$product['image_path']) }}" width="250" height="250">
        </div>
        <div class="col-4 col-sm-6">
            <form action="{{ route('cart.add', $product['id']) }}" method="get">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                <h5>商品名：{{$product['title']}}</h5>
                <h5>商品説明：{{$product['description']}}</h5>
                <h5>サイズ：{{$product['size']}}</h5>
                <h5>価格：{{$product['price']}}円</h5>
                
                <button type="submit" class="btn btn-primary">カートへ
                </button>
            </form>
        </div>

    </div>
</div>

@endsection