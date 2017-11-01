<?php
@ob_start();
session_start();
$id= $_SESSION['id'];

require_once("class/class.admin.php");


$sql = $admin->runQuery("SELECT * FROM `tbl_individual_member` where `status`='Active' ");
$sql->execute();
$row = $sql->fetchAll(PDO::FETCH_ASSOC);

 ?>
<div class="page-sidebar" id="sidebar">
                <!-- Page Sidebar Header-->
                <div class="sidebar-header-wrapper">
                    <input type="text" class="searchinput" />
                    <i class="searchicon fa fa-search"></i>
                    <div class="searchhelper">Search Reports,</div>
                </div>
                <!-- /Page Sidebar Header -->
                <!-- Sidebar Menu -->
                <ul class="nav sidebar-menu">
                    <!--Dashboard-->
                    <li>
                        <a href="myaccount.php">
                            <i class="menu-icon glyphicon glyphicon-home"></i>
                            <span class="menu-text"> Dashboard </span>
                        </a>
                    </li>
                    <!--Databoxes-->
                    <li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-users"></i>
                            <span class="menu-text"> Manage profile</span>

                            <i class="menu-expand"></i>
                        </a>

                        <ul class="submenu">
                            

                            <li>
                                <a href="userchangedpwd.php">
                                    <span class="menu-text">change your password</span>
                                </a>
                            </li>
                            <li>
                                <a href="edit_profile.php?id=<?php echo base64_encode($id); ?>">
                                    <span class="menu-text">edit your profile</span>
                                </a>
							</li>
							
                        </ul>
                    </li>
					<!--<li>
                        <a href="#" class="menu-dropdown">
                            <i class="menu-icon fa fa-table"></i>
                            <span class="menu-text">Manage Organizations </span>

                            <i class="menu-expand"></i>
                        </a>

                        <ul class="submenu">
                           
                            <li>
                                <a href="org_details.php">
                                    <span class="menu-text">Organizations Details</span>
                                </a>
                            </li>
                        </ul>
                    </li>-->
                    <!--Widgets-->
                    
                    <!--Profile
                    <li>
                        <a href="#">
                            <i class="menu-icon fa fa-picture-o"></i>
                            <span class="menu-text">Abc</span>
                        </a>
                    </li>
                   
                    <li>
                        <a href="#">
                            <i class="menu-icon fa fa-picture-o"></i>
                            <span class="menu-text">Abc</span>
                        </a>
                    </li>-->
                    
                   
                </ul>
                <!-- /Sidebar Menu -->
            </div>
