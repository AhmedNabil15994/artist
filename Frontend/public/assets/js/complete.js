$(function(){
	$('input[type="file"]').on('change',function(){
        var image = $(this)[0].files[0];
        var url = window.URL.createObjectURL(image);
		$(this).parent('.custom-file').find('span.pic').remove();
		$(this).parent('.custom-file').append('<span class="pic '+$(this).attr('name')+'" style="background-image=url('+url+')"><a class="delete-pic"><i class="fas fa-times"></i></a></span>');
	});

	$(document).on('click','.delete-pic',function(e){
		e.preventDefault();
		e.stopPropagation();
		var imageTitle = 'ارفاق الصورة الشخصية';
		if($(this).parent('.pic').hasClass('identity_image')){
			imageTitle = 'صورة الهوية';
		}
		$(this).parent('.pic').siblings('input[type="file"]').val('');
		$(this).parent('.pic').siblings('.custom-file-label').html(imageTitle);
		$(this).parent('.pic').remove();
	});
	
	if($('.datepicker').length){
		$('.datepicker').datepicker({
			format:'yyyy-mm-dd',
		});
	}

	if($('.paymentNow.now').length){
		setTimeout(function(){
			var myUrl = window.location.href;
			var newUrl = myUrl.replace("payment", "paymentGateway");
			window.location.href = newUrl;
		},3000);
	}


});