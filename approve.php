<?php 
	$order_id=$_REQUEST["id"];
	require 'database.php';
	
	$obj=new database();
	$res=$obj->orderApprove($order_id);
																
	if($res==1)
	{
		header('location:orderstobeapproved.php');
	}

?>