<?php 
	$order_id=$_REQUEST["id"];
	require 'database.php';
	
	$obj=new database();
	$res=$obj->orderdel($order_id);
																
	if($res==1)
	{
		header('location:approved.php');
	}

?>