<?php
session_start();
require_once 'conn.php';
if (!isset($_SESSION['name'])) 
{
  header("Location: index.php");
}
$user=$_SESSION['name'];
$id=$_SESSION['id'];


?>
<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Dreams Template">
    <meta name="keywords" content="Dreams, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Library</title>

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
</head>

<body>
    <!-- Page Preloder -->
    <?php include_once 'menu.php'; ?>
    <!-- Header Section End -->

    <!-- Breadcrumb Begin -->
    <div class="breadcrumb-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcrumb__links">
                        <a href="./index.html"><i class="fa fa-home"></i> Home</a>
                        <span>Contact</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb End -->
<!-- <div class="mapouter"><div class="gmap_canvas"><iframe width="600" height="500" id="gmap_canvas" src="https://maps.google.com/maps?q=green%20university%20of%20Bangladesh&t=&z=13&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"></iframe><a href="https://youtube-embed-code.com">youtube embed code</a><br><style>.mapouter{position:relative;text-align:right;height:500px;width:600px;}</style><a href="https://www.embedgooglemap.net">map widgets for websites</a><style>.gmap_canvas {overflow:hidden;background:none!important;height:500px;width:600px;}</style></div></div> -->
    <!-- Map Section Begin -->
    <div class="map">
        <iframe
        src="https://maps.google.com/maps?q=green%20university%20of%20Bangladesh&t=&z=13&ie=UTF8&iwloc=&output=embed"
        height="400" style="border:0;" allowfullscreen=""></iframe>
    </div>
    <!-- Map Section End -->

    <!-- Contact Section Begin -->
    <section class="contact spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-4">
                    <div class="contact__address">
                        <h4>Contact info</h4>
                        <ul>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-phone"></i>
                                </div>
                                <p><span>elibrary@gmail.com</span><span>+88 01511111111</span></p>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-map-marker"></i>
                                </div>
                                <p>Green University of Bangladesh</p>
                            </li>
                            <li>
                                <div class="icon">
                                    <i class="fa fa-clock-o"></i>
                                </div>
                                <p><span>Mon - Sat : 8:00am - 5:00pm</span><span>Sunday: Closed</span></p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8 col-md-8">
                    <?php
                    if (isset($_POST['send'])) 
                    {
                         $name= $_POST['name'];
                         $email=$_POST['email'];
                         $message=$_POST['message'];

                       $sql=$conn->query("INSERT INTO contacts (name, email, message, status) values ('$name', '$email', '$message', '0')");
                       if ($sql) 
                       {
                           echo "<script>
                                 alert('Message send Successfully...!');
                                 document.location = 'contact.php';
                                   </script>";
                       }
                    }
                    ?>
                    <div class="contact__form">
                        <h4>Send a message</h4>
                        <form method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Name" name="name">
                                </div>
                                <div class="col-lg-6">
                                    <input type="text" placeholder="Email" name="email">
                                </div>
                            </div>
                            <textarea placeholder="Your message" name="message"></textarea>
                            <button type="submit" class="site-btn" name="send">Send</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Contact Section End -->

    <!-- Footer Section Begin -->
    <?php include_once 'footer.php'; ?>
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