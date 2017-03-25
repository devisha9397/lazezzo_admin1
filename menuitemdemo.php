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


<!--<div data-ride="carousel" class="carousel slide" id="carousel-example-generic">-->
 <!--       <div class="carousel-inner">-->
        
        <div class="item active">
        <ul class="gallerybox">
        <li>
         <figure>
         <a href="#"><img src="assets/images/img1.jpg" height="300%" width="700%" alt="" /></a>
         <figcaption>
         <h5><a href="#">Montes platea amet</a></h5>
         <div class="controls">
         <a href="#" class="edit">Edit</a>
         <a href="#" class="delete">Delete</a>
         </div>
         </figcaption>
         </figure>
         </li>
                                                                                                              </ul>
         <!--</div>-->
         <!--</div>-->
         <a data-slide="prev" href="#carousel-example-generic" class="left carousel-control">
         <span class="glyphicon glyphicon-chevron-left"></span>
         </a>
         <a data-slide="next" href="#carousel-example-generic" class="right carousel-control">
         <span class="glyphicon glyphicon-chevron-right"></span>
         </a>
         </div>

<?php
include 'part2.php';
?>
</body>

</html>