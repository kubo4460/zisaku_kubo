@extends('layouts.apps')

@section('content')
<p class="text-center h4">検索結果</p>
<div class="input-group">
        <div class="container d-flex flex-wrap">
            @foreach ($products as $product)
            @foreach ($product as $p)
            <div class="w-25">
                <div class="col text-center p-4">
                    <a href="{{ route('product.detail',['id'=>$p['id']]) }}">
                        <img src="{{ asset('storage/image/'.$p['image_path']) }}" width="150" height="200">
                    </a>
                    <h5>{{$p['title']}}</h5>
                </div>
            </div>
            @endforeach
            @endforeach
        </div>
</div>

@endsection