<!DOCTYPE html>
<html>
<head>
<title>Register</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="css/regDesign.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>A simple registration page</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form id="registrationForm">
                    <input class="text" type="text" name="fname" placeholder="Firstname" required="">
                    <input class="text" type="text" name="lname" placeholder="Lastname" required="">
					<input class="text" type="text" name="username" placeholder="Username" required="">
					<!-- <input class="text email" type="email" name="email" placeholder="Email" required=""> -->
					<input class="text" type="password" name="password" placeholder="Password" required="">
					<!-- <input class="text w3lpass" type="password" name="password" placeholder="Confirm Password" required=""> -->
					<!-- <div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span>
						</label>
						<div class="clear"> </div>
					</div> -->
					<input id="regB" class="btn btn-info" type="submit" value="Register">
				</form>
				<p>Don't have an Account? <a href="#"> Login Now!</a></p>
			</div>
		</div>
		<div class="colorlibcopy-agile">
			<p>© 2019 Proiect TW</p>
		</div>
		<ul class="colorlib-bubbles">
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
			<li></li>
		</ul>
	</div>
    <!-- //main -->
    
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
                            alert(response);
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