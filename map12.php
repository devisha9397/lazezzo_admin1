<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB6S9Zli4v_L0pYZbOpDuk1k6fFX0JMqTA&callback=initMap""></script>

<script type="text/javascript">
    function initialize() {
       <?php

       	//$pro_id=$_REQUEST["pro_id"];
          $con=mysql_connect('localhost','root','');
          mysql_select_db('lazeezo',$con);
          
          $res=mysql_query("select * from restaurant_tbl where rest_id=21 ",$con);
          
            while ($row=mysql_fetch_assoc($res)) {
              $lat1=$row["latitude"];
              $long1=$row["longitude"];
              $address=$row["rest_add"];

              echo 'var latlng = new google.maps.LatLng('.$row["latitude"].','.$row["longitude"].');';
            }

  ?>
       //var latlng = new google.maps.LatLng(28.535516,77.391026);
        var map = new google.maps.Map(document.getElementById('map'), {
          center: latlng,
          zoom: 17
        });
        var marker = new google.maps.Marker({
          map: map,
          position: latlng,
          draggable: false,
          anchorPoint: new google.maps.Point(0, -29)
       });
        var infowindow = new google.maps.InfoWindow();   
        google.maps.event.addListener(marker, 'click', function() {
          var iwContent = '<div id="iw_container">' +
          '<div class="iw_title"><b>Location</b> : <?php echo $address; ?></div></div>';
          // including content to the infowindow
          infowindow.setContent(iwContent);
          // opening the infowindow in the current map and at the current marker location
          infowindow.open(map, marker);
        });
    }
    google.maps.event.addDomListener(window, 'load', initialize);
    </script>
</head>

<?php
if(isset($_POST['txtsubmit']))
{
$rest_id="NULL";
$owner_email=$_POST['txtowneremail'];
$fk_cat_id=$_POST['txtfkcatid'];
$rest_name=$_POST['txtrestname'];
$area=$_POST['txtarea'];
$address=$_POST["location"];
$address1=$_POST["location"];
$pincode=$_POST['txtpincode'];
$rest_number=$_POST['txtrestnumber'];
$rest_email=$_POST['txtrestemail'];
$opening_status=$_POST['txtopeningstatus'];
$rest_image=$_POST['txtrestimage'];
$cost=$_POST['txtcost'];
$highlights=$_POST['txthighlights'];

$region='india';


	$address = str_replace(" ", "+", $address);

    $json = file_get_contents("http://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&region=$region");
    $json = json_decode($json);

    $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
    $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};
    echo "</br>";
    echo $lat;
    echo "</br>";
	echo $long;

$con=mysqli_connect('localhost','root','','lazeezo');
		// mysql_select_db('lazeezo',$con);
		$res=mysqli_query($con,"insert into restaurant_tbl values('$rest_id','$owner_email','$fk_cat_id','$rest_name','$area','$address1','$pincode','$rest_number','$rest_email','$opening_status','0','$rest_image','$cost','$highlights','$long','$lat')");
		if($res==1)
		{
			echo 'done';
		}
		else
		{
			echo 'error';
		}
}
?>
<body>
<form method="post" action="">
Owner email
	<input type="text" name="txtowneremail">
	fk cat id
	<input type="text" name="txtfkcatid">
	rest_name
	<input type="text" name="txtrestname">
	area
	<input type="text" name="txtarea">
	rest_add
	<input type="text" name="location">
	pincode
	<input type="text" name="txtpincode">
	rest_number
	<input type="text" name="txtrestnumber">
	rest_email
	<input type="text" name="txtrestemail">
	opening_status
	<input type="text" name="txtopeningstatus">
	rest_image
	<input type="text" name="txtrestimage">
	cost
	<input type="text" name="txtcost">
	highlights
	<input type="text" name="txthighlights">
<input type="submit" name="txtsubmit" value="ok">
<div id="map" style="width: 100%; height: 300px;"></div>
</form>

</body>
</html>