
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

<!DOCTYPE HTML>
<html>

<!-- Mirrored from www.extracoding.com/demo/html/adminise/ by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 13 Mar 2017 09:18:03 GMT -->
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Adminise - Clean And Corporate Admin Panel Template</title>
<!--// Stylesheets //-->
<link href="assets/css/style.css" rel="stylesheet" media="screen" />
<link href="assets/css/bootstrap.css" rel="stylesheet" media="screen" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<!--// Javascript //-->
<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/jquery.accordion.js"></script>
<script type="text/javascript" src="assets/js/jquery.custom-scrollbar.min.js"></script>
<script type="text/javascript" src="assets/js/icheck.min.js"></script>
<script type="text/javascript" src="assets/js/selectnav.min.js"></script>
<script type="text/javascript" src="assets/js/functions.js"></script>
<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->
</head>
<body>


<?php
include 'part1.php';
?>


<div class="col-xs-12">
<div class="sec-box">

<header>
<h2 class="heading">Approved Booktables</h2>
</header>
<div class="contents">
                                    
<div class="table-box">
<script type="text/javascript" src="assets/js/jquery.dataTables.min.js"></script>
<table class="display table" id="example">
<thead>
<tr>
<th><font size="3" color="blue">User</font></th>
<th><font size="3" color="blue">Contact No</font></th>
<th><font size="3" color="blue"><center>Date</center></font></th>
<th><font size="3" color="blue">People</font></th>
<th><font size="3" color="blue"><center>Time</center></font></th>
<th><font size="3" color="blue">Exta Request</font></th>
<th><font size="3" color="blue">Delete</font></th>
</tr>
</thead>
<tbody>
			
						
						<?php
						
							$obj=new database();
							$res=$obj->getallapprovedbooktablesflag($restid);
							$cnt=mysqli_num_rows($res);
							
						while($row=mysqli_fetch_array($res))
						{
									echo '<tr>';
			
			
					echo '<td><font size="4" color="black">'.$row["user_name"].'</font>';
					echo '<td><font size="4" color="black">'.$row["mobile_no"].'</font>';
					echo '<td><center><font size="4" color="black ">'.$row["date"].'</font></center>';
					echo '<td><center><font size="4" color="black ">'.$row["no_of_people"].'</font></center>';
					echo '<td><center><font size="4" color="black ">'.$row["time"].'</font></center>';
					echo '<td><center><font size="4" color="black ">'.$row["additional_request"].'</font></center>';
					echo '<td><center><a href="booktabledel.php?id='.$row["table_id"].'"><button type="submit" class="btn btn-danger">
					<span class="glyphicon glyphicon-trash" aria-hidden="true"></span></button></a></td></center>';

					echo '</tr>';
			
						}


						?>

												</tbody>
                                            <tfoot>
                                                <tr>
                                                    <th><input type="text" name="search_engine" value="Search User name" class="search_init" /></th>
                                                    <th><input type="text" name="search_browser" value="Search No." class="search_init" /></th>
                                                    <th><input type="text" name="search_platform" value="Search Date" class="search_init" /></th>
													<th><input type="text" name="search_platform" value="Search no of people" class="search_init" /></th>
														<th><input type="text" name="search_platform" value="Search time" class="search_init" /></th>
															<th><input type="text" name="search_platform" value="Search extra request" class="search_init" /></th>
                                                    
                                                   
                                                </tr>
                                            </tfoot>
                                        </table>
                                        <script>
                                        	var asInitVals = new Array();			
											$(document).ready(function() {
												var oTable = $('#example').dataTable( {
													"oLanguage": {
														"sSearch": "Search all columns:"
													}
												} );
												
												$("tfoot input").keyup( function () {
													/* Filter on the column (the index) of this element */
													oTable.fnFilter( this.value, $("tfoot input").index(this) );
												} );
												
												
												
												/*
												 * Support functions to provide a little bit of 'user friendlyness' to the textboxes in 
												 * the footer
												 */
												$("tfoot input").each( function (i) {
													asInitVals[i] = this.value;
												} );
												
												$("tfoot input").focus( function () {
													if ( this.className == "search_init" )
													{
														this.className = "";
														this.value = "";
													}
												} );
												
												$("tfoot input").blur( function (i) {
													if ( this.value == "" )
													{
														this.className = "search_init";
														this.value = asInitVals[$("tfoot input").index(this)];
													}
												} );
											} );

                                        </script>
                                    </div>
                                    <div class="clearfix"></div>

									</div>
						
<?php
include 'part2.php';



?>
</body>

</html>