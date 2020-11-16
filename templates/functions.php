<?php
error_reporting(0);

function make_safe($variable) 
{
	include('connection.php');
	$variable = strip_tags(mysqli_real_escape_string($conn,trim($variable)));
	return $variable; 
}

function headertemplate(){ 
	include('connection.php');
	$sqltitle = mysqli_query($conn,"SELECT * FROM site_config");
	$rowtitle = mysqli_fetch_array($sqltitle);


?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $rowtitle['site_title']; ?></title>
  	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="assets/img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="assets/js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="assets/css/demo.css">
</head>

<?php }


function navbar($active){
	include('templates/session.php');
	$emp_idsess = $_SESSION['admin'];
	?>
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="index.html" class="logo">
				<?php $sql = mysqli_query($conn,"SELECT * FROM employee_details where emp_id = '$emp_idsess' order by id desc");
					$rowa = mysqli_fetch_array($sql);
					$empid=$rowa['emp_id'];
					$empname=$rowa['emp_name'];
											
											?><span style="font-size:20px;font-weight:bold;color:white;"><?php echo $empname; ?></span>
					<!--<img src="assets/img/logo.svg" alt="navbar brand" class="navbar-brand"> --->
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				<?php $sql = mysqli_query($conn,"SELECT * FROM employee_details where emp_id = '$emp_idsess' order by id desc");
					$rowa = mysqli_fetch_array($sql);
					$empid=$rowa['emp_id'];
					$empname=$rowa['emp_name'];
											
											?><span style="font-size:20px;font-weight:bold;color:white;"><?php echo $empid; ?></span>
				<div class="container-fluid">
		
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search">
							
						</li>
					
					<!---
						<li class="nav-item dropdown hidden-caret">
							<a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
								<i class="fas fa-layer-group"></i>
							</a>
							<div class="dropdown-menu quick-actions quick-actions-info animated fadeIn">
								<div class="quick-actions-header">
									<span class="title mb-1">Quick Actions</span>
									<span class="subtitle op-8">Shortcuts</span>
								</div>
								<div class="quick-actions-scroll scrollbar-outer">
									<div class="quick-actions-items">
										<div class="row m-0">
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-file-1"></i>
													<span class="text">Generated Report</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-database"></i>
													<span class="text">Create New Database</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-pen"></i>
													<span class="text">Create New Post</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-interface-1"></i>
													<span class="text">Create New Task</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-list"></i>
													<span class="text">Completed Tasks</span>
												</div>
											</a>
											<a class="col-6 col-md-4 p-0" href="#">
												<div class="quick-actions-item">
													<i class="flaticon-file"></i>
													<span class="text">Create New Invoice</span>
												</div>
											</a>
										</div>
									</div>
								</div>
							</div>
						</li> --->
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
								<img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="assets/img/profile.jpg" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4>Maxom Properties</h4>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
									
									<a class="dropdown-item" href="./changepass.php">Change Password</a>
									</li><li>
										<div class="dropdown-divider"></div>
									
									<a class="dropdown-item" href="templates/logout.php">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="assets/img/profile.jpg" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									Maxom Properties
									<span class="user-level">Administrator</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
								
									<?php if(($role=='Admin')){ ?>
									<li>
										<a href="menu_control.php">
											<span class="link-collapse">Menu</span>
										</a>
									</li>
									<?php }else { } ?>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
					 
					<?php 
					if(($role=='Admin' or $role=='HR' or $role=='SM' or $role=='ASM' or $role=='MM' or $role=='TC'))
					{
					if(($active=="dashboard")){
			  echo '<li class="nav-item active">';
					} else{
			  echo '<li class="nav-item">';
					}
					 $sql = mysqli_query($conn,"SELECT * FROM menu WHERE ((role1='$role' or role2='$role' or role3='$role' or role4='$role' or role5='$role' or role6='$role') and (menu='dashboard'))");
			  $rows = mysqli_fetch_assoc($sql);
$menu=$rows['menu'];
$role1=$rows['role1'];$role2=$rows['role2'];$role3=$rows['role3'];$role4=$rows['role4'];$role5=$rows['role5'];$role6=$rows['role6'];
$status1=$rows['status1'];$status2=$rows['status2'];$status3=$rows['status3'];$status4=$rows['status4'];$status5=$rows['status5'];$status6=$rows['status6'];

					if(($status1=="Active" and $role1==$role)or($status2=="Active" and $role2==$role)or($status3=="Active" and $role3==$role)or($status4=="Active" and $role4==$role)or($status5=="Active" and $role5==$role)or($status6=="Active" and $role6==$role)){
			 ?>
							<a href="dashboard.php" class="collapsed">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>
								
				</a>
					<?php } ?>
						</li>
					<?php }else {}
					
					?>
					
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							
						</li>
						<?php 
						if(($role=='Admin' or $role=='HR' or $role=='SM' or $role=='ASM' or $role=='MM' or $role=='TC'))
					{
						if(($active=="add_customer") or ($active=="view_customer")){
			  echo '<li class="nav-item active">';
						}
						else {
							echo '<li class="nav-item ">';
						}
						$sql = mysqli_query($conn,"SELECT * FROM menu WHERE ((role1='$role' or role2='$role' or role3='$role' or role4='$role' or role5='$role' or role6='$role') and (menu='customers'))");
			  $rows = mysqli_fetch_assoc($sql);
$menu=$rows['menu'];
$role1=$rows['role1'];$role2=$rows['role2'];$role3=$rows['role3'];$role4=$rows['role4'];$role5=$rows['role5'];$role6=$rows['role6'];
$status1=$rows['status1'];$status2=$rows['status2'];$status3=$rows['status3'];$status4=$rows['status4'];$status5=$rows['status5'];$status6=$rows['status6'];

					if(($status1=="Active" and $role1==$role)or($status2=="Active" and $role2==$role)or($status3=="Active" and $role3==$role)or($status4=="Active" and $role4==$role)or($status5=="Active" and $role5==$role)or($status6=="Active" and $role6==$role))
					{
			 
			  ?>
			  						
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>Customers</p>
								<span class="caret"></span>
							</a>
							<?php if(($active=="add_customer") or ($active=="view_customer")){
									echo '<div class="collapse show" id="base">';
							}else{
								echo '<div class="collapse" id="base">';
							}
								?>
							
								<ul class="nav nav-collapse">
								<?php if($active=="add_customer"){
									echo '<li class="active">';
								}else{
										echo '<li>';
									}
									$sql = mysqli_query($conn,"SELECT * FROM menu WHERE ((role1='$role' or role2='$role' or role3='$role' or role4='$role' or role5='$role' or role6='$role') and (menu='add_customer'))");
			  $rows = mysqli_fetch_assoc($sql);
$menu=$rows['menu'];
$role1=$rows['role1'];$role2=$rows['role2'];$role3=$rows['role3'];$role4=$rows['role4'];$role5=$rows['role5'];$role6=$rows['role6'];
$status1=$rows['status1'];$status2=$rows['status2'];$status3=$rows['status3'];$status4=$rows['status4'];$status5=$rows['status5'];$status6=$rows['status6'];

					if(($status1=="Active" and $role1==$role)or($status2=="Active" and $role2==$role)or($status3=="Active" and $role3==$role)or($status4=="Active" and $role4==$role)or($status5=="Active" and $role5==$role)or($status6=="Active" and $role6==$role))
					{
								?>
									
										<a href="add_customer.php">
											<span class="sub-item">Add Customer</span>
										</a>
					<?php }else{} ?>
									</li>
									<?php if($active=="view_customer"){
									echo '<li class="active">';
								}else{
										echo '<li>';
									}
														$sql = mysqli_query($conn,"SELECT * FROM menu WHERE ((role1='$role' or role2='$role' or role3='$role' or role4='$role' or role5='$role' or role6='$role') and (menu='view_customer'))");
			  $rows = mysqli_fetch_assoc($sql);
$menu=$rows['menu'];
$role1=$rows['role1'];$role2=$rows['role2'];$role3=$rows['role3'];$role4=$rows['role4'];$role5=$rows['role5'];$role6=$rows['role6'];
$status1=$rows['status1'];$status2=$rows['status2'];$status3=$rows['status3'];$status4=$rows['status4'];$status5=$rows['status5'];$status6=$rows['status6'];

					if(($status1=="Active" and $role1==$role)or($status2=="Active" and $role2==$role)or($status3=="Active" and $role3==$role)or($status4=="Active" and $role4==$role)or($status5=="Active" and $role5==$role)or($status6=="Active" and $role6==$role))
					{
								?>
									<a href="view_customer.php">
											<span class="sub-item">View Customer</span>
										</a>
										</li>
					<?php }else{} ?>
								</ul>
							</div> 
					<?php } else {}?>
						</li>
					<?php }else {}
					
					?>
			 <!------Starting Employee    ----->	

				<?php 
				if(($role=='Admin' or $role=='HR' or $role=='SM' or $role=='ASM' or $role=='MM' or $role=='TC'))
					{
				if(($active=="add_employee") or ($active=="view_employee")){
			  echo '<li class="nav-item active">';
						}
						else {
							echo '<li class="nav-item ">';
						}
						$sql = mysqli_query($conn,"SELECT * FROM menu WHERE ((role1='$role' or role2='$role' or role3='$role' or role4='$role' or role5='$role' or role6='$role') and (menu='employee'))");
			  $rows = mysqli_fetch_assoc($sql);
$menu=$rows['menu'];
$role1=$rows['role1'];$role2=$rows['role2'];$role3=$rows['role3'];$role4=$rows['role4'];$role5=$rows['role5'];$role6=$rows['role6'];
$status1=$rows['status1'];$status2=$rows['status2'];$status3=$rows['status3'];$status4=$rows['status4'];$status5=$rows['status5'];$status6=$rows['status6'];

					if(($status1=="Active" and $role1==$role)or($status2=="Active" and $role2==$role)or($status3=="Active" and $role3==$role)or($status4=="Active" and $role4==$role)or($status5=="Active" and $role5==$role)or($status6=="Active" and $role6==$role))
					{
			  ?>
			  						
							<a data-toggle="collapse" href="#emp">
								<i class="fas fa-th-list"></i>
								<p>Employee</p>
								<span class="caret"></span>
							</a>
							<?php 
					}else {}
							if(($active=="add_employee") or ($active=="view_employee")){
									echo '<div class="collapse show" id="emp">';
							}else{
								echo '<div class="collapse" id="emp">';
							}
								?>
							
								<ul class="nav nav-collapse">
								<?php if($active=="add_employee"){
									echo '<li class="active">';
								}else{
										echo '<li>';
									}
												$sql = mysqli_query($conn,"SELECT * FROM menu WHERE ((role1='$role' or role2='$role' or role3='$role' or role4='$role' or role5='$role' or role6='$role') and (menu='add_employee'))");
			  $rows = mysqli_fetch_assoc($sql);
$menu=$rows['menu'];
$role1=$rows['role1'];$role2=$rows['role2'];$role3=$rows['role3'];$role4=$rows['role4'];$role5=$rows['role5'];$role6=$rows['role6'];
$status1=$rows['status1'];$status2=$rows['status2'];$status3=$rows['status3'];$status4=$rows['status4'];$status5=$rows['status5'];$status6=$rows['status6'];

					if(($status1=="Active" and $role1==$role)or($status2=="Active" and $role2==$role)or($status3=="Active" and $role3==$role)or($status4=="Active" and $role4==$role)or($status5=="Active" and $role5==$role)or($status6=="Active" and $role6==$role))
					{
								?>
										<a href="add_employee.php">
											<span class="sub-item">Add Employee</span>
										</a>
					<?php }else { } ?>
									</li>
									<?php if($active=="view_employee"){
									echo '<li class="active">';
								}else{
										echo '<li>';
									}
												$sql = mysqli_query($conn,"SELECT * FROM menu WHERE ((role1='$role' or role2='$role' or role3='$role' or role4='$role' or role5='$role' or role6='$role') and (menu='view_employee'))");
			  $rows = mysqli_fetch_assoc($sql);
$menu=$rows['menu'];
$role1=$rows['role1'];$role2=$rows['role2'];$role3=$rows['role3'];$role4=$rows['role4'];$role5=$rows['role5'];$role6=$rows['role6'];
$status1=$rows['status1'];$status2=$rows['status2'];$status3=$rows['status3'];$status4=$rows['status4'];$status5=$rows['status5'];$status6=$rows['status6'];

					if(($status1=="Active" and $role1==$role)or($status2=="Active" and $role2==$role)or($status3=="Active" and $role3==$role)or($status4=="Active" and $role4==$role))
					{
								?>
									<a href="view_employee.php">
											<span class="sub-item">View Employee</span>
										</a>
										<?php }else { } ?>
										</li>
					
								</ul>
							</div> 
						</li>
					<?php } else {} ?>

					
					<?php 
				if(($role=='Admin' or $role=='HR' or $role=='SM' or $role=='ASM' or $role=='MM' or $role=='TC'))
					{
				if(($active=="add_project") or ($active=="view_project")){
			  echo '<li class="nav-item active">';
						}
						else {
							echo '<li class="nav-item ">';
						}
						$sql = mysqli_query($conn,"SELECT * FROM menu WHERE ((role1='$role' or role2='$role' or role3='$role' or role4='$role' or role5='$role' or role6='$role') and (menu='project'))");
			  $rows = mysqli_fetch_assoc($sql);
$menu=$rows['menu'];
$role1=$rows['role1'];$role2=$rows['role2'];$role3=$rows['role3'];$role4=$rows['role4'];$role5=$rows['role5'];$role6=$rows['role6'];
$status1=$rows['status1'];$status2=$rows['status2'];$status3=$rows['status3'];$status4=$rows['status4'];$status5=$rows['status5'];$status6=$rows['status6'];

					if(($status1=="Active" and $role1==$role)or($status2=="Active" and $role2==$role)or($status3=="Active" and $role3==$role)or($status4=="Active" and $role4==$role)or($status5=="Active" and $role5==$role)or($status6=="Active" and $role6==$role))
					{
			  ?>
			  						
							<a data-toggle="collapse" href="#proj">
								<i class="fas fa-pen-square"></i>
								<p>Project</p>
								<span class="caret"></span>
							</a>
							<?php 
					}else {}
							if(($active=="add_project") or ($active=="view_project")){
									echo '<div class="collapse show" id="proj">';
							}else{
								echo '<div class="collapse" id="proj">';
							}
								?>
							
								<ul class="nav nav-collapse">
								<?php if($active=="add_project"){
									echo '<li class="active">';
								}else{
										echo '<li>';
									}
												$sql = mysqli_query($conn,"SELECT * FROM menu WHERE ((role1='$role' or role2='$role' or role3='$role' or role4='$role' or role5='$role' or role6='$role') and (menu='add_project'))");
			  $rows = mysqli_fetch_assoc($sql);
$menu=$rows['menu'];
$role1=$rows['role1'];$role2=$rows['role2'];$role3=$rows['role3'];$role4=$rows['role4'];$role5=$rows['role5'];$role6=$rows['role6'];
$status1=$rows['status1'];$status2=$rows['status2'];$status3=$rows['status3'];$status4=$rows['status4'];$status5=$rows['status5'];$status6=$rows['status6'];

					if(($status1=="Active" and $role1==$role)or($status2=="Active" and $role2==$role)or($status3=="Active" and $role3==$role)or($status4=="Active" and $role4==$role)or($status5=="Active" and $role5==$role)or($status6=="Active" and $role6==$role))
					{
								?>
									
										<a href="add_project.php">
											<span class="sub-item">Add Project</span>
										</a>
					<?php }else { } ?>
									</li>
									<?php if($active=="view_project"){
									echo '<li class="active">';
								}else{
										echo '<li>';
									}
												$sql = mysqli_query($conn,"SELECT * FROM menu WHERE ((role1='$role' or role2='$role' or role3='$role' or role4='$role' or role5='$role' or role6='$role') and (menu='view_project'))");
			  $rows = mysqli_fetch_assoc($sql);
$menu=$rows['menu'];
$role1=$rows['role1'];$role2=$rows['role2'];$role3=$rows['role3'];$role4=$rows['role4'];$role5=$rows['role5'];$role6=$rows['role6'];
$status1=$rows['status1'];$status2=$rows['status2'];$status3=$rows['status3'];$status4=$rows['status4'];$status5=$rows['status5'];$status6=$rows['status6'];

					if(($status1=="Active" and $role1==$role)or($status2=="Active" and $role2==$role)or($status3=="Active" and $role3==$role)or($status4=="Active" and $role4==$role)or($status5=="Active" and $role5==$role)or($status6=="Active" and $role6==$role))
					{
								?>
									<a href="view_project.php">
											<span class="sub-item">View Project</span>
										</a>
										<?php }else { } ?>
										</li>
					
								</ul>
							</div> 
						</li>
					<?php } else {} ?>
					
					
						<!--------- Plots  ------>
					
						<?php 
				if(($role=='Admin' or $role=='HR' or $role=='SM' or $role=='ASM' or $role=='MM' or $role=='TC'))
					{
				if(($active=="add_plots") or ($active=="view_plots")){
			  echo '<li class="nav-item active">';
						}
						else {
							echo '<li class="nav-item ">';
						}
						$sql = mysqli_query($conn,"SELECT * FROM menu WHERE ((role1='$role' or role2='$role' or role3='$role' or role4='$role' or role5='$role' or role6='$role') and (menu='plots'))");
			  $rows = mysqli_fetch_assoc($sql);
$menu=$rows['menu'];
$role1=$rows['role1'];$role2=$rows['role2'];$role3=$rows['role3'];$role4=$rows['role4'];$role5=$rows['role5'];$role6=$rows['role6'];
$status1=$rows['status1'];$status2=$rows['status2'];$status3=$rows['status3'];$status4=$rows['status4'];$status5=$rows['status5'];$status6=$rows['status6'];

					if(($status1=="Active" and $role1==$role)or($status2=="Active" and $role2==$role)or($status3=="Active" and $role3==$role)or($status4=="Active" and $role4==$role)or($status5=="Active" and $role5==$role)or($status6=="Active" and $role6==$role))
					{
			  ?>
			  						
							<a data-toggle="collapse" href="#projs">
								<i class="fas fa-lock"></i>
								<p>Plots</p>
								<span class="caret"></span>
							</a>
							<?php 
					}else {}
							if(($active=="add_plots") or ($active=="view_plots")){
									echo '<div class="collapse show" id="projs">';
							}else{
								echo '<div class="collapse" id="projs">';
							}
								?>
							
								<ul class="nav nav-collapse">
							
									<?php if($active=="view_plots"){
									echo '<li class="active">';
								}else{
										echo '<li>';
									}
												$sql = mysqli_query($conn,"SELECT * FROM menu WHERE ((role1='$role' or role2='$role' or role3='$role' or role4='$role' or role5='$role' or role6='$role') and (menu='view_plots'))");
			  $rows = mysqli_fetch_assoc($sql);
$menu=$rows['menu'];
$role1=$rows['role1'];$role2=$rows['role2'];$role3=$rows['role3'];$role4=$rows['role4'];$role5=$rows['role5'];$role6=$rows['role6'];
$status1=$rows['status1'];$status2=$rows['status2'];$status3=$rows['status3'];$status4=$rows['status4'];$status5=$rows['status5'];$status6=$rows['status6'];

					if(($status1=="Active" and $role1==$role)or($status2=="Active" and $role2==$role)or($status3=="Active" and $role3==$role)or($status4=="Active" and $role4==$role)or($status5=="Active" and $role5==$role)or($status6=="Active" and $role6==$role))
					{
								?>
									<a href="view_plots.php">
											<span class="sub-item">View Plots</span>
										</a>
										<?php }else { } ?>
										</li>
					
								</ul>
							</div> 
						</li>
					<?php } else {} ?>
					
					
					
					
					
					<!--------- Registration  ------>
					
				<?php 
				if(($role=='Admin' or $role=='HR' or $role=='SM' or $role=='ASM' or $role=='MM' or $role=='TC'))
					{
				if(($active=="add_registration") or ($active=="view_registration")){
			  echo '<li class="nav-item active">';
						}
						else {
							echo '<li class="nav-item ">';
						}
						$sql = mysqli_query($conn,"SELECT * FROM menu WHERE ((role1='$role' or role2='$role' or role3='$role' or role4='$role' or role5='$role' or role6='$role') and (menu='registration'))");
			  $rows = mysqli_fetch_assoc($sql);
$menu=$rows['menu'];
$role1=$rows['role1'];$role2=$rows['role2'];$role3=$rows['role3'];$role4=$rows['role4'];$role5=$rows['role5'];$role6=$rows['role6'];
$status1=$rows['status1'];$status2=$rows['status2'];$status3=$rows['status3'];$status4=$rows['status4'];$status5=$rows['status5'];$status6=$rows['status6'];

					if(($status1=="Active" and $role1==$role)or($status2=="Active" and $role2==$role)or($status3=="Active" and $role3==$role)or($status4=="Active" and $role4==$role)or($status5=="Active" and $role5==$role)or($status6=="Active" and $role6==$role))
					{
			  ?>
			  						
							<a data-toggle="collapse" href="#reg">
								<i class="fas fa-layer-group"></i>
								<p>Registration</p>
								<span class="caret"></span>
							</a>
							<?php 
					}else {}
							if(($active=="add_registration") or ($active=="view_registration")){
									echo '<div class="collapse show" id="reg">';
							}else{
								echo '<div class="collapse" id="reg">';
							}
								?>
							
								<ul class="nav nav-collapse">
								<?php if($active=="add_registration"){
									echo '<li class="active">';
								}else{
										echo '<li>';
									}
												$sql = mysqli_query($conn,"SELECT * FROM menu WHERE ((role1='$role' or role2='$role' or role3='$role' or role4='$role' or role5='$role' or role6='$role') and (menu='add_registration'))");
			  $rows = mysqli_fetch_assoc($sql);
$menu=$rows['menu'];
$role1=$rows['role1'];$role2=$rows['role2'];$role3=$rows['role3'];$role4=$rows['role4'];$role5=$rows['role5'];$role6=$rows['role6'];
$status1=$rows['status1'];$status2=$rows['status2'];$status3=$rows['status3'];$status4=$rows['status4'];$status5=$rows['status6'];$status5=$rows['status6'];

					if(($status1=="Active" and $role1==$role)or($status2=="Active" and $role2==$role)or($status3=="Active" and $role3==$role)or($status4=="Active" and $role4==$role)or($status5=="Active" and $role5==$role)or($status6=="Active" and $role6==$role))
					{
								?>
									
										<a href="add_registration.php">
											<span class="sub-item">Add Registration</span>
										</a>
					<?php }else { } ?>
									</li>
									<?php if($active=="view_registration"){
									echo '<li class="active">';
								}else{
										echo '<li>';
									}
												$sql = mysqli_query($conn,"SELECT * FROM menu WHERE ((role1='$role' or role2='$role' or role3='$role' or role4='$role' or role5='$role' or role6='$role') and (menu='view_registration'))");
			  $rows = mysqli_fetch_assoc($sql);
$menu=$rows['menu'];
$role1=$rows['role1'];$role2=$rows['role2'];$role3=$rows['role3'];$role4=$rows['role4'];$role5=$rows['role5'];$role6=$rows['role6'];
$status1=$rows['status1'];$status2=$rows['status2'];$status3=$rows['status3'];$status4=$rows['status4'];$status5=$rows['status5'];$status6=$rows['status6'];

					if(($status1=="Active" and $role1==$role)or($status2=="Active" and $role2==$role)or($status3=="Active" and $role3==$role)or($status4=="Active" and $role4==$role)or($status5=="Active" and $role5==$role)or($status6=="Active" and $role6==$role))
					{
								?>
									<a href="view_registration.php">
											<span class="sub-item">View Registration</span>
										</a>
										<?php }else { } ?>
										</li>
					
								</ul>
							</div> 
						</li>
					<?php } else {} ?>
					
										<!--------- Reports  ------>	
				<?php 
				if(($role=='Admin' or $role=='HR' or $role=='SM' or $role=='ASM' or $role=='MM' or $role=='TC'))
					{
				if(($active=="view_report") or ($active=="view_plots_report") or ($active=="view_daily_report") or ($active=="view_weekly_report")){
			  echo '<li class="nav-item active">';
						}
						else {
							echo '<li class="nav-item ">';
						}
						$sql = mysqli_query($conn,"SELECT * FROM menu WHERE ((role1='$role' or role2='$role' or role3='$role' or role4='$role' or role5='$role' or role6='$role') and (menu='Report'))");
			  $rows = mysqli_fetch_assoc($sql);
$menu=$rows['menu'];
$role1=$rows['role1'];$role2=$rows['role2'];$role3=$rows['role3'];$role4=$rows['role4'];$role5=$rows['role5'];$role6=$rows['role6'];
$status1=$rows['status1'];$status2=$rows['status2'];$status3=$rows['status3'];$status4=$rows['status4'];$status5=$rows['status5'];$status6=$rows['status6'];

					if(($status1=="Active" and $role1==$role)or($status2=="Active" and $role2==$role)or($status3=="Active" and $role3==$role)or($status4=="Active" and $role4==$role)or($status5=="Active" and $role5==$role)or($status6=="Active" and $role6==$role))
					{
			  ?>
			  						
							<a data-toggle="collapse" href="#rep">
								<i class="fas fa-edit"></i>
								<p>Report</p>
								<span class="caret"></span>
							</a>
							<?php 
					}else {}
							if(($active=="view_report") or ($active=="view_plots_report")or ($active=="view_daily_report")or ($active=="view_weekly_report")or ($active=="view_emp_daily_report")){
									echo '<div class="collapse show" id="rep">';
							}else{
								echo '<div class="collapse" id="rep">';
							}
								?>
							
								<ul class="nav nav-collapse">
								<?php if($active=="view_report"){
									echo '<li class="active">';
								}else{
										echo '<li>';
									}
												$sql = mysqli_query($conn,"SELECT * FROM menu WHERE ((role1='$role' or role2='$role' or role3='$role' or role4='$role' or role5='$role' or role6='$role') and (menu='view_report'))");
			  $rows = mysqli_fetch_assoc($sql);
$menu=$rows['menu'];
$role1=$rows['role1'];$role2=$rows['role2'];$role3=$rows['role3'];$role4=$rows['role4'];$role5=$rows['role5'];$role6=$rows['role6'];
$status1=$rows['status1'];$status2=$rows['status2'];$status3=$rows['status3'];$status4=$rows['status4'];$status5=$rows['status5'];$status6=$rows['status6'];

					if(($status1=="Active" and $role1==$role)or($status2=="Active" and $role2==$role)or($status3=="Active" and $role3==$role)or($status4=="Active" and $role4==$role)or($status5=="Active" and $role5==$role)or($status6=="Active" and $role6==$role))
					{
								?>
									
										<a href="view_report.php">
											<span class="sub-item">View Report</span>
										</a>
					<?php }else { } ?>
									</li>
									
										<?php if($active=="view_plots_report"){
									echo '<li class="active">';
								}else{
										echo '<li>';
									}
												$sql = mysqli_query($conn,"SELECT * FROM menu WHERE ((role1='$role' or role2='$role' or role3='$role' or role4='$role' or role5='$role' or role6='$role') and (menu='view_plots_report'))");
			  $rows = mysqli_fetch_assoc($sql);
$menu=$rows['menu'];
$role1=$rows['role1'];$role2=$rows['role2'];$role3=$rows['role3'];$role4=$rows['role4'];$role5=$rows['role5'];$role6=$rows['role6'];
$status1=$rows['status1'];$status2=$rows['status2'];$status3=$rows['status3'];$status4=$rows['status4'];$status5=$rows['status5'];$status6=$rows['status6'];

					if(($status1=="Active" and $role1==$role)or($status2=="Active" and $role2==$role)or($status3=="Active" and $role3==$role)or($status4=="Active" and $role4==$role)or($status5=="Active" and $role5==$role)or($status6=="Active" and $role6==$role))
					{
								?>
									
										<a href="view_plots_report.php">
											<span class="sub-item">View Plots Report</span>
										</a>
					<?php }else { } ?>
									</li>
									
									<?php if($active=="view_daily_report"){
									echo '<li class="active">';
								}else{
										echo '<li>';
									}
												$sql = mysqli_query($conn,"SELECT * FROM menu WHERE ((role1='$role' or role2='$role' or role3='$role' or role4='$role' or role5='$role' or role6='$role') and (menu='view_daily_report'))");
			  $rows = mysqli_fetch_assoc($sql);
$menu=$rows['menu'];
$role1=$rows['role1'];$role2=$rows['role2'];$role3=$rows['role3'];$role4=$rows['role4'];$role5=$rows['role5'];
$status1=$rows['status1'];$status2=$rows['status2'];$status3=$rows['status3'];$status4=$rows['status4'];$status5=$rows['status5'];$status6=$rows['status6'];

					if(($status1=="Active" and $role1==$role)or($status2=="Active" and $role2==$role)or($status3=="Active" and $role3==$role)or($status4=="Active" and $role4==$role)or($status5=="Active" and $role5==$role)or($status6=="Active" and $role6==$role))
					{
								?>
									<a href="view_daily_report.php">
											<span class="sub-item">View Daily Report</span>
										</a>
										<?php }else { } ?>
										</li>
										
										<?php if($active=="view_weekly_report"){
									echo '<li class="active">';
								}else{
										echo '<li>';
									}
												$sql = mysqli_query($conn,"SELECT * FROM menu WHERE ((role1='$role' or role2='$role' or role3='$role' or role4='$role' or role5='$role' or role6='$role') and (menu='view_weekly_report'))");
			  $rows = mysqli_fetch_assoc($sql);
$menu=$rows['menu'];
$role1=$rows['role1'];$role2=$rows['role2'];$role3=$rows['role3'];$role4=$rows['role4'];$role5=$rows['role5'];$role6=$rows['role6'];
$status1=$rows['status1'];$status2=$rows['status2'];$status3=$rows['status3'];$status4=$rows['status4'];$status5=$rows['status5'];$status6=$rows['status6'];

					if(($status1=="Active" and $role1==$role)or($status2=="Active" and $role2==$role)or($status3=="Active" and $role3==$role)or($status4=="Active" and $role4==$role)or($status5=="Active" and $role5==$role)or($status6=="Active" and $role6==$role))
					{
								?>
									<a href="view_weekly_report.php">
											<span class="sub-item">View weekly Report</span>
										</a>
										<?php }else { } ?>
										</li>
										
										<?php if($active=="view_emp_daily_report"){
									echo '<li class="active">';
								}else{
										echo '<li>';
									}
												$sql = mysqli_query($conn,"SELECT * FROM menu WHERE ((role1='$role' or role2='$role' or role3='$role' or role4='$role' or role5='$role' or role6='$role') and (menu='view_emp_daily_report'))");
			  $rows = mysqli_fetch_assoc($sql);
$menu=$rows['menu'];
$role1=$rows['role1'];$role2=$rows['role2'];$role3=$rows['role3'];$role4=$rows['role4'];$role5=$rows['role5'];$role6=$rows['role6'];
$status1=$rows['status1'];$status2=$rows['status2'];$status3=$rows['status3'];$status4=$rows['status4'];$status5=$rows['status5'];$status6=$rows['status6'];

					if(($status1=="Active" and $role1==$role)or($status2=="Active" and $role2==$role)or($status3=="Active" and $role3==$role)or($status4=="Active" and $role4==$role)or($status5=="Active" and $role5==$role)or($status6=="Active" and $role6==$role))
					{
								?>
									<a href="view_emp_daily_report.php">
											<span class="sub-item">View Employee Daily Report</span>
										</a>
										<?php }else { } ?>
										</li>
					
								</ul>
							</div> 
						</li>
					<?php } else {} ?>
					
						
						
						<li class="mx-4 mt-2">
							<a href="#" class="btn btn-primary btn-block"><span class="btn-label mr-2"> <i class="fa fa-heart"></i> </span>Other</a> 
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->
<?php }

function footertemplate(){
?>
<?php } 

function footertemplates(){?>

<?php }

/*
 * Function to convert a number into readable Currency
 *
 * @param string $n   			The number
 * @param string $n_decimals	The decimal position
 * @return string           	The formatted Currency Amount
 *
 * Returns string type, rounded number - same as php number_format()):
 *
 * Examples:
 *		format_amount(54.377, 2) 	returns 54.38
 *		format_amount(54.004, 2) 	returns 54.00
 *		format_amount(54.377, 3) 	returns 54.377
 *		format_amount(54.00007, 3) 	returns 54.000
 */
function format_amount($n, $n_decimals) {
	return ((floor($n) == round($n, $n_decimals)) ? number_format($n).'.00' : number_format($n, $n_decimals));
}

/*
 * Function to Encrypt user sensitive data for storing in the database
 *
 * @param string	$value		The text to be encrypted
 * @param 			$encodeKey	The Key to use in the encryption
 * @return						The encrypted text
 */
function encryptIt($value) {
	// The encodeKey MUST match the decodeKey
	$encodeKey = 'd9eHUepkbO,@Yt7&a%cQ8/@t$r';
	$encoded = md5($value);
	return($encoded);
}

/*
 * Function to decrypt user sensitive data for displaying to the user
 *
 * @param string	$value		The text to be decrypted
 * @param 			$decodeKey	The Key to use for decryption
 * @return						The decrypted text
 */
function decryptIt($value) {
	// The decodeKey MUST match the encodeKey
	$decodeKey = 'd9eHUepkbO,@Yt7&a%cQ8/@t$r';
	$decoded = md5($value);
	return($decoded);
}

function month_diff_with_days($date1){ 

	date_default_timezone_set('Asia/Calcutta');
	$date = date('Y-m-d');
	
	$year1 = date('Y', strtotime($date1));
	$year2 = date('Y', strtotime($date));

	$month1 = date('m', strtotime($date1));
	$month2 = date('m', strtotime($date));

	$day1 = date('d', strtotime($date1)); /* I'VE ADDED THE DAY VARIABLE OF DATE1 AND DATE2 */
	$day2 = date('d', strtotime($date));

	$diff = (($year2 - $year1) * 12) + ($month2 - $month1);
	/* IF THE DAY2 IS LESS THAN DAY1, IT WILL LESSEN THE $diff VALUE BY ONE */

	if($day2<$day1){ $diff=$diff-1; }
	return($diff);
}
?>