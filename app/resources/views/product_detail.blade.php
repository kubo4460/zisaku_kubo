@extends('layouts.apps')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-8 col-sm-6">
            <img src="{{ asset('storage/image/'.$product['image_path']) }}" width="150" height="200">
        </div>
        <div class="col-4 col-sm-6">
            <form action="{{ route('cart.add', $product['id']) }}" method="get">
                @csrf
                <input type="hidden" name="product_id" value="{{ $product['id'] }}">
                <button type="submit" class="btn btn-primary">追加</button>
            </form>
        </div>

    </div>
</div>

@endsection