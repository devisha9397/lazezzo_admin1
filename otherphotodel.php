<?php 
	$other_id=$_REQUEST["id"];
	require 'database.php';
	$obj=new database();
	$res1=$obj->getotherphotodetail($other_id);
	while($row=mysqli_fetch_array($res1))
	{
			$otherpic_path=$row["otherpic_path"];
	}
	unlink("images/".$otherpic_path);
	
	$res=$obj->otherphotoDel($other_id);
	
	if($res==1)
	{
		header('Location:otherphotosdis.php');
		
	}
	else
	{
		echo"NOt deleted";
	}
?>