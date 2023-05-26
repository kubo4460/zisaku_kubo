@extends('layouts.apps')
@section('content')
<h3 class="text-center">FAQ</h3>
<h3 class="text-center mt-5">よくある質問</h3>

<div class="text-center">
    <div id="accordion" role="tablist">
        <div class="card">
            <div class="card-header" role="tab" id="headingOne">
                <h6 class="mb-0">
                    <a class="btn-light" data-toggle="collapse" href="#collapseOne" aria-expanded="false" aria-controls="collapseOne" class="collapsed">
                        お支払い方法について
                    </a>
                </h6>
            </div>

            <div id="collapseOne" class="collapse" role="tabpanel" aria-labelledby="headingOne">
                <div class="card-body">
                    お支払い方法は、カード決済・GooglePay・ApplePayとなっております。
                    ご注文完了後、お支払い方法の変更は出来ません。
                    クレジットカードは、VISA、MASTER、アメリカン・エキスプレス、JCB、ダイナース、ディスカバーがご利用いただけます。
                </div>
            </div>
        </div>
        <div class="card">
            <div class="card-header" role="tab" id="headingTwo">
                <h6 class="mb-0">
                    <a class="collapsed btn-light" data-toggle="collapse" href="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                        送料・手数料について
                    </a>
                </h6>
            </div>
            <div id="collapseTwo" class="collapse" role="tabpanel" aria-labelledby="headingTwo">
                <div class="card-body">
                日本国内への配送については、送料は1回のご注文につき、全国一律で750円(税込)をいただいております。
                </div>
            </div>
        </div>
    </div>
</div>
@endsection