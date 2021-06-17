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
	    	<div class="complete-order-form bank-transform">
		        <h5>ارفاق إيصال التحويل البنكي</h5>
		        <form action="{{ URL::current() }}" method="post" enctype="multipart/form-data">
		        	@csrf
		          	<div class="form-group upload-file">
		            	<div class="input-group personal-img">
		              		<div class="custom-file">
		                		<input type="file" name="file" class="custom-file-input form-control personal-img-file" id="uploadCv">
		                		<label class="custom-file-label" for="uploadCv">صورة من ايصال التحويل البنكي</label>
		              		</div>
		            	</div>
		          	</div>
		          	<button type="submit">التأكيد الآن</button>
		        </form>
		    </div>
	    </div>
	</div>
@endsection



@section('scripts')
<script src="{{ asset('/assets/js/complete.js') }}" type="text/javascript"></script>
@endsection