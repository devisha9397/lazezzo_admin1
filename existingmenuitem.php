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
<form method="post" name="form1">
<div class="row">
<div class="col-md-4">
<div class="input-group">
<label for="exampleInputPassword1">Menu Category</label>
<select class="form-control" name="txtcategory">

  <?php 
  	
  $obj=new database();
  $res=$obj->getallsubcusines($restid);
  while($row=mysqli_fetch_array($res))
  {
		
echo '<option   value="'.$row["cui_id"].'">'.$row["cui_name"].'</option>';


  }
?>
	  </select>
	

</div>
</div>
</div>
<div class="row">
<div class="col-md-3">
<div class="form-group">
<label> Enter Menu Item </label>
<input type="text" class="form-control" name="txtmenuitem"><br>
</div>
</div>

<div class="col-md-3">
<div class="form-group">

<label> Enter Item Price </label>
<input type="number" class="form-control"  name="txtprice"><br>
</div>
</div>
</div>
					<center>
					<div class="form-group">
					<div class="col-sm-8">
					<label for="focusedinput" class="col-sm-2 control-label"><font size="3" color="black"><b></b></font></label>
					<button type="submit" class="btn btn-success" value="Add" name="btnadd" >Add</button>
					</div>
					</div>
					</center>

<?php

					if(isset($_POST["btnadd"]))
					{
					
						$subcui_id="NULL";
						$fk_cui_id=$_POST["txtcategory"];
						$subcui_name=$_POST["txtmenuitem"];
						$subcui_price=$_POST["txtprice"];
						$obj=new database();
						$res101=$obj->addsubcui($subcui_id,$fk_cui_id,$subcui_name,$subcui_price,$restid);
						if($res101==1)
						{
																
						header('location:menuitems.php');
						}
						else
						{
						echo "error";
						}
					}
?>					
					
					
					
<?php
include 'part2.php';
?>
</body>
</form>
</html>