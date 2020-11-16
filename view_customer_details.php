<?php
error_reporting(0);
include('templates/session.php');
include('templates/functions.php');


$cus_id=$_GET['id'];
$emp_idsess = $_SESSION['admin'];

$sqla = mysqli_query($conn,"SELECT * FROM employee_details where emp_id = '$emp_idsess' order by id asc");
$rowsqqa = mysqli_fetch_assoc($sqla);
$emp_idse = $rowsqqa['emp_id'];
$emp_namese = $rowsqqa['emp_name'];

?>
<!DOCTYPE html>
<html lang="en">

<?php headertemplate(); ?>


<body>
	<div class="wrapper">
		<?php navbar('view_customer_details'); 
		
		?>
	<?php $query1= mysqli_query($conn,"SELECT * FROM customer_details where customer_id='$cus_id'order by id desc");
					$rows = mysqli_fetch_assoc($query1);
					$emp_id1= $rows['emp_id1'];
					?>
			<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Customer Details</h2>
							</div>
							<div class="ml-md-auto py-2 py-md-0">
								<a href="customerpdf.php?id=<?php echo $rows['customer_id']; ?>" class="btn btn-secondary btn-round">Export PDF</a>

							</div>
						</div>
					</div>
					
				</div>

					<div id="content" class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Customer Profile Sheet</div>
								</div>
								<div class="card-body">
								 <form method="post">
									<div class="row">
									
									
									<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Employee Name</label>
												<input type="hidden" class="form-control" id="email2" name="id" value="<?php echo $rows['id']; ?>" placeholder="Enter Name" readonly>
												<input type="text" class="form-control" id="email2" name="emp_name" value="<?php echo $rows['emp_name']; ?>" placeholder="Enter Name" readonly>
											</div>
										
										</div>
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Employee Code</label>
												<input type="text" class="form-control" id="email2" name="emp_id" value="<?php echo $rows['emp_id']; ?>" placeholder="Enter Employee id" readonly>
											</div>
										
										</div>
													<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Lead Owner</label>
												<select class="form-control" name="lead_owner" readonly>
												<option value="<?php echo $rows['lead_owner'] ?>" selected><?php echo $rows['lead_owner'] ?></option>
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
										
										</div>
										<div class="row">
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="exampleFormControlSelect1">Source</label>
												<select class="form-control" name="select_one" id="exampleFormControlSelect1" readonly>
													<option value="<?php echo $rows['select_one'] ?>" selected><?php echo $rows['select_one'] ?></option>
													<option value="DC">DC</option>
													<option value="Tele calling">Tele calling</option>
													<option value="SMS">SMS</option>
													<option value="Paper">Paper</option>
													<option value="Stall">Stall</option>
												</select>
											</div>
										</div>
												<div class="col-md-6 col-lg-4">
												<div class="form-group">
												<label for="comment">Other Notes</label>
												<textarea class="form-control"  name="other_notes" rows="5" readonly><?php echo $rows['other_notes'] ?></textarea>
											</div>
											
										</div>
										</div>
											<div class="row">
											<div class="col-md-6 col-lg-8">
											<div class="form-group">
												<label for="exampleFormControlSelect1">Customer Meeting</label>
													<div class="form-group">
												
				<label class="form-radio-label ml-3">
					
												<?php if($rows['cust_first_meeting']=='First Meeting') {?>
												<input class="form-radio-input" type="checkbox" name="cust_first_meeting" value="First Meeting" checked="checked" readonly >
												<span class="form-radio-sign">First Meeting</span>
													<?php } else{ ?>
													<input class="form-radio-input" type="checkbox" name="cust_first_meeting" value="First Meeting" >
												
												<span class="form-radio-sign">First Meeting</span>
												<?php } ?>
													
												</label>
												<label class="form-radio-label ml-3">
					
					
												<?php if($rows['cust_second_meeting']=='Second Meeting') {?>
												<input class="form-radio-input" type="checkbox" name="cust_second_meeting" value="Second Meeting" checked="checked" readonly>
												<span class="form-radio-sign">Second Meeting</span>												
												<?php } else{ ?>
										<input class="form-radio-input" type="checkbox" name="cust_second_meeting" value="Second Meeting" >		
										
													<span class="form-radio-sign">Second Meeting</span>
													<?php } ?>
												</label>
																									
													
										<label class="form-radio-label ml-3">
										<?php if($rows['cust_sitevisit_meeting']=='Site Visit') {?>
										<input class="form-radio-input" type="checkbox" name="cust_sitevisit_meeting" value="Site Visit" checked="checked" readonly >	
											<span class="form-radio-sign">Site Visit</span>
											<?php } else{ ?>
											
											<input class="form-radio-input" type="checkbox" name="cust_sitevisit_meeting" value="Site Visit" >	
											
											<span class="form-radio-sign">Site Visit</span>
											<?php } ?>	
													
												</label>
												
											</div>
											</div>
										</div>
										</div>
										<div class="row">
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
											
												<label for="email2">First Meeting Date</label>
												<?php date_default_timezone_set('Asia/Calcutta');
												$date = date('Y-m-d');
												$time = date('h:i sa');
													if($rows['cust_first_meeting_date']>0){
												?>
												<input type="date" class="form-control" id="email2" name="cust_first_meeting_date" value="<?php echo $rows['cust_first_meeting_date']; ?>" placeholder="Enter Name" readonly>
													<?php }else{ ?>
													<input type="date" class="form-control" id="email2" name="cust_first_meeting_date" value="<?php echo $date; ?>" readonly>
													<?php } ?>
											</div>
										
										</div>
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
											
												<label for="email2">Second Meeting Date</label>
												<?php date_default_timezone_set('Asia/Calcutta');
												$date = date('Y-m-d');
												$time = date('h:i sa');
													if($rows['cust_second_meeting_date']>0){
												?>
												<input type="date" class="form-control" id="email2" name="cust_second_meeting_date" value="<?php echo $rows['cust_second_meeting_date']; ?>" placeholder="Enter Name" readonly>
													<?php }else{ ?>
													<input type="date" class="form-control" id="email2" name="cust_second_meeting_date"  readonly>
													<?php } ?>
													</div>
										
										</div>
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
											
												<label for="email2">Site Visit Date</label>
													<?php date_default_timezone_set('Asia/Calcutta');
												$date = date('Y-m-d');
												$time = date('h:i sa');
													if($rows['cust_sitevisit_meeting_date']>0){
												?>
												<input type="date" class="form-control" id="email2" name="cust_sitevisit_meeting_date" value="<?php echo $rows['cust_sitevisit_meeting_date']; ?>" placeholder="Enter Name" readonly>
													<?php }else{ ?>
													<input type="date" class="form-control" id="email2" name="cust_sitevisit_meeting_date"  readonly>
													<?php } ?></div>
										
										</div>
										</div>
										<div class="row">
										<div class="col-md-6 col-lg-4">
				
											<div class="form-group">
												<label for="email2">Customer Id</label>
												<input type="text" class="form-control" name="customer_id" Value="<?php echo $rows['customer_id'] ?>" readonly >
												</div>
												</div>
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Customer Name</label>
												<input type="text" class="form-control" id="email2" name="cust_name" value="<?php echo $rows['cust_name'] ?>"placeholder="Enter Name" readonly>
											</div>
										
										</div>
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Mobile Number</label>
												<input type="text" class="form-control" id="email2" name="cell_no" value="<?php echo $rows['cell_no'] ?>"placeholder="Enter Phone No." readonly>
											</div>
										</div>
											<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Project Interested</label>
												<select class="form-control" name="project_interest" readonly>
												<option value="<?php echo $rows['project_interest'] ?>" Selected><?php echo $rows['project_interest'] ?></option>
												<?php $sql = mysqli_query($conn,"SELECT * FROM project_details order by id asc");
												while($rowsqq = mysqli_fetch_assoc($sql))
													{
														$project_id=$rowsqq['project_id'];
														$project_name=$rowsqq['project_name'];
												?>
													<option value="<?php echo "$project_name";?>"><?php echo "$project_name";?></option>
													<?php } ?>	
												</select>
											</div>
										</div>
									<!--	<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="exampleFormControlSelect1">Customer Interested</label>
												<select class="form-control" name="cust_interest" id="exampleFormControlSelect1" readonly>
													<option value="<?php echo $rows['cust_interest'] ?>" selected><?php echo $rows['cust_interest'] ?></option>
													<option value="plots">Plots</option>
													<option value="Apartment">Apartment</option>
													<option value="Villa">Villa</option>
												</select>
											</div>
										</div>
											<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="exampleFormControlSelect1">Customer Looking For</label>
												<select class="form-control" name="cust_looking_for" id="exampleFormControlSelect1" readonly>
												<option value="<?php echo $rows['cust_looking_for'] ?>" selected><?php echo $rows['cust_looking_for'] ?></option>
													<option value="Accommodation">Accommodation</option>
													<option value="Investment">Investment</option>
												</select>
											</div>
										</div>
										-->
											<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="exampleFormControlSelect1">Occupation</label>
												<select class="form-control" name="occupation" id="exampleFormControlSelect1" readonly>
												<option value="<?php echo $rows['occupation'] ?>" selected><?php echo $rows['occupation'] ?></option>
													<option value="Employed">Employed</option>
													<option value="Self Employed">Self Employed</option>
												</select>
											</div>
										</div>
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="exampleFormControlSelect1">Funding Option</label>
												<select class="form-control" name="fund_option" id="exampleFormControlSelect1" readonly>
												<option value="<?php echo $rows['fund_option'] ?>" selected><?php echo $rows['fund_option'] ?></option>
													<option value="Loan">Loan</option>
													<option value="Own Fund">Own Fund</option>
												</select>
											</div>
										</div>
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Take Home Rs.</label>
												<input type="text" class="form-control" id="email2" name="take_home_rs" value="<?php echo $rows['take_home_rs'] ?>" placeholder="" readonly>
											</div>
										</div>
									
											<div class="col-md-6 col-lg-4">
										
											<div class="form-group">
												<label for="email2">Budget</label>
												<input type="text" class="form-control" id="email2" name="budget" value="<?php echo $rows['budget'] ?>"placeholder="" readonly>
											</div>
											
										</div>
														<div class="col-md-6 col-lg-4">
												<div class="form-group">
												<label for="comment">Residence Address</label>
												<textarea class="form-control" id="comment" name="residence_address" rows="5" readonly><?php echo $rows['residence_address'] ?></textarea>
											</div>
											
										</div>
											<div class="col-md-6 col-lg-4">
											<div class="form-group">
											<label for="email2">Mail id</label>
												<input type="text" class="form-control" id="email2" name="mail_id" value="<?php echo $rows['mail_id'] ?>" placeholder="" readonly>
											</div>
											
										</div>
										</div>
									
										<div class="row">
												<div class="col-md-6 col-lg-4">
												<div class="form-group">
												<label for="comment">First Meeting Comments</label>
												<?php if($rows['first_meet_comments']!=''){ ?>
												<textarea class="form-control"  name="first_meet_comments" rows="5" readonly><?php echo $rows['first_meet_comments']; ?></textarea>
												<?php }else{?>
												<textarea class="form-control"  name="first_meet_comments" rows="5" readonly></textarea>
												
												<?php } ?>
											</div>
										</div>
												<div class="col-md-6 col-lg-4">
												<div class="form-group">
												<label for="comment">Second Meeting Comments</label>
												<?php if($rows['second_meet_comments']!=''){ ?>
												<textarea class="form-control"  name="second_meet_comments" rows="5" readonly><?php echo $rows['second_meet_comments']; ?></textarea>
												<?php }else{?>
												<textarea class="form-control"  name="second_meet_comments" rows="5" readonly></textarea>
												
												<?php } ?>
											</div>
										</div>
												<div class="col-md-6 col-lg-4">
												<div class="form-group">
												<label for="comment">Site Visit Comments</label>
												<?php if($rows['sitevisit_comments']!=''){ ?>
												<textarea class="form-control"  name="sitevisit_comments" rows="5" readonly><?php echo $rows['sitevisit_comments']; ?></textarea>
												<?php }else{?>
												<textarea class="form-control"  name="sitevisit_comments" rows="5" readonly></textarea>
												
												<?php } ?>
											</div>
										</div>
										</div>
										<div class="row">
											<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Next Action</label>
												<select class="form-control" name="next_action" id="exampleFormControlSelect1" readonly>
													<option value="<?php echo $rows['next_action'] ?>" selected><?php echo $rows['next_action'] ?></option>
													<option value="Second Meeting">Second Meeting</option>
													<option value="Site Visiting">Site Visiting</option>
													<option value="Negotiable">Negotiable</option>
													<option value="Booked">Booked</option>
													<option value="Not Interest">Not Interest</option>
												</select>
											</div>
											
										</div>
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
											<label for="email2">Next Action Date</label>
												<input type="date" class="form-control" id="email2" name="next_action_date" value="<?php echo $rows['next_action_date']; ?>" placeholder="" readonly>
											</div>
											
										</div>
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
						<div id="editor"></div>

					</div>				
				</div>
			</footer>
		</div>
		

	</div>
	

		</div>
<script>

var doc = new jsPDF();
var specialElementHandlers = {
    '#editor': function (element, renderer) {
        return true;
    }
};

$('#cmd').click(function () {
    doc.fromHTML($('#content').html(), 15, 15, {
        'width': 170,
            'elementHandlers': specialElementHandlers
    });
    doc.save('sample-file.pdf');
});

</script>
<!-- partial -->
		  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.2.61/jspdf.min.js'></script><script  src="./script.js"></script>

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