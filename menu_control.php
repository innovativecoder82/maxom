<?php
error_reporting(0);
include('templates/session.php');
include('templates/functions.php');


?>

<?php 
	$pageqopdp=$_GET['page'];
if(isset($_GET['id1'])){
$id1=$_GET['id1'];
$status1=$_GET['status1'];
if($status1=='Active')
{
$update=mysqli_query($conn,"update menu set status1='Deactive' where id='$id1' ");
echo'<script>alert("Menu Deactivated");window.location.href= "menu_control.php";</script>';
}elseif($status1=='Deactive'){
$update=mysqli_query($conn,"update menu set status1='Active' where id='$id1' ");
echo'<script>alert("Menu Activated");window.location.href= "menu_control.php";</script>';
}	
}
?>
	<?php 
if(isset($_GET['id2'])){
$id2=$_GET['id2'];
$status2=$_GET['status2'];
if($status2=='Active')
{
$update=mysqli_query($conn,"update menu set status2='Deactive' where id='$id2' ");
echo'<script>alert("Menu Deactivated");window.location.href= "menu_control.php";</script>';
}elseif($status2=='Deactive'){
$update=mysqli_query($conn,"update menu set status2='Active' where id='$id2' ");
echo'<script>alert("Menu Activated");window.location.href= "menu_control.php";</script>';
}	
}
?>
	<?php 
if(isset($_GET['id3'])){
$id3=$_GET['id3'];
$status3=$_GET['status3'];
if($status3=='Active')
{
$update=mysqli_query($conn,"update menu set status3='Deactive' where id='$id3' ");
echo'<script>alert("Menu Deactivated");window.location.href= "menu_control.php";</script>';
}elseif($status3=='Deactive'){
$update=mysqli_query($conn,"update menu set status3='Active' where id='$id3' ");
echo'<script>alert("Menu Activated");window.location.href= "menu_control.php";</script>';
}	
}
?>
	<?php 
if(isset($_GET['id4'])){
$id4=$_GET['id4'];
$status4=$_GET['status4'];
if($status4=='Active')
{
$update=mysqli_query($conn,"update menu set status4='Deactive' where id='$id4' ");
echo'<script>alert("Menu Deactivated");window.location.href= "menu_control.php";</script>';
}elseif($status4=='Deactive'){
$update=mysqli_query($conn,"update menu set status4='Active' where id='$id4' ");
echo'<script>alert("Menu Activated");window.location.href= "menu_control.php";</script>';
}	
}
?>
<?php 
if(isset($_GET['id5'])){
$id5=$_GET['id5'];
$status5=$_GET['status5'];
if($status5=='Active')
{
$update=mysqli_query($conn,"update menu set status5='Deactive' where id='$id5' ");
echo'<script>alert("Menu Deactivated");window.location.href= "menu_control.php";</script>';
}elseif($status5=='Deactive'){
$update=mysqli_query($conn,"update menu set status5='Active' where id='$id5' ");
echo'<script>alert("Menu Activated");window.location.href= "menu_control.php";</script>';
}	
}
?>
<?php 
if(isset($_GET['id6'])){
$id6=$_GET['id6'];
$status6=$_GET['status6'];
if($status6=='Active')
{
$update=mysqli_query($conn,"update menu set status6='Deactive' where id='$id6' ");
echo'<script>alert("Menu Deactivated");window.location.href= "menu_control.php";</script>';
}elseif($status6=='Deactive'){
$update=mysqli_query($conn,"update menu set status6='Active' where id='$id6' ");
echo'<script>alert("Menu Activated");window.location.href= "menu_control.php";</script>';
}	
}
?>


<!DOCTYPE html>
<html lang="en">

<?php headertemplate(); ?>

<body>
	<div class="wrapper">
		<?php navbar('menu_control.php'); ?>

		<div class="main-panel">
			<div class="content">
				<div class="page-inner">
					<div class="page-header">
						<h4 class="page-title">View Menu</h4>
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
								<a href="#">Menu</a>
							</li>
							<li class="separator">
								<i class="flaticon-right-arrow"></i>
							</li>
							<li class="nav-item">
								<a href="#">View Menu</a>
							</li>
						</ul>
					</div>
					<div class="row">
						<div class="col-md-12">
							
								<div class="card-body">
									<div class="table-responsive">
										<table id="basic-datatables" class="display table table-striped table-hover" >
											<thead>
												<tr>
													<th>#</th>
													<th>Menu</th>
													<th>Role1</th><th>Status1</th>
													<th>Role2</th><th>Status2</th>
													<th>Role3</th><th>Status3</th>
													<th>Role4</th><th>Status4</th>
													<th>Role5</th><th>Status5</th>
													<th>Role6</th><th>Status6</th>
												</tr>
											</thead>
											
											<tbody>
											<?php 
					$sql = mysqli_query($conn,"SELECT * FROM menu order by id asc");
					$inc=1;
					while($row = mysqli_fetch_array($sql))
					{
				?>
												<tr>
													<td><?php echo $inc; ?></td>
													<td><?php echo $row['menu'];?></td>
													<td><?php echo $row['role1'];?></td>
							<td><a href="menu_control.php?page=<?php echo $page;?>&&id1=<?php echo $row['id'];?>&&status1=<?php echo $row['status1'];?>" accesskey="e" class="btn btn-sm btn-success"><?php echo $row['status1'];?></a></td>
							<td><?php echo $row['role2'];?></td>
							<td><a href="menu_control.php?page=<?php echo $page;?>&&id2=<?php echo $row['id'];?>&&status2=<?php echo $row['status2'];?>" accesskey="e" class="btn btn-sm btn-success"><?php echo $row['status2'];?></a></td>
							<td><?php echo $row['role3'];?></td>
							<td><a href="menu_control.php?page=<?php echo $page;?>&&id3=<?php echo $row['id'];?>&&status3=<?php echo $row['status3'];?>" accesskey="e" class="btn btn-sm btn-success"><?php echo $row['status3'];?></a></td>
							<td><?php echo $row['role4'];?></td>
							<td><a href="menu_control.php?page=<?php echo $page;?>&&id4=<?php echo $row['id'];?>&&status4=<?php echo $row['status4'];?>" accesskey="e" class="btn btn-sm btn-success"><?php echo $row['status4'];?></a></td>
			</td>
			<td><?php echo $row['role5'];?></td>
							<td><a href="menu_control.php?page=<?php echo $page;?>&&id5=<?php echo $row['id'];?>&&status5=<?php echo $row['status5'];?>" accesskey="e" class="btn btn-sm btn-success"><?php echo $row['status5'];?></a></td>
			</td>
			<td><?php echo $row['role6'];?></td>
							<td><a href="menu_control.php?page=<?php echo $page;?>&&id6=<?php echo $row['id'];?>&&status6=<?php echo $row['status6'];?>" accesskey="e" class="btn btn-sm btn-success"><?php echo $row['status6'];?></a></td>
			</td>
													
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