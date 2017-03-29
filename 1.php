

<!-- Wrapper Start -->
<div class="wrapper">
	<div class="structure-row">
        <!-- Sidebar Start -->
        <aside class="sidebar">
        	<div class="sidebar-in">
                <!-- Sidebar Header Start -->
                <header>
                    <!-- Logo Start -->
                    <div class="logo">
                        <a href=""><img src="assets/images/lazeezo2.png" alt="Adminise" /></a>
                    </div>
                    <!-- Logo End -->
                    <!-- Toggle Button Start -->
                    <a href="#" class="togglemenu">&nbsp;</a>
                    <!-- Toggle Button End -->
                    <div class="clearfix"></div>
                </header>
                <!-- Sidebar Header End -->
                <!-- Sidebar Navigation Start -->
                <nav class="navigation">
                    <ul class="navi-acc" id="nav2">
                        <li>
                        <a href="trydash.php" class="dashboard">Dashboard</a>
                        
                    </li>
                        <li>
                            <a href="#layouts" class="layouts">Orders</a>
                            <ul>
							  <li><a href="allordersbyid.php">All Orders</a></li>
                               <li><a href="orderstobeapproved.php">Orders to be Approved &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge" style="background-color:tomato;"><?php 

									$obj1=new database();
									$res=$obj1->getOrderCount(0,$restid);
									while($row=mysqli_fetch_array($res))
									{
										echo $row["cnt"];

									}
							   ?></span></a></li>
                              <li><a href="approved.php">Approved Orders</a></li>
                               <li><a href="disapproved.php">Disapproved Orders</a></li>
                               
                            </ul>
                        </li>
                        <li>
                        <a href="menuitems.php" class="ui-elements">Menu Items</a>
                        
                    </li>
                        <li>
						
                            <a href="#mailbox" class="mailbox"> BookTables</a>
                            <ul>
                                <li><a href="allbooktablesbyid.php">All Booktables</a></li>
                                <li><a href="booktablestobeapproved.php">Requests To Be Approved &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class="badge" style="background-color:tomato;"><?php 

									$obj2=new database();
									$res2=$obj2->getBooktableCount(0,$restid);
									while($row=mysqli_fetch_array($res2))
									{
										echo $row["cnt"];

									}
							   ?></span>
								
	<li><a href="approvedbooktables.php">Approved Booktables</a></li>										
								
								
								</a></li>
                                <li><a href="emaildetails.html">Email Detail</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#forms" class="forms">Offers</a>
                            <ul>
                                <li><a href="addoffer1.php">Add Offer</a></li>
                                <li><a href="offerdisplay.php">All Offres</a></li>
                                <li><a href="checkboxes.html">Custom Checkboxes</a></li>
                                <li><a href="switches.html">On/Off Switches</a></li>
                                <li><a href="wysiwygeditor.html">WYSIWYG Editor</a></li>
                                <li><a href="sliders.html">Sliders</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#pages" class="pages">Photos</a>
                            <ul>
                                <li><a href="menuphotosdis.php">Menu Photos</a></li>
                                <li><a href="otherphotosdis.php">Other Photos</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#extras" class="extras">Reviews</a>
                            <ul>
                                <li><a href="reviewdis.php">See Reviews</a></li>
                                <li><a href="calendar.html">Calendar</a></li>
                                <li><a href="gallery.html">Gallery</a></li>
                                <li><a href="invoice.html">Invoice</a></li>
                                <li><a href="404.html">404 Page</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="famousfooddisplay.php" class="charts">famous food</a>
                        </li>
                        <br>
					
						<li>
						<a href="birthdaymail.php"><button type="submit" class="btn btn-danger">
						Birthday Special Offers </button></a></li>
					
						
                    </ul>
                    <div class="clearfix"></div>
                </nav>
                <!-- Sidebar Navigation End -->
                <!-- Shadow Start -->
                <span class="shadows"></span>
                <!-- Shadow End -->
            </div>
        </aside>
        <!-- Sidebar End -->
        <!-- Right Section Start -->
        <div class="right-sec">
            <!-- Right Section Header Start -->
            <header>
                <!-- User Section Start -->
                <div class="user">
                    <figure>

						
						
	 <a href=""><img src="images/<?php
						//include 'database.php';
						$obj=new database();
						$email=$_SESSION["email"];
                       $res=$obj->getresrownerdetailbyid($email);                                          																			
		while($row=mysqli_fetch_array($res))
		{
			echo $row["owner_image"];
			$name=$row["rest_owner_name"];
																								
		}
		?>" height=100px width=100px></a>
						
						
						
                    </figure>
                    <div class="welcome">
						<h3 style="color: white;">
						<h3 style="color: white;">
                        <?php  

						$restname=$_SESSION["restname"];
						echo $restname;
						?>
						</h3>
                        <h5><a href="#"><?php echo $name; ?></a></h5>
                    </div>
                </div>
                <!-- User Section End -->
				<div class="col-md-offset-2">
