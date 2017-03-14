<?php 
session_start();
	$discount_id=$_SESSION["discount_id"];
	$restid=$_SESSION["restid"];
include 'database.php';
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