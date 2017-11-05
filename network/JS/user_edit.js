$(document).ready(function() {

	var isEditing = false;

	function editBio_toggle(edit) {

		$("#user_acc_edit_bio_bttn").toggle();

		if (edit == false) {
			$("#user_bio").prop('contenteditable', true);
			$("#user_bio").css('background-color', '#fff');
			$("#user_bio").css('border', '1px solid #ccc');
			$("#user_bio").css('border-left', '3px solid #ccc');
			$("#user_acc_edit").html("<i class='fa fa-times'></i> Stop Editing");
			$("#user_acc_edit").attr('class', 'bttn-alert');
			isEditing = true;
		}
		else {
			$("#user_acc_edit_bio_bttn").html("<i class='fa fa-cloud'></i> Update");
			$("#user_bio").prop('contenteditable', false);
			$("#user_bio").css('background-color', '#f5f5f5');
			$("#user_bio").css('border', '1px solid #fafafa');
			$("#user_bio").css('border-left', '3px solid #ccc');
			$("#user_acc_edit").html("<i class='fa fa-pencil'></i> Edit Profile");
			$("#user_acc_edit").attr('class', '');
			isEditing = false;
		}

	}

	function editImg_toggle(edit) {

		$("#user_img_overlay").toggle();
	}

	$("#user_acc_edit").click(function() {

		editBio_toggle(isEditing);
		editImg_toggle(isEditing);
	});

	$("#user_img_file").change(function() {

		$("#user_img_submit").attr('class', 'bttn-focus');
		$("#user_img_submit").prop('disabled', false);
	});
});