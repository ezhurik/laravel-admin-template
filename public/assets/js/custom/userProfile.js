$( document ).ready(function() {

	$("#profileForm").validate({
        rules: {
            username: "required",
            email: {
            	required:true,
            	email:true,
            },
            password: {
                required: true,
                minlength: 8
            },
            cnfpassword: {
                required: true,
                equalTo: "#password"
            },
            profilePic: {
            	extension: "jpg|jpeg|png|svg"
            },
        },
        messages: {
            username: "Required",
            email: {
            	required: "Required",
            	email: "Please enter a valid email",
            },
            password: {
                required: "Required",
                minlength: "Minimum length should be 8",
            },
            cnfpassword: {
                required: "Required",
                equalTo: "passwords not matching"
            },
            profilePic:  "only jpg, jpeg, png and svg files are allowed",
        },
        submitHandler: function(form){
        	formData = new FormData($(form)[0]);
            $.ajax({
                "headers":{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                type:"POST",
                url: "/updateProfile",
                data:formData,
                contentType: false,
    			processData: false,
                success: function(response){
                    if(response.code == 1){
                        toastr.success(response.msg);
                        setTimeout(function(){
	                        window.location = baseUrl+'/profile';
	                    },1500);
                    }
                    else{
                        toastr.error(response.msg)
                    }
                }
            });
        }
    });

});