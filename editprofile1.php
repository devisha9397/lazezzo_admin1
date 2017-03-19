<?php
session_start();
$email=$_SESSION["email"];
?>
   <?php 


			$owner_image=$_REQUEST["owner_image"];
			$rest_owner_name=$_POST["txtname"];
			$owner_mob_no=$_POST["txtno"];
				
		if($_FILES["txtfile"]["name"]!="")
		{
			unlink($owner_image);
			$owner_image="images/".$_FILES["txtfile"]["name"];
			$owner_image1=$_FILES["txtfile"]["name"];
			move_uploaded_file($_FILES["txtfile"]["tmp_name"],$owner_image);
		}
			
		require 'database.php';
		$obj=new database();
		$res=$obj->restowneredit($email,$rest_owner_name,$owner_mob_no,$owner_image1);
		if($res==1)
		{
			
			header('Location:demo.php');
		}			
		else
		{
			echo"not updated your detials plz try again";
		}	
		


?>
