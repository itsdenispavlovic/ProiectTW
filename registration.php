<!DOCTYPE html>
<html lang="en">
<head>
	<title>Register to Bookface</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
<!--===============================================================================================-->	
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
<!--===============================================================================================-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<!-- main -->
	<div class="limiter">
		<div class="container-login100">
		<!-- Bootstrap Modal  -->
		<div class="modal fade" id="LoginError" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog" role="document">
				<div class="modal-content">
				<div class="modal-header bg-danger">
					<h5 class="modal-title text-light" id="exampleModalLabel">Wrong Credentials</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body text-center">
					You have entered wrong Credentials! Please try again.
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				</div>
				</div>
			</div>
		</div>
		<!-- End of bootstrap modal  -->
			<div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
				<form id="registrationForm" class="login100-form validate-form">
					<span class="login100-form-title p-b-33">
						New here?
					</span>
					<div class="wrap-input100 validate-input" data-validate = "Firstname is required">
						<input class="input100" type="text" name="fname" placeholder="Firstname">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Lastname is required">
						<input class="input100" type="text" name="lname" placeholder="Lastname">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate = "Username is required">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100-1"></span>
						<span class="focus-input100-2"></span>
					</div>

					<div class="wrap-input100 rs1 validate-input" data-validate="Password is required">
						<h4>Gender</h4>
						<input type="radio" name="gender" id="" value="0">Male<br/>
						<input type="radio" name="gender" id="" value="1">Female
					</div>

					<div class="container-login100-form-btn m-t-20">
						<button id="regB" class="login100-form-btn" type="submit">
							Sign up
						</button>
					</div>
					<div class="text-center p-t-45 p-b-4">
                        <!--
                        <span class="txt1">
							Forgot
						</span>

						 <a href="#" class="txt2 hov1">
							Username / Password?
						</a> -->
					</div>
					<div class="text-center">
						<span class="txt1">
							Have already an account?
						</span>

						<a href="login" class="txt2 hov1">
							Log in
						</a>
					</div>
				</form>
			</div>
		</div>
	</div>
    
    <script>
            $(document).ready(() => {


                $('#regB').click((e) => {
                    e.preventDefault();
        
                    $.ajax
                    ({
                        type: 'POST',
                        url: 'regC.php',
                        data: $('#registrationForm').serialize(),
                        success: (response) => {
                            // alert(response);
                            if(response == 1)
                            {
                                alert("Account has been created!");
                            }
                        }
                    });
                });
            });
            </script>
</body>
</html>