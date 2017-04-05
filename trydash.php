<?php
session_start();
include 'database.php';
$restid=$_SESSION["restid"];
$restname=$_SESSION["restname"];
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
<title>Dashboard</title>
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

<link href="assets/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
</head>

<body>
<?php

$ref=$_SERVER['PHP_SELF'];
$sec="60";
header("Refresh: $sec; url=trydash.php");
?>


<?php
include 'part1.php';
?>
<center><font size="6px">Today's</font></center>
 <div class="col-xs-2">
 
 
<a href="approved.php">
                        <div class="panel panel-primary">
                            <div class="panel-heading" style="background-color:#a285c5;">
							
                                <div class="row">
								
								<div font size="20px" class="col-md-offset-10">
								<font size="8">
									<?php  
											$cnt=0;
											$date=date("d-m-Y");
											$obj=new database();
											$res=$obj->getallapprovedordersbyflag($restid);
											while($row=mysqli_fetch_array($res))
											{
												$date_of_order=$row["date_of_order"];
												$time = strtotime($date_of_order);
												if(date('d-m-Y') == date('d-m-Y', $time)) {
													
													$cnt++;
												}
											}
											//$cnt=mysqli_num_rows($res);
											echo $cnt;
										?>
										</font>
								</div>
								</div>
                                    <!--<div class="col-xs-3">-->
                                        <i class="fa fa-cutlery fa-3x"></i>
										&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;
										 Orders!
								</div>		
								
								
                    </div>
					</a>
                        </div>
						
<div class="col-xs-2">
<a href="approvedbooktables.php">
 <div class="panel panel-success">
                            <div class="panel-heading" style="background-color:#e17695;">
							
                                <div class="row">
								
								<div font size="20px" class="col-md-offset-10">
								<font size="8" color="white">
									<?php  
											$cnt=0;
											$date=date("d-m-Y");
											$obj=new database();
											$res=$obj->getallapprovedbooktablesflag($restid);
											while($row=mysqli_fetch_array($res))
											{
												$date=$row["date"];
												$time = strtotime($date);
												if(date('d-m-Y') == date('d-m-Y', $time)) {
													
													$cnt++;
												}
											}
											//$cnt=mysqli_num_rows($res);
											echo $cnt;
										?>
								
								</font>
								</div>
								</div>
                                    <!--<div class="col-xs-3">-->
                                      <font color="white">  <i class="fa fa-calendar fa-3x"></i></font>
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										
										<font color="white">Booked Tables!</font>
								</div>		
                    </div>
					</a>
                        </div>
						
<div class="col-xs-2">
<a href="reviewdis.php">
 <div class="panel panel-success">
 
                            <div class="panel-heading" style="background-color:#22ba9b;">
							
                                <div class="row">
								
								<div font size="20px" class="col-md-offset-10">
								<font size="8" color="white">
								
								
									<?php  
											$cnt=0;
											$date=date("d-m-Y");
											$obj=new database();
											$res=$obj->getallReviews($restid);
											while($row=mysqli_fetch_array($res))
											{
												$review_date=$row["review_date"];
												$time = strtotime($review_date);
												if(date('d-m-Y') == date('d-m-Y', $time)) {
													
													$cnt++;
												}
											}
											//$cnt=mysqli_num_rows($res);
											echo $cnt;
										?>
								
								
								
								</font>
									
								</div>
								</div>
                                    <!--<div class="col-xs-3">-->
                                      <font color="white">  <i class="fa fa-comments fa-3x"></i></font>
										&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
										&nbsp;
										<font color="white">Reviews!</font>
								</div>		
                    </div>
					</a>
                        </div>

                       
<?php
include 'part2.php';



?>
</body>

</html>