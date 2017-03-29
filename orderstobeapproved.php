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

$ref=$_SERVER['PHP_SELF'];
$sec="60";
header("Refresh: $sec; url=orderstobeapproved.php");
?>


<?php
include '1.php';
?>
<form action="" method="post">


<!-- Search Section Start -->
                <div class="search-box">
                    <input type="text" name="term" placeholder="Search by delivery area" />
                    <input type="submit" value="go" name="btn" />
					</div>
                
                <!-- Search Section End -->
</form>


<?php
include '2.php';
?>

					<h3>
						
						
						<table class="table table-bordered" id="dataTable">
				<thead>
				<tr class="active">
					<td><font size="3" color="blue"><b>User Name</b></font>
					<td><font size="3" color="blue"><b>Item Name</b></font>
					<td><font size="3" color="blue"><b>Quantity</b></font>
					<td><font size="3" color="blue"><b>Amount</b></font>
					<td><font size="3" color="blue"><b>Date Of Order </b></font>
					<td><font size="3" color="blue"><b>Delivery Area</b></font>
					<td><font size="3" color="blue"><b>Approve</b></font>
					<td><font size="3" color="blue"><b>DisApprove</b></font>
				</tr>
				</thead>
				
				<tbody>

				
						
						<?php
						
						if(!isset($_POST["btn"]))
						{
				$noi=5;
				 if($page=="" || $page=="1")
				{
				$page1=0;
				}
				else
				{
				$page1=($page*$noi)-$noi;
				}

$next_page=$page+1;
$prev_page=$page-1;
$first_page=1;

							$obj=new database();
							$res=$obj->getallordersbyflag1($restid,$page1,$noi);
							$cnt=mysqli_num_rows($res);
							
						while($row=mysqli_fetch_array($res))
						{
									echo '<tr>';
				//	echo '<td><font size="4" color="black">'.$row["fk_rest_id"].'</font>';
					echo '<td><font size="4" color="black">'.$row["user_name"].'</font>';
					echo '<td><center><font size="4" color="black">'.$row["subcui_name"].'</font></center>';
					echo '<td><center><font size="4" color="black">'.$row["quantity"].'</font></center>';
					echo '<td><center><font size="4" color="black">'.$row["total_amount"].'</font></center>';
					echo '<td><center><font size="4" color="black">'.$row["date_of_order"].'</font></center>';
					echo '<td><font size="4" color="black">'.$row["delivery_area"].'</font>';
					echo '<td><center><a href="approve.php?id='.$row["order_id"].'"><button style="background-color: green" type="button" class="btn btn-success" aria-label="Left Align"><span class="glyphicon glyphicon-ok" aria-hidden="true"></span></button></a></center>';
					echo '<td><center><a href="disapprove.php?id='.$row["order_id"].'"><button style="background-color: red" type="button" class="btn btn-danger" aria-label="Left Align"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button></a></center>';
					echo '</tr>';
			
						}
				$res1=$obj->getallordersbyflag($restid);
				$cnt1=mysqli_num_rows($res1);
				
				$a=$cnt1/$noi;
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
			echo '<a href="orderstobeapproved.php?page='.$first_page.'" style="text-decoration:none;"><button class="button"><<</button></a>';	
			}
			if($prev_page==0)
			{
				
			}
			else
			{
		echo '<a href="orderstobeapproved.php?page='.$prev_page.'" style="text-decoration:none;"><button class="button">Previous</button></a>';	
			}
			
			for($b=1;$b<=$a;$b++)
		{
			echo '<a href="orderstobeapproved.php?page='.$b.'" style="text-decoration:none;"><button class="button">'.$b.'</button></a>'; 
		}
		
		if($next_page==$a)
		{
			echo '<a href="orderstobeapproved.php?page='.$next_page.'" style="text-decoration:none;"><button class="button">Next</button></a>';	
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
		echo '<a href="orderstobeapproved.php?page='.$last_page.'" style="text-decoration:none;"><button class="button">>></button></a>';
		}
		echo '</center>';
		}
		?>

						
		</h3>
                        



<?php
include 'part2.php';
?>
</body>

</html>