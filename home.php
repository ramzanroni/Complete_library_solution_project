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
</head>

<body>
    <!-- Page Preloder -->
    <?php 
    include_once 'menu.php';
    ?>
    <!-- Header Section End -->

    <!-- Hero Section Begin -->
    <section class="hero set-bg" data-setbg="img/cover.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="hero__text">
                        <h5>Best options for you</h5>
                        <h2>Learn And Grow Up Your Self</h2>
                        <a href="#" class="primary-btn">Contact us</a>
                        <a href="books.php" class="primary-btn second-bg">See Books</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Application Form Section Begin -->
    <section class="application-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title center-title">
                        <span>Why we are best</span>
                        <h2>About Our Self</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <img src="img/about.gif">
                </div>
                <div class="col-lg-6">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
                tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
                consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
                cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
                proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</div>
            </div>


            <!-- <form>
                <div class="row">
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <input type="text" placeholder="Your name">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <input type="text" placeholder="Your Email">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <input type="text" placeholder="Your Phone">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <input type="text" class="datepicker_pop" placeholder="Date & time">
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <select>
                            <option value="">Courses type</option>
                            <option value="">Safe Driving Courses</option>
                            <option value="">Motorhome Drivers</option>
                        </select>
                    </div>
                    <div class="col-lg-4 col-md-4 col-sm-6">
                        <select>
                            <option value="">Car type</option>
                            <option value="">Hatchback</option>
                            <option value="">Sedan</option>
                        </select>
                    </div>
                    <div class="col-lg-12 text-center">
                        <button type="submit" class="site-btn">SEND INQUIRY</button>
                    </div>
                </div>
            </form> -->
        </div>
    </section>
    <!-- Application Form Section End -->

    <!-- Pricing Section Begin -->
    
    <!-- Pricing Section End -->

    <!-- Team Section Begin -->
    <section class="set-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 mt-2 mb-2">
                    <div class="section-title center-title mt-2">
                        <span>New Arrival Book In Our Stock</span>
                        <h2>Last Updated Book</h2>
                    </div>
                    
                    <?php  
                        $sql=$conn->query("SELECT * FROM books ORDER BY id DESC limit 8");
                        while ($row=mysqli_fetch_array($sql)) 
                        {
                           
                            ?>
                            <div class="card border-info mt-1" style="width: 17rem; margin-right: .75rem!important; float: left;">
                      <div class="card-header"><?php echo substr($row['name'], 0, 25).".."; ?></div>
                       <?php  

                      if ($row['quantity']<1) 
                      {
                        ?>
                        <p class="text-center bg-warning p-2" style="position: absolute; top: 34%;">Stock Out</p>
                        <?php
                      }
                      ?>
                      
                      <img class="rounded m-2" style="width: 200px; height: 200px; "  src="Dashboard\admin\img\<?php echo $row['image']; ?>">
                      <div class="card-body text-info">
                        <h6 class="card-title"><?php echo "Author: ".$row['author']; ?></h6>
                        <p class="card-text"><?php echo "Edition: ".$row['edition']; ?></p>
                        <p class="card-text"><?php echo "Category: ".$row['department']; ?></p>

                        <?php 
                            if ($row['quantity']<1) 
                            {
                                ?>
                                    <a href="books.php?edit=<?php echo $row['id']; ?>" onclick="return false;" class="btn btn-info">Send Request</a>
                                <?php
                            }
                            else
                            {
                                ?>
                                <a href="issue.php?edit=<?php echo $row['id']; ?>" class="btn btn-info">Send Request</a>
                                <?php
                            }
                        ?>
                        
                    </div>
                </div>
            
                            <?php
                        }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <section class="team spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7">
                    <div class="section-title">
                        <span>Our Great Team</span>
                        <h2>Our Team Member</h2>
                    </div>
                </div>
                <!-- <div class="col-lg-5 col-md-5 col-sm-5">
                    <div class="team__all">
                        <a href="#" class="primary-btn second-bg">View all</a>
                    </div>
                </div -->
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="team__item">
                        <div class="team__item__img">
                            <img style="width: 160px; height: 150px;" src="img/team/team-1.jpg" alt="">
                        </div>
                        <div class="team__item__text">
                            <h5>Ramzan Ali</h5>
                            <span>Team Leader</span>
                            <p>Department Of Computer Science And Engineering</p>
                            <div class="team__item__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="col-lg-6">
                    <div class="team__item">
                        <div class="team__item__img">
                            <img style="width: 160px; height: 150px;" src="img/team/team-2.jpg" alt="">
                        </div>
                        <div class="team__item__text">
                            <h5>Nafisa Yasmin</h5>
                            <span>Team Member</span>
                            <p>Department Of Computer Science And Engineering</p>
                            <div class="team__item__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="col-lg-6">
                    <div class="team__item">
                        <div class="team__item__img">
                            <img style="width: 160px; height: 150px;" src="img/team/team-3.jpg" alt="">
                        </div>
                        <div class="team__item__text">
                            <h5>Nayem Hossian</h5>
                            <span>Team Member</span>
                            <p>Department Of Computer Science And Engineering</p>
                            <div class="team__item__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="team__item">
                        <div class="team__item__img">
                            <img style="width: 160px; height: 150px;" src="img/team/team-4.jpg" alt="">
                        </div>
                        <div class="team__item__text">
                            <h5>Ashraful Islam</h5>
                            <span>Team Member</span>
                            <p>Department Of Computer Science And Engineering</p>
                            <div class="team__item__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-dribbble"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Team Section End -->

    <!-- Footer Section Begin -->
    <?php include 'footer.php'; ?>
    <!-- Footer Section End --->

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