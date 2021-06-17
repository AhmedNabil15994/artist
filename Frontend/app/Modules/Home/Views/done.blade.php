@extends('Layouts.master')

@section('title','الدفع')

@section('styles')
@endsection

@section('content')

    <div class="breadcrumb" style="background-image: url('{{ asset("/assets/images/breadcrumb.png") }}');">
        <div class="container">
            <h5>طلب عضوية</h5>
            <ul class="list-unstyled">
                <li><a href="{{ URL::to('/') }}">الرئيسية</a></li>
                <li><a href="">طلب عضوية</a></li>
            </ul>
        </div>
    </div>
	    
   	<div class="registration">
   		<div class="container">
   			<div class="row">
   				<div class="col-lg center-block">
   					<div class="done">
                      <img src="{{ asset('/assets/images/checked.svg') }}" alt="" />
                      <h2 class="title"> شكراً لك . تم ارسال طلبك بنجاح رقم</h2>
                      <a href="#" class="numb">{{ $data->order_no }}</a>
                      <span class="text">جاري ارسال رابط تفعيل العضوية عبر الرسائل النصية</span>
                    </div>
     			</div>
   			</div>
   		</div>
   	</div>
@endsection



@section('scripts')
@endsection