@extends('layouts.apps')

@section('content')
<table class="table table-borderless">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Post</th>
            <th>Address</th>
            <th>Tel</th>
        </tr>
    </thead>
    <tbody>
        @foreach($accounts as $account)
        <tr>
            <th scope="row">{{$account['id']}}</th>
            <td>{{$account['name']}}</td>
            <td>{{$account['post']}}</td>
            <td>{{$account['address']}}</td>
            <td>{{$account['tel']}}</td>
            <td><button type="button" class="btn btn-outline-secondary btn-sm" data-toggle="modal" data-target="#exampleModalScrollable" class="card-link">編集</button></td>
            <form action="{{route('account.destroy',$account->id)}}" method="post">
                @csrf
                @method('DELETE')
                <td><button class="btn btn-outline-secondary btn-sm" b type='submit' onclick="return confirm('このお届け先を本当に削除しますか？')">削除</button></td>
            </form>
        </tr>
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
    

    </tbody>
</table>

@endsection