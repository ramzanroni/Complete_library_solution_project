<?php 
	require_once 'conn.php';
	session_start();
	if (isset($_POST['submit'])) 
	{
		$pass=$_POST['password'];
		$email=$_POST['email'];
		$sql=$conn->query("SELECT * FROM admin");
		if($sql->num_rows>0)
		{
			$row = $sql->fetch_assoc();
			
				if ($email==$row['email'] && $pass==$row['password']) 
				{
					$_SESSION['username']=$row['email'];
					header("Location: home.php");
				}
				else
				{
					echo "Enter Correct Password and email address...!";
				}
			

		}
	}

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
	<style type="text/css">
		body{
			background-image: url("../assets/img/back.jpg");
    		
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
				<h2>Admin Login</h2>
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
			</div>
		</div>
	</div>
</body>
</html>