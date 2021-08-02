@extends('Layouts.master')

@section('title','الدفع')

@section('styles')
<style type="text/css" media="screen">
	.confirm-page{
		width: 50%;
	}
	.title{
		margin-bottom: 25px;
	}
</style>
@endsection

@section('content')
    <div class="breadcrumb" style="background-image: url('{{ asset("/assets/images/breadcrumb.png") }}');">
        <div class="container">
            <h5>تأكيد الدفع</h5>
            <ul class="list-unstyled">
                <li><a href="{{ URL::to('/') }}">الرئيسية</a></li>
                <li><a href="">تأكيد الدفع</a></li>
            </ul>
        </div>
    </div>
	    
   	<div class="confirm-page">
	    <div class="container">
	    	<div class="complete-order-form bank-transform">
		        <div class="formStyle">
					<div class="paymentNow">
						<h2 class="title">اكمال الدفع:</h2>
						<form action="{{ $data->redirectURL }}" class="paymentWidgets" data-brands="{{ $data->formBrands }}"></form>
					</div>
				</div>
		    </div>
	    </div>
	</div>
@endsection


@section('scripts')
<script>
    var wpwlOptions = {
        locale: "ar"
    }
</script>
<script async src="https://test.oppwa.com/v1/paymentWidgets.js?checkoutId={{ $data->response->id }}"></script>
<script src="{{ asset('/assets/js/complete.js') }}" type="text/javascript"></script>
@endsection