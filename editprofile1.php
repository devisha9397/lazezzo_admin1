<?php
session_start();
$email=$_SESSION["email"];
if($email=="")
 {
	 header('Location:index.php');	 
 }

?>
   <?php 


			$owner_image=$_REQUEST["photo"];
			echo $owner_image;
			$rest_owner_name=$_POST["txtname"];
			$owner_mob_no=$_POST["txtno"];
				
		if($_FILES["txtfile"]["name"]!="")
		{
			unlink("images/".$owner_image);
			$owner_image="images/".$_FILES["txtfile"]["name"];
			$owner_image1=$_FILES["txtfile"]["name"];
			move_uploaded_file($_FILES["txtfile"]["tmp_name"],$owner_image);
		}
		else if($_FILES["txtfile"]["name"]=="")
		{
			$owner_image1=$owner_image;
			move_uploaded_file("images/".$owner_image,"images/".$owner_image);
		}
		echo $_FILES["txtfile"]["name"];	
		require 'database.php';
		$obj=new database();
		$res=$obj->restowneredit($email,$rest_owner_name,$owner_mob_no,$owner_image1);
		if($res==1)
		{
			
			header('Location:ownerprodis.php');
		}			
		else
		{
			echo"not updated your detials plz try again";
		}	
		


?>
