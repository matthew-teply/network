$(document).ready(function() {

	//REFRESHES

	function showMembers_ref(g_id) {

		$.ajax({

			method: "POST",
			url: "groups.inc.php",
			data: {showMembers_call:true, data_g_id:g_id},
			success: function(response) {

				$("#g_members_span").html(response);
			}
		});
	}

	//CALLS

	//Join group
	$("#g_join_form").submit(function(e) {
		e.preventDefault();

		var data_id = $("#user_id").val();
		var data_g_id = $("#g_join_g_id").val();

		$.ajax({

			method: "POST",
			url: "groups.inc.php",
			data: {addMember_call:true, data_id, data_g_id},
			success: function(response) {

				if(response == "g_err_already_in")
					$("#g_join_form button").html("<i class='fa fa-times'></i> Already joined");
				else {
					$("#g_join_form button").html("<i class='fa fa-check'></i> Joined");
					showMembers_ref(data_g_id);
				}
			}
		});

	});

	//Leave group
	$("#g_leave_form").submit(function(e) {
		e.preventDefault();

		var data_id = $("#user_id").val();
		var data_g_id = $("#g_leave_g_id").val();

		$.ajax({

			method: "POST",
			url: "groups.inc.php",
			data: {removeMember_call:true, data_id, data_g_id},
			success: function(response) {

				if(response == "g_err_already_out")
					$("#g_leave_form button").html("<i class='fa fa-times'></i> Already left");
				else {
					$("#g_leave_form button").html("<i class='fa fa-check'></i> Left");
					showMembers_ref(data_g_id);
				}
			}
		});

	});

});