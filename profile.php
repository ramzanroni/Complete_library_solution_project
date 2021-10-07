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
    <!-- Page Preloder -->
    <?php
    include_once 'menu.php';
    ?>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
   

    <section class="spad">

        <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h2 class="text-center text-white p-2" style="background-color: #0c2b4b;">User Information</h2>
            </div>
            <div class="col-lg-6">
                <img src="img/user.png" class="mt-2">
            </div>
            <div class="col-lg-6">
                <table class="table table-striped table-hover">
                    <?php
                         $sql_user=$conn->query("SELECT * FROM tbl_users WHERE id='$user_id'");

                         while ($row=mysqli_fetch_array($sql_user))
                          {
                             ?>
                                <tr>
                                    <td>Name: </td>
                                    <td><?php echo $row['name']; ?></td>
                                </tr>
                                <tr>
                                    <td>Email: </td>
                                    <td><?php echo $row['email']; ?></td>
                                </tr>
                                <tr>
                                    <td>Address: </td>
                                    <td><?php echo $row['address']; ?></td>
                                </tr>
                                <tr>
                                    <td>Date Of Birth: </td>
                                    <td><?php echo $row['date_of_birth']; ?></td>
                                </tr>
                                <tr>
                                    <td>Gender: </td>
                                    <td><?php echo $row['gender']; ?></td>
                                </tr>
                                <tr>
                                    <td>Institute: </td>
                                    <td><?php echo $row['institute']; ?></td>
                                </tr>
                                <tr>
                                    <td>Phone Number: </td>
                                    <td><?php echo $row['phone']; ?></td>
                                </tr>

                                <tr>
                                    <td>Student ID: </td>
                                    <td><?php echo $row['student_id']; ?></td>
                                </tr>
                                <tr>
                                    <td>Semester: </td>
                                    <td><?php echo $row['semester']; ?></td>
                                </tr>
                                <tr>
                                    <td>Department: </td>
                                    <td><?php echo $row['department']; ?></td>
                                </tr>
                                
                             <?php
                         }

                    ?>
                </table>
                <a href="update_profile.php" class="btn btn-info" >Update Profile</a>
            </div>
        </div>
      </div>

  </section>
  

<!-- Footer Section Begin -->
<?php include 'footer.php'; ?>
<!-- Footer Section End -->

<!-- Search Begin -->
<div class="search-model">
    <div class="h-100 d-flex align-items-center justify-content-center">
        <div class="search-close-switch">+</div>
        <form class="search-model-form">
            <input type="text" id="search-input" placeholder="Search here.....">
        </form>
    </div>
</div>
<!-- Search End -->

<!-- Js Plugins -->
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