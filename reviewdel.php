 <?php 
	$review_id=$_REQUEST["id"];
	require 'database.php';
	$obj=new database();
	$res=$obj->reviewDel($review_id);
	
	if($res==1)
	{
		header('Location:reviewdis.php');
		
	}
	else
	{
		echo"NOt deleted";
	}
?>