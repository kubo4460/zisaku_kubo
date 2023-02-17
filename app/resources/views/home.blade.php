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

</div>
@elsecan('user-higher') {{-- 一般ユーザーに表示される --}}
@foreach ($products as $product) 
<h2>{{$product['title']}}</h2>
<a href="{{ route('product.detail',['id'=>$product['id']]) }}">
<img src="{{ asset('storage/image/'.$product['image_path']) }}" width="150" height="200">
</a>
@endforeach
@endcan
@endsection