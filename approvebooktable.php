 <?php 
	$table_id=$_REQUEST["id"];
	require 'database.php';
	
	$obj=new database();
	$res=$obj->booktableApprove($table_id);
																
	if($res==1)
	{
		header('location:booktablestobeapproved.php');
	}

?>