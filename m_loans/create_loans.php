	<?php
session_start();
include('../conn/conn.php');
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); } ?>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>


			<?php if (isset($_REQUEST['create_loan'])) {
				$member_code = $_REQUEST['member_code'];
				$sq4 = "select * from m_members where member_code=$member_code";
				$rlt4 = mysqli_query($conn, $sq4) or die(mysqli_error($conn));
				$rw4 = mysqli_fetch_assoc($rlt4);

				?>

				<div class="w3-col">
					<div class="w3-container w3-blue w3-padding-15">
						<div class="w3-left w3-xlarge"><i class="fa fa-credit-card w3-xlarge"></i> Loans &nbsp;> <i class="fa fa-pencil fa-fw"></i> Create New Loan</div>
					</div>
					<br><a href="../admin.php?loans=1&search_member_loan=1&membercode=<?php echo $_REQUEST['member_code']; ?>&search_member_lastname=<?php echo $_REQUEST['search_member_lastname']; ?>" class="w3-padding"><i class="fa fa-reply fa-fw"></i> RETURN</a>
					<div class="w3-padding w3-xlarge"></div>
				</div>
				<div class="col-xs-12">
					<?php echo "Name of Borrower: <strong>" . $rw4['f_name'] . " " . $rw4['m_name'] . " " . $rw4['l_name'] . "</strong><br>";
					echo "Address: <strong>" . $rw4['present_address_street'] . " " . $rw4['present_address_bgy'] . " " . $rw4['present_address_city'] . " " . $rw4['present_address_province'] . " " . $rw4['present_zipcode'] . " </strong>";
					?>
					<br/><br/>





				<table>
				
				<form method='get'>
				
					<input name="member_code" type="hidden" value="<?php echo $_REQUEST['member_code']; ?>">
					<input name="search_member_lastname" type="hidden" value="<?php echo $_REQUEST['search_member_lastname']; ?>">
					<input name="create_loan" type="hidden" value="<?php echo $_REQUEST['create_loan']; ?>">
					
					
					<tr>
						<td>
							<?php if(isset($_REQUEST['pn_date'])){ ?>
							<input class="form-control" required name="pn_date" type="date" value="<?php echo $_REQUEST['pn_date']; ?>">
							<?php } else { ?>
							<input class="form-control" required name="pn_date" type="date">
							<?php } ?>
						</td>
						<td>&nbsp;&nbsp;Date</td>
					</tr>
					
					<tr>
						<td>
							<?php if(isset($_REQUEST['pn_no'])){ ?>
							<input class="form-control" required name="pn_no" type="number" value="<?php echo $_REQUEST['pn_no']; ?>">
							<?php } else { ?>
							<input class="form-control" required name="pn_no" type="number">
							<?php } ?>
						</td>
						<td>&nbsp;&nbsp;PN No</td>
					</tr>
			
					<tr>
						<td>
							<select class="form-control" required name="pn_loan_type1">
								<option><?php if(isset($_REQUEST['pn_loan_type1'])){ echo $_REQUEST['pn_loan_type1']; } else { echo ""; } ?></option>
								<option>SL</option>
								<option>SLCA</option>
								<option>REG</option>
								<option>CML</option>
								<option>SBL</option>
								<option>EML</option>
								<option>CAM</option>
								<option>CAY</option>
								<option>CAC</option>
							</select>
						</td>
						<td>&nbsp;&nbsp;Loan Type</td>
					</tr>
			
					<tr>
						<td><input name="set_loan_type" type="submit" value="set"></td>
					</tr>
				
				
				</form>
				
				
					<tr><td>&nbsp;</td></tr>
					
					<?php if(isset($_REQUEST['pn_loan_type1'])){ ?>
					<tr>
						
						<td>
						<?php 
							if($_REQUEST['pn_loan_type1']=="SL") 
							{ ?>
							<select class="form-control" required name="pn_loan_type2">
								<option></option>
								<option>AM-GE</option>
								<option>AM-PE</option>
								<option>RM-GE</option>
								<option>RM-PE</option>
							</select>
					  <?php } 
					        elseif($_REQUEST['pn_loan_type1']=="REG")
							{ ?>
							<select class="form-control" required name="pn_loan_type2">
								<option value="RM">Regular Member</option>
							</select>
					  <?php }
					  elseif($_REQUEST['pn_loan_type1']=="CML")
							{ ?>
							<select class="form-control" required name="pn_loan_type2">
								<option></option>
								<option value="AM">Associate Member</option>
								<option value="RM">Regular Member</option>
							</select>
							<?php } ?>		
						</td>
					   
						
						
						
						<td>&nbsp;&nbsp;Borrower Type</td>
					
					</tr>
					<?php } else {} ?>
					
					<tr>
						<td>&nbsp;</td>
					</tr>
					

					<tr>
												<td>
												   <select class="form-control" name="interest_rate">
													 <option>0</option>
													<?php $sxx="select * from m_loans_rates"; 
														  $qxx=mysqli_query($conn, $sxx) or die(mysqli_error($conn));
														  $rxx=mysqli_fetch_assoc($qxx);
														  do{
															echo "<option value=".$rxx['interest_rate'].">".$rxx['rate_desc']."</option>";  
														  }while($rxx=mysqli_fetch_assoc($qxx));
													?>	
												   </select>
												</td>
												<td>&nbsp;&nbsp;Interest Rate</td>
											</tr>
				
				</table>
				








		    <form method="get" action="script_create_loan.php">
						<br>
						<table border="0">
							
							
							
							<input name="member_code" type="hidden" value="<?php echo $_REQUEST['member_code']; ?>">
							<input name="search_member_lastname" type="hidden" value="<?php echo $_REQUEST['search_member_lastname']; ?>">
							
							
							
							<tr valign='top'>
							
							    <td>
									<div class="w3-padding w3-medium">
										
										<span style="color:#FF0000">*</span> PN No:
										
										
										
										
										
										
										
										
										
										
										
										
										<!--<input class="form-control" required name="loan_no" type="text">-->
									
									</div>
								</td>
							
								<td>
									<div class="w3-padding w3-medium">
										<span style="color:#FF0000">*</span> Computation Type:
										<select class="form-control" required name="computation">
											<option></option>
											<option value="str">Straight</option>
											<option value="dim">Diminishing</option>
										</select>
									</div>
								</td>
								
							</tr>

							<tr>
								<td>
									<div class="w3-padding w3-medium">
										<span style="color:#FF0000">*</span> Loan Amount:
										<input class="form-control" required name="loan_amount" type="number">
									</div>
								</td>

							</tr>
							<tr>
								<td>
									<div class="w3-padding w3-medium"><span style="color:#FF0000">*</span> Loan Term: <select class="form-control" required name="loan_term">
											<option></option>
										<?php $sxx1="select * from m_loans_terms"; 
											  $qxx1=mysqli_query($conn, $sxx1) or die(mysqli_error($conn));
											  $rxx1=mysqli_fetch_assoc($qxx1);
											  do{
												echo "<option value=".$rxx1['loan_terms'].">".$rxx1['terms_desc']."</option>";  
											  }while($rxx1=mysqli_fetch_assoc($qxx1));
										?>	
										</select></div>
								</td>
								<td>
									<div class="w3-padding w3-medium"> Date Granted:
										<input class="form-control" name="loan-date" type="date" value="<?php echo date('Y-m-d'); ?>">
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="w3-padding w3-medium"><span style="color:#FF0000">*</span> Loan Schedule:
										<select class="form-control" required name="loan-sched">
											<option></option>
											<option value="mon">Monthly </option>
											<option value="semi">Semi-monthly </option>
										</select>
									</div>
								</td>

								<td>
									<div class="w3-padding w3-medium">
										<span style="color:#FF0000">*</span> Notarial Fee:
										<input class="form-control" required name="notarial_fee" type="number">
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="w3-padding w3-medium"><span style="color:#FF0000">*</span> Semi-monthly schedule: <br />
										<span style="font-size: 11px"><i>Month: Start date</i></span>
										<select class="form-control" required name="semi-month">
											<option></option>
											<option value="01" <?php if(date('m') == '01'){ echo 'selected';} ?>>January</option>
											<option value="02" <?php if(date('m') == '02'){ echo 'selected';} ?>>February</option>
											<option value="03" <?php if(date('m') == '03'){ echo 'selected';} ?>>March</option>
											<option value="04" <?php if(date('m') == '04'){ echo 'selected';} ?>>April</option>
											<option value="05" <?php if(date('m') == '05'){ echo 'selected';} ?>>May</option>
											<option value="06" <?php if(date('m') == '06'){ echo 'selected';} ?>>June</option>
											<option value="07" <?php if(date('m') == '07'){ echo 'selected';} ?>>July</option>
											<option value="08" <?php if(date('m') == '08'){ echo 'selected';} ?>>August</option>
											<option value="09" <?php if(date('m') == '09'){ echo 'selected';} ?>>September</option>
											<option value="10" <?php if(date('m') == '10'){ echo 'selected';} ?>>October</option>
											<option value="11" <?php if(date('m') == '11'){ echo 'selected';} ?>>November</option>
											<option value="12" <?php if(date('m') == '12'){ echo 'selected';} ?>>December</option>
										</select>
										<span style="font-size: 11px"><i>Date: 1st schedule</i></span>
										<select class="form-control" required name="semi-date-first">
											<option></option>
											<option>01</option>
											<option>02</option>
											<option>03</option>
											<option>04</option>
											<option>05</option>
											<option>06</option>
											<option>07</option>
											<option>08</option>
											<option>09</option>
											<option>10</option>
											<option>11</option>
											<option>12</option>
											<option>13</option>
											<option>14</option>
											<option selected>15</option>
											<option>16</option>
											<option>17</option>
											<option>18</option>
											<option>19</option>
											<option>20</option>
											<option>21</option>
											<option>22</option>
											<option>23</option>
											<option>24</option>
											<option>25</option>
											<option>26</option>
											<option>27</option>
											<option>28</option>
											<option>29</option>
											<option>30</option>
											<option>31</option>
										</select>
										<span style="font-size: 11px"><i>Date: 2nd schedule</i></span>
										<select class="form-control" required name="semi-date-second">
											<option></option>
											<option>01</option>
											<option>02</option>
											<option>03</option>
											<option>04</option>
											<option>05</option>
											<option>06</option>
											<option>07</option>
											<option>08</option>
											<option>09</option>
											<option>10</option>
											<option>11</option>
											<option>12</option>
											<option>13</option>
											<option>14</option>
											<option>15</option>
											<option>16</option>
											<option>17</option>
											<option>18</option>
											<option>19</option>
											<option>20</option>
											<option>21</option>
											<option>22</option>
											<option>23</option>
											<option>24</option>
											<option>25</option>
											<option>26</option>
											<option>27</option>
											<option>28</option>
											<option>29</option>
											<option selected>30</option>
											<option>31</option>
										</select>
										<span style="font-size: 11px"><i>Year</i></span>
										<input class="form-control" required name="semi-year" type="number" value="<?php echo date('Y'); ?>">
									</div>
								</td>
								<td>
									<div class="w3-padding w3-medium">
										<span style="color:#FF0000">*</span> Service Charge:
										<input class="form-control" required name="service_charge" type="number">
									</div>

									<div class="w3-padding w3-medium">
										<span style="color:#FF0000">*</span> Insurance Premium:
										<input class="form-control" required name="insurance_premium" type="number">
									</div>

									<div class="w3-padding w3-medium"> Other Charges:
										<input class="form-control" name="other_charges" type="number">
									</div>

									<div class="w3-padding w3-medium">
										<input class="form-control" id="ex1" placeholder="Other Charges Remarks" name="other_charges_remarks" type="text" />
									</div>
								</td>
							</tr>
							<tr>
								<td>
									<div class="w3-padding w3-medium">
										<input name="create_loan_now" type="submit" class="btn btn-danger" value="Create Loan Now" onclick="return confirm('Are you sure?')">
									</div>
								</td>
							</tr>
						</table>
					</form>
				</div>

			</div>
		<?php } ?>
		<!---Create Loan End--->