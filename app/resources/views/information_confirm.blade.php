@extends('layouts.apps')

@section('content')
<form action="{{ route('information.store') }}" method="post">
    @csrf

    <div class="form-group row">
        <label for="inputEmail3" class="col-sm-2 col-form-label">お問い合わせ項目</label>
        <div class="custom-control custom-radio">
            <input value="{{ old('type') }}" type="radio" id="customRadio1" name="customRadio" class="custom-control-input">
            <label class="custom-control-label" for="customRadio1">サイズ</label>
        </div>
        <div class="custom-control custom-radio">
            <input value="{{ old('type') }}" type="radio" id="customRadio2" name="customRadio" class="custom-control-input">
            <label class="custom-control-label" for="customRadio2">配送状況</label>
        </div>
        <div class="custom-control custom-radio">
            <input value="{{ old('type') }}" type="radio" id="customRadio3" name="customRadio" class="custom-control-input">
            <label class="custom-control-label" for="customRadio3">返品交換</label>
        </div>
        <div class="custom-control custom-radio">
            <input value="{{ old('type') }}" type="radio" id="customRadio4" name="customRadio" class="custom-control-input">
            <label class="custom-control-label" for="customRadio4">その他</label>
        </div>

    </div>
    <div class="form-group row">
        <label for="inputEmail" class="col-sm-2 col-form-label">名前</label>
        <input value="{{ old('name') }}" type="text" class="col-sm-5" class="form-control" id="inputEmail3" placeholder="名前">
    </div>
    <div class="form-group row">
        <label for="inputEmail" class="col-sm-2 col-form-label">メールアドレス</label>
        <input value="{{ old('email') }}" type="text" class="col-sm-5" class="form-control" id="inputEmail3" placeholder="メールアドレス">
    </div>
    <div class="form-group row">
        <label for="inputEmail" class="col-sm-2 col-form-label">お問い合わせ内容</label>
        <input value="{{ old('inquiry') }}" type="text" class="col-sm-5 " class="form-control form-control-lg"   id="inputEmail3" placeholder="お問い合わせ内容">
    </div>
    <div class="form-group row">
    <div class="col-sm-10 offset-sm-2">
        <button type="submit" class="btn btn-primary">送信</button>
    </div>
@endsection