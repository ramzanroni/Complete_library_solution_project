<?php
session_start();
include_once 'conn.php';
if (isset($_POST['submit'])) 
{
	$name=trim($_POST['name']);
	$email=trim($_POST['email']);
	$phone=$_POST['phone'];
	$address=$_POST['address'];
	$birth=$_POST['birth'];
	$gender=$_POST['gender'];
	$ins=$_POST['ins'];
	$sid=$_POST['sid'];
	$semester=$_POST['sem'];
	$dept=$_POST['dept'];
	$password=trim($_POST['pass1']);
	$pass2=trim($_POST['pass2']);
	$passfinal=md5($password);

	if ($name!="" && $email!="" && $address != "" && $birth!=""  && $gender!="" && $ins!="" && $phone !="" && $sid !="" && $semester !=""  && $dept!="" && $password !="" && $passfinal)
	{
	if ($password != $pass2) 
	{
		
		echo "<script>alert('Password Does Not Match.......!');</script>";
	}

	else
	{
		$sql=$conn->query("INSERT INTO tbl_users(name, email, address, date_of_birth, gender, institute, phone, student_id, semester, department, password) VALUES ('$name', '$email', '$address', '$birth', '$gender', '$ins', '$phone', '$sid', '$semester', '$dept', '$passfinal' ) ");
		if ($sql) 
		{
			

			echo "<script>
			alert('Registration Successful...!');
			document.location = 'index.php';
			</script>";
			
			
		}
		else
		{
			echo "<script>alert('Something is worng...!');</script>";
		}
	}
}
else
{
	echo "<script>alert('Please Insert All The Input Fields...!');</script>";
}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration Form</title>
 <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script> 
</head>
<body>
	<div class="contaier-flude">
		<!-- <img style="width: 10%;" src="img/logo.png" class="rounded mx-auto d-block"> -->
		<p class="text-center" style="font-size: 41px; font-family: fantasy;"><span style="color: orange;">E</span> Library</p>
		<p class="text-center h2 bg-warning pt-2 pb-2">Online Registration Here</p>
	</div>
	<div class="container">
		
		<div class="row mb-5">

			
				<div class="col-md-6 bg-info ">
					<form method="post">
				<fieldset>
					<legend>General Information</legend>
					<div class="form-group">
						<label>Name</label>
						<input type="text" name="name" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Email</label>
						<input type="email" name="email" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Phone</label>
						<input type="number" name="phone" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Address</label>
						<input type="text" name="address" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Date of Birth</label>
						<input type="date" name="birth" class="form-control" required>
					</div>
					<div class="form-group">
						<label>Select Your Gender</label>
						<div class="form-check">
							<input type="radio" name="gender" value="Male">
							Male
						</div>
						<div class="form-check">
							<input  type="radio" name="gender" value="Female">
							
								Female
							</label>
						</div>
					</div>
				</fieldset>
			</div>
			<div class="col-md-6 bg-primary rounded pb-2">
				<fieldset>
					<legend class="text-white">Academic Information</legend>
					<div class="form-group">
						<label class="text-white">Institute</label>
						<input type="text" name="ins" class="form-control" required>
					</div>
					<div class="form-group">
						<label class="text-white">Student ID</label>
						<input type="number" name="sid" class="form-control" required>
					</div>
					<div class="form-group">
						<label class="text-white">Semester</label>
						<input type="number" name="sem" class="form-control" required>
					</div>
					<div class="form-group">
						<label class="text-white">Department</label>
						<input type="text" name="dept" class="form-control" required>
					</div>
					<div class="form-group">
						<label class="text-white">Password</label>
						<input type="password" name="pass1" class="form-control" required>
					</div>
					<div class="form-group">
						<label class="text-white">Re Enter Your Password</label>
						<input type="password" name="pass2" class="form-control" required>
					</div>
					<input type="submit" name="submit" class="btn btn-warning" value="Register Now">
				</fieldset>
			</div>
			</form>
		</div>
	</div>

	   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
