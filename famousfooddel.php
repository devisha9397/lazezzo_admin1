 <?php 
	$famous_id=$_REQUEST["id"];
	require 'database.php';
	$obj=new database();
	$res=$obj->famousdel($famous_id);
	
	if($res==1)
	{
		header('Location:famousfooddisplay.php');
		
	}
	else
	{
		echo"NOt deleted";
	}
?>