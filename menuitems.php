   <?php
session_start();
$page = isset($_GET['page']) ? $_GET['page'] : 1;

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
<style>
.button {
    background-color: #F5F3F2; 
    border: none;
    color: #555555;
    padding: 5px 10px;
    
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 2px 1px;
    -webkit-transition-duration: 0.4s; 
    transition-duration: 0.4s;
    cursor: pointer;
}
</style>

<body>


<?php
include '1.php';
?>
<form action="" method="post">


<!-- Search Section Start -->
                <div class="search-box">
                    <input type="text" name="term" placeholder="Search Menuitem" />
                    <input type="submit" value="go" name="btn" />
					</div>
                
                <!-- Search Section End -->
</form>
<?php
include '2.php';
?>
				
				<div class="col-md-8 col-md-offset-11">		
				<a href="askmenuitem.php"><button  type="submit" class="btn btn-primary">
				<span  class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span></button></a>
				</div>

				
				
				<table class="table table-bordered" id="dataTable">
				<thead>
				
				<tr class="active">
				 
					<th><font size="3" color="blue"><b>Item Name</b></font>
					<th><font size="3" color="blue"><b>Item Price</b></font>
					<th><font size="3" color="blue"><b>Update</b></font>
					<th><font size="3" color="blue"><b>Delete</b></font>
				</tr>
				</thead>
				
				<tbody>
				
				
								<?php
				$obj=new database();
				if(isset($_POST["btn"]))
				{
					
				


$term = mysql_real_escape_string($_REQUEST['term']);     

$res1=$obj->searchmenuitem($restid,$term); 

while ($row = mysqli_fetch_array($res1)){  
  
   echo '<tr>';
					echo '<td><center><font size="4" color="black">'.$row["subcui_name"].'</font></center>';
					echo '<td><center><font size="4" color="black">'.$row["subcui_price"].'</font></center>';
					echo '<td><center><a href="subcuiedit.php?id='.$row["subcui_id"].'"><button type="submit" class="btn btn-success">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a></center>';
					echo '<td><a href="menuitemdel.php?id='.$row["subcui_id"].'"><center><button type="submit" class="btn btn-danger">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span></center></button></a>';
				
					echo '</tr>';
					}  


				}
?>

				
				<?php
							

			if(!isset($_POST["btn"]))
			{

				 if($page=="" || $page=="1")
				{
				$page1=0;
				}
				else
				{
				$page1=($page*10)-10;
				}

$next_page=$page+1;
$prev_page=$page-1;
$first_page=1;

				$res=$obj->getAllSubcui1($restid,$page1);
				while($row=mysqli_fetch_array($res))
				{
					echo '<tr>';
					echo '<td><font size="4" color="black">'.$row["subcui_name"].'</font>';
					echo '<td><font size="4" color="black">'.$row["subcui_price"].'</font>';
					echo '<td><a href="subcuiedit.php?id='.$row["subcui_id"].'"><button type="submit" class="btn btn-success">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></button></a></td>';
					echo '<td><a href="menuitemdel.php?id='.$row["subcui_id"].'"><button type="submit" class="btn btn-danger">
							<span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a></td>';
				
					echo '</tr>';
				}

				$res1=$obj->getAllSubcui($restid);
				$cnt=mysqli_num_rows($res1);
				
				$a=$cnt/10;
				$a=ceil($a);
				$last_page=$a;

			}	
				?>
			</tbody>
			</table> 
						<?php
			if(!isset($_POST["btn"]))
			{

			echo '<br><center>';
			if($page==1)
			{
				
			}
			else 
			{	
			echo '<a href="menuitems.php?page='.$first_page.'" style="text-decoration:none;"><button class="button"><<</button></a>';	
			}
			if($prev_page==0)
			{
				
			}
			else
			{
		echo '<a href="menuitems.php?page='.$prev_page.'" style="text-decoration:none;"><button class="button">Previous</button></a>';	
			}
			
			for($b=1;$b<=$a;$b++)
		{
			echo '<a href="menuitems.php?page='.$b.'" style="text-decoration:none;"><button class="button">'.$b.'</button></a>'; 
		}
		
		if($next_page==$a)
		{
			echo '<a href="menuitems.php?page='.$next_page.'" style="text-decoration:none;"><button class="button">Next</button></a>';	
		}
		else
		{	
		
		}
		if($page==$last_page)
		{
			
		}
		else if($a==0)
		{
			
		}
		else 
		{	
		echo '<a href="menuitems.php?page='.$last_page.'" style="text-decoration:none;"><button class="button">>></button></a>';
		}
		echo '</center>';
	}
		?>

			
				
									



		
<?php
include 'part2.php';



?>
</body>

</html>