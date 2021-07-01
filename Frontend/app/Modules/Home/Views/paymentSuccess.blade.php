@extends('Layouts.master')

@section('title','الدفع')

@section('styles')
<link rel="stylesheet" href="{{ asset('/assets/cards/css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('/assets/cards/css/responisve.css') }}" />
<style type="text/css" media="screen">
	.confirm-page{
		width: auto;
	}
    .select2-container--default[dir="rtl"] .select2-selection--single .select2-selection__arrow{
        display: none;
    }
    .footerCard svg{
        position: absolute;
        left: 0;
    }
    .card .footerCard{
    	margin-left: 69%;
    	margin-right: unset;
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
	    	<div class="thankYou paymentNow">
		        <i class="flaticon-verified"></i>
		        <h5>شكراً لك</h5>
		        <p>تم ارسال طلبكم بنجاح يرجى مراجعة البريد الاكتروني</p>
		    </div>
		    {{-- <div class="card style{{ $data->membership->membership_id }}">
                <img src="{{ asset('/assets/cards/images/bg'.$data->membership->membership_id.'.png') }}" class="bg1" alt="" />
                <img src="{{ asset('/assets/cards/images/bg'.$data->membership->membership_id.$data->membership->membership_id.'.png') }}" class="bg2" alt="" />
                <div class="head clearfix">
                    <div class="headDetails">
                        <img src="{{ $data->image }}" />
                        <span>{{ $data->membership->Order->Field->title }}</span>
                        <span>{{ $data->membership->Order->Field->title_en }}</span>
                    </div>
                    <div class="name">
                        <span class="ar">{{ $data->membership->Order->name }}</span>
                        <span>{{ $data->membership->Order->name_en }}</span>
                    </div>
                    <img src="{{ asset('/assets/cards/images/logo.png') }}" class="logo" />
                </div>
                <span class="type">{{ $data->membership->Membership->title }}</span>
                <div class="footerCard">
                    {!! \QrCode::size(70)->generate($data->membership->code) !!}
                    <span class="date">{{ date('m/Y',strtotime($data->membership->end_date)) }}</span>
                    <span class="code">{{ $data->membership->code }}</span>
                </div>
            </div> --}}
	    </div>
	</div>
@endsection



@section('scripts')
<script src="{{ asset('/assets/js/complete.js') }}" type="text/javascript"></script>
<script>
    $(function(){
        setTimeout(function(){
            window.location.href = '/printCard/{{ $data->membership->id }}';
        },2000);
    });
</script>   
@endsection