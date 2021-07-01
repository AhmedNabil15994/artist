{{-- Extends layout --}}
@extends('Layouts.master')
@section('title','الاعدادات العامة')

{{-- Content --}}
@section('sub-header')

@endsection

@section('content')
<div class="py-2 py-lg-6 subheader-transparent" id="kt_subheader">
    <div class="container-fluid d-flex align-items-center justify-content-between flex-wrap flex-sm-nowrap">
        <!--begin::Info-->
        <div class="d-flex align-items-center flex-wrap mr-1">
            <!--begin::Page Heading-->
            <div class="d-flex align-items-baseline flex-wrap mr-5">
                <!--begin::Page Title-->
                <h3 class="text-dark font-weight-bold my-1 mr-5 m-subheader__title--separator">الاعدادات العامة</h3>
                <!--end::Page Title-->
                <!--begin::Breadcrumb-->
                <ul class="breadcrumb breadcrumb-transparent breadcrumb-dot font-weight-bold p-0 my-2 font-size-sm">
                    <li class="breadcrumb-item">
                        <a href="{{ URL::to('/') }}" class="text-muted"><i class="m-nav__link-icon la la-home"></i></a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ URL::to('/generalSettings') }}" class="text-muted">الاعدادات العامة</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ URL::current() }}" class="text-muted">تعديل</a>
                    </li>
                </ul>
                <!--end::Breadcrumb-->
            </div>
            <!--end::Page Heading-->
        </div>
        <!--end::Info-->
        <!--begin::Toolbar-->
        <!--end::Toolbar-->
    </div>
</div>
<!--begin::Card-->
<div class="card card-custom">
    <div class="card-header">
        <div class="card-title">
            <span class="card-icon">
                <i class="menu-icon flaticon-settings-1"></i>
            </span>
            <h3 class="card-label">تعديل</h3>
        </div>
    </div>
    <div class="card-body">
        <ul class="nav nav-tabs  m-tabs-line" role="tablist">
            <li class="nav-item m-tabs__item">
                <a class="nav-link m-tabs__link active" data-toggle="tab" href="#AddTabs" role="tab"><i class="la la-refresh"></i>حفظ</a>
            </li>
        </ul>
        <div class="tab-content">
            <div class="tab-pane active" id="AddTabs" role="tabpanel">
                <form class="forms m-form m-form--group-seperator-dashed" method="POST" action="{{ URL::to('/generalSettings/update/1') }}">  
                    @csrf
                    @foreach($data->data as $item => $variable)
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2 {{ $item == 0 ? 'mt-15' : '' }}" style="margin-bottom: 20px;">{{ $variable->key }}</label>
                            @if($variable->var_type == 0)
                            <input class="form-control" type="text" name="value{{ $variable->id }}" value="{{ $variable->value }}" maxlength="" placeholder="">
                            @elseif($variable->var_type == 1)
                            <textarea class="form-control" name="value{{ $variable->id }}">{{ $variable->value }}</textarea>
                            @elseif($variable->var_type == 2)
                            <input class="form-control tagify" id="kt_tagify_1" name='value{{ $variable->id }}' placeholder='type...' value='{{ $variable->value }}'/>
                            @elseif($variable->var_type == 3)
                                <input class="form-control mb-5" type="text" name="value{{ $variable->id }}" value="{{ $variable->value }}" maxlength="" placeholder="">
                                @if($variable->value != '')
                                <iframe src="{{ $variable->value }}" frameborder="0" style="width: 100%;height: 300px;" webkitallowfullscreen="" mozallowfullscreen="" allowfullscreen=""></iframe>
                                @endif
                            @elseif($variable->var_type == 5)
                            <select name="value{{ $variable->id }}" class="form-control select2">
                                <option value="0" {{ $variable->value == 0 ? 'selected' : '' }}>لا</option>
                                <option value="1" {{ $variable->value == 1 ? 'selected' : '' }}>نعم</option>
                            </select>
                            @endif
                            <span class="m-form__help LastUpdate">تم الحفظ فى :  {{ $variable->created_at }}</span>
                        </div>
                    </div>   
                    @endforeach
                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">شعار الهيدر</label>
                            <div class="dropzone dropzone-default kt_dropzone_{{ $data->header_logo->id }}">
                                <div class="dropzone-msg dz-message needsclick">
                                    <h3 class="dropzone-msg-title"><i class="flaticon-upload-1 fa-4x"></i></h3>
                                    <span class="dropzone-msg-desc">اسحب الملفات هنا أو انقر هنا للرفع .</span>
                                </div>
                                @if($data->header_logo->var_value != '')
                                <div class="dz-preview dz-image-preview" id="my-preview">  
                                    <div class="dz-image">
                                        <img alt="image" src="{{ $data->header_logo->var_value }}">
                                    </div>  
                                    <div class="dz-details">
                                        <div class="dz-size">
                                            <span><strong>{{ \App\Models\Page::getPhotoSize($data->header_logo->var_value) }}</strong></span>
                                        </div>
                                        <div class="dz-filename">
                                            {{-- <span data-dz-name="">{{ $variable->value }}</span> --}}
                                        </div>
                                        <div class="PhotoBTNS">
                                            <div class="my-gallery" itemscope="" itemtype="" data-pswp-uid="1">
                                               <figure itemprop="associatedMedia" itemscope="" itemtype="">
                                                    <a href="{{ $data->header_logo->var_value }}" itemprop="contentUrl" data-size="555x370"><i class="flaticon-search"></i></a>
                                                    <img src="{{ $data->header_logo->var_value }}" itemprop="thumbnail" style="display: none;">
                                                </figure>
                                            </div>
                                            <a class="DeletePhotoq" data-area="{{ $data->header_logo->id }}"><i class="flaticon-delete" data-name="{{ $data->header_logo->var_value }}" data-clname="Photo"></i> </a>                                               
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>

                    <div class="form-group m-form__group row" style="padding-right: 0;padding-left: 0;padding-bottom: 10px;">
                        <div class="col-lg-12">
                            <label class="label label-danger label-pill label-inline mr-2" style="margin-bottom: 20px;">شعار الفوتر</label>
                            <div class="dropzone dropzone-default kt_dropzone_{{ $data->footer_logo->id }}">
                                <div class="dropzone-msg dz-message needsclick">
                                    <h3 class="dropzone-msg-title"><i class="flaticon-upload-1 fa-4x"></i></h3>
                                    <span class="dropzone-msg-desc">اسحب الملفات هنا أو انقر هنا للرفع .</span>
                                </div>
                                @if($data->footer_logo->var_value != '')
                                <div class="dz-preview dz-image-preview" id="my-preview">  
                                    <div class="dz-image">
                                        <img alt="image" src="{{ $data->footer_logo->var_value }}">
                                    </div>  
                                    <div class="dz-details">
                                        <div class="dz-size">
                                            <span><strong>{{ \App\Models\Page::getPhotoSize($data->footer_logo->var_value) }}</strong></span>
                                        </div>
                                        <div class="dz-filename">
                                            {{-- <span data-dz-name="">{{ $variable->value }}</span> --}}
                                        </div>
                                        <div class="PhotoBTNS">
                                            <div class="my-gallery" itemscope="" itemtype="" data-pswp-uid="1">
                                               <figure itemprop="associatedMedia" itemscope="" itemtype="">
                                                    <a href="{{ $data->footer_logo->var_value }}" itemprop="contentUrl" data-size="555x370"><i class="flaticon-search"></i></a>
                                                    <img src="{{ $data->footer_logo->var_value }}" itemprop="thumbnail" style="display: none;">
                                                </figure>
                                            </div>
                                            <a class="DeletePhotoq" data-area="{{ $data->footer_logo->id }}"><i class="flaticon-delete" data-name="{{ $data->footer_logo->var_value }}" data-clname="Photo"></i> </a>                                               
                                        </div>
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="card-footer">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-6">
                <input name="Submit" type="submit" class="btn btn-success AddBTN " value="حفظ" id="SubmitBTN">
                {{-- <input name="Submit" type="submit" class="btn btn-primary AddBTN " value="حفظ كمسودة" id="SaveBTN"> --}}
                <input type="reset" class="btn btn-danger Reset" value="مسح الحقول">
                <input name="Add" type="hidden" value="TRUE" id="SaveBTN">
            </div>
        </div>
    </div>
</div>
<!--end::Card-->
@endsection

{{-- Scripts Section --}}
@section('scripts')
<script src="{{ asset('/assets/components/varTags.js') }}"></script>
@endsection

