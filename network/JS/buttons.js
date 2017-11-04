$(document).ready(function() {

	//ACCEPT FRIEND
	$(".f_add_form_button").on('mouseover', function() {
		$(this).html("<i class='fa fa-check'></i> Accept");
	});
	$(".f_add_form_button").on('mouseleave', function() {
		$(this).html("<i class='fa fa-check'></i>");
	});

	//DECLINE FRIEND
	$(".f_decline_form_button").on('mouseover', function() {
		$(this).html("<i class='fa fa-times'></i> Decline");
	});
	$(".f_decline_form_button").on('mouseleave', function() {
		$(this).html("<i class='fa fa-times'></i>");
	});
});