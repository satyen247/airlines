<div class="authincation h-100">
        <div class="container-fluid h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
                                    <h4 class="text-center mb-4">Sign in your account</h4>
                                    <form id="loginfrm" role="form" action="javascript:void(0);" method="post" onsubmit="return doLoginValidate();" >
                                        <div class="form-group">
                                            <label><strong>Username</strong></label>
                                            <input type="text" name="username" value="" id="username" class="form-control" placeholder="Username" autocomplete="off">
                                        </div>
                                        <div class="form-group">
                                            <label><strong>Password</strong></label>
                                            <input type="password" name="password" value="" id="password" class="form-control" placeholder="Password" autocomplete="off">
                                        </div>
                                        <div class="form-row d-flex justify-content-between mt-4 mb-2">
                                            <div class="form-group">
                                                <div class="form-check ml-2">
                                                    <input class="form-check-input" type="checkbox" id="basic_checkbox_1">
                                                    <label class="form-check-label" for="basic_checkbox_1">Remember me</label>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <a href="page-forgot-password.html">Forgot Password?</a>
                                            </div>
                                        </div>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary btn-block">Sign me in</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p>Don't have an account? <a class="text-primary" href="./page-register.html">Sign up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script type="text/javascript">

function doLoginValidate(){
  	var user_name=$("#username").val();
  	var password=$("#password").val();
  	var base_url=$("#base_url").val();
	if($.trim(user_name)==''){
        hbToastrError('Username is empty!!');		
		$("#username").focus();
		return false;
	}else if($.trim(password)==''){		
        hbToastrError('Password is empty!!');	
		$("#password").focus();
		return false;
	}else{
        hbToastrInfo('Validating credentials... please wait!');	
		$('.loading').removeClass("d-none");
		$.ajax({
			url: base_url+"admin/doLoginValidate",
			data:$("#loginfrm").serializeArray(),
			method:"post",
			 success: function(result){
			 	$('.loading').addClass("d-none");
			 	result=JSON.parse(result);
			 		if(result.status==0){
			 			//toastr.success(result["message"]);
                         hbToastrSuccess(result["message"]);	
			 			setTimeout(
						  function() 
						  {
						    window.location=base_url+"admin/dashboard";
					 	
						  }, 1000);
			 		}else{
                        hbToastrError('Invalid Credentials!');	
						$("#"+result["field"]).focus();
				 	}
	    	
	  		}
	 	 });
	}
  }

</script>