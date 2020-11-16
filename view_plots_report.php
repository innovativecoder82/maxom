<?php
error_reporting(0);
include('templates/session.php');
include('templates/functions.php');
$adsession = $_SESSION['admin'];
$adsessrole = $_SESSION['role'];

date_default_timezone_set('Asia/Calcutta');
	$date = date('Y-m-d');
	$time = date('h:i sa');
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
		<?php navbar('view_plots_report'); ?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">View Plots Report</h4>
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
								<a href="view_report.php">View Plots Report</a>
							</li>
						</ul>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
								
									<div class="btn-group pull-right">
		<button class="btn btn-danger" onClick ="$('#basic-datatables').tableExport({type:'excel',escape:'false'});"><i class="fa fa-bars"></i> Export Data</button>
	  </div>
									<div class="row">
									<form role="form" method="post">
									<div class="table-responsive">
									<table>
									
									 <thead>
                                   
                                </thead>
                                <tbody>
                                    <tr>
										 <td><input class="form-control input-sm" type="hidden" name="from_date"></td>
										 <td><input class="form-control input-sm" type="hidden" name="to_date"></td>
										 <td align="center" style="border-top:0">
                                            <input type="hidden" name="submit" value="Search" accesskey="s" tabindex="3" class="btn btn-sm btn-success" />
                                        </td>
										</tr>
										</tbody>
									</table>
									</div>
									</form>
									</div>
								</div>
					<?php 
if(($adsessrole=='Admin')or($adsessrole=='HR'))
									{					
		 if (isset($_POST['submit'])) {
									$from_date=$_POST['from_date'];
									$to_date=$_POST['to_date'];
									
									if(($from_date!='')AND($to_date!=''))
									{
									$query2 = mysqli_query($conn,"select * from plots_details where  date BETWEEN '$from_date' AND '$to_date' order by id DESC");
									}
								}else{
									$query2 = mysqli_query($conn,"select * from plots_details order by id DESC");
								}
									}else {
									 if (isset($_POST['submit'])) {
									$from_date=$_POST['from_date'];
									$to_date=$_POST['to_date'];
									
									if(($from_date!='')AND($to_date!=''))
									{
									$query2 = mysqli_query($conn,"select * from plots_details where (officer='$adsession' or emp_id='$adsession') and date BETWEEN '$from_date' AND '$to_date' order by id DESC");
									}
								}else{
									$query2 = mysqli_query($conn,"select * from plots_details where officer='$adsession' or emp_id='$adsession' order by id DESC");
								}
										
									}
							?>			
								<div class="card-body">
									<div class="table-responsive">
										
										<table id="basic-datatables" class="display table table-striped table-hover" >
									
											
												<thead>
												<tr>
													<th>Booked Date</th>
													<th>Project Name</th>
													<th>Plot No</th>
													<th>Square Feet</th>
													<th>Status</th>
													
												</tr>
											</thead>
											<tbody>
												<?php 	
if(($adsessrole=='Admin')or($adsessrole=='HR'))
									{					
		 if (isset($_POST['submit'])) {
									$from_date=$_POST['from_date'];
									$to_date=$_POST['to_date'];
									
									if(($from_date!='')AND($to_date!=''))
									{
									$query2 = mysqli_query($conn,"select * from plots_details where  date BETWEEN '$from_date' AND '$to_date'");
									}
								}else{
									$query2 = mysqli_query($conn,"select * from plots_details ");
								}
									}else {
									 if (isset($_POST['submit'])) {
									$from_date=$_POST['from_date'];
									$to_date=$_POST['to_date'];
									
									if(($from_date!='')AND($to_date!=''))
									{
									$query2 = mysqli_query($conn,"select * from plots_details where (officer='$adsession' or emp_id='$adsession') and date BETWEEN '$from_date' AND '$to_date' ");
									}
								}else{
									$query2 = mysqli_query($conn,"select * from plots_details order by id desc");
								}
										
									}
									
		
						
					$inc=1;
					while($row = mysqli_fetch_array($query2))
					{
							$project_id=$row['project_id'];
								$query2aa = mysqli_query($conn,"select * from project_details where project_id='$project_id' order by date DESC");
							while($rowaa = mysqli_fetch_array($query2aa))
							{
						$ids=$rowaa['id'];
						$first_date=$rowaa['cust_first_meeting_date'];
						$second_visit=$rowaa['cust_second_meeting_date'];
						$site_visit=$rowaa['cust_sitevisit_meeting_date'];
						
				?>
												<tr>
													<td nowrap="nowrap"><?php if($row['booked_date']>0){echo date('d-m-Y', strtotime($row['booked_date']));} else { } ?></td>
													<td nowrap="nowrap"><?php echo $rowaa['project_name']; ?></td>
													<td nowrap="nowrap"><?php echo $row['plot_no']; ?></td>
													<td nowrap="nowrap"><?php echo $row['square_fiet']; ?></td>
													<td><?php if($row['status']=='1'){ ?> <p class="btn btn-success">Booked</p> <?php }else {?> <p class="btn btn-danger">Not Booked</p>  <?php } ?></a></td>
													</tr>
					<?php  }?>
						
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
	$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#basic-datatables thead tr').clone(true).appendTo( '#basic-datatables thead' );
    $('#basic-datatables thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
 
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );
 
    var table = $('#basic-datatables').DataTable( {
        
        orderCellsTop: true,
        fixedHeader: true,
		order: [[0, 'desc']],
			"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
	
    } );
} );
	</script>
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
	
	<!-- Start Datatable Export Plugins-->        
    <script type="text/javascript" src="tableexport/tableExport.js"></script>
	<script type="text/javascript" src="tableexport/html2canvas.js"></script>
	<script type="text/javascript" src="tableexport/jquery.base64.js"></script>
	<script type="text/javascript" src="tableexport/jspdf/jspdf.js"></script>
	<script type="text/javascript" src="tableexport/jspdf/libs/base64.js"></script>
	<script type="text/javascript" src="tableexport/jspdf/libs/sprintf.js"></script>        
    <!-- End Datatable Export Plugins-->
</body>
</html>