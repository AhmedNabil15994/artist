@extends('Layouts.master')

@section('title','الدفع')

@section('styles')
<style type="text/css" media="screen">
	.paymentNow{
		padding-left: 15px;
    	padding-right: 15px;
	}
	.paymentNow .col-xs-4{
		width: 33.3333%;
		display: inline-block;
		float: left;
	}
	.paymentNow .title{
		margin-bottom: 25px;
	}
	.pad{
		padding-top: 36px;
	}
</style>
@endsection

@section('content')
   	<div class="breadcrumb" style="background-image: url('{{ asset("/assets/images/breadcrumb.png") }}');">
        <div class="container">
            <h5>اكمال الطلب</h5>
            <ul class="list-unstyled">
                <li><a href="{{ URL::to('/') }}">الرئيسية</a></li>
                <li><a href="">اكمال الطلب</a></li>
            </ul>
        </div>
    </div>
	    
  	<div class="confirm-page">
	    <div class="container">
	    	<div class="paymentNow now">
		        <h2 class="title">اختر نوع الدفع قبل التوجة الى بوابة الدفع</h2>
				<div class="row mb-3">
					<div class="col-xs-4"><a href="{{ URL::to('/paymentGateway/VISA') }}">
						<img src="{{ asset('assets/images/visa.svg') }}" alt="">
					</a></div>
					<div class="col-xs-4 pad"><a href="{{ URL::to('/paymentGateway/MASTER') }}">
						<img src="{{ asset('assets/images/mastercard.svg') }}" alt="">
					</a></div>
					<div class="col-xs-4 pad"><a href="{{ URL::to('/paymentGateway/MADA') }}">
						<img src="{{ asset('assets/images/Mada_Logo.svg') }}" alt="">
					</a></div>
				</div>
				<img src="{{ asset('/assets/images/waiting.svg') }}" alt="" class="iconPayment fa-spin" />
		    </div>
	    </div>
	</div>
@endsection



@section('scripts')
<script src="{{ asset('/assets/js/complete.js') }}" type="text/javascript"></script>
@endsection