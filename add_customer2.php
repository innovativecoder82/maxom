<?php
error_reporting(0);
include('templates/session.php');
include('templates/functions.php');


$page=$_GET['page'];
$emp_idsess = $_SESSION['admin'];
$emp_idro = $_SESSION['role'];
extract($_POST);
if(isset($submit)){
	date_default_timezone_set('Asia/Calcutta');
	$date = date('Y-m-d');
	$time = date('h:i sa');
	//$query = mysqli_query($conn,"INSERT INTO customer_details (cust_name, cell_no, project_interest, cust_interest, cust_looking_for, occupation, fund_option, take_home_rs, pay_advance_rs, it_two_years, budget, office_address, residence_address, mail_id, rating, purchase_option) VALUES('$cust_name','$cell_no','$project_interest','$cust_interest','$cust_looking_for','$occupation','$fund_option','$take_home_rs','$pay_advance_rs','$it_two_years','$budget','$office_address','$residence_address','$mail_id','$rating','$purchase_option','$date')");
	$query = mysqli_query($conn,"INSERT INTO customer_details VALUES('','$emp_name','$emp_id','$select_one','$other_notes','$cus_meeting','$cust_name','$cust_name','$cell_no','$project_interest','$cust_interest','$cust_looking_for','$occupation','$fund_option','$take_home_rs','$pay_advance_rs','$it_two_years','$budget','$office_address','$residence_address','$mail_id','$rating','$purchase_option','$date')");
	
	echo'<script>alert("Successfully Added..!");window.location.href="add_customer.php";</script>';
}
?>
<!DOCTYPE html>
<html lang="en">
      <meta charset="UTF-8">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
	  <link rel="stylesheet" href="chosen.css"/>
	  <script src="chosen.jquery.js"></script>
<?php headertemplate(); ?>
   <body>
   <div class="wrapper">
	<?php navbar('add_customer'); 
		
		?>
		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Select Existing Customer</h2>
							</div>
							
						</div>
					</div>
					
				</div>
				
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Select Old Customer</div>
								</div>
						<div class="card-body">
								 <form method="post">
									
										<div class="row">
										
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
										<div class="container" >
											<div>       
											<select data-placeholder="Select Customer Name..." onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);" class="chzn-select" style="width:350px;" tabindex="2">
											<option value=""></option> 
											<?php 
												if(($emp_idro=='Admin') or ($emp_idro=='HR')){
		
												$sql = mysqli_query($conn,"SELECT * FROM employee_details order by id asc");
												}
												else{ 
												$sql = mysqli_query($conn,"SELECT * FROM employee_details where officer='$emp_idsess' or emp_id='$emp_idsess' order by id asc");
												
												}
											
											while($rowsqq = mysqli_fetch_assoc($sql))
											{
												$empid=$rowsqq['emp_id'];
								$query2aa = mysqli_query($conn,"select * from customer_details where emp_id='$empid' order by id DESC");
							while($rowaa = mysqli_fetch_array($query2aa))
							{
											$customer_id=$rowaa['customer_id'];
											$cust_name=$rowaa['cust_name'];
											?>
											<option value="add_customer1.php?cus_id=<?php echo "$customer_id";?>&&page=<?php echo 2;?>"><?php echo "$cust_name - $customer_id";?></option>
											<?php } }?>	
											</select>
											</div>
											</div>
											</div>
										</div>
										
									</div>
									
										
									
									</div>
									</form>										

								</div>
							</div>
						</div>
					</div>
					<br/><br/><br/><br/>					
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
	

   </body>
</html>
	<!--   Core JS Files   -->
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
	
<script type="text/javascript">
   $(document).ready(function(){
		$("select").chosen({allow_single_deselect:true});
   });
</script>
</body>
</html>