<?php
session_start();
include 'database.php';
$restid=$_SESSION["restid"];
$email=$_SESSION["email"];
if($email=="")
 {
	 header('Location:index.php');
 }

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

<h3>
						
						
						<table class="table table-bordered" id="dataTable">
				<thead>
				<tr class="active">
					<td><font size="3" color="blue"><b>User Name</b></font>
						<td><font size="3" color="blue"><b>Contact Number</b></font>
					<td><font size="3" color="blue"><b>Date</b></font>
					<td><font size="3" color="blue"><b>No Of People</b></font>
					<td><font size="3" color="blue"><b>Time</b></font>
					<td><font size="3" color="blue"><b>Additional Request</b></font>
					<td><font size="3" color="blue"><b>Approve</b></font>
					<td><font size="3" color="blue"><b>DisApprove</b></font>

				</tr>
				</thead>
				
				<tbody>
			
						
						<?php
						
							//	include 'database.php';
							$obj=new database();
							$res=$obj->getallbooktablesbyflag($restid);
							$cnt=mysqli_num_rows($res);
							
						while($row=mysqli_fetch_array($res))
						{
									echo '<tr>';
				
					echo '<td><font size="4" color="DarkRed">'.$row["user_name"].'</font>';
					echo '<td><font size="4" color="DarkRed">'.$row["mobile_no"].'</font>';
					echo '<td><font size="4" color="DarkRed ">'.$row["date"].'</font>';
					echo '<td><font size="4" color="DarkRed ">'.$row["no_of_people"].'</font>';
					echo '<td><font size="4" color="DarkRed ">'.$row["time"].'</font>';
					echo '<td><font size="4" color="DarkRed ">'.$row["additional_request"].'</font>';
					echo '<td><a href="approvebooktable.php?id='.$row["table_id"].'"><button style="background-color: green" type="button" class="btn btn-default" aria-label="Left Align"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button></a>';
					echo '<td><a href="disapprovebooktable.php?id='.$row["table_id"].'"><button style="background-color: red" type="button" class="btn btn-default" aria-label="Left Align"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></a>';

					echo '</tr>';
 			
						}
						
						?>
				</tbody>
				</table> 
			
						
						
						
						</h3>



<?php
include 'part2.php';



?>
</body>

</html>