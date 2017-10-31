$(document).ready(function() {

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

				alert(response);
			}
		});
	});

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

				alert(response);
			}
		});
	});
});