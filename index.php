<?php 
require_once 'conn.php';
session_start();
error_reporting(0);
if (isset($_POST['submit'])) 
{
	$email=$_POST['email'];
	$password=$_POST['password'];
	$pass=md5($password);

	$sql=$conn->query("SELECT * FROM tbl_users WHERE email='$email'");
	$row=mysqli_fetch_array($sql);
	if ($row>0 && $row['status']==1 && $row['password']==$pass) 
	{
		$_SESSION['name']=$row['name'];
		$_SESSION['id']=$row['id'];
		header("Location: home.php");
	}
	elseif ($row>0 && $row['status']==0 && $row['password']==$pass) {
		?>
		<div class="alert alert-warning" role="alert">
			User Request is not accept now. Please wait some time. Admin Accept As Soon As Possible...!
		</div>
		<?php
	}
	else 
	{

		echo "<script>
                           alert('Please Insert Valid Email And Password.. !');
                           document.location = 'index.php';
                             </script>";
	}
	
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Library Management System</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
	<style type="text/css">
		body{
			background-image: url("img/back.jpg");

			min-height: 100%;
			min-width: 1024px;


			width: 100%;
			height: auto;


			position: fixed;
			top: 0;
			left: 0;


		}
		@media screen and (max-width: 1024px) { /* Specific to this particular image */
			body {
				left: 50%;
				margin-left: -512px;   /* 50% */
			}
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="row d-flex justify-content-md-center">
			<div class="col-md-6 shadow-lg p-3 mb-5 bg-white rounded mt-5">
				<h2 class="text-center">User Login</h2>
				<form method="post">
					<div class="form-group">
						<label>Email Address</label>
						<input type="text" name="email" class="form-control">
					</div>
					<div class="form-group">
						<label>Password</label>
						<input type="password" name="password" class="form-control">
					</div>
					<div class="form-group">
						<input type="submit" name="submit" class="form-control btn btn-info">
					</div>
				</form>	
				<a href="registration.php">Create a New Account....?</a>
			</div>
		</div>
	</div>

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>