/* code for validate admin login */
$("form[name='login_form']").validate({
	errorClass: "error-invalid",
	rules:{
		email :{
			required:true,
			email:true
		},
		password :{
			required: true
		} ,
	},
	errorPlacement: function(error, element) {
	    if(element.parents('div').hasClass("form-group")){
            error.appendTo( element.parent());
        }else{
            error.insertAfter(element);    
        }
	},
	submitHandler: function(form){
		adminLogin(form);
	}
});

var adminLogin = function(form){
	var email = $("input[name='email']").val();
	var pass  = $("input[name='password']").val();
	$.ajax({
		type:'post',
		url :$(form).attr('action'),
		dataType: 'json',
		data:{
			email : email,
			password : pass,
		},
		beforeSend: function(){
			$('.myloader').removeClass('hide').show();
		},
		complete: function(){
			$('.myloader').removeClass('show').hide();
		},
		success: function(data){

			if(data.status == true){
				new PNotify({
		            title: 'Success',
		            text: data.message,
		            addClass: 'bg-success',
		            type: 'success'
		        });
		        setTimeout(function(){
		        	window.location.replace(APP_URL+'/admin/dashboard');
		        },200);

			}else{
				new PNotify({
		            title: 'Error',
		            text: data.message,
		            addClass: 'bg-error',
		            type: 'error'
		        });
			}
		},
		error: function(){
			new PNotify({
	            title: 'Error',
	            text: 'Something went wrong please try again later.',
	            addClass: 'bg-error',
	            type: 'error'
	        });
			location.reload();
		}

	});
}