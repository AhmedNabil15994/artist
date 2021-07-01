<!DOCTYPE html>
<html>
	<head>
	   	<meta charset="UTF-8" />
	    <!-- IE Compatibility Meta -->
	    <meta http-equiv="X-UA-Compatible" content="IE=edge">
	    <!-- First Mobile Meta  -->
		<meta name="viewport" content="width=device-width, height=device-height ,  maximum-scale=1 , initial-scale=1">
	    <title></title>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		{{-- <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet"> --}}
	    <link rel="stylesheet" href="{{ asset('/assets/cards/css/bootstrap.css') }}" />
	    <link rel="stylesheet" href="{{ asset('/assets/cards/css/bootstrap-rtl.css') }}" />
	    <link rel="stylesheet" href="{{ asset('/assets/cards/css/font-awesome.min.css') }}" />
	    <link rel="stylesheet" href="{{ asset('/assets/cards/css/style.css') }}" />
	    <link rel="stylesheet" href="{{ asset('/assets/cards/css/responisve.css') }}" />  
	   	<!--[if lt IE 9]>
	       	<script src="{{ asset('/assets/card/js/html5shiv.min.js') }}"></script>
	       	<script src="{{ asset('/assets/card/js/respond.min.js') }}"></script>
	   	<![endif]-->
	   	<style type="text/css" media="">
	   		@font-face {
                font-family: "Tajawal-Regular";
                src:url('{{ asset("/assets/cards/fonts/Tajawal-Regular.ttf") }}') format('truetype');
                font-weight: normal;
                font-style: normal;
            }

            @font-face {
                font-family: "Tajawal-Bold";
                src: url('{{ asset("/assets/cards/fonts/Tajawal-Bold.ttf") }}') format('truetype') ;
                font-weight: normal;
                font-style: normal;
            }

            @font-face {
                font-family: "Tajawal-ExtraBold";
                src: url('{{ asset('/assets/cards/fonts/Tajawal-ExtraBold.ttf') }}') format('truetype');
                font-weight: normal;
                font-style: normal;
            }
            body{
            	padding-top: 225px;
            }
            .card{
    			font-family: 'Tajawal-Regular', sans-serif !important;
            }
	        
	        svg{
				position: absolute;
				left: 120%;
			}
	
	   	</style>
	</head>
	<body>

	   	<div class="card {{ $data->order->membership_id == 1 ? '' : 'card2' }}">
	    	<div class="cardHead">
	    		<img src="{{ asset('/assets/cards/images/logo.png') }}" class="logo1" />
	    		<img src="{{ asset('/assets/cards/images/logo2.png') }}" class="logo2" />
	    		<div class="line"></div>
	    	</div>
	    	<div class="details">
		    	<div class="info">
		    		<div class="img">
		    			<img src="{{ $data->image }}" alt="" />
		    		</div>
		    		<h2 class="nameAr">{{ $data->order->name }}</h2>
		    		<h2 class="nameEn">{{ $data->order->name_en }}</h2>
		    		<span class="member">عضو {{ $data->membership_name }}</span>
		    	</div>
	    	</div>
	    	
	    	<div class="qrDiv">
	    		<h3 class="title">{{ $data->order->fieldText }}</h3>
	    		<h3 class="titleEn">{{ $data->order->fieldTextEn }}</h3>
				{!! \QrCode::size(70)->generate(config('app.FRONT_URL').'printCard/'.$data->id) !!}
	    	</div>
	    	
	    	<div class="codeDate">
	    		<span class="code">{{ $data->code }}</span>
	    		<span class="date">{{ date('m - Y',strtotime($data->end_date)) }}</span>
	    	</div>
	    	
	    	<img src="{{ asset('/assets/cards/images/footerLine.png') }}" class="footerLine" />
	   </div>

	    <script src="{{ asset('/assets/cards/js/jquery-1.11.2.min.js') }}"></script>
	    <script src="{{ asset('/assets/cards/js/bootstrap.min.js') }}"></script>
	    
	</body>

</html>