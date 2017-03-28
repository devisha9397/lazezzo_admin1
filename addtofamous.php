 <?php
session_start();
include 'database.php';
$restid=$_SESSION["restid"];
$email=$_SESSION["email"];
if($email=="")
 {
	 header('Location:index.php');	 
 }

?>

 <?php
if(isset($_POST["btnregister"]))
{
	$post=$_POST["selectnames"];
	$famous_id=null;
	//$approval='true';
	

	
	$uids = implode(',', $_POST['selectnames']);
	echo $uids;
	
	//echo explode(",",$uids);
	
	$uid=explode(",",$uids);
	
	for($i=0;$i<count($uid);$i++)
	{
		echo $uid[$i].' '.$famous_id;
		$obj=new database();
		$res=$obj->addfamousfood($famous_id,$restid,$uid[$i]);
	}
	if($res==true)
	{
		header("location:famousfooddisplay.php");
	}
	else
	{
		echo "error";
	}
}
?>