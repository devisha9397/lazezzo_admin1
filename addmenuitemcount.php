  <?php
session_start();
include 'database.php';
$restid=$_SESSION["restid"];
$email=$_SESSION["restowneremail"];
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
<title>MenuItem</title>
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
<script type="text/javascript">
	
	function allLetter(uname)
{
	var letters=/^[A-Za-z]+$/;
	if(uname.value.match(letters))
	{
			return true;
	}
	else
	{
			
			uname.value="";
			uname.focus();
			alert('Menu Category must have Alphabetic characters only');
			return false;
	}
}
</script>
</head>

<body>


<?php
include 'part1.php';
?>

<form class="form-horizontal" method="post" action="#" enctype="multipart/form-data">
  <div class="container-liquid">
  
  
  
  
   <div class="row">
<div class="col-md-4">
<div class="input-group">
<label for="exampleInputPassword1"> Add Menu Category</label>
<input type="text" class="form-control" id="exampleInputEmail1" name="txtcategory" onblur="return allLetter(txtcategory);" aria-describedby="emailHelp" required><br>
	

</div>
</div>
</div>
 
  
  
  
<div class="row">
<div class="col-md-5">
<div class="form-group">

<label> How many Items You want to Enter? </label>
<input type="number" class="form-control" id="exampleInputEmail1" name="txtcnt" aria-describedby="emailHelp" required><br>

  </div>
  </div>
  </div>


  
  </div>
  
  <center>
					<div class="form-group">
					<div class="col-sm-8">
					<label for="focusedinput" class="col-sm-2 control-label"><font size="3" color="black"><b></b></font></label>
					<button type="submit" class="btn btn-success" value="Add" name="btnaddd" >Add</button>
					</div>
					<?php
					
					if(isset($_POST['btnaddd']))
					{
						$cui_id=NULL;
						$cui_name=$_POST["txtcategory"];
						$_SESSION["cui_name"]=$cui_name;
						$obj=new database();
						$res101=$obj->checkcuisine($restid,$cui_name);
						$cnt101=mysqli_num_rows($res101);
						if($cnt101==1)
						{
								$message = "Menu Category already exists";
								echo "<script type='text/javascript'>alert('$message');</script>";
						}
						else
						{
						$res10=$obj->addcui($cui_id,$restid,$cui_name);
						$_SESSION["cou"]=$_POST['txtcnt'];
						
						
						header("location:addmenuitems.php");
						}
					}
					
					?>
					</div>
					</center>
<?php
include 'part2.php';
?>
</body>

</html>