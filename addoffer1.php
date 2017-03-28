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

				<form class="form-horizontal" method="post" action="addoffer1.php" enctype="multipart/form-data">
         <div class="content-section">
                <div class="container-liquid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="sec-box">
                                <a class="closethis">Close</a>
                                <header>
                                    <h2 class="heading">Add Discount Here</h2>
                                </header>
                                <div class="contents">
                                    <a class="togglethis">Toggle</a>
                                    <section class="boxpadding editor-box">
                                    	<script type="text/javascript" src="assets/js/wysihtml5-0.3.0_rc2.min.js"></script>
										<script type="text/javascript" src="assets/js/bootstrap-wysihtml5-0.0.2.js"></script>
										<script>
                                        	$(document).ready(function(){
												$('#some-textarea').wysihtml5();
											});
                                        </script>
                                        <textarea id="some-textarea" class="form-control" name="txtoffer" placeholder="Enter text ...">
										
										
										</textarea>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Row End -->
					<center>
					<div class="form-group">
					<div class="col-sm-8">
					<label for="focusedinput" class="col-sm-6 control-label"><font size="3" color="black"><b></b></font></label>
					<button type="submit" class="btn btn-success" value="Add" name="btnadd" >Add</button>
					</div>
					</div>
					</center>
																				<?php 
														
															if(isset($_POST["btnadd"]))
															{
																
																$discount_id="NULL";
																$fk_rest_id=$restid;
																$discount_desc=$_POST["txtoffer"];
																	
																if (!strlen(trim($_POST['txtoffer'])))
																{
																	echo 'plz enter content ';
																}
																else
																{
																$obj=new Database();
																$res=$obj->addOffer($discount_id,$fk_rest_id,$discount_desc,$restid);
																
																if($res==1)
																{
																
																$_SESSION["discount_id"]=$discount_id;
																	header('location:offerdisplay.php');
																}
																else
																{
																	echo "error";
																}
																}	
															}
															
											
															
															
															?>


                </div>
            </div>
   


<?php
include 'part2.php';



?>
</form>
</body>

</html>