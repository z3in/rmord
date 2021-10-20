<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <title>ORORS</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="icon" href="images/favicon.png">

  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/styleregistration.css">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Andada+Pro&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,600&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">

<link rel="stylesheet" href="css/styleregistration.css">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Andada+Pro&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;1,600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">
	<style>
		body{
			background-color: #D4F1F4;
		}
		.reg{
			padding:0 4em;
			width:75%;
			margin:0 auto;
			background-color:#87d3db
		}
		.regcontainer{
			background:#fff3f3;
			border-radius:5px;
		}
		.regcontainer input[type='text'],.regcontainer input[type='tel'],.regcontainer input[type='password']{
			border:1px solid #ddd;
			background:#ddd;
		}
		.flex{
			display:flex;
		}
		.flex-column{
			flex-direction: column;
		}
		.flex-row{
			flex-direction: row;
		}
		.header_register{
			background-image: url("pics/uhhhu.jpg");
			width:100%;
			background-size: cover;
			background-position: bottom;
			background-repeat: no-repeat;
			box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
			height:300px;
			flex-direction: column;
			justify-content: center;
			margin-bottom:1em;
		}	
		.header_text{
			width:90%;
			margin:0 auto;
		}
		.header_text h1, .header_text p{
			color:#f1f1f1;
			margin:0;
			padding:0;
		}
		.header_text--inner {
			padding:1em;
			padding-right:2em;
			background:#3333337d;
			display:inline-block;
		}
	@media (max-width:767px){
		.reg{
			width:100%;
			padding:0 1em;
		}
		.header_text--inner .flex.flex-row{
			flex-direction: column;
			align-items: center;
		}
		.header_text--inner .flex.flex-row h1,p{
			margin-top:1em;
			text-align: center;
		}
		.header_text--inner .flex.flex-row div{
			margin-left:0px!important;
		}
	}
	</style>
    
</head>
<body>
	<div class="reg">
 
	<div class="header_register flex" style="padding-bottom:1em;">
		<div class="header_text">
			<div class="header_text--inner">
				<div class="flex flex-row">
					<img src="images/logo.jpeg" width="90" height="90"  alt="">
					<div style="margin-left:20px;">
						<h1>Register</h1>
						<p>Please fill in this form to create an account.</p>
					</div>
				</div>
			</div>
		</div>
	</div>
                   
	<form>
		<div class="regcontainer">
			
			<label for="name"><b>Name</b></label>
			<input type="text" placeholder="Enter Your Name" name="names" id="name"  required><br>

			<label for="username"><b>Username</b></label>
			<input type="text" placeholder="Enter Username" name="username" id="username"  required><br>


			<label for="address"><b>Address</b></label>
			<input type="text" placeholder="Address" name="regaddress" id="regaddress" required><br>
			
			<label for="gender"><b>Gender</b></label> <br> <br>
			<input type="radio" name="gender" id="gender_male" value="1"><label for="gender_male">Male</label>s
			<input type="radio" name="gender" id="gender_female" value="0"> <label for="gender_female">Female</label><br> <br><br>

			<label for="Contactnumber"><b>Contact Number</b></label>
			<input type="tel" placeholder="0999-999-9999" name="cnum" id="cnum" pattern="[0-9-9-5]{4} [0-9-9]{3} [0-9-9-5]{4}"  required>
			<br>

			<label for="email"><b>Email</b></label>
			<input type="text" placeholder="Enter Email" name="email" id="email" required><br>

			<label for="imageid"><b>Please submit a valid ID</b> <p>This is for identificatiion purpose only.</p> </label>
			<input type="file" class=""  name="regid" id="regid" required>
			<br>

			<label for="psw"><b>Password</b></label>
			<input type="password" placeholder="Enter Password" name="psw" id="psw" required>
		
			<label for="psw-repeat"><b>Repeat Password</b></label>
			<input type="password" placeholder="Repeat Password" name="psw-repeat" id="psw-repeat" required>
			<br>
			<hr>
		
			<p>By creating an account you agree to our <a href="#">Terms & Privacy</a>.</p>
			<button type="submit" class="registerbtn"> <a href="loginpage.html"></a> Register</button>
		  </div>
		
		  <div class="" style="text-align:center;padding:0em .25em;padding-bottom:2em;">
			<h3>Already have an account? <a href="loginpage.html">Sign in</a>.</h3>
		  </div>
		</form>
	</div>
		<script>
			var form = document.querySelector("form");
			form.addEventListener("submit", function(event) {
			var data = new FormData(form);
			
			fetch('app/client/registration.php',{method:"POST",body:data})
			.then(data => data.json())
			.then(data => {
				if(data.response){
					
				}
			})
			event.preventDefault();
			}, false);
		</script>
</body>
</html>