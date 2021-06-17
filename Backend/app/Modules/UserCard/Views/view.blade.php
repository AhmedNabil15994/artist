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
		<link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
	    <link rel="stylesheet" href="{{ asset('/assets/card/css/bootstrap.css') }}" />
	    <link rel="stylesheet" href="{{ asset('/assets/card/css/bootstrap-rtl.css') }}" />
	    <link rel="stylesheet" href="{{ asset('/assets/card/css/font-awesome.min.css') }}" />
	    <link rel="stylesheet" href="{{ asset('/assets/card/css/style.css') }}" />
	    <link rel="stylesheet" href="{{ asset('/assets/card/css/responisve.css') }}" />  
	   	<!--[if lt IE 9]>
	       	<script src="{{ asset('/assets/card/js/html5shiv.min.js') }}"></script>
	       	<script src="{{ asset('/assets/card/js/respond.min.js') }}"></script>
	   	<![endif]-->
	</head>
	<body>

	   	<div class="bgCard">
			<div class="containerStyle">		
			   <div class="headCard headCard2 clearfix">
			   		<img src="{{ asset('/assets/card/images/logo.png') }}" />
			   		<h2 class="title">
			   			عضــــــــويــــــة {{ $data->membership_name }}
			   		</h2>
			   </div>
			   <div class="contentCard2 clearfix">
			   		<ul class="data">
			   			<li>الفرع: {{ $data->order->cityText }}</li>
			   			<li>الاسم: {{ $data->order->name }}</li>
			   			<li>المجال: {{ $data->order->fieldText }}</li>
			   			<li>رقم العضوية: {{ $data->code }}</li>
			   			<li>الجنسية: سعودي</li>
			   			<li>رقم الحفيظة/الاقامة: {{ $data->order->identity_no }}</li>
			   		</ul>
			   		<div class="imageStyle">
			   			<img src="{{ $data->order->identity_image }}" />
			   		</div>
			   </div>
		 	</div>
			<!-- line2 -->
			<div class="line"></div>
		   	<div class="containerStyle">
		   		<div class="validTill">
			   		صالحة حتى 
			   		<span>{{ $data->end_date }}</span>
			   		:Valid Till
		   		</div>
		   	</div>
   		</div>
	    
   		<div class="bgCard">
		   	<div class="headCard">
		   		<div class="containerStyle">
		   			<img src="{{ asset('/assets/card/images/logo.png') }}" />
		   		</div>
		   	</div>
		   	<!-- info2 -->
		   	<div class="info info2">
			   	<div class="containerStyle">
				   <div class="contentCard clearfix">
				   		<div class="rtl">
				   			بطاقة عضوية
							<br>
							تصرف هذة البطاقة لأعضاء الجمعية العاملين
							<br>
							والمنتسبين ويلزم تجديدها قبل تاريخ انتهائها
				   		</div>
				   		<div class="ltr">
				   			Membership
				   			<br>
							This Card is issued to SASCA Members
							<br>
							& Must be renwed befor the expiry date
				   		</div>
				   </div>
				   <div class="numbs">
					   <center>
						   	في حال العثور على هذة البطاقة الرجاء الاتصال : هاتف 014420100   -  فاكس 014420753
						   	<br>
						   	أو تسمليمها  لأقرب فرع من فروع الجمعية
					   </center>
				   </div>
			   	</div>
		   	</div>
		   	<div class="cardFooter clearfix">
		   		<div class="containerStyle">
		   		<ul class="website">
		   			<li><a href="#"><img src="{{ asset('/assets/card/images/phoneIcon.png') }}" /> www.sasca.org.sa</a></li>
		   			<li><a href="#"><img src="{{ asset('/assets/card/images/envelope.png') }}" /> info@sasca.org.sa</a></li>
		   		</ul>
		   		<p class="location">
		   			الرياض:ص.ب: 3659 الرمز البريدي 11481 - هاتف 0144420100 - فاكس 014420753
		   			<br>
		   			P.O.Box : 3659 Riyadh 11481 - Tel: 014420100 - Fax: 01440753
		   		</p>
		   		</div>
		   	</div>
	    </div>

	    <script src="{{ asset('/assets/card/js/jquery-1.11.2.min.js') }}"></script>
	    <script src="{{ asset('/assets/card/js/bootstrap.min.js') }}"></script>
	    <script src="{{ asset('/assets/card/js/custom.js') }}"></script>
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