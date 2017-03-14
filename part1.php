

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
                        <a href=""><img src="assets/images/logo.png" alt="Adminise" /></a>
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
                        <a href="#dashboard" class="dashboard">Dashboard</a>
                        <ul>
                            <li><a href="dashboard1.html">Dashboard 1</a></li>
                            <li><a href="dashboard2.html">Dashboard 2</a></li>
                        </ul>
                    </li>
                        <li>
                            <a href="#layouts" class="layouts">Orders</a>
                            <ul>
							  <li><a href="allordersbyid.php">All Orders</a></li>
                               <li><a href="orderstobeapproved.php">Orders to be Approved</a></li>
                              <li><a href="approved.php">Approved Orders</a></li>
                               <li><a href="disapproved.php">Disapproved Orders</a></li>
                               <li><a href="pastorders.php">Past Orders</a></li>
                            </ul>
                        </li>
                        <li>
                        <a href="#ui-elements" class="ui-elements">Elements</a>
                        <ul>
                            <li><a href="tiles.html">Tiles</a></li>
                            <li><a href="buttons.html">Buttons</a></li>
                            <li><a href="tabs.html">Tabs and Accordion</a></li>
                            <li><a href="typography.html">Typography</a></li>
                            <li><a href="tooltip.html">Tooltip and Popovers</a></li>
                            <li><a href="navbar.html">Navbars</a></li>
                            <li><a href="breadcrumbs.html">Breadcrumbs</a></li>
                            <li><a href="pagination.html">Pagination</a></li>
                            <li><a href="progressbar.html">Progress bars</a></li>
                            <li><a href="blockquotes.html">Blockquotes</a></li>
                            <li><a href="modals.html">Modals</a></li>
                            <li><a href="alerts.html">Alerts</a></li>
                            <li><a href="labels.html">Labels</a></li>
                            <li><a href="comments.html">Comments</a></li>
                        </ul>
                    </li>
                        <li>
                            <a href="#mailbox" class="mailbox">Mailbox<span class="label label-custom1">05</span></a>
                            <ul>
                                <li><a href="inbox.html">Inbox</a></li>
                                <li><a href="compose.html">Compose</a></li>
                                <li><a href="emaildetails.html">Email Detail</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#forms" class="forms">Offers</a>
                            <ul>
                                <li><a href="addoffer.php">Add Offer</a></li>
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
                            <a href="charts.html" class="charts">Charts</a>
                        </li>
                        
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
				<div class="col-md-offset-7">
                <!-- Search Section Start -->
                <div class="search-box">
                    <input type="text" placeholder="Search Anything" />
                    <input type="submit" value="go" />
					</div>
                </div>
                <!-- Search Section End -->
                <!-- Header Top Navigation Start -->
				<div class="col-md-offset-6">
                <nav class="topnav">
                    <ul id="nav1">
                        <li class="tasks">
                        	<a href="#"><i class="glyphicon glyphicon-check"></i>Tasks<span>(04)</span></a>
                            <div class="popdown">
                            	<div class="taskslist">
                                	<ul>
                                    	<li>
                                        	<h6><a href="#">Vel lundium natoque</a><span class="pull-right">25%</span></h6>
                                            <div class="progress">
                                                <div style="width: 15%" class="progress-bar progress-bar-success">
                                                    <span class="sr-only">35% Complete (success)</span>
                                                </div>
                                                <div style="width: 5%" class="progress-bar progress-bar-warning">
                                                    <span class="sr-only">20% Complete (warning)</span>
                                                </div>
                                                <div style="width: 5%" class="progress-bar progress-bar-danger">
                                                    <span class="sr-only">10% Complete (danger)</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                        	<h6><a href="#">Vel lundium natoque</a><span class="pull-right">75%</span></h6>
                                            <div class="progress">
                                                <div style="width: 30%" class="progress-bar progress-bar-success">
                                                    <span class="sr-only">35% Complete (success)</span>
                                                </div>
                                                <div style="width: 30%" class="progress-bar progress-bar-warning">
                                                    <span class="sr-only">20% Complete (warning)</span>
                                                </div>
                                                <div style="width: 15%" class="progress-bar progress-bar-danger">
                                                    <span class="sr-only">10% Complete (danger)</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                        	<h6><a href="#">Vel lundium natoque</a><span class="pull-right">52%</span></h6>
                                            <div class="progress">
                                                <div style="width: 30%" class="progress-bar progress-bar-success">
                                                    <span class="sr-only">35% Complete (success)</span>
                                                </div>
                                                <div style="width: 15%" class="progress-bar progress-bar-warning">
                                                    <span class="sr-only">20% Complete (warning)</span>
                                                </div>
                                                <div style="width: 7%" class="progress-bar progress-bar-danger">
                                                    <span class="sr-only">10% Complete (danger)</span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                        	<h6><a href="#">Vel lundium natoque</a><span class="pull-right">90%</span></h6>
                                            <div class="progress">
                                                <div style="width: 30%" class="progress-bar progress-bar-success">
                                                    <span class="sr-only">35% Complete (success)</span>
                                                </div>
                                                <div style="width: 30%" class="progress-bar progress-bar-warning">
                                                    <span class="sr-only">20% Complete (warning)</span>
                                                </div>
                                                <div style="width: 30%" class="progress-bar progress-bar-danger">
                                                    <span class="sr-only">10% Complete (danger)</span>
                                                </div>
                                            </div>
                                        </li>
                                    </ul>
                                    <a href="#" class="viewall">View All Tasks</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </li>
                        <li class="notifi">
                        	<a href="#"><i class="glyphicon glyphicon-bell"></i>Notifications</a>
                            <div class="popdown">
                            	<div class="notificationlist">
                                	<ul>
                                    	<li>
                                        	<h6><a href="#">Vel lundium natoque</a></h6>
                                            <p>In parturient! Vel lundium natoque</p>
                                            <span><i class="glyphicon glyphicon-time"></i>2hrs ago</span>
                                        </li>
                                        <li>
                                        	<h6><a href="#">Vel lundium natoque</a></h6>
                                            <p>In parturient! Vel lundium natoque</p>
                                            <span><i class="glyphicon glyphicon-time"></i>2hrs ago</span>
                                        </li>
                                        <li>
                                        	<h6><a href="#">Vel lundium natoque</a></h6>
                                            <p>In parturient! Vel lundium natoque</p>
                                            <span><i class="glyphicon glyphicon-time"></i>2hrs ago</span>
                                        </li>
                                        <li>
                                        	<h6><a href="#">Vel lundium natoque</a></h6>
                                            <p>In parturient! Vel lundium natoque</p>
                                            <span><i class="glyphicon glyphicon-time"></i>2hrs ago</span>
                                        </li>
                                    </ul>
                                    <a href="#" class="viewall">View All Notifications</a>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </li>
                        <li class="inbox">
                        	<a href="inbox.html"><i class="glyphicon glyphicon-envelope"></i>Inbox<span>(03)</span></a>
                        </li>
                        <li class="settings">
                        	<a href="#"><i class="glyphicon glyphicon-wrench"></i>Settings</a>
                            <div class="popdown popdown-right settings">
                            	<nav>
                                	<a href="#"><i class="glyphicon glyphicon-user"></i>Your Profile</a>
                                    <a href="#"><i class="glyphicon glyphicon-pencil"></i>Edit Account</a>
                                    <a href="#"><i class="glyphicon glyphicon-question-sign"></i>Get Help</a>
                                    <a href="#"><i class="glyphicon glyphicon-log-out"></i>Log out</a>
                                </nav>
                            </div>
                        </li>
                    </ul>
                </nav>
				</div>
                <!-- Header Top Navigation End -->
                <div class="clearfix"></div>
            </header>
            <!-- Right Section Header End -->
            <!-- Content Section Start -->
            <div class="content-section">
                <div class="container-liquid">
                    <div class="row">
						<h3>
						
						
						
						
						
						
						