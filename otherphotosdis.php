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


							<div class="col-md-8 col-md-offset-11">		
								<a href="addotherphoto.php"><button  type="submit" class="btn btn-primary">
									Add</button></a>
									</div>

<?php 

$obj=new database();
$res=$obj->getallotherphotos($restid);
//echo $restid;
while($row=mysqli_fetch_array($res))
	{
		
        echo '<div class="col-md-4">';
	//	echo '<a href="subcat.php?id='.$row["pk_cat_id"].'">';
		echo '<center><img src="otherphotos/'.$row["otherpic_path"].'" height="250px" width="250px"><br>';
		echo '<br>';
		echo '<td><a href="otherphotodel.php?id='.$row["other_id"].'"><button type="submit" class="btn btn-danger">
Delete</button></a></td>';
		

		
		echo '</center></div>';
	}	
?>






<?php
include 'part2.php';



?>
</body>

</html>