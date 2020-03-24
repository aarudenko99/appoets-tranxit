@extends('user.layout.base')

@section('title', 'Wallet ')

@section('content')

<div class="col-md-9">
    <div class="dash-content">
        <div class="row no-margin">
            <div class="col-md-12">
                <h4 class="page-title">@lang('user.my_wallet')</h4>
            </div>
        </div>
        @include('common.notify')

        <div class="row no-margin">
                <div class="col-md-6">
                     
                    <div class="wallet">
                        <h4 class="amount">
                        	<span class="price">{{currency(Auth::user()->wallet_balance)}}</span>
                        	<span class="txt">@lang('user.in_your_wallet')</span>
                        </h4>
                    </div>                                                               

                </div>

                <div class="col-md-6">
                    
                    <h6><strong>@lang('user.add_money')</strong></h6>

                    <div class="input-group full-input">
                        <input id="amount" type="number" class="form-control" name="amount" placeholder="Enter Amount" >
                    </div>
                    
                    <button id="btn_razorpay" class="full-primary-btn fare-btn">@lang('user.add_money')</button> 

                </div>

                <form name='razorpayform' action="{{url('add/money')}}" method="POST">
                    {{ csrf_field() }}</input>
                    <input type="hidden" name="razorpay_payment_id" id="razorpay_payment_id">
                    <input type="hidden" name="razorpay_signature" id="razorpay_signature" >
                    <input type="hidden" name="razorpay_amount" id="razorpay_amount" >
                </form>
        </div>

    </div>
</div>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>

<script type="text/javascript">

    $("#btn_razorpay").on('click', function() {

        var options = {
            "key": "{{$razorpay_key}}",
            "amount": $("#amount").val() * 100, // Example: 2000 paise = INR 20
            "name": "Flyer Wheels",
            "description": "",
            "image": "asset/logo.png",// COMPANY LOGO
            "handler": function (response) {

                $('#razorpay_payment_id').val(response.razorpay_payment_id);
                $('#razorpay_signature').val(response.razorpay_signature);
                $('#razorpay_amount').val($("#amount").val());
                document.razorpayform.submit();
            },
            "prefill": {
                "name": "{{$fullname}}", // pass customer name
                "email": "{{$email}}",// customer email
                "contact": "{{$mobile}}" //customer phone no.
            },
            "notes": {
                "address": "address" //customer address 
            },
            "theme": {
                "color": "#15b8f3" // screen color
            }
        };

        var propay = new Razorpay(options);
        propay.open();
    });
</script>

@endsection