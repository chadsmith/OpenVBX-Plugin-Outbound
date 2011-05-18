$(function() {
	$('.add-button').click(function() {
		var $form = $('form.' + $(this).attr('id'));
		$('.vbx-schedule form').not($form).slideUp();
		$form.slideToggle();
		return false;
	});
	$('.time').timePicker({ step: 05, show24Hours: false });
})
