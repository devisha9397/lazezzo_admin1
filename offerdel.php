<?php 
	$discount_id=$_REQUEST["id"];
	require 'database.php';
	$obj=new database();
	$res=$obj->offerDel($discount_id);
	
	if($res==1)
	{
		header('Location:offerdisplay.php');
		
	}
	else
	{
		echo"NOt deleted";
	}
?>