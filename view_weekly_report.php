<?php
error_reporting(0);
include('templates/session.php');
include('templates/functions.php');
date_default_timezone_set('Asia/Calcutta');
	$date = date('Y-m-d');
	$time = date('h:i sa');
	$wdate_to = $date;
	$adsession = $_SESSION['admin'];
$adsessrole = $_SESSION['role'];
$wdate_to = strtotime("-7 days", strtotime($wdate_to)); //-7 days for last week. -30 for last week
$wdate_to = date("Y-m-d", $wdate_to);

if(isset($_GET['id']))
{
	$query2 = mysqli_query($conn,"delete from customer_details where id='".$_GET['id']."'");
	echo'<script>alert("Deleted successfully..!");window.location.href="view_customer.php";</script>';
}
?>



<!DOCTYPE html>
<html lang="en">

<?php headertemplate(); ?>

<body>
	<div class="wrapper">
		<?php navbar('view_weekly_report'); ?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">View Report</h4>
						<ul class="breadcrumbs">
							<li class="nav-home">
								<a href="#">
									<i class="flaticon-home"></i>
								</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Report</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">Report</a>
							</li>
						</ul>
					</div>
					
					
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th></th>
													<th>Employee Name</th>
													<th>Employee Id</th>
													<th>First Meeting Date</th>
													<th>Second Meeting Date</th>
													<th>Site Visit Date</th>
													<th>Customer Name</th>
													<th>First Meet</th>
													<th>Second Meet</th>
													<th>Site Visit</th>
													<th>Date</th>
													
												</tr>
											</thead>
											
											<tbody>
												<?php 	
		  if(($adsessrole=='Admin') or ($adsessrole=='HR')){
			  $query2 = mysqli_query($conn,"select * from customer_details  where date BETWEEN '$wdate_to' AND '$date' order by id DESC");
					
		  }else{
				$query2 = mysqli_query($conn,"select * from customer_details  where (lead_owner='$adsession' or emp_id='$adsession') and (next_action_date BETWEEN '$wdate_to' AND '$date') order by id DESC");	
		  }
					$inc=1;
					while($row = mysqli_fetch_array($query2))
					{
				?>
												<tr>
													<td><?php echo $inc; ?></td>
													<td><?php echo $row['emp_name']; ?></td>
													<td><?php echo $row['emp_id']; ?></td>
													<td><?php if($row['cust_first_meeting_date']>0){echo $row['cust_first_meeting_date'];} else { } ?></td>
													<td><?php if($row['cust_second_meeting_date']>0){echo $row['cust_second_meeting_date'];} else { } ?></td>
													<td><?php if($row['cust_sitevisit_meeting_date']>0){echo $row['cust_sitevisit_meeting_date'];} else { } ?></td>
													<td><?php echo $row['cust_name']; ?></td>
													<td><?php echo $row['first_meet_comments']; ?></td>
													<td><?php echo $row['second_meet_comments']; ?></td>
													<td><?php echo $row['sitevisit_comments']; ?></td>
													<td><?php echo $row['date']; ?></td>
													
													
												</tr>
					<?php $inc++; } ?>
												
											</tbody>
										</table>
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
		<!-- jQuery Scrollbar -->
	<script src="../../assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
	<!-- Datatables -->
	<script src="../../assets/js/plugin/datatables/datatables.min.js"></script>
	<!-- Atlantis JS -->
	<script src="../../assets/js/atlantis.min.js"></script>
	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="../../assets/js/setting-demo2.js"></script>
	<script >
		$(document).ready(function() {
			$('#basic-datatables').DataTable({
			});

			$('#multi-filter-select').DataTable( {
				"pageLength": 5,
				initComplete: function () {
					this.api().columns().every( function () {
						var column = this;
						var select = $('<select class="form-control"><option value=""></option></select>')
						.appendTo( $(column.footer()).empty() )
						.on( 'change', function () {
							var val = $.fn.dataTable.util.escapeRegex(
								$(this).val()
								);

							column
							.search( val ? '^'+val+'$' : '', true, false )
							.draw();
						} );

						column.data().unique().sort().each( function ( d, j ) {
							select.append( '<option value="'+d+'">'+d+'</option>' )
						} );
					} );
				}
			});

			// Add Row
			$('#add-row').DataTable({
				"pageLength": 5,
			});

			var action = '<td> <div class="form-button-action"> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task"> <i class="fa fa-edit"></i> </button> <button type="button" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove"> <i class="fa fa-times"></i> </button> </div> </td>';

			$('#addRowButton').click(function() {
				$('#add-row').dataTable().fnAddData([
					$("#addName").val(),
					$("#addPosition").val(),
					$("#addOffice").val(),
					action
					]);
				$('#addRowModal').modal('hide');

			});
		});
	</script>
</body>
</html>