<?php
error_reporting(0);
include('templates/session.php');
include('templates/functions.php');
$adsession = $_SESSION['admin'];
$adsessrole = $_SESSION['role'];

$prid=$_GET['Pr_id'];

extract($_POST);
if(isset($submitee)){
	date_default_timezone_set('Asia/Calcutta');
	$date = date('Y-m-d');
	$time = date('h:i sa');
			$quead = mysqli_query($conn,"select * from plots_details where project_id='$project_id' and plot_no='$plget' order by id DESC");
	if($rowxq = mysqli_fetch_array($quead)>0){
		if($status=='1'){
			
		$query = mysqli_query($conn,"update plots_details set plot_no='$plget', square_fiet='$square_fiet', status='$status', booked_date='$date' where project_id='$project_id' and plot_no='$plget' ");
echo'<script>alert("Successfully Updated");window.location.href="view_plots.php";</script>';
		}else{
				$query = mysqli_query($conn,"update plots_details set plot_no='$plget', square_fiet='$square_fiet', status='$status', booked_date='' where project_id='$project_id' and plot_no='$plget' ");
echo'<script>alert("Successfully Updated");window.location.href="view_plots.php";</script>';
	
		}
	}else{
		if($status=='1'){
	$query = mysqli_query($conn,"INSERT INTO plots_details (plot_id, project_id, plot_no, square_fiet, status, date,booked_date) VALUES('$plot_id','$project_id','$plget','$square_fiet','$status','$date','$date')");

	echo'<script>alert("Successfully Inserted");window.location.href="view_plots.php";</script>';
}else{
		$query = mysqli_query($conn,"INSERT INTO plots_details (plot_id, project_id, plot_no, square_fiet, status, date,booked_date) VALUES('$plot_id','$project_id','$plget','$square_fiet','$status','$date','')");
	echo'<script>alert("Successfully Inserted");window.location.href="view_plots.php";</script>';

}
	}
}	
	
?>



<!DOCTYPE html>
<html lang="en">

<?php headertemplate(); ?>

  <link rel="stylesheet" href="assets/css/styleheart.css">
 
<body>
	<div class="wrapper">
		<?php navbar('view_plots'); ?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">

						<h4 class="page-title">View Plots</h4>
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
								<a href="#">Plots</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">View Plots</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h4 class="card-title">View All Booked and Not Booked Plots</h4>
								</div>
								<div class="card-body">
								  <div class="col-md-12">
                                            <div class="card-body">
                                         <div class="row">
												<?php
												
							$query2aa = mysqli_query($conn,"select * from project_details where id='$prid' order by id DESC");
												
							while($row = mysqli_fetch_array($query2aa))
							{
								$coundplots=$row['no_of_plots'];
								
								for($i=1;$i<=$coundplots;$i++){
									$query2ab = mysqli_query($conn,"select * from plots_details where project_id='".$row['project_id']."' and plot_no='$i' and status='1' order by id DESC");
								if($rows = mysqli_fetch_array($query2ab)>0)
							{
							
								
								?>
								
											<div class="col-md-2">
												<div class="heart" style="padding-bottom:20px;">
											<?php	if(($adsessrole=='Admin') or ($adsessrole=='HR')){ 
												?>
								
												<a href="view_plots1.php?exp=<?php echo $row['id'];?>&&pl=<?php echo $i; ?>" class="btn btn-round btn-success sweet-12" data-toggle="tooltip" data-placement="top" title="Booked">Plot <?php echo  $i; ?></a>
											<?php }else{ ?>
													<a href="view_plots1.php?exp2=<?php echo $row['id'];?>&&pl=<?php echo $i; ?>" class="btn btn-round btn-success sweet-12" data-toggle="tooltip" data-placement="top" title="Booked">Plot <?php echo $i;
											; ?></a>
											<?php } ?>
												
												</div>
											</div>


								<?php } else {?>
								
									<div class="col-md-2">
												<div class="heart" style="padding-bottom:20px;">
												<?php	if(($adsessrole=='Admin') or ($adsessrole=='HR')){ ?>
								
												<a href="view_plots1.php?exp=<?php echo $row['id'];?>&&pl=<?php echo $i; ?>" class="btn btn-round btn-danger sweet-12" data-toggle="tooltip" data-placement="top"
																title="Not Booked">Plot <?php echo  $i; ?></a>
														<?php }else{ ?>
									<a href="view_plots1.php?exp2=<?php echo $row['id'];?>&&pl=<?php echo $i; ?>" class="btn btn-round btn-danger sweet-12" data-toggle="tooltip" data-placement="top"
																title="Not Booked">Plot <?php echo  $i; ?></a>
											
												<?php } ?>
										
												</div>
											</div>
								
								
								
								<?php } }
							}?>

                                            </div>
                                            </div>
                                            </div>
                                            <!-- end inside card-body -->
                                        </div>
                                        <!-- end inside col -->
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
		
	  <?php 
		$exget=$_GET['exp'];
		$plget=$_GET['pl'];
		if($exget!=''){ 
		
		$queabx = mysqli_query($conn,"select * from project_details where id='$exget' order by id DESC");
	$rowxd = mysqli_fetch_array($queabx);
	
	
	$queabxs = mysqli_query($conn,"select * from plots_details where project_id='".$rowxd['project_id']."' and plot_no='$plget' order by id DESC");
	$rowxds = mysqli_fetch_array($queabxs);

		?>
		 <div class="modal fade" id="exampleModal" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;">
        <div class="modal-dialog">
                    <form class="container" method="post" id="needs-validation" novalidate>
                           
			<div class="modal-content">
     <form class="container" method="post" id="needs-validation" novalidate>
                           
			<div class="modal-content">

                <div class="modal-body">
                 <h4 class="modal-title" id="exampleModalLabel">Click to Book this Plot</h4>
					<div class="col-md-6 col-lg-12">
											<div class="form-group">
												<label for="email2">Project Name</label>
												 <?php
					$query1= mysqli_query($conn,"SELECT * FROM plots_details ORDER BY `id` DESC");
					$rows = mysqli_fetch_assoc($query1);
					$pro= $rows['id'];
					$plt_id=$pro+1;
				  ?>
				  	<input type="hidden" class="form-control" name="plot_id" value="<?php  printf("PLT%04d", $plt_id);?>" placeholder="Enter Code">
                 
												<input type="hidden" class="form-control" id="project_id" name="project_id" value="<?php echo $rowxd['project_id']; ?>">
												<input type="text" class="form-control" id="project_name" name="project_name" value="<?php echo $rowxd['project_name']; ?>" placeholder="Enter Project Name" readonly>
											</div>
										
										</div>
												<div class="col-md-6 col-lg-12">
											<div class="form-group">
												<label for="email2">Plot Number</label>
												<input type="text" class="form-control" id="plget" name="plget" value="<?php  echo $plget;?>" placeholder="Enter Plot No" readonly>
											</div>
											</div>
													<div class="col-md-6 col-lg-12">
										
											<div class="form-group">
												<label for="email2">Square Feet</label>
												<input type="text" class="form-control" id="email2" name="square_feet" value="<?php echo $rowxds['square_fiet']; ?>" placeholder="Enter Square Feet" required>
											</div>
										
										</div>
										<div class="col-md-6 col-lg-12">
										
											<div class="form-group">
												<label for="email2">Status</label>
										<select class="form-control" name="status" required="">
                                      <?php if($rowxds['status']=='1'){ ?>
									         <option value="1">Booked</option>
									         <option value="0">Not Booked</option>
									  <?php }else if($rowxds['status']=='0'){ ?>
									           <option value="0">Not Booked</option>
									           <option value="1">Booked</option>
									  <?php } ?>
									 <?php if($rowxds['status']==''){ ?>
									              <option value="0">Not Booked</option>
									         <option value="1">Booked</option>
									 <?php } ?>
                                        </select>
										</div>
										
										</div>
				                          
                <div class="modal-footer">
				<a href="view_plots.php" class="btn btn-primary">Close</a>
												
                   <button type="submit" name="submitee" class="btn btn-success">Submit</button>
                </div>
				</form>
        </div>
    </div>    
    </div>    
		<?php }else {  } ?>
		
		 <?php 
		$exget=$_GET['exp1'];
		$plget=$_GET['pl1'];
		if($exget!=''){ 
		
		$queabx = mysqli_query($conn,"select * from project_details where id='$exget' order by id DESC");
	$rowxd = mysqli_fetch_array($queabx);
	
		$queabxs = mysqli_query($conn,"select * from plots_details where project_id='".$rowxd['project_id']."' and plot_no='$plget' order by id DESC");
	$rowxds = mysqli_fetch_array($queabxs);

		?>
		 <div class="modal fade" id="exampleModal" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;">
        <div class="modal-dialog">
                    <form class="container" method="post" id="needs-validation" novalidate>
                           
			<div class="modal-content">
     <form class="container" method="post" id="needs-validation" novalidate>
                           
			<div class="modal-content">

                <div class="modal-body">
                 <h4 class="modal-title" id="exampleModalLabel">Booked Plot Details</h4>
					<div class="col-md-6 col-lg-12">
											<div class="form-group">
												<label for="email2">Project Name</label>
												<input type="hidden" class="form-control" id="project_id" name="project_id" value="<?php echo $rowxd['project_id']; ?>">
												<input type="text" class="form-control" id="project_name" name="project_name" value="<?php echo $rowxd['project_name']; ?>" placeholder="Enter Project Name" readonly>
											</div>
										
										</div>
												<div class="col-md-6 col-lg-12">
											<div class="form-group">
												<label for="email2">Plot Number</label>
												<input type="text" class="form-control" id="plget" name="plget" value="<?php  echo $plget;?>" placeholder="Enter Plot No" readonly>
											</div>
											</div>
													<div class="col-md-6 col-lg-12">
										
											<div class="form-group">
												<label for="email2">Square Feet</label>
												<input type="text" class="form-control" id="email2" name="square_fiet" value="<?php echo $rowxds['square_fiet']; ?>" placeholder="Enter Square Feet" >
											</div>
										
										</div>
										<div class="col-md-6 col-lg-12">
										
											<div class="form-group">
												<label for="email2">Status</label>
										<select class="form-control" name="status" >
                                      <?php if($rowxds['status']=='1'){ ?>
									         <option value="1">Booked</option>
									         <option value="0">Not Booked</option>
									  <?php }else if($rowxds['status']=='0'){ ?>
									           <option value="0">Not Booked</option>
									           <option value="1">Booked</option>
									  <?php } ?>
									  
									  
                                        </select>
										</div>
										
										</div>
			                             
                <div class="modal-footer">
				<a href="view_plots.php" class="btn btn-primary">Close</a>
					     <button type="submit" name="submitee" class="btn btn-success">Submit</button>
              							
                 </div>
				</form>
        </div>
    </div>    
    </div>    
		<?php }else {  } ?>
		
		<?php 
		$exget=$_GET['exp2'];
		$plget=$_GET['pl1'];
		if($exget!=''){ 
		
		$queabx = mysqli_query($conn,"select * from project_details where id='$exget' order by id DESC");
	$rowxd = mysqli_fetch_array($queabx);
	
		$queabxsh = mysqli_query($conn,"select * from plots_details where project_id='".$rowxd['project_id']."' and plot_no='$plget' order by id DESC");
	$rowxds = mysqli_fetch_array($queabxsh);

		?>
		 <div class="modal fade" id="exampleModal" tabindex="-1" data-backdrop="static" data-keyboard="false" style="display: none;">
        <div class="modal-dialog">
                    <form class="container" method="post" id="needs-validation" novalidate>
                           
			<div class="modal-content">
     <form class="container" method="post" id="needs-validation" novalidate>
                           
			<div class="modal-content">

                <div class="modal-body">
                 <h4 class="modal-title" id="exampleModalLabel">Booked Plot Details</h4>
					<div class="col-md-6 col-lg-12">
											<div class="form-group">
												<label for="email2">Project Name</label>
												<input type="hidden" class="form-control" id="project_id" name="project_id" value="<?php echo $rowxd['project_id']; ?>">
												<input type="text" class="form-control" id="project_name" name="project_name" value="<?php echo $rowxd['project_name']; ?>" placeholder="Enter Project Name" readonly>
											</div>
										
										</div>
												<div class="col-md-6 col-lg-12">
											<div class="form-group">
												<label for="email2">Plot Number</label>
												<input type="text" class="form-control" id="plget" name="plget" value="<?php  echo $plget;?>" placeholder="Enter Plot No" readonly>
											</div>
											</div>
													<div class="col-md-6 col-lg-12">
										
											<div class="form-group">
												<label for="email2">Square Feet</label>
												<input type="text" class="form-control" id="email2" name="square_fiet" value="<?php echo $rowxds['square_fiet']; ?>" placeholder="Enter Square Feet" readonly>
											</div>
										
										</div>
										<div class="col-md-6 col-lg-12">
										
											<div class="form-group">
												<label for="email2">Status</label>
										<select class="form-control" name="status" readonly>
                                             <option value="0" selected>Not Booked</option>
									  
									  
                                        </select>
										</div>
										
										</div>
			                             
                <div class="modal-footer">
				<a href="view_plots.php" class="btn btn-primary">Close</a>
											
                 </div>
				</form>
        </div>
    </div>    
    </div>    
		<?php }else {  } ?>
		
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
	
	<script>
$(document).ready(function(){  
$('#exampleModal').modal('show');
$('#exampleModal').modal({backdrop: 'static', keyboard: false})
});
</script>
	
</body>
</html>