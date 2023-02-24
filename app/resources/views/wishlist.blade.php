@extends('layouts.apps')
@section('content')
<h4 class ="text-center">ウィッシュリスト</h4>
@foreach($likes as $like)
<div class="container">
    <div class="row no-gutters">
        <div class="col-12 col-sm-34 col-md-5 p-2 ">
            <img src="{{ asset('storage/image/'.$like->products->image_path) }}" width="200" height="200" alt="Card image cap">
        </div>
        <div class="col-6 col-md-6">
            <dt class="col-sm mt-4">
                #{{$like->products->id}}
            </dt>
            <dt class="col-sm m-1">
                商品名：{{$like->products->title}}
            </dt>
            <dt class="col-sm m-1">
                個数：{{$like->products->description}}
            </dt>
            <dt class="col-sm m-1">
                サイズ：{{$like->products->size}}
            </dt>
            <dt class="col-sm m-1">
                価格：{{$like->products->price}}
            </dt>

        </div>
    </div>
</div>
@endforeach

@endsection