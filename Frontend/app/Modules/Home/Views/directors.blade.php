@extends('Layouts.master')

@section('title','مجلس الادارة')

@section('styles')

@endsection

@section('content')
	<div class="breadcrumb" style="background-image: url('{{ asset("/assets/images/breadcrumb.png") }}');">
    <div class="container">
      <h5>مجلس الادارة</h5>
      <ul class="list-unstyled">
        <li><a href="{{ URL::to('/') }}">الرئيسية</a></li>
        <li><a href="#">مجلس الادارة</a></li>
      </ul>
    </div>
  </div>


  <div class="fonders">
    <div class="container">
      <div class="row">
        @foreach($data->data as $one)
        <div class="col-sm-12 col-md-6 col-lg-4">
          <div class="card">
            <div class="card-img">
              <a href="" class="overlay">
                <img src="{{ asset('/assets/images/overlay.png') }}" alt="">
              </a>
              <img src="{{ $one->photo }}" alt="">
            </div>
            <h5 class="card-title">{{ $one->title }}</h5>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection

@section('scripts')

@endsection