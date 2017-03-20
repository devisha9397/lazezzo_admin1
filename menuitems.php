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
				

				<div class="outter-wp">
						<div class="sub-heard-part"></div>
							<div class="graph-visual tables-main">
							
									<div class="graph">
										<div class="tables">												
											
												
				<div class="col-md-8 col-md-offset-11">		
				<a href="addmenuitems.php"><button  type="submit" class="btn btn-primary">
				<span  class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button></a>
				</div>
				<br>							
				<table class="table table-bordered" id="dataTable">
				<thead>
				
				<tr class="active">
				 
					<th><font size="3" color="blue"><b>Item Name</b></font>
					<th><font size="3" color="blue"><b>Item Price</b></font>
					<th><font size="3" color="blue"><b>Update</b></font>
					<th><font size="3" color="blue"><b>Delete</b></font>
				</tr>
				</thead>
				
				<tbody>
				<?php
							

				$obj=new Database();
				$res=$obj->getAllMenuitem($restid);
				while($row=mysqli_fetch_array($res))
				{
					echo '<tr>';
					echo '<td><font size="4" color="black">'.$row["item_name"].'</font>';
					echo '<td><font size="4" color="black">'.$row["item_price"].'</font>';
					echo '<td><a href="menuitemedit.php?id='.$row["item_id"].'"><button type="submit" class="btn btn-success">
					<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a></td>';
					echo '<td><a href="menuitemdel.php?id='.$row["item_id"].'"><button type="submit" class="btn btn-danger">
					<span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a></td>';
				
				
					
		
					echo '</tr>';
				}						
				
				?>
			</tbody>
			</table> 
			
										</div>
									</div>
							</div>
					</div>



		
<?php
include 'part2.php';



?>
</body>

</html>