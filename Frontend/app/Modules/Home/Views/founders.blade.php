@extends('Layouts.master')

@section('title','المؤسسين')

@section('styles')

@endsection

@section('content')
	<div class="breadcrumb" style="background-image: url('{{ asset("/assets/images/breadcrumb.png") }}');">
    <div class="container">
      <h5>المؤسسين</h5>
      <ul class="list-unstyled">
        <li><a href="{{ URL::to('/') }}">الرئيسية</a></li>
        <li><a href="#">المؤسسين</a></li>
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
            <h5 class="card-title">{{ $one->title }} <br><span>{{ $one->description }}</span></h5>
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection

@section('scripts')

@endsection