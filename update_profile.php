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
                    <h2 class="text-center text-white p-2" style="background-color: #0c2b4b;">Update Information</h2>
                </div>
                <div class="col-lg-6">
                    <img src="img/user.png" class="mt-2">
                </div>
                <div class="col-lg-6">
                    <form method="post">
                        <?php
                        $user_info=$conn->query("SELECT * FROM tbl_users WHERE id='$user_id'");
                        while ($data=mysqli_fetch_array($user_info)) 
                        {
                            ?>
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo $data['name']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" value="<?php echo $data['email']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="address" class="form-control" value="<?php echo $data['address']; ?>">
                            </div>
                            <div class="form-group">
                                <label>Date Of Birth</label>
                                <input type="date" name="date_of_birth" class="form-control" value="<?php echo $data['date_of_birth']; ?>">
                            </div>
                          <!--   <div class="form-group">
                                <label>Select Your Gender</label>
                                <div class="form-check">
                                    <input type="radio" name="gen" value="Male">
                                    Male
                                </div>
                                <div class="form-check">
                                    <input  type="radio" name="gen" value="Female">
                                    Female
                                </div>
                            </div>
                         -->
                        <div class="form-group">
                            <label>Institute</label>
                            <input type="text" name="institute" class="form-control" value="<?php echo $data['institute']; ?>" >
                        </div>
                        <div class="form-group">
                            <label>Phone</label>
                            <input type="number" name="phone" class="form-control" value="<?php echo $data['phone']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Student ID</label>
                            <input type="number" name="student_id" class="form-control" value="<?php echo $data['student_id']; ?>">
                        </div>
                        <div class="form-group">
                            <label>Semester</label>
                            <input type="number" name="semester" class="form-control" value="<?php echo $data['semester']; ?>">
                        </div>
                         <div class="form-group">
                            <label>Department</label>
                            <input type="text" name="department" class="form-control" value="<?php echo $data['department']; ?>">
                        </div>


                        <input type="submit" name="update" value="Update" class="btn btn-success">
                        <?php
                    }
                    ?>

                </form>
            </div>
        </div>
    </div>
<?php
if (isset($_POST['update'])) 
{
   $name=$_POST['name'];
   $email=$_POST['email'];
   $address=$_POST['address'];
   $date_of_birth=$_POST['date_of_birth'];
   $institute=$_POST['institute'];
   $phone=$_POST['phone'];
   $student_id=$_POST['student_id'];
   $semester=$_POST['semester'];
   $department=$_POST['department'];


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
?>
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