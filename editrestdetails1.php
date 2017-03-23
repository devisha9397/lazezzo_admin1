<?php
session_start();
$restid=$_SESSION["restid"];
$email=$_SESSION["email"];
if($email=="")
 {
	 header('Location:index.php');	 
 }

	
?>
   <?php 


		$rest_image=$_REQUEST["photo"];
		echo $rest_image;
		$rest_name=$_POST["txtname"];
		$area=$_POST["txtarea"];
		$rest_add=$_POST["txtaddress"];
		$cuisine=$_POST["txtcuisine"];
		$pincode=$_POST["txtpincode"];
		$rest_number=$_POST["txtrestnumber"];
		$rest_email=$_POST["txtrestemail"];
		$opening_status=$_POST["txtopeningstatus"];
		$cost=$_POST["txtcost"];
		$highlights=$_POST["txthighlights"];			
	//	$rest_image_new=$_POST["txtrestimage"];	

	if($_FILES["txtrestimage"]["name"]!="")
		{
			unlink("images/".$rest_image);
			$rest_image="images/".$_FILES["txtrestimage"]["name"];
			$rest_image1=$_FILES["txtrestimage"]["name"];
			move_uploaded_file($_FILES["txtrestimage"]["tmp_name"],$rest_image);
		}
	else if($_FILES["txtrestimage"]["name"]=="")
	{
			$rest_image1=$rest_image;
			move_uploaded_file("images/".$rest_image,"images/".$rest_image);
	}	
			echo $_FILES["txtrestimage"]["tmp_name"];
		require 'database.php';
		$obj=new database();
		$res=$obj->restdetailEdit($restid,$cuisine,$rest_name,$area,$rest_add,$pincode,$rest_number,$rest_email,$opening_status,$rest_image1,$cost,$highlights);
		if($res==1)
		{
	
			//header('Location:demo.php');
		}			
		else
		{
			echo"not updated your detials plz try again";
		}	
		


?>
