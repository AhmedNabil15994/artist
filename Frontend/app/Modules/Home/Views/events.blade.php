@extends('Layouts.master')

@section('title','الفعاليات')

@section('styles')

@endsection

@section('content')
    <div class="breadcrumb" style="background-image: url('{{ asset('/assets/images/breadcrumb.png') }}');">
        <div class="container">
            <h5>الفعاليات</h5>
            <ul class="list-unstyled">
                <li><a href="{{ URL::to('/') }}">الرئيسية</a></li>
                <li><a href="#">الفعاليات</a></li>
            </ul>
        </div>
    </div>

    <div class="events-page">
        <div class="events-initiativs">
            <div class="container">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">الفعاليات</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">المبادرات</a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <div class="events-cards">
                            <div class="row">
                                @foreach($data->events as $event)
                                <div class="col-sm-12 col-md-12 col-lg-6">
                                    <a href="" class="card itemEvent event-card" data-toggle="modal" data-target="#eventModal">
                                        <img src="{{ $event->photo }}" class="hidden" alt="">
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
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <div class="events-cards">
                            <div class="row">
                                @foreach($data->initiatives as $initiative)
                                <div class="col-sm-12 col-md-12 col-lg-6">
                                    <a href="" class="card itemEvent event-card" data-toggle="modal" data-target="#eventModal">
                                        <img src="{{ $initiative->photo }}" class="hidden" alt="">
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
        </div>
    </div>
@include('Partials.eventModal')
@endsection

@section('scripts')
<script src="{{ asset('/assets/js/event.js') }}"></script>
@endsection