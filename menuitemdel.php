  <?php 
	$item_id=$_REQUEST["id"];
	require 'database.php';
	$obj=new database();
	$res=$obj->menuitemDel($item_id);
	
	if($res==1)
	{
		header('Location:menuitems.php');
		
	}
	else
	{
		echo"NOt deleted";
	}
?>