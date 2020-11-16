<?php
error_reporting(0);
include('templates/session.php');
include('templates/functions.php');


$page=$_GET['page'];
$cus_id=$_GET['cus_id'];
$emp_idsess = $_SESSION['admin'];
$emp_idro = $_SESSION['role'];

$sqla = mysqli_query($conn,"SELECT * FROM employee_details where emp_id = '$emp_idsess' order by id asc");
$rowsqqa = mysqli_fetch_assoc($sqla);
$emp_idse = $rowsqqa['emp_id'];
$emp_namese = $rowsqqa['emp_name'];
$emp_officer = $rowsqqa['officer'];

extract($_POST);
if(isset($submit)){
	date_default_timezone_set('Asia/Calcutta');
	$date = date('Y-m-d');
	$time = date('h:i sa');
	
	$sql = mysqli_query($conn,"SELECT * FROM employee_details where emp_id='$emp_id' order by id asc");
	$rowsqq = mysqli_fetch_assoc($sql);
	$emp_id=$rowsqq['emp_id'];
	$emp_name=$rowsqq['emp_name'];
	$cus_first_meet=$cust_first_meeting;
	$cust_sitevisit_meeting=$cust_sitevisit_meeting;
	
	if($cus_first_meet!=''){
	$cust_first_meeting_date=$meeting_date;	
	$first_meet_comments = $comments;
	}
		if($cust_second_meeting!=''){
	$cust_second_meeting=$meeting_date;	
	$second_meet_comments = $comments;
	}
	if($cust_sitevisit_meeting!=''){
	$cust_sitevisit_meeting_date=$meeting_date;	
	$sitevisit_comments = $comments;
	}
	$sqls = mysqli_query($conn,"SELECT * FROM customer_details where cell_no='$cell_no' order by id asc");
	if($rowsqqs = mysqli_fetch_row($sqls)>0)
	{
				echo'<script>alert("Mobile Number Already Exist..!");window.location.href="add_customer.php";</script>';

	}else{
	$sql = mysqli_query($conn,"SELECT * FROM customer_details where customer_id='$customer_id' order by id asc");
	if($rowsqq = mysqli_fetch_row($sql)>0)
	{
		echo'<script>alert("Customer ID Already Exist..!");window.location.href="add_customer.php";</script>';
	}else{
	//$query = mysqli_query($conn,"INSERT INTO customer_details (cust_name, cell_no, project_interest, cust_interest, cust_looking_for, occupation, fund_option, take_home_rs, pay_advance_rs, it_two_years, budget, office_address, residence_address, mail_id, rating, purchase_option) VALUES('$cust_name','$cell_no','$project_interest','$cust_interest','$cust_looking_for','$occupation','$fund_option','$take_home_rs','$pay_advance_rs','$it_two_years','$budget','$office_address','$residence_address','$mail_id','$rating','$purchase_option','$date')");
	$query = mysqli_query($conn,"INSERT INTO customer_details VALUES('','$emp_name','$emp_id','$lead_owner','$select_one','$other_notes','$cust_first_meeting','$cust_second_meeting','$cust_sitevisit_meeting','$cust_first_meeting_date','$cust_second_meeting_date','$cust_sitevisit_meeting_date','$customer_id','$customer_id1','$cust_name','$cell_no','$project_interest','$cust_interest','$cust_looking_for','$occupation','$fund_option','$take_home_rs','','','$budget','','$residence_address','$mail_id','','','$first_meet_comments','$second_meet_comments','$sitevisit_comments','$next_action','$next_action_date','$date')");
	
	echo'<script>alert("Successfully Added..!");window.location.href="add_customer.php";</script>';
}

	}
}
extract($_POST);
if(isset($submit1)){
	date_default_timezone_set('Asia/Calcutta');
	$date = date('Y-m-d');
	$time = date('h:i sa');
	$sql = mysqli_query($conn,"SELECT * FROM employee_details where emp_id='$emp_id' order by id asc");
	$rowsqq = mysqli_fetch_assoc($sql);
	$emp_id=$rowsqq['emp_id'];
	$emp_name=$rowsqq['emp_name'];
	
	$sqls = mysqli_query($conn,"SELECT * FROM customer_details where id!='$id' and cell_no='$cell_no' order by id asc");
	if($rowsqqs = mysqli_fetch_row($sqls)>0)
	{
				echo'<script>alert("Mobile Number Already Exist..!");window.location.href="add_customer.php";</script>';

	}else{
	//$query = mysqli_query($conn,"INSERT INTO customer_details (cust_name, cell_no, project_interest, cust_interest, cust_looking_for, occupation, fund_option, take_home_rs, pay_advance_rs, it_two_years, budget, office_address, residence_address, mail_id, rating, purchase_option) VALUES('$cust_name','$cell_no','$project_interest','$cust_interest','$cust_looking_for','$occupation','$fund_option','$take_home_rs','$pay_advance_rs','$it_two_years','$budget','$office_address','$residence_address','$mail_id','$rating','$purchase_option','$date')");
	$query = mysqli_query($conn,"update customer_details set emp_name='$emp_name', emp_id='$emp_id', lead_owner='$lead_owner', select_one='$select_one', other_notes='$other_notes', cust_first_meeting='$cust_first_meeting', cust_second_meeting='$cust_second_meeting', cust_sitevisit_meeting='$cust_sitevisit_meeting', cust_first_meeting_date='$cust_first_meeting_date', cust_second_meeting_date='$cust_second_meeting_date', cust_sitevisit_meeting_date='$cust_sitevisit_meeting_date', customer_id='$customer_id', cust_name='$cust_name', cell_no='$cell_no', project_interest='$project_interest', cust_interest='$cust_interest', cust_looking_for='$cust_looking_for', occupation='$occupation', fund_option='$fund_option', take_home_rs='$take_home_rs', budget='$budget', residence_address='$residence_address', mail_id='$mail_id', purchase_option='$purchase_option', first_meet_comments='$first_meet_comments', second_meet_comments='$second_meet_comments', sitevisit_comments='$sitevisit_comments', next_action='$next_action', next_action_date='$next_action_date', date='$date' where id='$id'");
	
	echo'<script>alert("Successfully Added..!");window.location.href="add_customer.php";</script>';
	}
	}
?>
<!DOCTYPE html>
<html lang="en">

<?php headertemplate(); ?>

<body>
	<div class="wrapper">
		<?php navbar('add_customer'); 
		if($page=='1'){
		?>
		<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Add Customer</h2>
							</div>
							<div class="ml-md-auto py-2 py-md-0">
								<a href="add_customer.php" class="btn btn-secondary btn-round">Add Customer</a>
							</div>
						</div>
					</div>
					
				</div>
				
					<div class="row">
						<div class="col-md-12">
							<div class="card">-
								<div class="card-header">
									<div class="card-title">Customer Profile Sheet</div>
								</div>
								<div class="card-body">
								 <form method="post">
									
										<div class="row">
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="exampleFormControlSelect1">Source</label>
												<?php if(isset($_GET['other'])){ ?>
												<select class="form-control" name="select_one" onchange="la(this.value)" id="exampleFormControlSelect1" required>
													<option value="<?php echo $_GET['other'];?>" selected><?php echo $_GET['other'];?></option>
													<option value="add_customer1.php?page=<?php echo "1";?>&&other=<?php echo "DC";?>">DC</option>
													<option value="add_customer1.php?page=<?php echo "1";?>&&other=<?php echo "Tele calling";?>">Tele calling</option>
													<option value="add_customer1.php?page=<?php echo "1";?>&&other=<?php echo "SMS";?>">SMS</option>
													<option value="add_customer1.php?page=<?php echo "1";?>&&other=<?php echo "Paper";?>">Paper</option>
													<option value="add_customer1.php?page=<?php echo "1";?>&&other=<?php echo "Stall";?>">Stall</option>
													<option value="add_customer1.php?page=<?php echo "1";?>&&other=<?php echo "Online Add";?>">Online Add</option>
													<option value="add_customer1.php?page=<?php echo "1";?>&&other=<?php echo "Other";?>">Other</option>
												</select>
												<?php } else { ?>
												<select class="form-control" name="select_one" onchange="la(this.value)" id="exampleFormControlSelect1" required>
													<option value="">Select One</option>
													<option value="add_customer1.php?page=<?php echo "1";?>&&other=<?php echo "DC";?>">DC</option>
													<option value="add_customer1.php?page=<?php echo "1";?>&&other=<?php echo "Tele calling";?>">Tele calling</option>
													<option value="add_customer1.php?page=<?php echo "1";?>&&other=<?php echo "SMS";?>">SMS</option>
													<option value="add_customer1.php?page=<?php echo "1";?>&&other=<?php echo "Paper";?>">Paper</option>
													<option value="add_customer1.php?page=<?php echo "1";?>&&other=<?php echo "Stall";?>">Stall</option>
													<option value="add_customer1.php?page=<?php echo "1";?>&&other=<?php echo "Online Add";?>">Online Add</option>
													<option value="add_customer1.php?page=<?php echo "1";?>&&other=<?php echo "Other";?>">Other</option>
												</select>
												<?php } ?>
											</div>
										</div>
										
												<div class="col-md-6 col-lg-4">
												<?php 
												$oth=$_GET['other'];
												if($oth=='Other'){ ?>
												<div class="form-group">
												<label for="comment">Other Notes</label>
												<textarea class="form-control" id="comment" name="other_notes" rows="5"></textarea>
											</div>
												<?php }else{ } ?>
											
										</div>
										</div>
										<div class="row">
												<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Lead Owner</label>
												<select class="form-control" name="lead_owner" required>
												<option value="" selected>Select Lead Owner</option>
												<?php 
												if(($emp_idro=='Admin') or ($emp_idro=='HR')){
		
												$sql = mysqli_query($conn,"SELECT * FROM employee_details order by id asc");
												}
												else{ 
												$sql = mysqli_query($conn,"SELECT * FROM employee_details where officer='$emp_idsess' or emp_id='$emp_idsess' order by id asc");
												
												}
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
												<label for="exampleFormControlSelect1">Select Employee</label>
												<select class="form-control" name="emp_id" required>
												<option value="<?php echo "$emp_idse";?>" Selected><?php echo "$emp_idse - $emp_namese";?></option>
												<?php 
												if(($emp_idro=='Admin') or ($emp_idro=='HR')){
													$sql = mysqli_query($conn,"SELECT * FROM employee_details order by id asc");
												}else{
												$sql = mysqli_query($conn,"SELECT * FROM employee_details where officer='$emp_idsess' or emp_id='$emp_idsess' order by id asc");
												}
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
									<div class="col-md-6 col-lg-8">
											<div class="form-group">
												<label for="exampleFormControlSelect1">Customer Meeting</label>
													<div class="form-group">
												<label class="form-group">
													<input class="form-radio-input" type="checkbox" name="cust_first_meeting" value="First Meeting" >
													<span class="form-radio-sign">First Meeting</span>
												</label>
												<!---<label class="form-radio-label ml-3">
													<input class="form-radio-input" type="radio" name="cus_meeting" value="Second Meeting">
													<span class="form-radio-sign">Second Meeting</span>
												</label> --->
												<label class="form-group">
													<input class="form-radio-input" type="checkbox" name="cust_sitevisit_meeting" value="Site Visit">
													<span class="form-radio-sign">Site Visit</span>
												</label>
												
											</div>
											</div>
										</div>
										</div>
										<div class="row">
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Meeting Date</label>
												<?php date_default_timezone_set('Asia/Calcutta');
	$date = date('Y-m-d');
	$time = date('h:i sa');
	?>
												<input type="date" class="form-control" id="email2" name="meeting_date" placeholder="Enter Name">
											</div>
										
										</div>
										</div>
										<div class="row">
										<div class="col-md-6 col-lg-4">
										<?php
					$query1= mysqli_query($conn,"SELECT * FROM customer_details ORDER BY `id` DESC");
					$rows = mysqli_fetch_assoc($query1);
					$customer_id1= $rows['id'];
					$customer_id=$customer_id1+1;
				  ?>
											<div class="form-group">
												<label for="email2">Customer Id</label>
												<input type="text" class="form-control" name="customer_id" Value="<?php  printf("CUS%06d", $customer_id);?>" readonly >
												<input type="hidden" class="form-control" name="customer_id1" value="<?php echo $customer_id;?>" >
												</div>
												</div>
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Customer Name</label>
												<input type="text" class="form-control" id="email2" name="cust_name" placeholder="Enter Name" required>
											</div>
										
										</div>
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Mobile Number</label>
												<input type="text" class="form-control" id="email2" name="cell_no" placeholder="Enter Mobile No.">
											</div>
										</div>
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Project Interested</label>
												<select class="form-control" name="project_interest">
												<option value="" Selected>Select Project Interested</option>
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
												<select class="form-control" name="cust_interest" id="exampleFormControlSelect1">
													<option value="" Selected>Select Customer Interested</option>
													<option value="plots">Plots</option>
													<option value="Apartment">Apartment</option>
													<option value="Villa">Villa</option>
												</select>
											</div>
										</div>
											<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="exampleFormControlSelect1">Customer Looking For</label>
												<select class="form-control" name="cust_looking_for" id="exampleFormControlSelect1">
													<option value="" selected>Customer Looking For</option>
													<option value="Accommodation">Accommodation</option>
													<option value="Investment">Investment</option>
												</select>
											</div>
										</div>  --->
											<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="exampleFormControlSelect1">Occupation</label>
												<select class="form-control" name="occupation" id="exampleFormControlSelect1">
													<option value="" Selected>Occupation</option>
													<option value="Employed">Employed</option>
													<option value="Self Employed">Self Employed</option>
												</select>
											</div>
										</div>
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="exampleFormControlSelect1">Funding Option</label>
												<select class="form-control" name="fund_option" id="exampleFormControlSelect1">
													<option value="" Selected>Funding Option</option>
													<option value="Loan">Loan</option>
													<option value="Own Fund">Own Fund</option>
												</select>
											</div>
										</div>
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Take Home Rs.</label>
												<input type="text" class="form-control" id="email2" name="take_home_rs" placeholder="">
											</div>
										</div>
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Budget</label>
												<select class="form-control" name="budget" id="exampleFormControlSelect1">
													<option value="" Selected>Select Budget</option>
													<option value="1000000 - 2000000">1000000 - 2000000</option>
													<option value="2000000 - 3000000">2000000 - 3000000</option>
													<option value="3000000 - 4000000">3000000 - 4000000</option>
													<option value="4000000 - 5000000">4000000 - 5000000</option>
													<option value="5000000 - 6000000">5000000 - 6000000</option>
													<option value="6000000 - 7000000">6000000 - 7000000</option>
													<option value="7000000 - 8000000">7000000 - 8000000</option>
													<option value="8000000 - 9000000">8000000 - 9000000</option>
													<option value="9000000 - 10000000">9000000 - 10000000</option>
												</select>
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
											<label for="email2">Mail id</label>
												<input type="text" class="form-control" id="email2" name="mail_id" placeholder="">
											</div>
											
										</div>
										
									</div>
									
										<div class="row">
												<div class="col-md-6 col-lg-4">
												<div class="form-group">
												<label for="comment">Comments</label>
												<textarea class="form-control" id="comment" name="comments" rows="5"></textarea>
											</div>
										</div>
											<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Next Action</label>
												<select class="form-control" name="next_action" id="exampleFormControlSelect1ww">
													<option value="" Selected>Next Action</option>
													<option value="Second Meeting">Second Meeting</option>
													<option value="Site Visiting">Site Visiting</option>
													<option value="Negotiable">Negotiable</option>
													<option value="Booked">Booked</option>
													<option value="Call Back">Call Back</option>
													<option value="Not Interest">Not Interest</option>
												</select>
											</div>
											
										</div>
										<div class="col-md-6 col-lg-4">
											<div class="form-group box">
											<label for="email2">Next Action Date</label>
												<input type="date" class="form-control" id="email2" name="next_action_date" placeholder="">
											</div>
										</div>
										</div>
										<div class="row">
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
	
		<?php }elseif($page=='2'){ ?>
			<div class="main-panel">
			<div class="content">
				<div class="panel-header bg-primary-gradient">
					<div class="page-inner py-5">
						<div class="d-flex align-items-left align-items-md-center flex-column flex-md-row">
							<div>
								<h2 class="text-white pb-2 fw-bold">Exisiting Customer</h2>
							</div>
							<div class="ml-md-auto py-2 py-md-0">
								<a href="add_customer.php" class="btn btn-secondary btn-round">Existing Customer</a>
							</div>
						</div>
					</div>
					
				</div>
<?php $query1= mysqli_query($conn,"SELECT * FROM customer_details where customer_id='$cus_id'order by id desc");
					$rows = mysqli_fetch_assoc($query1);
					$emp_id1= $rows['emp_id1'];
					?>
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Existing Customer Profile Sheet</div>
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
												<input type="text" class="form-control" id="email2" name="lead_owner" value="<?php echo $rows['lead_owner']; ?>"  readonly>
											
											</div>
										
										</div>
										
										</div>
										<div class="row">
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="exampleFormControlSelect1">Source</label>
												<input type="text" class="form-control" id="email2" name="select_one" value="<?php echo $rows['select_one']; ?>"  readonly>
											
												
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
													<input type="date" class="form-control" id="email2" name="cust_first_meeting_date"  placeholder="Enter Name">
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
													<input type="date" class="form-control" id="email2" name="cust_second_meeting_date"  placeholder="Enter Name">
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
													<input type="date" class="form-control" id="email2" name="cust_sitevisit_meeting_date" placeholder="Enter Name">
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
											<?php	if(($emp_idro=='Admin')){ ?>
												<input type="text" class="form-control" id="email2" name="cell_no" value="<?php echo $rows['cell_no'] ?>"placeholder="Enter Phone No." >
											<?php }else{ ?>
												<input type="text" class="form-control" id="email2" name="cell_no" value="<?php echo $rows['cell_no'] ?>"placeholder="Enter Phone No." readonly>
										
											<?php } ?>
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
										!-->
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
											<select class="form-control" name="budget" id="exampleFormControlSelect1" readonly>
													<option value="<?php echo $rows['budget'] ?>" selected><?php echo $rows['budget'] ?></option>
													<option value="1000000 - 2000000">1000000 - 2000000</option>
													<option value="2000000 - 3000000">2000000 - 3000000</option>
													<option value="3000000 - 4000000">3000000 - 4000000</option>
													<option value="4000000 - 5000000">4000000 - 5000000</option>
													<option value="5000000 - 6000000">5000000 - 6000000</option>
													<option value="6000000 - 7000000">6000000 - 7000000</option>
													<option value="7000000 - 8000000">7000000 - 8000000</option>
													<option value="8000000 - 9000000">8000000 - 9000000</option>
													<option value="9000000 - 10000000">9000000 - 10000000</option>
												</select>
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
												<textarea class="form-control"  name="second_meet_comments" rows="5" ></textarea>
												
												<?php } ?>
											</div>
										</div>
												<div class="col-md-6 col-lg-4">
												<div class="form-group">
												<label for="comment">Site Visit Comments</label>
												<?php if($rows['sitevisit_comments']!=''){ ?>
												<textarea class="form-control"  name="sitevisit_comments" rows="5" readonly><?php echo $rows['sitevisit_comments']; ?></textarea>
												<?php }else{?>
												<textarea class="form-control"  name="sitevisit_comments" rows="5" ></textarea>
												
												<?php } ?>
											</div>
										</div>
										</div>
										<div class="row">
										<?php if($rows['next_action']!='Not Interest'){?>
											<div class="col-md-6 col-lg-4">
											<div class="form-group">
												<label for="email2">Next Action</label>
												<select class="form-control" name="next_action" id="exampleFormControlSelect1">
													<option value="<?php echo $rows['next_action'] ?>" selected><?php echo $rows['next_action'] ?></option>
													<option value="Second Meeting">Second Meeting</option>
													<option value="Site Visiting">Site Visiting</option>
													<option value="Negotiable">Negotiable</option>
													<option value="Booked">Booked</option>
													<option value="Call Back">Call Back</option>
													<option value="Not Interest">Not Interest</option>
												</select>
											</div>
											
										</div>
										
										<div class="col-md-6 col-lg-4">
											<div class="form-group">
											<label for="email2">Next Action Date</label>
												<input type="date" class="form-control" id="email2" name="next_action_date" value="<?php echo $rows['next_action_date'] ?>" placeholder="">
											</div>
											
										</div>
										<?php }else { } ?>
										</div>
										<div class="row">
										
										
										
									<input type="submit" value="Submit" name="submit1" class="btn btn-info"/>
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
	
		
		<?php } ?>
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
		
		function la(src)
		{
			window.location=src;
		}
	</script>
	<style>
    .box{
        color: #fff;
        display: none;
    }
    .red{ background: #ff0000; }
    .green{ background: #228B22; }
    .blue{ background: #0000ff; }
</style>
<script>
$(document).ready(function(){
    $("#exampleFormControlSelect1ww").change(function(){
        $(this).find("option:selected").each(function(){
            var optionValue = $(this).attr("value");
            if(optionValue=="Not Interest"){
                $(".box").not("." + optionValue).hide();
                $("." + optionValue).hidden();
            } else{
                $(".box").show();
            }
        });
    }).change();
});
</script>
</body>
</html>