$(document).ready(function() {

	$("#user_acc_edit_bio_bttn").click(function() {

		var data_id = $("#user_id").val();
		var data_content = $("#user_bio").html();

		console.log($("#user_bio").html());

		alert("ID : " + data_id + "\nContent : " + data_content);

		$.ajax({

			method: "POST",
			url: "users.inc.php",
			data: {editBio_call:true, data_id, data_content},
			success: function(response) {
				alert(response);
			}
		});

	});
});