<?php 
	$menuid=$_REQUEST["id"];
	require 'database.php';
	$obj=new database();
	$res=$obj->getmenuphotodetail($menuid);
	while($row=mysqli_fetch_array($res))
	{
			$menupic_path=$row["menupic_path"];
	}
	unlink("menuphotos/".$menupic_path);
	$res1=$obj->menuphotoDel($menuid);
	
	if($res1==1)
	{
		
		header('Location:menuphotosdis.php');
		
	}
	else
	{
		echo"NOt deleted";
	}
?>