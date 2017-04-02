  <?php
session_start();
include 'database.php';
$restid=$_SESSION["restid"];
$email=$_SESSION["restowneremail"];
echo $restid;
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






       <?php
			$obj=new database();
			$res=$obj->getrestDetail($restid);
          
          
            while ($row=mysqli_fetch_array($res)) {
				
				$fk_cat_id=$row["fk_cat_id"];
				$owner_email=$row["owner_email"];
				//$fk_user_email=$row["fk_user_email"];
				$rest_name=$row["rest_name"];
				$cusines=$row["cusines"];
				$area=$row["area"];
				$rest_add=$row["rest_add"];
				$pincode=$row["pincode"];
				$rest_number=$row["rest_number"];
				$rest_email=$row["rest_email"];
				$opening_status=$row["opening_status"];
				$rest_image=$row["rest_image"];
				$cost=$row["cost"];
				$highlights=$row["highlights"];
			
				//$lat1=$row["latitude"];
				//$long1=$row["longitude"];
				$address=$row["rest_add"];
				
	//			echo $row["latitude"];
//				echo $row["longitude"];
        //      echo 'var latlng = new google.maps.LatLng('.$lat1.','.$long1.');';
			  
			  
            }
			
		?>
       




</head>
<body>

<?php
include 'part1.php';
?>
<?php

?>
   <center>
	
      <img src="images/<?php echo $rest_image;?>"  alt="image" height="300px" width="740px">
      
    </center>

<div class="caption">
        <h3>
		<font size="5">
	<div class="col-md-offset-1">
	<font size="6"><?php echo $rest_name; ?></font>
	</div>
	<br>
	</h3>
	</font>
	</div>
	<h2>&nbsp;Address :&nbsp;
	 <b><font size="4"><?php echo $rest_add; ?></font><b></h2>


	
 	<h2>&nbsp;Cusine :&nbsp;<b><font size="4"><?php echo $cusines; ?></font><b></h2>
	<h2>&nbsp;Opening Status :&nbsp;<b><font size="4"><?php echo $opening_status; ?></font><b></h2>
	<h2>&nbsp;Cost :&nbsp;<b><font size="4"><?php echo $cost; ?></font><b></h2>
	<h2>&nbsp;Highlights :&nbsp;<b><font size="4"><?php echo $highlights; ?></font><b></h2>
	<h2>&nbsp;Restaurant Website :&nbsp;<b><font size="4"><?php echo'<a href="'.$rest_email.'"> '.$rest_email.' </a>';?></font><b></h2>
	<h2>&nbsp;Contact no :&nbsp;<b><font size="4"><?php echo $rest_number; ?></font><b></h2>


<?php
include 'part2.php';
?>
</body>

</html>