@extends('Layouts.master')

@section('title','الصفحة الرئيسية')

@section('styles')

@endsection

@section('content')
  <div class="header-slider">
    <div class="slider-item" style="background-image: url('{{ $data->sliders[0]->photo }}');">
      <div class="header-content">
        <div class="container">
          <h5>{{ $data->sliders[0]->title }}</h5>
          <p>{!! $data->sliders[0]->description !!}</p>
        </div>
      </div>
    </div>
    <div class="slider-item" style="background-image: url('{{ $data->sliders[1]->photo }}');">
      <div class="header-content">
        <div class="container">
          <h5>{{ $data->sliders[1]->title }}</h5>
          <p>{!! $data->sliders[1]->description !!}</p>
        </div>
      </div>
    </div>
  </div>

  <div class="container">
    <div class="home-whoUs">
      <div class="">
        <h5 class="section-header">من نحن</h5>
        <div class="row">
          <div class="col-sm-12 col-lg-4">
            <a href="{{ URL::to('/aboutUs') }}" class="card distinguis-card">
              <div class="card-body">
                <div class="card-icon-parent">
                  <div class="card-icon">
                    <i class="flaticon-achievement"></i>
                  </div>
                </div>
                <h5 class="card-title">{{ $data->aboutUs[0]->title }}</h5>
                <p class="card-text">{{ strip_tags($data->aboutUs[0]->description) }}</p>
              </div>
            </a>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-4">
            <a href="{{ URL::to('/aboutUs') }}" class="card distinguis-card">
              <div class="card-body">
                <div class="card-icon-parent">
                  <div class="card-icon">
                    <i class="flaticon-layers"></i>
                  </div>
                </div>
                <h5 class="card-title">{{ $data->aboutUs[1]->title }}</h5>
                <p class="card-text">{{ mb_substr(strip_tags($data->aboutUs[1]->description),0,48) }}... اقرا المزيد</p>
              </div>
            </a>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-4">
            <a href="{{ URL::to('/aboutUs') }}" class="card distinguis-card">
              <div class="card-body">
                <div class="card-icon-parent">
                  <div class="card-icon">
                    <i class="flaticon-win"></i>
                  </div>
                </div>
                <h5 class="card-title">{{ $data->aboutUs[2]->title }}</h5>
                <p class="card-text">{{ mb_substr(strip_tags($data->aboutUs[2]->description) ,0 ,42) }}...اقرا المزيد</p>
              </div>
            </a>
          </div>
        </div>
        <h5 class="section-header coFounder">أعضاء مجلس الإدارة</h5>
      </div>
    </div>
  </div>

  <div class="coFounders">
    <div class="container">
      <div class="coFounders-slider">
        @foreach($data->founders as $founder)
        <div class="slider-item">
          <div class="card-founder">
            <h5>{{ $founder->title }} <br><span>{{ $founder->description }}</span></h5>
            <img src="{{ $founder->photo }}" alt="">
          </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>


  <div class="events-initiativs">
    <div class="container">
      <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab"
            aria-controls="pills-home" aria-selected="true">الفعاليات</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab"
            aria-controls="pills-profile" aria-selected="false">المبادرات</a>
        </li>
      </ul>
      <div class="tab-content" id="pills-tabContent">
        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
          <div class="event-slider">
            @foreach($data->events as $event)
            <div class="slider-item">
              <a href="" class="card event-card">
                <div class="card-img" style="background-image: url('{{ $event->photo }}');">
                  <div class="date"><span>{{ date('d F',strtotime($event->date)) }}</span></div>
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{ $event->title }}</h5>
                  <p class="card-text">
                    {{ $event->description }}
                  </p>
                </div>
              </a>
            </div>
            @endforeach
            </a>
          </div>
        </div>
        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
          <div class="event-slider">
            @foreach($data->initiatives as $initiative)
            <div class="slider-item">
              <a href="" class="card event-card">
                <div class="card-img" style="background-image: url('{{ $initiative->photo }}');">
                  <div class="date"><span>{{ date('d F',strtotime($initiative->date)) }}</span></div>
                </div>
                <div class="card-body">
                  <h5 class="card-title">{{ $initiative->title }}</h5>
                  <p class="card-text">
                    {{ $initiative->description }}
                  </p>
                </div>
              </a>
            </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="join">
    <div class="container">
      <div class="joing-parent">
        <div class="join-img">
          <img class="join-img-pare" src="{{ asset('/assets/images/join.png') }}" alt="">
          <h5>نموذج طلب
            <span>بطاقة</span> العضوية
          </h5>
          <div class="join-logo">
            <img src="{{ asset('/assets/images/form-logo.png') }}" alt="">
          </div>
        </div>
        <div class="joing-form">
          <form method="post" action="{{ URL::to('/registeration') }}">
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
                      <select class="form-control select2" name="membership_id">
                        <option value="">حدد العضوية:</option>
                        @foreach($data->memberships as $membership)
                        <option value="{{ $membership->id }}" {{ isset($data->data->membership_id) && $data->data->membership_id == $membership->id ? 'selected' : (old('membership_id') == $membership->id ? 'selected' : '') }}>{{ $membership->title . ' ( '.$membership->price.' ريال)' }}</option>
                        @endforeach
                      </select>
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
                    <div class="addSocial clearfix">
                      <span class="title">إضافة مواقع التواصل الاجتماعي</span>
                      <div class="add" id="add1">
                        <i class="fa fa-twitter"></i>
                        <span class="name"></span>
                        <div class="inputSocial" style="">
                          <input type="text" name="twitter" placeholder="@yourname" value="">
                          <span class="btnSoc">اضافة</span>
                        </div>
                      </div>
                      <div class="add" id="add2">
                        <i class="fa fa-youtube-play"></i>
                        <span class="name"></span>
                        <div class="inputSocial">
                          <input type="text" name="youtube" placeholder="@yourname" value="">
                          <span class="btnSoc">اضافة</span>
                        </div>
                      </div>
                      <div class="add" id="add3">
                        <i class="fa fa-instagram"></i>
                        <span class="name"></span>
                        <div class="inputSocial">
                          <input type="text" name="instagram" placeholder="@yourname" value="">
                          <span class="btnSoc">اضافة</span>
                        </div>
                      </div>
                      <div class="add" id="add4">
                        <i class="fa fa-snapchat-ghost"></i>
                        <span class="name"></span>
                        <div class="inputSocial">
                          <input type="text" name="snapchat" placeholder="@yourname" value="">
                          <span class="btnSoc">اضافة</span>
                        </div>
                      </div>
                      <div class="add" id="add5">
                        <i class="fa fa-facebook"></i>
                        <span class="name"></span>
                        <div class="inputSocial">
                          <input type="text" name="facebook" placeholder="@yourname" value="">
                          <span class="btnSoc">اضافة</span>
                        </div>
                      </div>
                    </div>
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
            <button type="submit">التسجيل الآن</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <div class="numbers" style="background-image: url('{{ $data->countersImage->photo }}');">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-lg-4">
          <div class="card number-card">
            <h5 class="card-title">{{ $data->counters[0]->title }}</h5>
            <span class="the-number">{!! $data->counters[0]->description !!}</span>
          </div>
        </div>
        <div class="col-sm-12 col-lg-4">
          <div class="card number-card">
            <h5 class="card-title">{{ $data->counters[1]->title }}</h5>
            <span class="the-number">{!! $data->counters[1]->description !!}</span>
          </div>
        </div>
        <div class="col-sm-12 col-lg-4">
          <div class="card number-card">
            <h5 class="card-title">{{ $data->counters[2]->title }}</h5>
            <span class="the-number">{!! $data->counters[2]->description !!}</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="clients">
    <h5 class="section-header">الشركاء والداعمين</h5>
    <div class="clients-slider">
      @foreach($data->partners as $partner)
      <div class="slider-item">
        <div class="card">
          <img src="{{ $partner->photo }}" alt="">
        </div>
      </div>
      @endforeach
    </div>
  </div>

  <div class="map">
    <iframe src = "https://maps.google.com/maps?q={{ $data->lat }},{{ $data->lng }}&hl=es;z=14&amp;output=embed" width="600" height="450"></iframe>
  </div>

  @include('Partials.privacyModal')
@endsection

@section('scripts')

@endsection