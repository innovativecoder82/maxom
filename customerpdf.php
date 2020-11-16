
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

<head>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/pdf/pdf.css" />
    <script src="assets/pdf/pdf.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.js"></script>

</head>

<body>
    <div class="container d-flex justify-content-center mt-50 mb-50">
        <div class="row">
            <div class="col-md-12 text-right mb-3">
                <a href="view_customer.php" class="btn btn-primary" id="download"> Back</a>
                <button class="btn btn-primary" id="download"> download pdf</button>
            </div>
            <div class="col-md-12">
			<?php $query1= mysqli_query($conn,"SELECT * FROM customer_details where customer_id='$cus_id'order by id desc");
					$rows = mysqli_fetch_assoc($query1);
					$emp_id1= $rows['emp_id1'];
					?>
                <div class="card" id="invoice">
                    <div class="card-header bg-transparent header-elements-inline">
                        <h6 class="card-title text-primary">Customer Details</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6">
							 <div class="mb-4 mb-md-2 text-left">
                                <ul class="list list-unstyled mb-0">
                                    <li>
                                        <h5 class="my-2">Employee Name : <?php echo $rows['emp_name']; ?></h5>
                                    </li>
                                    <li><span class="font-weight-semibold">Employee Code : <?php echo $rows['emp_id']; ?></span></li>
                                    
                                </ul>
                            </div>
                                
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4 ">
                                    <div class="text-sm-right">
                                        <h4 class="invoice-color mb-2 mt-md-2">Customer Name : <?php echo $rows['cust_name'] ?></h4>
                                        <ul class="list list-unstyled mb-0">
                                            <li>Customer Id : <span class="font-weight-semibold"><?php echo $rows['customer_id'] ?></span></li>
                                            <li>Mobile Number : <span class="font-weight-semibold"><?php echo $rows['cell_no'] ?></span></li>
                                            <li>Mail id : <span class="font-weight-semibold"><?php echo $rows['mail_id'] ?></span></li>
                               
										   <li>Residence Address : <span class="font-weight-semibold"><?php echo $rows['residence_address'] ?></span></li>
                                          </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
						       <div class="row">
                            <div class="col-sm-6">
							 <div class="mb-4 mb-md-2 text-left">
                                  <ul class="list list-unstyled mb-0 text-left">
                                        <li>Lead Owner : <?php echo $rows['lead_owner'] ?></li>
                                        <li>Source : <?php echo $rows['select_one'] ?></li>
                                        <li>Other Notes : <?php echo $rows['other_notes'] ?></li>
                                        <li>Customer Meeting : <?php if($rows['cust_first_meeting']=='First Meeting') {?>
										First Meeting, 
										<?php } else{ ?>
										
										<?php } ?>
										 <?php if($rows['cust_second_meeting']=='Second Meeting') {?>
										Second Meeting,
										<?php } else{ ?>
										
										<?php } ?>
										 <?php if($rows['cust_sitevisit_meeting']=='Site Visit') {?>
										Site Visit
										<?php } else{ ?>
										
										<?php } ?>
										</li>
									 <?php if($rows['cust_first_meeting_date']>0){
												?>
														<li>First Meeting Date : <?php echo date('d-m-Y', strtotime($rows['cust_first_meeting_date'])); ?></li>
                                   
									 <?php } ?>
											 <?php if($rows['cust_second_meeting_date']>0){
												?>
														<li>Second Meeting Date : <?php echo date('d-m-Y', strtotime($rows['cust_second_meeting_date'])); ?></li>
                                   
									 <?php } ?>
									  <?php if($rows['cust_sitevisit_meeting_date']>0){
												?>
														<li>Site Visiting Date : <?php echo date('d-m-Y', strtotime($rows['cust_sitevisit_meeting_date'])); ?></li>
                                   
									 <?php } ?>
												
                                    </ul>
                            </div>
                                
                            </div>
                            <div class="col-sm-6">
                                <div class="mb-4 ">
                                    <div class="text-sm-right">
                                      <ul class="list list-unstyled text-right mb-0 ml-auto">
                                         <li>Project Interested : <span class="font-weight-semibold"><?php echo $rows['project_interest'] ?></span></li>
                                            <li>Occupation : <span class="font-weight-semibold"><?php echo $rows['occupation'] ?></span></li>
                                            <li>Funding Option : <span class="font-weight-semibold"><?php echo $rows['fund_option'] ?></span></li>
                                            <li>Take Home Rs. : <span class="font-weight-semibold"><?php echo $rows['take_home_rs'] ?></span></li>
                                            <li>Budget : <span class="font-weight-semibold"><?php echo $rows['budget'] ?></span></li>
                                           
                                    </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
						       <div class="row">
                            <div class="col-sm-6">
							 <div class="mb-4 mb-md-2 text-left">
                                <ul class="list list-unstyled mb-0">
                                   <ul class="list list-unstyled mb-0 text-left">
                                     
									 <?php if($rows['first_meet_comments']>0){
												?>
														<li>First Meeting Comments : <?php echo $rows['first_meet_comments'] ?></li>
                                   
									 <?php } ?>
											 <?php if($rows['second_meet_comments']>0){
												?>
														<li>Second Meeting Comments: <?php echo $rows['second_meet_comments'] ?></li>
                                   
									 <?php } ?>
									  <?php if($rows['sitevisit_comments']>0){
												?>
														<li>Site Visit Comments : <?php echo $rows['sitevisit_comments'] ?></li>
                                   
									 <?php } ?>
										   <li>Next Action : <?php echo $rows['next_action'] ?></li>
                                    		
											<?php if($rows['next_action_date']>0){ ?> 
											<li>Next Action Date : <?php echo $rows['next_action_date']; ?></li>
											<?php } ?>
							     
                                    </ul>
                                </ul>
                            </div>
                                
                            </div>
                      
                        </div>
                        
                    </div>
                   
                   
                </div>
            </div>
        </div>
    </div>
</body>

</html>