 
 <!-- Header Top Navigation Start -->
 <div class="row">
				<div class="col-md-offset-7">
                <nav class="topnav">
                    <ul id="nav1">
					<!--likes pr restaurant-->
					<li>
						<a href="#"><i class="glyphicon glyphicon-heart" style="color:red;"></i>Likes<span>
						
						
						<?php 

									$obj2=new database();
									$res2=$obj2->getfavCount(0,$restid);
									while($row=mysqli_fetch_array($res2))
									{
										echo $row["cnt"];

									}
							   ?>
						
						
						</span></a>
					</li>
                        
						
                        <li class="notifi">
                        	<a href="#"><i class="glyphicon glyphicon-bell"></i>Notifications <span class="badge" style="background-color:tomato ;"><?php 

									$obj1=new database();
									$res=$obj1->getOrderCount(0,$restid);
									while($row=mysqli_fetch_array($res))
									{
										$cnt=$row["cnt"];

									}
									$obj2=new database();
									$res2=$obj2->getBooktableCount(0,$restid);
									while($row2=mysqli_fetch_array($res2))
									{
										$cnt1=$row2["cnt"];

									}
									$ans=$cnt+$cnt1;
									echo $ans;
							   ?></span></a>
                            <div class="popdown">
                            	<div class="notificationlist">
								
								<?php
								
								$obj1=new database();
									$res=$obj1->getOrderCount(0,$restid);
									while($row=mysqli_fetch_array($res))
									{
											echo '<ul>';
											echo '<li>';
                                        	echo '<a href="orderstobeapproved.php"><h6>Orders To Be Approved : &nbsp;<span class="badge" style="background-color:tomato ;"> '.$row["cnt"].'</span></h6></a>';
                                           echo '</li>';
											echo '</ul>';

									}
								
									$obj2=new database();
									$res=$obj2->getBooktableCount(0,$restid);
									while($row=mysqli_fetch_array($res))
									{
											echo '<ul>';
											echo '<li>';
                                        	echo '<a href="booktablestobeapproved.php"><h6>Booktables To Be Approved : &nbsp;<span class="badge" style="background-color:tomato ;"> '.$row["cnt"].'</span></h6></a>';
                                           echo '</li>';
											echo '</ul>';

									}
                                	
									?>
                                   
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </li>
                        <li class="settings">
                        	<a href="#"><i class="glyphicon glyphicon-wrench"></i>Settings</a>
                            <div class="popdown popdown-right settings">
                            	<nav>
                                	<a href="ownerprodis.php"><i class="glyphicon glyphicon-user"></i>Your Profile</a>
                                    <a href="editprofile.php"><i class="glyphicon glyphicon-pencil"></i>Edit Profile</a>
									<a href="restprofile.php"><i class="glyphicon glyphicon-pencil"></i>Your Restaurant Details</a>
                                    <a href="editrestdetails.php"><i class="glyphicon glyphicon-edit"></i>Edit Restaurant Detalis</a>
									<a href="changepassword.php"><i class="glyphicon glyphicon-edit"></i>Change Password</a>
                                    <a href="logout.php"><i class="glyphicon glyphicon-log-out"></i>Log out</a>
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
						
					</div>	
						
						
						
						
						