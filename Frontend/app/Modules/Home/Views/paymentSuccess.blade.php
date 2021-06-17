@extends('Layouts.master')

@section('title','الدفع')

@section('styles')

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
	    	<div class="thankYou paymentNow">
		        <i class="flaticon-verified"></i>
		        <h5>شكراً لك</h5>
		        <p>تم ارسال طلبكم بنجاح يرجى مراجعة البريد الاكتروني</p>
		    </div>
	    </div>
	</div>
@endsection



@section('scripts')
<script src="{{ asset('/assets/js/complete.js') }}" type="text/javascript"></script>
@endsection