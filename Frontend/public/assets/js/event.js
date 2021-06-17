$(function(){
	$('a.itemEvent').on('click',function(e){
		e.preventDefault();
		e.stopPropagation();
		$('#eventModal .modal-title').html($(this).find('.card-title').html());
		$('#eventModal .modal-text').html($(this).find('.card-text').html());
		$('#eventModal .modal-date').html('<span></span>'+$(this).find('.date').text());
		$('#eventModal .modal-img').css('backgroundImage',"url('"+$(this).find('img').attr('src')+"')");
		$('#eventModal').modal('toggle');
	});
});