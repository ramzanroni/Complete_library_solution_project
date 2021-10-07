<?php 
    session_start();
    require_once 'conn.php';
    if (!isset($_SESSION['username'])) 
    {
      header("Location: index.php");
    }
    $user_mail=$_SESSION['username'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css" integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" crossorigin="anonymous" />
  <link rel="icon" type="image/png" href="../assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Library Management System
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
  <!-- CSS Files -->
  <link href="../assets/css/material-dashboard.css?v=2.1.0" rel="stylesheet" />
  <!-- CSS Just for demo purpose, don't include it in your project -->
  <link href="../assets/demo/demo.css" rel="stylesheet" />
</head>

<body class="dark-edition">
  <div class="wrapper ">
    <div class="sidebar" data-color="purple" data-background-color="black" data-image="../assets/img/sidebar-2.jpg">
      <div class="logo"><a href="home.php" class="simple-text logo-normal">
        Library Managenment
      </a></div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li class="nav-item active  ">
            <a class="nav-link" href="./home.php">
              <i class="material-icons">dashboard</i>
              <p>Dashboard</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./user.php">
              <i class="material-icons">person</i>
              <p>User Profile</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./tables.php">
              <i class="material-icons">content_paste</i>
              <p>Book List</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./add_books.php">
              <i class="material-icons">add_circle_outline</i>
              <p>Add Book</p>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./request_book.php">
              <i class="material-icons">book</i>
              <p>Book Request  <span class="badge badge-danger"><?php

              $sql_new_book=$conn->query("SELECT COUNT(`status`) as newrequest FROM issue_books WHERE status='panding'");
              $row=mysqli_fetch_assoc($sql_new_book);
              echo "  ".$row['newrequest']; ?></span></p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./submited_book.php">
              <i class="material-icons">book</i>
              <p>Submitted Books</p>
            </a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="./message.php">
              <i class="material-icons">message</i>
              <p>Message</p>
            </a>
          </li>
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top " id="navigation-example">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <a class="navbar-brand" href="javascript:void(0)">Dashboard</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation" data-target="#navigation-example">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value="" class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-default btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form>
            <ul class="navbar-nav">
              <li class="nav-item">
                <a class="nav-link" href="javascript:void(0)">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javscript:void(0)" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">
                   <?php
                   $sql_new_book_request=$conn->query("SELECT * FROM `contacts` WHERE status='0'");
                   $number_message=mysqli_num_rows($sql_new_book_request);

                   echo $number_message;
                   ?>

                 </span>
                 <p class="d-lg-none d-md-block">
                  Some Actions
                </p>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                <?php  


                while ($row_booking=mysqli_fetch_assoc($sql_new_book_request)) 
                {
                  ?>
                  <a class="dropdown-item" href="message_report.php?edit=<?php echo $row_booking['id'];?>"><?php echo $row_booking['name'].": ".substr($row_booking['message'], 0, 5)."...."; ?></a>
                  <?php
                }
                ?>
              </div>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="admin_logout.php">
                Logout <i class="fas fa-sign-out-alt"></i>
              </a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
      <!-- End Navbar -->
      <div class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-12">
              <?php 
                $sql=$conn->query('SELECT * FROM books WHERE id='.$_GET['edit']);
                $row=mysqli_fetch_array($sql);


                if(isset($_POST['submit']))
                {
                 echo $name=$_POST['bname'];
                 echo $author=$_POST['au_name'];
                 echo $edition=$_POST['edition'];
                 echo $quantity=$_POST['book_qun'];
                 echo $dept=$_POST['dept'];
                 echo $status='available';
                  $imgFile = $_FILES['image']['name'];
                  $tmp_dir = $_FILES['image']['tmp_name'];
                  $imgSize = $_FILES['image']['size'];


                  if(empty($imgFile))
                  {
                    $errMSG='error';
                    ?>
                      <div class="alert alert-danger" role="alert">
                      Please Enter the Book Image...!
                      </div>
                    <?php
                  }
                  else
                  {
                    $upload_dir = 'img/';
                    $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION));
                    $valid_extensions = array('jpeg', 'jpg', 'png', 'gif');
                   echo $userpic = rand(1000,1000000).".".$imgExt;
                    if(in_array($imgExt, $valid_extensions))
                    {           

                        if($imgSize < 9000000)              
                        {
                          move_uploaded_file($tmp_dir,$upload_dir.$userpic);
                        }
                        else
                        {
                          $errMSG = "Sorry, your file is too large.";
                       }
                      }
                      else
                     {
                        $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";        
                      }
                  }
                  if (!isset($errMSG)) 
                  {
                    
                  }
                    $sql=$conn->query("UPDATE books SET name='$name', author='$author', edition='$edition', quantity='$quantity', department='$dept', image='$userpic' WHERE id=".$_GET['edit']);

                    if ($sql) 
                    {
                      ?>
                        echo "<script>
                           alert('New Book Update Successful...!');
                           document.location = 'tables.php';
                             </script>";
                      <?php
                    }
                }
              ?>

               <p class="h2 text-center">Update Books</p>
              <form method="post" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Book Name</label>
                  <input type="text" name="bname" class="form-control" value="<?php echo $row['name']; ?>">
                </div>
                <div class="form-group">
                  <label>Author Name</label>
                  <input type="text" name="au_name" class="form-control" value="<?php echo $row['author']; ?>">
                </div>
                <div class="form-group">
                  <label>Edition</label>
                  <input type="number" name="edition" class="form-control" value="<?php echo $row['edition']; ?>">
                </div>
                <div class="form-group">
                  <label>Quantity</label>
                  <input type="number" name="book_qun" class="form-control" value="<?php echo $row['quantity']; ?>">
                </div>
                <div class="form-group">
                  <label>Department/Type</label>
                  <input type="text" name="dept" class="form-control" value="<?php echo $row['department']; ?>">
                </div>
                <div class="form-group">
                  <label>Book Image</label><br>
                  <img style="width: 100px; height: 100px;" src="img/<?php echo $row['image']; ?>">
                  <input type="file" name="image"  accept="image/*" value="<?php echo $row['image']; ?>">
                </div>
                <div>
                  <input type="submit" name="submit" value="Add Book" class="btn" style="background-color: #9c27b0;">
                </div>
              </form>
            </div>
            <div class="col-md-12">
              
            </div>
          </div>
        </div>
      </div>
      
      <script>
        const x = new Date().getFullYear();
        let date = document.getElementById('date');
        date.innerHTML = '&copy; ' + x + date.innerHTML;
      </script>
    </div>
  </div>
 
  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js"></script>
  <script src="../assets/js/core/popper.min.js"></script>
  <script src="../assets/js/core/bootstrap-material-design.min.js"></script>
  <script src="https://unpkg.com/default-passive-events"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!-- Place this tag in your head or just before your close body tag. -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!--  Google Maps Plugin    -->
  <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
  <!-- Chartist JS -->
  <script src="../assets/js/plugins/chartist.min.js"></script>
  <!--  Notifications Plugin    -->
  <script src="../assets/js/plugins/bootstrap-notify.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="../assets/js/material-dashboard.js?v=2.1.0"></script>
  <!-- Material Dashboard DEMO methods, don't include it in your project! -->
  <script src="../assets/demo/demo.js"></script>
  <script>
    $(document).ready(function() {
      $().ready(function() {
        $sidebar = $('.sidebar');

        $sidebar_img_container = $sidebar.find('.sidebar-background');

        $full_page = $('.full-page');

        $sidebar_responsive = $('body > .navbar-collapse');

        window_width = $(window).width();

        $('.fixed-plugin a').click(function(event) {
          if ($(this).hasClass('switch-trigger')) {
            if (event.stopPropagation) {
              event.stopPropagation();
            } else if (window.event) {
              window.event.cancelBubble = true;
            }
          }
        });

        $('.fixed-plugin .active-color span').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-color', new_color);
          }

          if ($full_page.length != 0) {
            $full_page.attr('filter-color', new_color);
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.attr('data-color', new_color);
          }
        });

        $('.fixed-plugin .background-color .badge').click(function() {
          $(this).siblings().removeClass('active');
          $(this).addClass('active');

          var new_color = $(this).data('background-color');

          if ($sidebar.length != 0) {
            $sidebar.attr('data-background-color', new_color);
          }
        });

        $('.fixed-plugin .img-holder').click(function() {
          $full_page_background = $('.full-page-background');

          $(this).parent('li').siblings().removeClass('active');
          $(this).parent('li').addClass('active');


          var new_image = $(this).find("img").attr('src');

          if ($sidebar_img_container.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            $sidebar_img_container.fadeOut('fast', function() {
              $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
              $sidebar_img_container.fadeIn('fast');
            });
          }

          if ($full_page_background.length != 0 && $('.switch-sidebar-image input:checked').length != 0) {
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $full_page_background.fadeOut('fast', function() {
              $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
              $full_page_background.fadeIn('fast');
            });
          }

          if ($('.switch-sidebar-image input:checked').length == 0) {
            var new_image = $('.fixed-plugin li.active .img-holder').find("img").attr('src');
            var new_image_full_page = $('.fixed-plugin li.active .img-holder').find('img').data('src');

            $sidebar_img_container.css('background-image', 'url("' + new_image + '")');
            $full_page_background.css('background-image', 'url("' + new_image_full_page + '")');
          }

          if ($sidebar_responsive.length != 0) {
            $sidebar_responsive.css('background-image', 'url("' + new_image + '")');
          }
        });

        $('.switch-sidebar-image input').change(function() {
          $full_page_background = $('.full-page-background');

          $input = $(this);

          if ($input.is(':checked')) {
            if ($sidebar_img_container.length != 0) {
              $sidebar_img_container.fadeIn('fast');
              $sidebar.attr('data-image', '#');
            }

            if ($full_page_background.length != 0) {
              $full_page_background.fadeIn('fast');
              $full_page.attr('data-image', '#');
            }

            background_image = true;
          } else {
            if ($sidebar_img_container.length != 0) {
              $sidebar.removeAttr('data-image');
              $sidebar_img_container.fadeOut('fast');
            }

            if ($full_page_background.length != 0) {
              $full_page.removeAttr('data-image', '#');
              $full_page_background.fadeOut('fast');
            }

            background_image = false;
          }
        });

        $('.switch-sidebar-mini input').change(function() {
          $body = $('body');

          $input = $(this);

          if (md.misc.sidebar_mini_active == true) {
            $('body').removeClass('sidebar-mini');
            md.misc.sidebar_mini_active = false;

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar();

          } else {

            $('.sidebar .sidebar-wrapper, .main-panel').perfectScrollbar('destroy');

            setTimeout(function() {
              $('body').addClass('sidebar-mini');

              md.misc.sidebar_mini_active = true;
            }, 300);
          }

          // we simulate the window Resize so the charts will get updated in realtime.
          var simulateWindowResize = setInterval(function() {
            window.dispatchEvent(new Event('resize'));
          }, 180);

          // we stop the simulation of Window Resize after the animations are completed
          setTimeout(function() {
            clearInterval(simulateWindowResize);
          }, 1000);

        });
      });
    });
  </script>
</body>

</html>