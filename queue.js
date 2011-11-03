$(function() {
	$('.vbx-queue .event a.delete').click(function() {
		var $event = $(this).parent().parent().parent(), id = $event.attr('id'), type = $event.children().children('span').eq(1).text();
		if(confirm('You are about to delete a' + ('sms' == type ? 'n ' : ' ') + type + ' to ' + $event.children().children('span').eq(0).text()+'.'))
		$.ajax({
			type: 'POST',
			url: window.location,
			data: {
				remove: id.match(/([\d]+)/)[1]
			},
			success: function() {
				$event.hide(500);
			},
			dataType: 'text'
		});
		return false;
	});
});
