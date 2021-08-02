@extends('Layouts.master')

@section('title','استكمال البيانات')

@section('styles')
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.css">

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
	      	<div class="complete-order-form">
	        	<h5>اكمال الطلب</h5>
	        	<form method="post" action="{{ URL::current() }}" enctype="multipart/form-data">
	        		@csrf
	          		<div class="form-group upload-file">
	            		<div class="input-group personal-img">
	              			<div class="custom-file">
	                			<input type="file" class="custom-file-input form-control personal-img-file" name="image" id="uploadCv">
	                			<label class="custom-file-label" for="uploadCv">ارفاق الصورة الشخصية</label>
	                			@if(!empty($data->data->image))
								<span class="pic">
	                  				<a class="delete-pic"><i class="fas fa-times"></i></a>
	                			</span>
								@endif
	              			</div>
	            		</div>
	          		</div>
	          		<div class="form-group upload-file">
	            		<div class="input-group">
	              			<div class="custom-file">
	                			<input type="file" class="custom-file-input form-control" name="identity_image" id="uploadCv2">
	                			<label class="custom-file-label" for="uploadCv2">صورة الهوية</label>
	                			@if(!empty($data->data->identity_image))
								<span class="pic">
	                  				<a class="delete-pic"><i class="fas fa-times"></i></a>
	                			</span>
								@endif
	              			</div>
	            		</div>
	          		</div>
	          		<div class="form-group">
	            		<input type="text" name="identity_no" value="{{ isset($data->data->identity_no) ? $data->data->identity_no : old('identity_no') }}" class="form-control" placeholder="رقم الهوية">
	          		</div>
	          		<div class="form-group">
	            		<input type="text" class="form-control" id="datepicker" name="identity_end_date"  value="{{ isset($data->data->identity_end_date) ? $data->data->identity_end_date : old('identity_end_date') }}" placeholder="تاريخ الميلاد:">
	          		</div>
	          	<button type="submit">التسجيل الآن</button>
	        	</form>
	      	</div>
	    </div>
	</div>
@endsection



@section('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/datepicker/1.0.10/datepicker.min.js" type="text/javascript"></script>
<script src="{{ asset('/assets/js/complete.js') }}" type="text/javascript"></script>
@endsection