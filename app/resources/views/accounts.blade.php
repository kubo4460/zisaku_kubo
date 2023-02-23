@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="row no-gutters">
        <div class="col-6 col-md-4">
            <ul class="list-group">
                <a href="{{ route('users.show', Auth::id()) }}" class="text-secondary pt-5">購入履歴</a>
                <a href="{{ route('users.edit', Auth::id()) }}" class="text-secondary pt-2">配送先住所の閲覧/編集</a>
                <a href="" class="text-secondary pt-2">ウィッシュリスト</a>
                <a href="{{ route('logout') }}" class="text-secondary pt-2" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                    {{ __('ログアウト') }}
                </a>
            </ul>


        </div>

        <div class="col-12 col-sm-6 col-md-8">
            <div class="d-flex justify-content-center align-items-center pt-2">
                <h4>購入履歴</h4>
            </div>
            @foreach($orders as $order)
            <div class="container">
                <div class="row no-gutters">
                    <div class="col-12 col-sm-34 col-md-5 p-2 ">
                        <img src="{{ asset('storage/image/'.$order->products->image_path) }}" width="200" height="200" alt="Card image cap">
                    </div>
                    <div class="col-6 col-md-6">
                        <dt class="col-sm mt-4">
                        #{{$order->products->id}}
                        </dt>
                        <dt class="col-sm m-1">
                        商品名：{{$order->products->title}}
                        </dt>
                        <dt class="col-sm m-1">
                        個数：{{$order['quantity']}}
                        </dt>
                        <dt class="col-sm m-1">
                        サイズ：{{$order['size']}}
                        </dt>
                        <dt class="col-sm m-1">
                        価格：{{$order['price']}}
                        </dt>

                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div>

@endsection