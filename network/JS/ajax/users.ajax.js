$(document).ready(function() {

	var user_id = $("#user_id").val();

	//REFRESHES

	function showFriends_ref(data_id, data_opt) {

		$.ajax({

			method: "POST",
			url: "users.inc.php",
			data: {showFriends_call:true, data_id, data_opt},
			success: function(response) {

				if(data_opt == "list")
					$("#user_friends_list_span").html(response);
			}
		});
	}

	//FORM SUBMITS

	//Send request
	$(".f_req_form").submit(function(e) {
		e.preventDefault();

		var form_id = $(this).attr('id');

		var data_id = $("#f_req_id" + form_id).val();
		var data_f_id = $("#f_req_f_id" + form_id).val();

		$.ajax({

			method: "POST",
			url: "users.inc.php",
			data: {sendReq_call:true, data_id, data_f_id},
			success: function(response) {

				$(".f_req_form button").html("<i class='fa fa-check'></i> Sent");
				$(".f_req_form button").prop("disabled", true);
			}
		});
	});

	//Add friend
	$(".f_add_form").submit(function(e) {
		e.preventDefault();

		var form_id = $(this).attr('id');

		var data_id = $("#f_add_id" + form_id).val();
		var data_f_id = $("#f_add_f_id" + form_id).val();

		$.ajax({

			method: "POST",
			url: "users.inc.php",
			data: {addFriend_call:true, data_id, data_f_id},
			success: function(response) {

				$("#f_add_form_button" + form_id).html("<i class='fa fa-check'></i> Accepted!");
				$("#f_add_form_button" + form_id).prop("disabled", true);
				$("#f_decline_form_button" + form_id).hide();
				$("#span" + form_id).delay(3000).fadeOut(200);
				$("#profile_sender_req_span").html("<b style='color:lime;'>Friend request accepted!</b>");
				showFriends_ref(data_id, "list");
			}
		});
	});

	//Decline friend
	$(".f_decline_form").submit(function(e) {
		e.preventDefault();

		var form_id = $(this).attr('id');

		var data_id = $("#f_decline_id" + form_id).val();
		var data_f_id = $("#f_decline_f_id" + form_id).val();

		$.ajax({

			method: "POST",
			url: "users.inc.php",
			data: {declineReq_call:true, data_id, data_f_id},
			success: function(response) {

				$("#f_decline_form_button" + form_id).html("<i class='fa fa-times'></i> Declined!");
				$("#f_decline_form_button" + form_id).prop("disabled", true);
				$("#f_add_form_button" + form_id).hide();
				$("#span" + form_id).delay(3000).fadeOut(200);
				$("#profile_sender_req_span").html("<b style='color:red;'>Friend request declined!</b>");
			}
		});
	});

	//Remove friend
	$(".f_remove_from").submit(function(e) {
		e.preventDefault();

		var form_id = $(this).attr('id');

		var data_id = user_id;
		var data_f_id = $("#f_remove_f_id" + form_id).val();

		//alert("form_id : " + form_id + "\n" + "data_f_id : " + data_f_id);
	
		$.ajax({

			method: "POST",
			url: "users.inc.php",
			data: {removeFriend_call:true, data_id, data_f_id},
			success: function(response) {

				showFriends_ref(data_id, "list");
			}
		});

	});
});