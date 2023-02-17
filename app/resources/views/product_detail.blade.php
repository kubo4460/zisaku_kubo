@extends('layouts.apps')

@section('content')

<img src= "{{ asset('storage/image/'.$product['image_path']) }}">
    <div class="container">
        <div class="row">
            <div class="col-8 col-sm-6">
                .col-x5
            </div>
            <div class="col-4 col-sm-6">
                
            <a href="{{ route('cart.add',$product->id) }}">
                <button type="submit" class="btn btn-primary">追加</button>
            </a>
            </div>
        </div>
    </div>

@endsection