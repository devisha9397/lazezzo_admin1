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


 <form class="form-horizontal" method="post" action="addmenuitems.php" enctype="multipart/form-data">
  <div class="container-liquid">
  
<div class="row">
<div class="col-md-4">
<div class="form-group">
    <label> Enter Menu Item </label>
    <input type="text" class="form-control" id="exampleInputEmail1" name="txtmenuitem" aria-describedby="emailHelp">
  </div>
  </div>
  </div>
  
  
  <div class="row">
<div class="col-md-4">
<div class="form-group">
<label> Enter Item Price </label>
<input type="number" class="form-control" id="exampleInputEmail1" name="txtprice" aria-describedby="emailHelp">
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
					
						$item_id="NULL";
						$fk_rest_id=$restid;
						$item_name=$_POST["txtmenuitem"];
						$item_price=$_POST["txtprice"];
						
						if (!strlen(trim($_POST['txtmenuitem'])))
						{
						echo 'plz enter content ';
						}
						else
						{
						$obj=new Database();
						$res=$obj->addmenuItem($item_id,$fk_rest_id,$item_name,$item_price);
																
						if($res==1)
						{
																
						//$_SESSION["item_id"]=$item_id;
						header('location:menuitems.php');
						}
						else
						{
						echo "error";
						}
						}	
						}
				?>
					


</form>

<?php
include 'part2.php';



?>
</body>

</html>