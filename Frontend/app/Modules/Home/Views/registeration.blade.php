@extends('Layouts.master')

@section('title','طلب عضوية')

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
	
	<div class="join rigister registeration">
    	<div class="container">
      		<div class="joing-parent">
        		<div class="joing-form">
          			<h5 class="section-head">طلب عضوية</h5>
          			<form method="post" action="{{ URL::current() }}">
          				@csrf
            			<div class="row">
              				<div class="col-sm-12 col-lg-12">
                				<div class="form-group">
                  					<input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="الاسم عربي:">
                				</div>
              				</div>
              				<div class="col-sm-12 col-lg-12">
			                  	<div class="form-group">
			                      	<input type="text" name="name_en" value="{{ old('name_en') }}" class="form-control" placeholder="الاسم انجليزي:">
			                  	</div>
			                </div>
              				<div class="col-sm-12 col-lg-12">
                				<div class="form-group">
                  					<input type="text" name="phone" value="{{ old('phone') }}" class="form-control" placeholder="رقم الجوال:">
                				</div>
              				</div>
			              	<div class="col-sm-12 col-lg-12">
			                	<div class="form-group">
			                  		<input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="البريد الالكتروني:">
			                	</div>
			              	</div>
				            <div class="col-sm-12 col-lg-12">
				                <div class="form-group">
				                  	<select class="form-control select2" name="city_id">
										@foreach($data->cities as $city)
										<option value="">حدد المدينة:</option>
										<option value="{{ $city->id }}" {{ isset($data->data->city_id) && $data->data->city_id == $city->id ? 'selected' : (old('city_id') == $city->id ? 'selected' : '') }}>{{ $city->title }}</option>
										@endforeach
									</select>
				                </div>
				            </div>
			              	<div class="col-sm-12 col-lg-12">
			                	<div class="form-group">
			                		<select class="form-control select2" name="field_id">
										<option value="">حدد المجال الفني:</option>
										@foreach($data->fields as $field)
										<option value="{{ $field->id }}" {{ isset($data->data->field_id) && $data->data->field_id == $field->id ? 'selected' : (old('field_id') == $field->id ? 'selected' : '') }}>{{ $field->title }}</option>
										@endforeach
									</select>
			                  	</div>
			              	</div>
			              	<div class="col-sm-12 col-lg-12">
			                	<div class="form-group">
			                		<select class="form-control select2" name="gender">
										<option value="">حدد الجنس:</option>
										<option value="1" {{ isset($data->data->gender) && $data->data->gender == 1  ? : (old('gender') == 1 ? 'selected' : '') }}>ذكر</option>
										<option value="2" {{ isset($data->data->gender) && $data->data->gender == 2  ? : (old('gender') == 2 ? 'selected' : '') }}>أنثي</option>
									</select>
			                  	</div>
			              	</div>
              				<div class="col-sm-12 col-lg-12">
                				<div class="form-group">
									<input type="text" name="facebook" id="" class="form-control" placeholder="مواقع التواصل الاجتماعي:">
                				</div>
              				</div>
              				<div class="col-sm-12 col-lg-12">
                				<div class="form-group">
                  					<input type="text" name="coupon" class="form-control" value="{{ isset($data->data->coupon) ? $data->data->coupon  : old('coupon') }}" placeholder="كوبون الخصم :">
                				</div>
              				</div>
              				<div class="col-sm-12 col-lg-12">
                				<div class="form-group">
                  					<textarea name="brief" class="form-control" id="" placeholder="السيره الذاتية المختصرة:">{{ old('brief') }}</textarea>
                				</div>
              				</div>
              				<div class="col-lg-12 col-sm-12 mb-4 mt-2">
              					<div class="btnCheck">
									<div class="checkDiv">
										<span class="text">
											الموافقة على <a href="#" data-toggle="modal" data-target="#modalSing">الشروط والأحكام</a>
										</span>
										<label class="switch">
										  <input type="checkbox" name="privacy" {{ isset($data->data) || old('privacy') == 'on' ? 'checked' : '' }}>
										  <span class="sliderSwitch round"></span>
										</label>
										<br>
									</div>
								</div>
              				</div>
            			</div>
            			<button id="submit">التسجيل الآن</button>
          			</form>
        		</div>
      		</div>
    	</div>
  	</div>

   	@include('Partials.privacyModal')
@endsection

@section('scripts')
@endsection