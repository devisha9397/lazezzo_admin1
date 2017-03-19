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

		<div class="outter-wp">
							<div class="sub-heard-part"></div>
								<div class="graph-visual tables-main">
									<h3 class="inner-tittle two"><center><font size="7" color="blue">Add Menu pics  </font></center></h3>
										<div class="graph">
											<div class="tables">		
				
				
											<div class="set-1">
												<div class="graph-2 general">
													<div class="grid-1">
														<div class="form-body">
														<form class="form-horizontal" method="post" action="addmenuphoto.php" enctype="multipart/form-data">
																											
															
															<div class="form-group">
																
																<div class="col-sm-8">
																	<input type="file"  class="form-control1" name="txtofferphoto" />
																<!--	<input type="file" name="fileField[]" id="fileField" multiple="multiple"/>-->
																</div>
															</div>
															
															
															<div class="form-group">
																<div class="col-sm-8">
																	<label for="focusedinput" class="col-sm-2 control-label"><font size="3" color="black"><b></b></font></label>
																	<button type="submit" class="btn btn-success" value="Add" name="btnadd" >Add</button>
																</div>
															</div>
																<?php 
															
																if(isset($_POST["btnadd"]))
																{
																	$menu_id="NULL";
																	$menupic_path="menuphotos/".$_FILES["txtofferphoto"]["name"];
																	$ext=pathinfo($menupic_path,PATHINFO_EXTENSION);
																	//$fk_event_id=0;
																	if($ext=="jpg" || $ext=="jpeg" || $ext=="png")
																	{
																		if(move_uploaded_file($_FILES["txtofferphoto"]["tmp_name"],$menupic_path))
																		{
																			$menupic_path=$_FILES["txtofferphoto"]["name"];
																	$obj=new database();
																	$res=$obj->addMenuphoto($menu_id,$menupic_path,$restid);
																	
																	if($res==1)
																	{
																		header('location:menuphotosdis.php');
																	}
																	else
																	{
																		echo "error";
																	}
																		}
																	}
																}	
												
																
																
																?>
																
															</div>
																</form>
														</div>
													</div>
												</div>
											</div>
											</div>
										</div>
								</div>


<?php
include 'part2.php';



?>
</body>

</html>