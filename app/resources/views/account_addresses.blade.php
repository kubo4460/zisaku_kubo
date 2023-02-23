@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="row no-gutters">
        <div class="col-6 col-md-4">
            <ul class="list-group">
<a href = "{{ route('users.show', $user['id']) }}" class="text-secondary pt-5"> 購入履歴</a></li>
<a href = "{{ route('users.edit', $user['id']) }}" class="text-secondary pt-2">配送先住所の閲覧/編集</a></li>
<a href = ""class="text-secondary pt-2">ウィッシュリスト</a></li>
<a href = ""class="text-secondary pt-2">ログアウト</a></li>
            </ul>
        </div>
        <div class="col-12 col-sm-6 col-md-8">
            <div class="d-flex justify-content-center align-items-center pt-3">
                <h3>配送先住所の閲覧/編集</h3>
            </div>
            <!-- Button trigger modal -->
            @if(count($user->accounts) != 0)
            @foreach($user->accounts as $account)
            <div class="card">
                <div class="card-body">
                    <div>{{ $account['name'] }}</div>
                    <div>{{ $account['post'] }}</div>
                    <div>{{ $account['address'] }}</div>
                    <div>{{ $account['tel'] }}</div>
                    <div class="d-flex justify-content-center align-items-center">
                        <button type="button" class="btn btn-outline-secondary" data-toggle="modal" data-target="#exampleModalScrollable" class="card-link">編集</button>
                        <form action="{{route('account.destroy',$account->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class='btn btn-outline-secondary' type='submit' onclick="return confirm('このお届け先を本当に削除しますか？')">削除</button>
                        </form>
                    </div>

                </div>
            </div>
            @endforeach

            <!-- 編集Modal -->
            <div class="modal" id="exampleModalScrollable" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenteredLabel">お届け先を編集する</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>

                        <form action="{{ route('account.update',$account->id) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">氏名</label>
                                    <input type="name" name="name" value="{{ $account->name }}" class="form-control" id="formGroupExampleInput" placeholder="氏名">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">郵便番号</label>
                                    <input type="post" name="post" value="{{ $account->post }}" class="form-control" id="formGroupExampleInput2" placeholder="郵便番号">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">住所</label>
                                    <input type="address" name="address" value="{{ $account->address }}" class="form-control" id="formGroupExampleInput" placeholder="住所">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">電話番号</label>
                                    <input type="tel" name="tel" value="{{ $account->tel }}" class="form-control" id="formGroupExampleInput2" placeholder="電話番号">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                <button type="submit" class="btn btn-primary">登録</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
            @endif

            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#storeModal">
                新規登録
            </button> 
                        <!-- 新規作成Modal -->
                        <div class="modal" id="storeModal" tabindex="-1" role="dialog" aria-labelledby="storeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenteredLabel">お届け先を登録する</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>

                        <form action="{{ route('account.store') }}" method="post">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="formGroupExampleInput">氏名</label>
                                    <input type="name" name="name" value="" class="form-control" id="formGroupExampleInput" placeholder="氏名">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">郵便番号</label>
                                    <input type="post" name="post" class="form-control" id="formGroupExampleInput2" placeholder="郵便番号">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput">住所</label>
                                    <input type="address" name="address" class="form-control" id="formGroupExampleInput" placeholder="住所">
                                </div>
                                <div class="form-group">
                                    <label for="formGroupExampleInput2">電話番号</label>
                                    <input type="tel" name="tel" class="form-control" id="formGroupExampleInput2" placeholder="電話番号">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                                <button type="submit" class="btn btn-primary">登録</button>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        

        </div>
    </div>
</div>
@endsection