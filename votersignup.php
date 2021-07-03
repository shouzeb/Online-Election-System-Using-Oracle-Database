
<html>
<head>
<title>ECA</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- Custom Theme files -->
<link href="fullcss.css" rel="stylesheet" type="text/css" media="all" />
<!-- //Custom Theme files -->
<!-- web font -->
<link href="//fonts.googleapis.com/css?family=Roboto:300,300i,400,400i,700,700i" rel="stylesheet">
<!-- //web font -->
</head>
<body>
	<!-- main -->
	<div class="main-w3layouts wrapper">
		<h1>Voter Sign Up</h1>
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form method="post" action="insertvotersignup.php" enctype="multipart/form-data">

					<input class="text" type="text" name="CNIC" placeholder="CNIC" required=""><br>
					<input class="text" type="text" name="District_id" placeholder="District_ID" required=""><br>
					<input class="text" type="text" name="Voter_name" placeholder="Voter_name" required=""><br>
					<input class="text" type="text" name="Address" placeholder="Voter_Address" required=""><br>
					<input class="text" type="text" name="Contact" placeholder="Contact" required=""><br>
					<input class="text" type="email" name="email" placeholder="email" required=""><br>
					<input class="text" type="text" name="DOB" placeholder="Date of Birth: DD/MM/YY" required=""><br>
					<h3 style="color:white">Gender</h3>
					<select class="text" name="Gender">
						<option value="Male">Male</option>
						<option value="Female">Female</option>
						<option value="Female">Others</option>
					</select>
					<br>
					<br>
					<h3 style="color:white">Select and Choose your Profile Photo </h3>
					<input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
					<br>
					<br>
					<div class="wthree-text">
						<label class="anim">
							<input type="checkbox" class="checkbox" required="">
							<span>I Agree To The Terms & Conditions</span>
						</label>
						<div class="clear"> </div>
					</div>
					
				</form>
				<p>Don't have an Account? <a href="#"> Login Now!</a></p>
			</div>
		</div>
		<!-- copyright -->
		
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
</body>
</html>