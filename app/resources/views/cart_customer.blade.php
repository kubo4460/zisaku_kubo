@extends('layouts.apps')

@section('content')
<table class="uk-table uk-table-hover uk-table-divider">
    <thead>
        <th>購入商品</th>
        <th></th>
        <th>小計</th>
    </thead>
    <tbody>
        <?php $total = 0 ?>
        @foreach($carts as $cart)
        <tr>
            <td><img src="{{asset('storage/image/'.$cart->options->path)}}" width="150" height="150"></td>
            <td>{{$cart->name}}</td>
            <td>{{$cart->price}}円</td>
            
            <td><a href="{{ route('cart.destroy',['rowId'=>$cart->rowId]) }}"><button class="uk-button uk-button-danger uk-button">削除</button></td>
        </tr>
        <?php $total +=  $cart->price ?>
        @endforeach
        <tr>
            <td></td>
            <td class="uk-text-large" style="text-align:right;">合計（消費税込み）</td>
            <td class="uk-text-large">{{$total * 1.10}}円</td>
            <td>
                <form action="{{ route('order.store') }}" method="post">
                @csrf
                <button type="submit" class="btn btn-primary">決済</button>
                </form>
            </td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
            <td><a href="/cart/reset"><button class="uk-button uk-button-danger uk-button">カート全削除</button></a></td>
            </td> 
        </tr>
    </tbody>
</table>
@endsection