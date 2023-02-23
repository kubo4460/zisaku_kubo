@extends('layouts.apps')

@section('content')

<div class="card text-center">
<h3>売上/件数</h3>
    <div class="card-body">
        @foreach($sumorders as $sumorder)
        <h5>売上金額：{{ $sumorder->total }}円</h1>

        @endforeach

        @foreach($numberorders as $numberorder)
        <h5>売上件数：{{ $numberorder->totals }}件</h1>

    </div>
</div>
@endforeach
@endsection