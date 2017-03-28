 <?php 
	$table_id=$_REQUEST["id"];
	require 'database.php';
	
	$obj=new database();
	$res=$obj->bookdel($table_id);
																
	if($res==1)
	{
		header('location:approvedbooktables.php');
	}

?>