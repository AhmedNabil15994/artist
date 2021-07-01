<link rel="stylesheet" href="{{ asset('/assets/css/bootstrap-ar.min.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/css/flaticon.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/css/slick.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/css/slick-theme.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/css/all.min.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/css/font-awesome.min.css') }}" />
<link rel="stylesheet" href="{{ asset('/assets/css/jquery-ui.min.css') }}">
<link rel="stylesheet" href="{{ asset('/assets/css/toastr.min.css') }}" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" href="{{ asset('/assets/css/style.css') }}">
<link rel="shortcut icon" href="{{ asset('/assets/images/logo.svg') }}" />


@php 
	$color1 = \App\Models\Variable::getVar('COLOR_1(#4a3309)');
	$color2 = \App\Models\Variable::getVar('COLOR_2(#7b591a)');
	$color3 = \App\Models\Variable::getVar('COLOR_3(#b98e33)');
	$color4 = \App\Models\Variable::getVar('COLOR_4(#b58727)');
	$color5 = \App\Models\Variable::getVar('COLOR_5(#d19515)');
@endphp
<style type="text/css" media="screen">
	:root{
	  	--color-1 : {{ $color1 != null ? $color1 : '#4a3309' }} !important;
	  	--color-2 : {{ $color2 != null ? $color2 : '#7b591a' }} !important;
	  	--color-3 : {{ $color3 != null ? $color3 : '#b98e33' }} !important;
	  	--color-4 : {{ $color4 != null ? $color4 : '#b58727' }} !important;
	  	--color-5 : {{ $color5 != null ? $color5 : '#d19515' }} !important;
	}
</style>


@yield('styles')