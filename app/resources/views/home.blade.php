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
<div class="container d-flex flex-wrap">
    @foreach ($products as $product)
    <div class="row-3">
        <div class="col">
            <div class="col text-center">
                <a href="{{ route('product.detail', $product['id']) }}">
                    <img src="{{ asset('storage/image/'.$product['image_path']) }}" width="200" height="200">
                </a>
                <h5>{{$product['title']}}</h5>
            </div>
        </div>
    </div>
    @endforeach
</div>



@endcan
@endsection