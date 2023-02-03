@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">名前</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">メールアドレス</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="gender" class="col-md-4 col-form-label text-md-right">性別</label>
                            
                            <div class="col-md-6" style="padding-top: 8px">
                                <input id="gender-m" type="radio" name="gender" value="1">
                                <label for="gender-m">男性</label>
                                <input id="gender-f" type="radio" name="gender" value="2">
                                <label for="gender-f">女性</label>
                                <input id="gender-f" type="radio" name="gender" value="3">
                                <label for="gender-f">回答しない</label>
                            
                                @if ($errors->has('gender'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        
                        <!-- <div class="form-group row">
                        <label for="year" class="col-md-4 col-form-label text-md-right">生年月日</label>
                                
                                @csrf
                                <select id="year" name="year">
                                    <?php $years = array_reverse(range(today()->year - 100, today()->year)); ?>
                                    @foreach($years as $year)
                                        <option value="{{ $year }}" {{ old('year') == $year ? 'selected' : '' }} >{{ $year }}</option>
                                    @endforeach
                                </select>
                                <label for="year">年</label>
                                
                                <select id="month" name="month">
                                    
                                    @foreach(range(1, 12) as $month)
                                        <option
                                        value="{{ $month }}" {{ old('month') == $month ? 'selected' : '' }}>{{ $month }}</option>
                                    @endforeach
                                </select>
                                <label for="month">月</label>

                                <select id="day" name="day">
                                    
                                    @foreach(range(1, 31) as $day)
                                        <option
                                        value="{{ $day }}" {{ old('days') == $day ? 'selected' : '' }}>{{ $day }}</option>
                                    @endforeach
                                </select>
                                <label for="day">日</label>
                            </form>
                        
                        </div> -->

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">パスワード</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">パスワード(確認のため再度入力してください)</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    登録する
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
