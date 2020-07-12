$( document ).ready(function() {

	var appTable = $('#customerTable').DataTable({
		"processing":true,
		"serverSide":true,
		"autoWidth": false,
		"paging":true,
		"lengthChange": false,
		"searching":true,
		"pageLength":50,
		"ajax":{
			"headers":{
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			"type":'POST',
			"url":'/customer/ajaxRequest',
		},
		"columnDefs":[
		{
			"targets": [0],
			"visible": false
		}
		],
		"columns":[
		{"data":"id"},
		{"data":"name"},
		{"data":"email"},
		{"data":"address"},
		{"data":"gender"},
		{"data":"actions"},
		]
	});

	$('#customerTable').on('click', '.cust-edit-btn, .cust-delete-btn', function() {
		let cid =  $(this).data('cid');
		if($(this).hasClass('edit')){
			window.location.href = '/customer/edit/'+cid;
		}
		else{
			if(!confirm("Are you sure you wanna delete this?")){
				return false;
			}
			else{
				$.ajax({
					"headers":{
						'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
					},
					type:"POST",
					// type: "DELETE",
					url: "/customer/delete/"+cid,
					data:{'_method':'DELETE'},
					success: function(response){
						if(response.code == 1){
							toastr.success(response.msg);
							window.location.href = '/customer';
						}
						else{
							toastr.error(response.msg)
						}
					}
				});
			}
		}
	});

});