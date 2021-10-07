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
<div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__search">
            <i class="fa fa-search search-switch"></i>
        </div>
        <div class="offcanvas__logo">
            <a href="/home.php"><p class="text-center" style="font-size: 41px; font-family: fantasy;"><span style="color: orange;">E</span> Library</p></a>
        </div>
        <nav class="offcanvas__menu mobile-menu">
            <ul>
                <li><a href="./home.php">Home</a></li>
                <li><a href="./books.php">Books</a></li>
                <li><a href="./contact.php">Contact</a></li>
                <!-- <li class="active"><a href="#">Pages</a>
                    <ul class="dropdown">
                        <li><a href="./about.html">About</a></li>
                        <li><a href="./instructor.html">Instructor</a></li>
                        <li><a href="./pricing.html">Pricing</a></li>
                        <li><a href="./faq.html">FAQ</a></li>
                        <li><a href="./course-details.html">Course Details</a></li>
                        <li><a href="./blog-details.html">Blog Details</a></li>
                    </ul>
                </li>
                <li><a href="./blog.html">News</a></li>
                <li><a href="./contact.html">Contact</a></li -->>
                <?php
                    if (isset($_SESSION['name'])) 
                    {
                        ?>
                            <li ><a href="./blog.html"><?php echo $user; ?></a>
                    <ul class="dropdown">
                        <li><a href="./profile.php">PROFILE</a></li>
                        <li><a href="./update_pass.php">CHANGE PASSWORD</a></li>
                        <li><a href="./issue_books.php">ISSUED BOOKS</a></li>
                        <li><a href="./logout.php">LOGOUT</a></li>

                    </ul>
                </li>
                        <?php
                    }
                ?>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__social">
            <a href="#"><i class="fa fa-facebook"></i></a>
            <a href="#"><i class="fa fa-twitter"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a>
            <a href="#"><i class="fa fa-dribbble"></i></a>
        </div>
        
    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="header__logo">
                        <a href="./home.php"><p class="text-center" style="font-size: 35px; font-family: fantasy;"><span style="color: orange;">E</span><span style="color: white;"> Library</span></p></a>
                    </div>
                </div>
                <div class="col-lg-9">
                    <nav class="header__menu">
                        <ul>
                            <li class="active"><a href="./home.php">Home</a></li>
                            <li><a href="./books.php">Books</a></li>
                            <li><a href="./contact.php">Contact</a></li>
                           <!--  <li><a href="#">Pages</a>
                                <ul class="dropdown">
                                    <li><a href="./about.html">About</a></li>
                                    <li><a href="./instructor.html">Instructor</a></li>
                                    <li><a href="./pricing.html">Pricing</a></li>
                                    <li><a href="./faq.html">FAQ</a></li>
                                    <li><a href="./course-details.html">Course Details</a></li>
                                    <li><a href="./blog-details.html">Blog Details</a></li>
                                </ul>
                            </li> -->
                            <li style="float: right;"><a href="#"><?php echo $user; ?></a>
                                <ul class="dropdown">
                                    <li><a href="./profile.php">PROFILE</a></li>
                                    <li><a href="./update_pass.php">CHANGE PASSWORD</a></li>
                                    <li><a href="./issue_books.php">ISSUED BOOKS</a></li>
                                    <li><a href="./logout.php">LOGOUT</a></li>

                                </ul>
                            </li>
                            


                        </ul>
                    </nav>

                </div>

            </div>
            <div class="canvas__open">
                <span class="fa fa-bars"></span>
            </div>
        </div>
    </header>