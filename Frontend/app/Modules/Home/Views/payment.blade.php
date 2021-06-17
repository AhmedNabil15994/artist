@extends('Layouts.master')

@section('title','الدفع')

@section('styles')

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
		        <i class="flaticon-verified"></i>
		        <h5>الدفع الآن</h5>
		        <p>جاري تحويلك لعملية الدفع الالكتروني</p>
		    </div>
	    </div>
	</div>
@endsection



@section('scripts')
<script src="{{ asset('/assets/js/complete.js') }}" type="text/javascript"></script>
@endsection