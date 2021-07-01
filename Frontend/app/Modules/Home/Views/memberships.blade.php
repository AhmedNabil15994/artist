@extends('Layouts.master')

@section('title','العضويات')

@section('styles')
<link rel="stylesheet" href="{{ asset('/assets/card/css/bootstrap.css') }}" />
<link rel="stylesheet" href="{{ asset('/assets/card/css/bootstrap-rtl.css') }}" />
<link rel="stylesheet" href="{{ asset('/assets/card/css/font-awesome.min.css') }}" />
<link rel="stylesheet" href="{{ asset('/assets/card/css/owl.carousel.css') }}" />
<link rel="stylesheet" href="{{ asset('/assets/card/css/style.css') }}" />
<link rel="stylesheet" href="{{ asset('/assets/card/css/responisve.css') }}" />
@endsection

@section('content')
	<div class="memberships">
    <div class="container">
      <h2 class="titleM">اشتراك سنوي للعضوية</h2>
      <div class="Owl" id="memberships">
        @foreach($data->data as $key => $membership)
        <div class="item">
          <img src="{{ asset('/assets/card/images/card'.($key+1).'.png') }}" />
          <div class="details">
            <h2 class="title">عضوية {{ $membership->title }}</h2>
            <span>رسوم اشتراك</span>
            <span>{{ $membership->price }} ر.س</span>
            <a href="{{ URL::to('/registeration?membership_id='.$membership->id) }}" class="btnStyle">طلب الانضمام</a>
            <ul class="btns clearfix">
              <input type="hidden" name="conditions" value="{{ json_encode($membership->conditionsText) }}">
              <li><a class="conditions" href="">الشروط</a></li>
              <li><a href="#features">المميزات</a></li>
            </ul>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
    
  <div class="features" id="features">
    <div class="container">
      <h2 class="titleM">مميزات العضوية</h2>
      <div class="table-responsive">
      <table class="tableMemb">
      <thead>
        <tr>
          <th colspan="2">مزايا العضوية</th>
          @foreach($data->data as $key => $membership)
          <th>{{ $membership->title }} <span>{{ $membership->price }}</span></th>
          @endforeach
        </tr>
      </thead>
      <tbody>
        @foreach($data->features as $feature)
        <tr>
            <td colspan="2">{{ $feature->title }}</td>
            @foreach($data->data as $membership)
                @if($membership->features != '' && in_array($feature->id, $membership->features))
                    @if($feature->title == 'شهادة عضوية')
                        @if($membership->id == 2)
                        <td>الكترونية</td>
                        @elseif($membership->id == 3)
                        <td>مطبوعة</td>
                        @else
                        <td><i class="flaticon-remove"></i></td>
                        @endif
                    @else
                    <td><i class="fa fa-check"></i></td>
                    @endif
                @else
                <td><i class="flaticon-remove"></i></td>
                @endif
            @endforeach
        </tr>
        @endforeach   
      </tbody>
    </table>
      </div>
      
    </div>
  </div>
@include('Partials.memberships')
@endsection

@section('scripts')
<script src="{{ asset('/assets/card/js/jquery-1.11.2.min.js') }}"></script>
<script src="{{ asset('/assets/card/js/owl.carousel.js') }}"></script>
<script src="{{ asset('/assets/card/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('/assets/card/js/custom.js') }}"></script>
@endsection