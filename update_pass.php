<?php
session_start();

require_once 'conn.php';
if (!isset($_SESSION['name'])) 
{
	header("Location: index.php");
}
$user=$_SESSION['name'];
$user_id=$_SESSION['id'];


?>

<?php
$msg="";
if (isset($_POST['update'])) 
{
	$old_pass=$_POST['old_pass'];
	$new_pass=$_POST['new_pass'];
	$r_new_pass=$_POST['r_new_pass'];
	if ($old_pass !="" && $new_pass !="" && $r_new_pass!="") 
	{
		if ($new_pass != $r_new_pass) 
		{
			$msg="Your New Password and Re Enter New Password Doesn't Match..!";
		}
		else
		{
			$sql_check=$conn->query("SELECT * FROM tbl_users WHERE id='$user_id'");
			$row=mysqli_fetch_array($sql_check);
			if (md5($old_pass) == $row['password']) 
			{
				$pass=md5($new_pass);
			$sql_up_pass=$conn->query("UPDATE tbl_users SET password='$pass' WHERE id=".$_SESSION['id']);
			if ($sql_up_pass==1) 
			{
				echo "<script>
            alert('Update Successful...!');
            document.location = 'index.php';
            </script>";
			}
			else
			{
				echo "<script>
            alert('Something is worng...!');
            
            </script>";
			}
			}
			else
			{
				$msg="Your old password is worng..!";
			}
			
		}
	}
	else
	{
		$msg="Plese Insert all field...!";
	}


}
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<meta charset="UTF-8">
	<meta name="description" content="Dreams Template">
	<meta name="keywords" content="Dreams, unica, creative, html">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Library</title>

	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700;800&display=swap" rel="stylesheet">

	<!-- Css Styles -->
	<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
	<link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
	<link rel="stylesheet" href="css/nice-select.css" type="text/css">
	<link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
	<link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
	<link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
	<link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
	<link rel="stylesheet" href="css/style.css" type="text/css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>

	 <?php
	include_once 'menu.php';
	?> 
	<section class="spad">
		
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<h2 class="text-center text-white p-2" style="background-color: #0c2b4b;">Update Password</h2>
				</div>
				<div class="col-lg-6">
					<img src="img/user.png" class="mt-2">
				</div>
				<div class="col-lg-6">
					<form method="post">

						<?php
						if ($msg !="") 
						{
							?>
							<div class="alert alert-danger mt-4" role="alert">
								<?php echo $msg; ?>
							</div>
							<?php
						}
						?>
						
						<div class="form-group">
							<label>Enter Your Old Password</label>
							<input type="text" name="old_pass" class="form-control" >
						</div>
						<div class="form-group">
							<label>Enter New Password</label>
							<input type="text" name="new_pass" class="form-control" >
						</div>
						<div class="form-group">
							<label>Re Enter New Password</label>
							<input type="text" name="r_new_pass" class="form-control" >
						</div>

						<input type="submit" name="update" value="Update" class="btn btn-success">
					</form>
				</div>
			</div>
		</div>


<!-- <?php
if (isset($_POST['update'])) 
{
   $name=$_POST['name'];
   $email=$_POST['email'];
   $address=$_POST['address'];
   


if ($name!="" && $email!="" && $address != "" && $date_of_birth!=""  && $institute!="" && $phone !="" && $student_id !="" && $semester !=""  && $department!=""  )
{
    $sql=$conn->query("UPDATE tbl_users SET name='$name', email='$email',   address='$address', date_of_birth='$date_of_birth', institute='$institute', phone='$phone', student_id='$student_id', semester='$semester', department='$department' WHERE id=".$_SESSION['id']);
    if ($sql==true) 
    {
        echo "<script>
            alert('Update Successful...!');
            document.location = 'update_profile.php';
            </script>";
    }
}
else
{
    echo "<script>
            alert('Please Insert All Input Field....!');
            
            </script>";
}
}
?> -->
</section>



<?php
include 'footer.php';
?>



<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.nice-select.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery-ui.min.js"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/main.js"></script>
</body>

</html>