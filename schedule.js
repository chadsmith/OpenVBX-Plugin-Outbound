$(function() {
	$('.add-button').click(function() {
		var $form = $('form.' + $(this).attr('id'));
		$('.vbx-schedule form').not($form).slideUp();
		$form.slideToggle();
		return false;
	});
	$('.date').datepicker();
	$('.time').timepicker({ showPeriod: true });
})
