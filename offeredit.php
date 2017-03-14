<?php
session_start();
include 'database.php';
$restid=$_SESSION["restid"];
$email=$_SESSION["email"];
//$discount_id=$_REQUEST["id"];
$discount_id=$_SESSION["discount_id"];

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
								<h3 class="inner-tittle two"><center><font size="7" color="blue">Update Offer  </font></center></h3>
									<div class="graph">
										<div class="tables">		
												
													<?php
														$obj=new Database();
														$res=$obj->offerEdit1($discount_id);
														while($row=mysqli_fetch_array($res))
														{
															$discount_id=$row["discount_id"];
															$discount_desc=$row["discount_desc"];	
															$restid=$row["fk_rest_id"];
															$_SESSION["discount_id"]=$discount_id;
														//	$_SESSION[""]=$discount_id;
															echo $discount_desc;
															echo $discount_id;
															echo $restid;
															
														}
														
													?>		
				
									
									
									<div class="outter-wp">
						<div class="sub-heard-part"></div>
							<div class="graph-visual tables-main">
								
									<div class="graph">
										<div class="tables">		
			
			
										<div class="set-1">
											<div class="graph-2 general">
												<div class="grid-1">
													<div class="form-body">
													<form class="form-horizontal" method="post" action="offeredit.php" >
															<br>
																<center>		
														<div class="form-group">
														<div class="col-sm-3">
															<label for="focusedinput" ><font size="3" color="black"><b>Offer Description</b></font><font color="red">*</font></label>
															</div>
														</div>
														
														<div class="col-sm-7">
														 		<?php
																echo '<textarea rows="12" cols="60" name="txtoffer">';
																
																
														//		echo $discount_desc; 
														echo '</textarea>';
															?>
																
																
															</div>
														
														<div class="form-group">
																<div class="col-sm-8">
																	<label for="focusedinput" class="col-sm-2 control-label"><font size="3" color="black"><b></b></font></label>
																	<button type="submit" class="btn btn-default" value="Update" name="btnupdate" >Update</button>
																</div>
															</div>
														</center>
															
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
if(isset($_POST["btnupdate"]))
{

	$discount_desc=$_POST["txtoffer"];
	
																
	$obj=new database();
	$res=$obj->OfferEdit($discount_id,$restid,$discount_desc);
	echo $discount_desc;
	//$cnt=mysqli_num_rows($res);
	if($res==1)
	{
		echo "done";
		header('location:offerdisplay.php');
	}
}									
									
	?>								
										</div>
										</div>
									</div>
							</div>


<?php
include 'part2.php';



?>
</body>

</html>