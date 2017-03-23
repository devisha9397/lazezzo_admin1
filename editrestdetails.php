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

<?php

	$obj=new database();
	$res=$obj->getrestDetail($restid);
	while($row=mysqli_fetch_array($res))
	{
		$fk_cat_id=$row["fk_cat_id"];
		$owner_email=$row["owner_email"];
		//$fk_user_email=$row["fk_user_email"];
		$rest_name=$row["rest_name"];
		$area=$row["area"];
		$rest_add=$row["rest_add"];
		$pincode=$row["pincode"];
		$rest_number=$row["rest_number"];
		$rest_email=$row["rest_email"];
		$opening_status=$row["opening_status"];
		$rest_image=$row["rest_image"];
		$cost=$row["cost"];
		$highlights=$row["highlights"];
		
		
	}


?>


<form action="editrestdetails1.php?photo=<?php echo $rest_image; ?>" method="post" enctype="multipart/form-data">
<div class="row">
<div class="col-md-4">



<div class="form-group">
    <label> Restaurant Name</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="txtname"  value="<?php echo $rest_name; ?>"  aria-describedby="emailHelp">
  </div>
  </div>
  </div>

  
  
 <div class="row">
<div class="col-md-5"> 
  <div class="form-group">
  
  <label>Area</label>
  <br>
  <input type="text" list="area"  name="txtarea" value="<?php echo $area;  ?>"/>
  
<datalist id="area">
  <option>Ahemedabad</option>
  <option>Rajkot</option>
  <option>Baroda</option>
  <option>Bhavnagar</option>
</datalist>
  
  
    <!--<label for="exampleInputPassword1">Area</label>
	<textarea id="some-textarea" class="form-control" name="txtarea" value="<?php// echo $area; ?>" >
										
	</textarea>-->
  </div>
  </div>
</div>

  
   <div class="row">
<div class="col-md-6">
  <div class="form-group">
    <label for="exampleInputPassword1">Address</label>
	<textarea id="some-textarea" rows="9" cols="10" class="form-control" name="txtaddress">
										
			<?php echo $rest_add; ?>									
	</textarea>
  </div>
  </div>
</div>

  
  <div class="row">
<div class="col-md-4">
<div class="input-group">
<label for="exampleInputPassword1">Cuisine</label>
<select class="form-control" name="txtcuisine">

  <?php 
  	
  $obj=new database();
  $res=$obj->getallcategories();
  while($row=mysqli_fetch_array($res))
  {

$selected="";
if($fk_cat_id==$row["cat_id"])
{
$selected="selected";
}
						
echo '<option '.$selected.'  value="'.$row["cat_id"].'">'.$row["cusines"].'</option>';

//echo '<option value="'.$row["cat_id"].'">'.$row["cusines"].'</option>';
  }
?>
	  </select>
	

</div>
</div>
</div>

<div class="row">
<div class="col-md-4">
<div class="input-group">
<div class="form-group">
<label for="exampleInputEmail1">Pincode</label>
    <input type="number" class="form-control" id="exampleInputEmail1" name="txtpincode"  value="<?php echo $pincode; ?>"  aria-describedby="emailHelp"> 
   
</div>
</div>
</div>
</div>


<div class="row">
<div class="col-md-4">
<div class="input-group">
<div class="form-group">
<label for="exampleInputEmail1">Restaurant Contact No.</label>
    <input type="number" class="form-control" id="exampleInputEmail1" name="txtrestnumber"  value="<?php echo $rest_number; ?>"  aria-describedby="emailHelp"> 
   
</div>
</div>
</div>
</div>

<br>

<div class="row">
<div class="col-md-4">
<div class="input-group">
<div class="form-group">
<label for="exampleInputEmail1">Restaurant Website Address</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="txtrestemail"  value="<?php echo $rest_email; ?>"  aria-describedby="emailHelp"> 
   
</div>
</div>
</div>
</div>

<br>

<div class="row">
<div class="col-md-4">
<div class="input-group">
<div class="form-group">
<label for="exampleInputEmail1">Openint Status</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="txtopeningstatus"  value="<?php echo $opening_status; ?>"  aria-describedby="emailHelp"> 
   
</div>
</div>
</div>
</div>

<br>


<div class="row">
<div class="col-md-4">
<div class="input-group">
<div class="form-group">
<label for="exampleInputEmail1">Reataurant Image</label>
   <img src="images/<?php echo $rest_image; ?>" height=220px width=220px>
  <td><input type="file" name="txtrestimage" value="change Restaurant photo"></td>
  
</div>
</div>
</div>
</div>
<br>


<div class="row">
<div class="col-md-4">
<div class="input-group">
<div class="form-group">
<label for="exampleInputEmail1">Cost</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="txtcost"  value="<?php echo $cost; ?>"  aria-describedby="emailHelp"> 
   
</div>
</div>
</div>
</div>
<br> 


<div class="row">
<div class="col-md-4">
<div class="input-group">
<div class="form-group">
<label for="exampleInputEmail1">Highlights</label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="txthighlights"  value="<?php echo $highlights; ?>"  aria-describedby="emailHelp"> 
   
</div>
</div>
</div>
</div>
<br> 

  <center>
		 	<div class="form-group">
			<div class="col-sm-8">
			<label for="focusedinput" class="col-sm-2 control-label"><font size="3" color="black"><b></b></font></label>
			<button type="submit" class="btn btn-success" value="Update" name="btnupdate" >Update</button>
			</div>
			</div>
			</center>
  </form>

<?php
include 'part2.php';



?>
</body>

</html>