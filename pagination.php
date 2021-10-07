<?php
require_once('conn.php');

	$limit = 16;

	if (isset($_POST['page_no'])) {
	    $page_no = $_POST['page_no'];
	}else{
	    $page_no = 1;
	}

	$offset = ($page_no-1) * $limit;

	$query = "SELECT * FROM books LIMIT $offset, $limit";

	$result = mysqli_query($conn, $query);

	$output = "";
	
	if (mysqli_num_rows($result) > 0) {

	while ($row = mysqli_fetch_assoc($result)) {

	?>
	
	 <div class="card border-info mt-1" style="width: 18rem; margin-right: .25rem!important; float: right;">
                      <div class="card-header"><?php echo substr($row['name'], 0, 30).".."; ?></div>
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
            </div>
                
	<?php
	} 
	;

	$sql = "SELECT * FROM books";

	$records = mysqli_query($conn, $sql);

	$totalRecords = mysqli_num_rows($records);

	$totalPage = ceil($totalRecords/$limit);

	$output.="<div class='col-12'><nav><ul class='pagination justify-content-center' style='margin:20px 0'>";

	for ($i=1; $i <= $totalPage ; $i++) { 
	   if ($i == $page_no) {
		$active = "active";
	   }else{
		$active = "";
	   }

	    $output.="<li class='page-item $active'><a class='page-link' id='$i' href=''>$i</a></li>";
	}

	$output .= "</ul></nav></div>";

	echo $output;

	}

?>