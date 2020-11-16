<?php
error_reporting(0);
include('templates/session.php');
include('templates/functions.php');



extract($_POST);
if(isset($submit)){
	date_default_timezone_set('Asia/Calcutta');
	$date = date('Y-m-d');
	$time = date('h:i sa');
	$query = mysqli_query($conn,"INSERT INTO cust_first_meet (cust_name, residence_address, cell_no, occupation, cust_interest, invest_accomodation, proj_interest, budject, fund_option, managers_name, status, date) VALUES('$cust_name','$residence_address','$cell_no','$occupation','$cust_interest','$invest_accomodation','$proj_interest','$budject','$fund_option','$managers_name','$status','$date')");
	
	echo'<script>alert("Successfully Added..!");window.location.href="add_customer.php";</script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<?php headertemplate(); ?>

<body>
	<div class="wrapper">
		<?php navbar('add_first_meeting'); ?>

		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">First Meeting</h2>
							</div>
							<div class="ml-md-auto py-2 py-md-0">
								<a href="add_first_meeting.php" class="btn btn-secondary btn-round">Add Meeting</a>
							</div>
						</div>
					</div>
					
				</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Customer First Meeting</div>
								</div>
								<div class="card-body">
								 <form method="post">
									
										<div class="row">
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Customer Name</label>
												<input type="text" class="form-control" id="email2" name="cust_name" placeholder="Enter Name">
											</div>
										
										</div>
										<div class="col-md-6 col-lg-4">
												<div class="form-group">
												<label for="comment">Residence Address</label>
												<textarea class="form-control" id="comment" name="residence_address" rows="5"></textarea>
											</div>
											
										</div>
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Cell No</label>
												<input type="text" class="form-control" id="email2" name="cell_no" placeholder="Enter Phone No.">
											</div>
										</div>
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Occupation</label>
												<input type="text" class="form-control" id="email2" name="occupation" placeholder="">
											</div>
										</div>
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="exampleFormControlSelect1">Customer Interested</label>
												<input type="text" class="form-control" id="email2" name="cust_interest" placeholder="">
											</div>
										</div>
											
										
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Investment/Accommodation</label>
												<input type="text" class="form-control" id="email2" name="invest_accomodation" placeholder="">
											</div>
										</div>
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Project Interested</label>
												<input type="text" class="form-control" id="email2" name="proj_interest" placeholder="">
											</div>
										</div>
											<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Budget</label>
												<input type="text" class="form-control" id="email2" name="budject" placeholder="">
											</div>
										</div>
												<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Fund Option</label>
												<input type="text" class="form-control" id="email2" name="fund_option" placeholder="">
											</div>
										</div>
														<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Manager's Name</label>
												<input type="text" class="form-control" id="email2" name="managers_name" placeholder="">
											</div>
										</div>
														<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Status</label>
												<input type="text" class="form-control" id="email2" name="status" placeholder="">
											</div>
										</div>
								
										
									</div>
									<div class="row">
										<div class="col-md-6 col-lg-4">
												<div class="form-group">
												<label for="comment">Office Address</label>
												<textarea class="form-control" id="comment" name="office_address" rows="5"></textarea>
											</div>
											
										</div>
										</div>
										
									<input type="submit" value="Submit" name="submit" class="btn btn-info"/>
									<button class="btn btn-danger">Cancel</button>
								
									</div>
									</form>										

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