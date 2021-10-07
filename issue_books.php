<?php
session_start();
require_once 'conn.php';
if (!isset($_SESSION['name'])) 
{
  header("Location: index.php");
}
$user=$_SESSION['name'];
$user_id=$_SESSION['id'];

$book_req=$conn->query("SELECT * FROM issue_books WHERE user_id='$user_id'");
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
             <div class="col-md-12">
                 <h2 class="bg-info text-center text-white p-1">Your Issued Bookes</h2>
                 <?php
                    while ($row=mysqli_fetch_array($book_req)) 
                    {
                        if ($row['status'] !='panding' && $row['status'] !='complete') 
                        {
                            $issue_date=strtotime($row['issue_date']);
                         $now = time();
                         $datediff = $now - $issue_date;
                         $fine=0;
                        $days= round($datediff / (60 * 60 * 24));
                        }
                        else
                        {
                            $days=0;
                        }
                        
                        
                        ?>
                         <p><?php echo "Issued ID: #".$row['issue_id']; ?></p>
                        <table class="table shadow p-5 mb-5 bg-white rounded ">
                            <thead class="thead-warning">
                                <tr>
                                    <th>Book Name</th>
                                    <th>Issued Date</th>
                                    <th>Return Date</th>
                                    <th>Status</th>
                                    <th>Fine</th>
                                </tr>
                            </thead>
                            <tr>
                                <td><?php echo $row['book_name']; ?></td>
                                <td><?php echo $row['issue_date']; ?></td>
                                <td><?php echo $row['return_date']; ?></td>
                                <td><p class="btn btn-info"><?php echo $row['status'];?></p></td>
                                <td class="btn btn-danger"><?php 


                                if ($days>5) 
                                {
                                    $fine=0;
                                    for ($i=$days; $i >5; $i--) { 
                                        $fine=$fine+5;
                                    }
                                    $fine_update=$conn->query("UPDATE issue_books SET fine='$fine' WHERE issue_id=".$row['issue_id']);
                                    echo $fine;
                                }
                                else
                                {
                                    echo $row['fine'];
                                }
                                ?></td>
                            </tr>
                        </table>
                        <?php
                    }
                 ?>
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