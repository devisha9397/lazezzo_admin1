
<?php
session_start();
$page = isset($_GET['page']) ? $_GET['page'] : 1;
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
include 'part1.php';



?>


					<h3>
						
						
						<table class="table table-bordered" id="dataTable">
				<thead>
				<tr class="active">
					<td><font size="3" color="blue"><b>User Name</b></font>
					<td><font size="3" color="blue"><b>Item Name</b></font>
					<td><font size="3" color="blue"><b>Quantity</b></font>
					<td><font size="3" color="blue"><b>Amount</b></font>
					<td><font size="3" color="blue"><b>Date</b></font>
					<td><font size="3" color="blue"><b>Delivery Area</b></font>

				</tr>
				</thead>
				
				<tbody>
			
						
						<?php
						
//							include 'database.php';
							$obj=new database();
							
				if($page=="" || $page=="1")
				{
				$page1=0;
				}
				else
				{
				$page1=($page*6)-6;
				}

$next_page=$page+1;
$prev_page=$page-1;
$first_page=1;

							$res=$obj->getallordersbyrestid1($restid,$page1);
							$cnt=mysqli_num_rows($res);
							
						while($row=mysqli_fetch_array($res))
						{
									echo '<tr>';
				//	echo '<td><font size="4" color="black">'.$row["fk_rest_id"].'</font>';
					echo '<td><font size="4" color="black">'.$row["user_name"].'</font>';
					echo '<td><font size="4" color="black ">'.$row["subcui_name"].'</font>';
					echo '<td><font size="4" color="black ">'.$row["quantity"].'</font>';
					echo '<td><font size="4" color="black ">'.$row["total_amount"].'</font>';
					echo '<td><font size="4" color="black ">'.$row["date_of_order"].'</font>';
					echo '<td><font size="4" color="black ">'.$row["delivery_area"].'</font>';
					echo '</tr>';
			
						}
							$res1=$obj->getallordersbyrestid($restid);
							$cnt1=mysqli_num_rows($res1);
				$a=$cnt1/6;
				$a=ceil($a);
				$last_page=$a;

						?>
				</tbody>
				</table> 
						<?php
			echo '<br><center>';
			if($page==1)
			{
				
			}
			else 
			{	
			echo '<a href="allordersbyid.php?page='.$first_page.'" style="text-decoration:none;"><button class="button"><<</button></a>';	
			}
			if($prev_page==0)
			{
				
			}
			else
			{
		echo '<a href="allordersbyid.php?page='.$prev_page.'" style="text-decoration:none;"><button class="button">Previous</button></a>';	
			}
			
			for($b=1;$b<=$a;$b++)
		{
			echo '<a href="allordersbyid.php?page='.$b.'" style="text-decoration:none;"><button class="button">'.$b.'</button></a>'; 
		}
		
		if($next_page==$a)
		{
			echo '<a href="allordersbyid.php?page='.$next_page.'" style="text-decoration:none;"><button class="button">Next</button></a>';	
		}
		else
		{	
		
		}
		if($page==$last_page)
		{
			
		}
		else 
		{	
		echo '<a href="allordersbyid.php?page='.$last_page.'" style="text-decoration:none;"><button class="button">>></button></a>';
		}
		echo '</center>';
		?>

			
						
						
						
						</h3>
                        
  


<?php
include 'part2.php';



?>
</body>

</html>