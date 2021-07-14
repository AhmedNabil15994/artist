@extends('Layouts.master')

@section('title','لوائح وسياسات')

@section('styles')

@endsection

@section('content')
  <div class="breadcrumb" style="background-image: url('{{ $data->mainPhoto[0]->photo }}');">
      <div class="container">
          <h5>لوائح وسياسات</h5>
          <ul class="list-unstyled">
            <li><a href="{{ URL::to('/') }}">الرئيسية</a></li>
            <li><a href="">لوائح وسياسات</a></li>
          </ul>
      </div>
  </div>


  <div class="regulations">
      <div class="container">
          <div class="row">
              @foreach($data->data as $one)
              <div class="col-sm-12 col-md-6 col-lg-4">
                  <div class="regulations-card">
                      <div class="card-title-pare">
                          <h5 class="card-title">{{ $one->title }}</h5>
                      </div>
                      <a href="{{ $one->photo }}" target="_blank" class="option option-1">
                          <i class="flaticon-visibility"></i>
                          <span>مشاهدة</span>
                      </a>
                      <div class="clear"></div>
                  </div>
              </div>
              @endforeach
          </div>
      </div>
  </div>
@endsection

@section('scripts')

@endsection