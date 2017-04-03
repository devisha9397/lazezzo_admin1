<?php
session_start();
include 'database.php';
$restid=$_SESSION["restid"];
$email=$_SESSION["restowneremail"];
$cui_name=$_SESSION["cui_name"];
if($email=="")
 {
	 header('Location:index.php');	 
 }
//$cat=$_SESSION["cat"];
$cou=$_SESSION["cou"];

$obj=new database();
$res100=$obj->getcuiIdbyname($restid,$cui_name);
while($row = mysqli_fetch_array($res100)){  
 
		$cui_id=$row["cui_id"];
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






 <form class="form-horizontal" method="post" action="addmenuitems.php" enctype="multipart/form-data">
  <div class="container-liquid">
  
<div class="row">
<div class="col-md-3">
<div class="form-group">
   <label> Enter Menu Item </label>
	<?php
	//echo $cat;	
	$i=0;
	while($i<$cou)
	{
    echo'<input type="text" class="form-control" id="exampleInputEmail1" name="txtmenuitem[]" aria-describedby="emailHelp"><br>';
	$i++;
	}
	?>
  </div>
  </div>
  
  
  
 
<div class="col-md-8">
<div class="form-group">

<label> Enter Item Price </label>
<?php
echo '<div class="col-md-5">';
	$i=0;
	while($i<$cou)
	{
echo'<input type="number" class="form-control" id="exampleInputEmail1" name="txtprice[]" aria-describedby="emailHelp"><br>';
$i++;
	}
	echo '</div>';
	?>
	
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
</div>					
				<?php
					
					if(isset($_POST["btnadd"]))
					{
					
						$subcui_id="NULL";
						//$fk_cui_id=$restid;
						$subcui_name=$_POST["txtmenuitem"];
						$subcui_price=$_POST["txtprice"];
						
						$obj=new database();
						foreach(array_combine($subcui_name,$subcui_price) as $key=>$value)
						{
						// foreach ($item_name as $key => $value and $item_price as $key1 => $value1) {
						//$res=$obj->addmenuItem();
						// $grade += $value;
  

						
					/*	if (!strlen(trim($_POST['txtmenuitem'])))
						{
						echo 'plz enter content ';
						}*/
						//else
						//{
						//echo $key;
						//echo $value;
						//echo $cat;
						$res=$obj->addsubcui($subcui_id,$cui_id,$key,$value,$restid);
																
						if($res==1)
						{
																
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