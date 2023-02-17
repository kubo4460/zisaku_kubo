@extends('layouts.apps')
@section('content')
<form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">商品名</label>
                            <input type="text" name="title" class="col-sm-8" class="form-control">
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">商品画像</label>
                            <input type="file" name="image_path" id="exampleFormControlFile1" class="col-sm-8 " class="form-control-file">
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">商品説明</label>
                            <input type="text" name="description" class="col-sm-8" class="form-control form-control-lg">
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">販売価格</label>
                            <input type="text" name="price" class="col-sm-8" class="form-control form-control-lg">
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">在庫数</label>
                            <input type="text" name="stock" class="col-sm-8" class="form-control form-control-lg">
                        </div>
                        <div class="form-group row">
                            <label for="inputEmail" class="col-sm-2 col-form-label">サイズ</label>
                            <input type="text" name="size" class="col-sm-8" class="form-control form-control-lg">
                        </div>
                        <button type="submit" class="btn btn-primary btn-lg">登録</button>
                    </div>
                </div>
            </div>
        </div>
    </div>



    @endsection