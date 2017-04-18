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
<title>Add famous food</title>
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

Add Your Famous Food Here....
<ul>
<li> Select items from below list  </li>
</ul>
<form action="addtofamous.php" method="post">
<select class="form-control" name="selectnames[]"  style="width: 40%" "height=400%"  data-placeholder="Choose 2-3 items" multiple required>
                                         
										 <?php
											//include '..database.php';
											$obj=new database();
											$res=$obj->getallsubcuisine($restid);
											while($row=mysqli_fetch_array($res))
											{
										?>
										<option value="<?php echo $row["subcui_id"] ?>" > <?php  
										
									echo $row["subcui_name"]; ?> </option>
										<?php
											}
											
										?>
										 
                                         </select>
										 
										 <div class="col-md-12 col-md-offset-6">
                                    <input class="btn btn-success" type="submit" name="btnregister" value="Add">
                                </div>
										 
</form>
<?php
include 'part2.php';
?>
</body>

</html>