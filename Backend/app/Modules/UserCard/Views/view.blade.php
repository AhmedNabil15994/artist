<!DOCTYPE html>
<html>
<head>
    
   <meta charset="UTF-8" />
    <!-- IE Compatibility Meta -->
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- First Mobile Meta  -->
	<meta name="viewport" content="width=device-width, height=device-height ,  maximum-scale=1 , initial-scale=1">
    
    <title>{{ $data->order->name }}</title>
    
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('/assets/cards/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/cards/css/bootstrap-rtl.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/cards/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/cards/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('/assets/cards/css/responisve.css') }}" />
    <style type="text/css">
    	.card{
    		margin-top: 250px;
    	}
    	.footerCard svg{
			/*position: absolute;*/
			/*left: 0;*/
		}
		.card .footerCard{
        	margin-left: 100%;
        }
    </style>
          
   <!--[if lt IE 9]>
       <script src="js/html5shiv.min.js"></script>
       <script src="js/respond.min.js"></script>
   <![endif]-->
  
    
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
    {{-- <script src="{{ asset('/assets/cards/js/custom.js') }}"></script> --}}
    <script>
    	$(function(){
    		setTimeout(function(){
    			var myURL = window.location.href;
				if(myURL.indexOf("#") != -1){
				    myURL = myURL.replace('#','');
				}
				if(myURL.indexOf("viewCard") != -1){
				    newMyURL = myURL.replace('viewCard','printCard');
					window.location.href = newMyURL;
				}
    		},2000);
    	});
    </script>	
</body>

</html>