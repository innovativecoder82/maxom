<?php
error_reporting(0);
include('templates/session.php');
include('templates/functions.php');
date_default_timezone_set('Asia/Calcutta');
	$date = date('Y-m-d');
	$time = date('h:i sa');
	$adsession = $_SESSION['admin'];
	$adsessrole = $_SESSION['role'];
?>

<!DOCTYPE html>
<html lang="en">

<?php headertemplate(); ?>
<body>
	<div class="wrapper">
<?php navbar('dashboard'); ?>

		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Dashboard</h2>
								<h5 class="text-white op-7 mb-2">Company Details</h5>
							</div>
							<div class="ml-md-auto py-2 py-md-0">
								<a href="add_customer.php" class="btn btn-secondary btn-round">Add Customer</a>
							</div>
						</div>
					</div>
				</div>
				<div class="page-inner mt--5">
					<div class="row mt--2">
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Daily Report</div>
									
									<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-1"></div>
											<a href="view_daily_report.php" class="btn btn-secondary ">Daily Report</a>
															<?php 	
		 if(($adsessrole=='Admin') or ($adsessrole=='HR')){
					$query2 = mysqli_query($conn,"select * from customer_details where date='$date' order by id DESC");
		 }else{
					$query2 = mysqli_query($conn,"select * from customer_details where emp_id='$adsession' and date='$date' order by id DESC");
		 }
					$inc=0;
					while($row = mysqli_fetch_array($query2))
					{
						$cuid=$row['customer_id'];
					$inc++;	
				?>
				<?php } ?>
					<a href="view_daily_report.php" class="btn btn-secondary "><?php echo $inc; ?></a>
					
					
										</div>
										
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Weekly Report</div>
																		<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-1"></div>
												<a href="view_weekly_report.php" class="btn btn-secondary ">Weekly Report</a>
<?php 	
		  if(($adsessrole=='Admin') or ($adsessrole=='HR')){
			  $query2 = mysqli_query($conn,"select * from customer_details  where date BETWEEN '$wdate_to' AND '$date' order by id DESC");
					
		  }else{
				$query2 = mysqli_query($conn,"select * from customer_details  where emp_id='$adsession' and (date BETWEEN '$wdate_to' AND '$date') order by id DESC");	
		  }
					$inc=0;
					while($row = mysqli_fetch_array($query2))
					{
						$inc++;	
				?>
				<?php } ?>
				<a href="view_weekly_report.php" class="btn btn-secondary "><?php echo $inc; ?></a>

										</div>
										
									</div>
										</div>
									</div>
								</div>
									<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Monthly Report</div>
																		<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-1"></div>
												<a href="view_report.php" class="btn btn-secondary ">Monthly Report</a>
	<!----										
<?php $query2 = mysqli_query($conn,"select * from customer_details WHERE MONTH(date)");
					
					while($row = mysqli_fetch_array($query2))
					{
						$takehome=$row['take_home_rs'];
						 echo $takehome; 
						
					}						?>
											
--->
										</div>
										
									</div>
										</div>
									</div>
								</div>
										<div class="col-md-6">
							<div class="card full-height">
								<div class="card-body">
									<div class="card-title">Customer Report</div>
																		<div class="d-flex flex-wrap justify-content-around pb-2 pt-4">
										<div class="px-2 pb-2 pb-md-0 text-center">
											<div id="circles-1"></div>
												<a href="view_customer.php" class="btn btn-secondary ">Customer Report</a>
	<!----										
<?php $query2 = mysqli_query($conn,"select * from customer_details WHERE MONTH(date)");
					
					while($row = mysqli_fetch_array($query2))
					{
						$takehome=$row['take_home_rs'];
						 echo $takehome; 
						
					}						?>
											
--->
										</div>
										
									</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
			
					</nav>
					<div class="copyright ml-auto">
						Developed by <a href="#">Maxom</a>
					</div>				
				</div>
			</footer>
		</div>
		

	</div>
	<!--   Core JS Files   -->
	<script src="assets/js/core/jquery.3.2.1.min.js"></script>
	<script src="assets/js/core/popper.min.js"></script>
	<script src="assets/js/core/bootstrap.min.js"></script>

	<!-- jQuery UI -->
	<script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
	<script src="assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>

	<!-- jQuery Scrollbar -->
	<script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>


	<!-- Chart JS -->
	<script src="assets/js/plugin/chart.js/chart.min.js"></script>

	<!-- jQuery Sparkline -->
	<script src="assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js"></script>

	<!-- Datatables -->
	<script src="assets/js/plugin/datatables/datatables.min.js"></script>

	<!-- Bootstrap Notify -->
	<script src="assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

	<!-- jQuery Vector Maps -->
	<script src="assets/js/plugin/jqvmap/jquery.vmap.min.js"></script>
	<script src="assets/js/plugin/jqvmap/maps/jquery.vmap.world.js"></script>

	
	<!-- Sweet Alert -->
	<script src="assets/js/plugin/sweetalert/sweetalert.min.js"></script>

	<!-- Atlantis JS -->
	<script src="assets/js/atlantis.min.js"></script>

	
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="assets/js/setting-demo.js"></script>
	<script src="assets/js/demo.js"></script>
	<script>
		Circles.create({
			id:'circles-1',
			radius:45,
			value:60,
			maxValue:100,
			width:7,
			text: 5,
			colors:['#f1f1f1', '#FF9E27'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-2',
			radius:45,
			value:70,
			maxValue:100,
			width:7,
			text: 36,
			colors:['#f1f1f1', '#2BB930'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		Circles.create({
			id:'circles-3',
			radius:45,
			value:40,
			maxValue:100,
			width:7,
			text: 12,
			colors:['#f1f1f1', '#F25961'],
			duration:400,
			wrpClass:'circles-wrp',
			textClass:'circles-text',
			styleWrapper:true,
			styleText:true
		})

		var totalIncomeChart = document.getElementById('totalIncomeChart').getContext('2d');

		var mytotalIncomeChart = new Chart(totalIncomeChart, {
			type: 'bar',
			data: {
				labels: ["S", "M", "T", "W", "T", "F", "S", "S", "M", "T"],
				datasets : [{
					label: "Total Income",
					backgroundColor: '#ff9e27',
					borderColor: 'rgb(23, 125, 255)',
					data: [6, 4, 9, 5, 4, 6, 4, 3, 8, 10],
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				legend: {
					display: false,
				},
				scales: {
					yAxes: [{
						ticks: {
							display: false //this will remove only the label
						},
						gridLines : {
							drawBorder: false,
							display : false
						}
					}],
					xAxes : [ {
						gridLines : {
							drawBorder: false,
							display : false
						}
					}]
				},
			}
		});

		$('#lineChart').sparkline([105,103,123,100,95,105,115], {
			type: 'line',
			height: '70',
			width: '100%',
			lineWidth: '2',
			lineColor: '#ffa534',
			fillColor: 'rgba(255, 165, 52, .14)'
		});
	</script>
</body>
</html>