$(document).ready(function() {

	function editBio_toggle() {
		$("#user_acc_edit_bio_bttn").show();
		$("#user_bio").prop('contenteditable', true);
		$("#user_bio").css('background-color', '#fff');
		$("#user_bio").css('border', '1px solid #ccc');
	}

	$("#user_acc_edit").click(function() {

		editBio_toggle();
	});
});