<?php
session_start();
?>
<!DOCTYPE html>
<!-- Template by Quackit.com -->
<!-- Images by various sources under the Creative Commons CC0 license and/or the Creative Commons Zero license. 
Although you can use them, for a more unique website, replace these images with your own. -->
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <title>ECP</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS: You can use this stylesheet to override any Bootstrap styles and/or apply your own styles -->
    <link href="css/custom.css" rel="stylesheet">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

    <!-- Custom Fonts from Google -->
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
    
</head>

<body>

    <!-- Navigation -->
    <nav id="siteNav" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Logo and responsive toggle -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                	<span class="glyphicon glyphicon-fire"></span> 
                	ECP
                </a>
            </div>
            <!-- Navbar links -->
            <div class="collapse navbar-collapse" id="navbar">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="candidatemainpage.php">Home</a>
                    </li>
                    
                    <li>
                        <a href="viewResultcandidate.php">View Results</a>
                    </li>
					<li class="dropdown">
						<a href="Setting.php" >Settings </a>
						
					</li>
                    
                </ul>
                
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container -->
    </nav>

	<!-- Header -->
    

	

    <!-- jQuery -->
    <script src="js/jquery-1.11.3.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="js/jquery.easing.min.js"></script>
    
    <!-- Custom Javascript -->
    <script src="js/custom.js"></script>

</body>

</html>

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

</head>
<body>
	
	<div class="main-w3layouts wrapper">
		
		<div class="main-agileinfo">
			<div class="agileits-top">
				<form method="post" action="candidatesignupconn.php" enctype="multipart/form-data">

					

					<?php 
					$vtid=$_SESSION['user'];
                    echo "<h3 align='center'>Welcome to Online Election System</h3> ";
                    $db= "(DESCRIPTION =
    (ADDRESS = (PROTOCOL = TCP)(HOST = localhost)(PORT = 1521))
    (CONNECT_DATA =
      (SERVER = DEDICATED)
      (SERVICE_NAME = onlineelectionsystem)
    )
  )";
$conn = oci_connect('shouzeb', 'password', $db);
if (!$conn) {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);

}
$id=$vtid;

$stid = oci_parse($conn, "select District_id,name,Status, email,Candidate_id,status from candidate where Candidate_id=$vtid"); 
oci_execute($stid);

while (oci_fetch($stid)) {
    echo "Name:".oci_result($stid, 'NAME') . " <br> ";
    echo "District id:".oci_result($stid, 'DISTRICT_ID') . " <br> ";
    echo "Election Status:".oci_result($stid, 'STATUS') . " <br> ";
    echo "Email:".oci_result($stid, 'EMAIL') . " <br> ";
    echo "Voter ID:".oci_result($stid, 'CANDIDATE_ID') . " <br> ";
    $_SESSION['did']=oci_result($stid, 'DISTRICT_ID');
    $_SESSION['st']=oci_result($stid, 'STATUS');

}

// Displays:
//   1000 is Roma
//   1100 is Venice

oci_free_statement($stid);
oci_close($conn);


					?>
   
					<br>

					<br>
					
					
					<br>
					<br>
					<div class="wthree-text">
						
						<div class="clear"> </div>
					</div>
					
				</form>
				
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
	</div><p id="main"></p>
</body>
</html>