//placeholder
$(document).ready(function() {
	$('input, textarea').placeholder();
});
//Homepage Carousel
$(document).ready(function(){
	$('#realto-carousel').carousel({
		interval: 5000
	});

	$('.modal-toggle').click(function() {
		var chatWindow = $(this).closest('.thumbnail'),
			bottom    = $(this).closest('.thumbnail').css('bottom');
			offset    = chatWindow.height() - chatWindow.find('.modal-header').height() - 20,
			newBottom = bottom == '0px' ? '-' + offset + 'px' : '0px',
			newLabel  = bottom == '0px' ? '+ Show' : 'X Hide';

		chatWindow.css('bottom', newBottom);
		$(this).html(newLabel);
	});
});