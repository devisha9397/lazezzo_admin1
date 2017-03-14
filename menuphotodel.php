<?php 
	$menuid=$_REQUEST["id"];
	require 'database.php';
	$obj=new database();
	$res=$obj->menuphotoDel($menuid);
	
	if($res==1)
	{
		header('Location:menuphotosdis.php');
		
	}
	else
	{
		echo"NOt deleted";
	}
?>