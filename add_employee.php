<?php
error_reporting(0);
include('templates/session.php');
include('templates/functions.php');



extract($_POST);
if(isset($submit)){
	date_default_timezone_set('Asia/Calcutta');
	$date = date('Y-m-d');
	$time = date('h:i sa');
	$emp_password1 = encryptIt($emp_password);
	$sql = mysqli_query($conn,"SELECT * FROM add_employee where emp_id='$emp_id' order by id asc");
	if($rowsqq = mysqli_fetch_row($sql)>0)
	{
		echo'<script>alert("Employee ID Already Exist..!");window.location.href="add_employee.php";</script>';
	}else{
	$query = mysqli_query($conn,"INSERT INTO employee_details (emp_id, emp_id1, emp_name, emp_cell_no, emp_job_role, officer, emp_password, date) VALUES('$emp_id','$emp_id1','$emp_name','$emp_cell_no','$emp_job_role','$officer','$emp_password1','$date')");
	$query = mysqli_query($conn,"INSERT INTO admin (username, password, firstname, role, created_on) VALUES('$emp_id','$emp_password1','$emp_name','$emp_job_role','$date')");
	//$query = mysqli_query($conn,"INSERT INTO customer_details VALUES('','$cust_name','$cell_no','$project_interest','$cust_interest','$cust_looking_for','$occupation','$fund_option','$take_home_rs','$pay_advance_rs','$it_two_years','$budget','$office_address','$residence_address','$mail_id','$rating','$purchase_option','$date')");
	
	echo'<script>alert("Successfully Added..!");window.location.href="add_employee.php";</script>';
}
}
?>
<!DOCTYPE html>
<html lang="en">

<?php headertemplate(); ?>

<body>
	<div class="wrapper">
		<?php navbar('add_employee'); ?>

		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Add Employee</h2>
							</div>
							<div class="ml-md-auto py-2 py-md-0">
								<a href="add_employee.php" class="btn btn-secondary btn-round">Add Employee</a>
							</div>
						</div>
					</div>
					
				</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Add New Employee</div>
								</div>
								<div class="card-body">
								 <form method="post">
									<div class="row">
										<div class="col-md-6 col-lg-4">
										<?php
					$query1= mysqli_query($conn,"SELECT * FROM employee_details ORDER BY `id` DESC");
					$rows = mysqli_fetch_assoc($query1);
					$emp_id1= $rows['id'];
					$emp_id=$emp_id1+1;
				  ?>
											<div class="form-group">
												<label for="email2">Employee Code</label>
												<input type="text" class="form-control" name="emp_id" Value="<?php  printf("PHP%03d", $emp_id);?>" placeholder="Enter Name" readonly>
												<input type="hidden" class="form-control" name="emp_id1" value="<?php echo $emp_id;?>" placeholder="Enter Name">
											</div>
										
										</div>

										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Employee Name</label>
												<input type="text" class="form-control" id="email2" name="emp_name" placeholder="Enter Name" required>
											</div>
										
										</div>
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Cell No</label>
												<input type="text" class="form-control" id="email2" name="emp_cell_no" placeholder="Enter Phone No.">
											</div>
										</div>
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Reporting Name</label>
												<select class="form-control" name="officer" >
												<option value="" >Select Reporter Name</option>
												<?php $sql = mysqli_query($conn,"SELECT * FROM employee_details order by id asc");
												while($rowsqq = mysqli_fetch_assoc($sql))
													{
														$emp_id=$rowsqq['emp_id'];
														$emp_name=$rowsqq['emp_name'];
												?>
													<option value="<?php echo "$emp_id";?>"><?php echo "$emp_id - $emp_name";?></option>
													<?php } ?>	
												</select>
												
											</div>
										</div>
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="exampleFormControlSelect1">Job Role</label>
												<select class="form-control" name="emp_job_role" id="exampleFormControlSelect1">
													<option value="">Select Role</option>
				  <option value="Admin">Admin</option>
				  <option value="HR">HR</option>
				  <option value="SM">SM</option>
				  <option value="ASM">ASM</option>
				  <option value="MM">MM</option>
				  <option value="TC">TC</option>
												</select>
											</div>
										</div>
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Employee Password</label>
												<input type="text" class="form-control" id="email2" name="emp_password" placeholder="Enter Employee Password.">
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