 <?php
session_start();
include 'database.php';
$restid=$_SESSION["restid"];

$email=$_SESSION["email"];
?>

<!DOCTYPE HTML>
<html>

<!-- Mirrored from www.extracoding.com/demo/html/adminise/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Mar 2017 09:18:03 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adminise - Clean And Corporate Admin Panel Template</title>
<!--// Stylesheets //-->
<link href="assets/css/style.css" rel="stylesheet" media="screen" />
<link href="assets/css/bootstrap.css" rel="stylesheet" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!--// Javascript //-->
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.accordion.js"></script>
<script type="text/javascript" src="assets/js/jquery.custom-scrollbar.min.js"></script>
<script type="text/javascript" src="assets/js/icheck.min.js"></script>
<script type="text/javascript" src="assets/js/selectnav.min.js"></script>
<script type="text/javascript" src="assets/js/functions.js"></script>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
</head>

<body>


<?php
include 'part1.php';



?>



 

<div class="panel panel-success" background-color=#080606>
  <div class="panel-heading"><h3> 
  
  
  
    
  <img src="images/<?php
						//include 'database.php';
						$obj=new database();
						$email=$_SESSION["email"];
                       $res=$obj->getresrownerdetailbyid($email);                                          																			
		while($row=mysqli_fetch_array($res))
		{
			echo $row["owner_image"];
																								
		}
		?>" height=100px width=100px class="img-circle">

  
  
	<?php

					//	$restname=$_SESSION["restname"];
						//echo $restname;
			//	echo '<br>';
	
				$obj1=new Database();
				$res1=$obj1->getrestDetail($restid);
				while($row1=mysqli_fetch_array($res1))
				{
					
					echo '<tr>';
					//echo $row["rest_image"];
			//						echo '<td>'.'<img src="images/'.$row['rest_image'].'" class="img-circle"  height="70px" width="70px"/>';
					echo '<td>'.$row1["rest_name"].'</td>';
					echo '<br>';
					echo '&nbsp;&nbsp;&nbsp;&nbsp;';
					echo '<td>'.$row1["rest_add"].'</td>';
		
					echo '</tr>';
				}	
						?>
	
  
  
  </h3></div>
  <div class="panel-body">
<hr> 
		
		<table class="table">
    <thead><tr>
        <th>Review By  </th> 
        <th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Review</th>
        <th>&nbsp;Date</th>
       <th>Delete</th>
        
        </tr></thead>

		<tbody>
		  <br>
	<?php
							

				$obj=new Database();
				$res=$obj->getallReviews($restid);
				while($row=mysqli_fetch_array($res))
				{
				
					echo '<tr>';
					echo '<td>'.'<img src="images/'.$row['pro_pic'].'" class="img-circle"  height="70px" width="70px"/>';
					echo '<br>';
					 echo'&nbsp;'.$row["user_name"].'</td>';      
					echo '<td>'.$row['review_message'].'</td>';
					echo '<td>'.$row['review_date'].'</td>';
					echo '<td><a href="reviewdel.php?id='.$row["review_id"].'"><button type="submit" class="btn btn-danger">
<span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a></td>';
					echo '</tr>';
				}						
				
				?>
			

		
		</tbody>
		
		
		
		
		
  </div>
  </div>


<?php
include 'part2.php';



?>
</body>

</html>