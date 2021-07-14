@extends('Layouts.master')

@section('title','من نحن')

@section('styles')

@endsection

@section('content')
	<div class="breadcrumb" style="background-image: url('{{ $data->mainPhoto->photo }}');">
    <div class="container">
      <h5>من نحن</h5>
      <ul class="list-unstyled">
        <li><a href="{{ URL::to('/') }}">الرئيسية</a></li>
        <li><a href="#">من نحن</a></li>
      </ul>
    </div>
  </div>


  <div class="aboutPage">
    <div class="container">
      <div class="card vision-card">
        <h5>{{ $data->data[0]->title }}</h5>
        <p>{!! $data->data[0]->description !!}</p>
      </div>
      <div class="card vision-card">
        <h5>{{ $data->data[1]->title }}</h5>
        <p>{!! $data->data[1]->description !!}</p>
      </div>
      <div class="card vision-card">
        <h5>{{ $data->data[2]->title }}</h5>
       {{--  <p><span class="world">الابداع:</span><span>ابراز طابع الابداع في جميع انشطتنا</span></p>
        <p><span class="world">الثقة:</span><span> الايمان القوي والراسخ ومصداقية الجمعية في مساعدة الفنانين</span></p>
        <p><span class="world">التميز:</span><span>التزام مبدأ التميز المهني وتقديم خدمات ذات جودة عالية</span></p>
        <p><span class="world">الخصوصية:</span><span>المحافظة على خصوصية أعضاء الجمعية وحماية بياناتهم الخاصة</span></p>
        <p><span class="world">الاستدامة:</span><span>مواصلة العمل بصورة سليمة لتحقيق أهداف الجمعية</span></p>
        <p><span class="world">التعاون:</span><span> الأطراف والمشاركة في العمل الخيري وصولا الى الادراة الرشيدة في >لك العمل بروح الفريق الواحد على قاعدة التعاون والعمل الجماعي بين كافة</span></p>
        <p><span class="world">الشفافية:</span><span> القوانين والأنظمة واللوائح والإجراءات التي تحكم أنشطة الجمعية متوفرة ومتافة للإطلاع عليها من كافية الأعضاء</span></p>
        <p><span class="world">المشاركة:</span><span> تفعيل دور المجتمع المحلي في المشاركة المجتمعية والتنمية الاجتماعية والاقتصادية والبناء المؤسسي والمجتمعي</span></p>
 --}}
        {!! htmlspecialchars_decode($data->data[2]->description) !!}

      </div>
    </div>
    <div class="card img-card">
      <div class="container">
        <div class="row">
          <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="img-card-content">
              <ul class="list-unstyled">
                {!! htmlspecialchars_decode($data->data[3]->description) !!}
              </ul>
            </div>
          </div>
          <div class="col-sm-12 col-md-6 col-lg-6">
            <div class="img-card-img">
              <img src="{{ $data->data[3]->photo }}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('scripts')

@endsection