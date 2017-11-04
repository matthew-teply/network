$(document).ready(function() {

	$("#user_acc_edit_bio_bttn").click(function() {
		
		$("#user_acc_edit_bio_bttn").html("<i class='fa fa-cog fa-spin fa-fw'></i> Updating");

		var data_id = $("#user_id").val();
		var data_content = $("#user_bio").html();

	 	$.ajax({

			method: "POST",
			url: "users.inc.php",
			data: {editBio_call:true, data_id, data_content},
			success: function(response) {

				$("#user_acc_edit_bio_bttn").html("<i class='fa fa-check'></i> Updated");
			}
		});
		
	});
});