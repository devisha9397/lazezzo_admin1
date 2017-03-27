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
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Adminise - Clean And Corporate Admin Panel Template</title>
<!--// Stylesheets //-->
<link href="assets/css/style.css" rel="stylesheet" media="screen" />
<link href="assets/css/bootstrap.css" rel="stylesheet" media="screen" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!--// Javascript //-->
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.accordion.js"></script>
<script type="text/javascript" src="assets/js/jquery.custom-scrollbar.min.js"></script>
<script type="text/javascript" src="assets/js/icheck.min.js"></script>
<script type="text/javascript" src="assets/js/selectnav.min.js"></script>
<script type="text/javascript" src="assets/js/functions.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
 <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
</head>

<body>


<?php
include 'part1.php';



?>
<!--<div class="container">
  <h2>List Group With Linked Items</h2>
  <div class="list-group">
    <a href="#" class="list-group-item">First item</a>
    <a href="#" class="list-group-item">Second item</a>
    <a href="#" class="list-group-item">Third item</a>
  </div>
</div>-->


 
								<div class="form-group">
                                <div class="col-xs-10 col-xs-offset-1">
                                    <div class="form-material">
									

                                       <select class="form-control" name="selectnames[]"  style="width: 40%" "height=400%"  data-placeholder="Choose many.." multiple >
                                         
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
										 </div>
                                         <label for="example2-select2-multiple"> Select Names</label>
                                    </div>
                                </div>
                            </div>
<?php
include 'part2.php';



?>
</body>

</html>