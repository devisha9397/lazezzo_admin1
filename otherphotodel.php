<?php 
	$other_id=$_REQUEST["id"];
	require 'database.php';
	$obj=new database();
	$res=$obj->otherphotoDel($other_id);
	
	if($res==1)
	{
		header('Location:otherphotosdis.php');
		
	}
	else
	{
		echo"NOt deleted";
	}
?>