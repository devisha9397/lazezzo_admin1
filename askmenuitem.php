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
<title>Choose Category</title>
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
<br>
<br>
<br>
<br><br>
<div class="row">
<div class="col-md-7 col-md-offset-2">
<div class="panel panel-info">
  <div class="panel-heading">Select Cuisine as per your requirement </div>
  <div class="panel-body">
  <br>
  <br>
   <!-- Single button -->
   
   <div class="col-md-offset-2">
<div class="btn-group btn-group-lg">
  <a href="addmenuitemcount.php"><button type="button" class="btn btn-primary " >
    &nbsp;&nbsp;&nbsp; New &nbsp;&nbsp;&nbsp; </button></a></div>
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="existingmenuitem.php"><button type="button" class="btn btn-primary " >
    Existing   </button></a>
  
  </div>
  
  
<div class="btn-group btn-group-lg">
  </div>
  </div>
 
  </div>
  <br>
  <br>
  </div>
</div>
</div>
</div>



<?php
include 'part2.php';
?>
</body>

</html>