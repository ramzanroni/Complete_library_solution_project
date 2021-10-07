<?php
session_start();
require_once 'conn.php';
if (!isset($_SESSION['name'])) 
{
  header("Location: index.php");
}
$user=$_SESSION['name'];
$user_id=$_SESSION['id'];
$book_id=$_GET['edit'];
$issue_no=mt_rand(100000000, 999999999);
$fine=0;
$status="panding";

if (isset($_POST['submit'])) {
    $book_name=$_POST['name'];
    $quantity=$_POST['quantity']-1;

    $issue_book=$conn->query("INSERT INTO issue_books ( issue_id, book_id, book_name, status, user_id, fine) VALUES ('$issue_no', '$book_id', '$book_name', '$status', '$user_id', '$fine')");
    $update_qun=$conn->query("UPDATE books SET quantity='$quantity' WHERE id=".$_GET['edit']);
    if ($issue_book && $update_qun) 
    {
       
            echo "<script>
            alert('Book Requesting Successfully Done...!');
            document.location = 'home.php';
            </script>";
    }
    else
    {
        echo "Not ok";
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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
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
                        <h2>drive safe & get license</h2>
                        <a href="#" class="primary-btn">Contact us</a>
                        <a href="#" class="primary-btn second-bg">See Courses</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="spad">

      <div class="container">
          <div class="row">
              <div class="col-md-6 ">
                  <form method="post">
                      <p class="text-center bg-info p-1 text-white">Request For Book</p>
                      <?php  

                  $sql= $conn->query("SELECT * FROM books WHERE id='$book_id'");
                  while ($row=mysqli_fetch_array($sql)) 
                  {
                    ?>
                    <div class="card shadow p-3 mb-5 bg-white rounded" style="width: 32rem;">
                        <img class="img-thumbnail" src="Dashboard\admin\img\<?php echo $row['image']; ?>">
                        <div class="card-body" style="background-color: #cfcfcf">
                          <p class="card-title h4 text-center"><?php echo $row['name']; ?></p>
                          <p class="card-text text-center text-warning"><i class="fas fa-pen-alt"></i>  : <?php echo "  ".$row['author']; ?></p>
                          <p class="text-center">Edition: <?php echo $row['edition']; ?></p>
                          <p class="text-center">Department: <?php echo $row['department']; ?></p>
                          <input type="submit" name="submit" value="Request Now" class="btn btn-primary">
                          <div>
                    <input type="text" name="name" value="<?php echo $row['name']; ?>" hidden>
                    <input type="text" name="quantity" value="<?php echo $row['quantity']; ?>" hidden>
                </div>
                      </div>
                  </div>
                  <?php
              }
              ?>
                

                  </form>
              </div>
              <div class="col-md-6 shadow p-3 mb-5 bg-white rounded">
                  <p class="text-center text-warning">N: B: Before submit your request please check your requirement.   </p>
                  <p>Terms And Conditions</p>
                  <p>1.Must be return book within 7 days.</p>
                  <p>2. After 7 days if you don't place our book then you must be pay 5 tk per day.</p>
                  <p>3. If you lost our book then contact our libraian as soon as possible. </p>
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