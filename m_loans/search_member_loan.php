  <?php if(isset($_REQUEST['search_member_loan'])) 
	    { ?>		
		<br/>Search Member Loan:<br/>
		
		<table>
			<tr>
				<td>
					<div>
						<!--search last name-->
						<form method="get">
							<input name='loans' type='hidden' value='1'>
							<input name='search_member_loan' type='hidden' value='1'>
							
							<input class="form-control" id="ex1" placeholder="Input Lastname" name="search_member_lastname" type="text" />
				</td>
				<td>&nbsp;</td>
				<td>
							<input type="submit" class="btn btn-danger" value="Search Name">
						</form>
					</div>
				</td>
			</tr>
			<tr><td>&nbsp;</td></tr>
			<tr>
				<td>
					<div>
						<!--search PN-->
						<form method="get">
							<input name='loans' type='hidden' value='1'>
							<input name='search_member_loan' type='hidden' value='1'>
							
							<input class="form-control" id="ex1" placeholder="Input PN" name="search_pn" type="text" />
				</td>			
				<td>&nbsp;</td>
				<td>
				
							<input type="submit" class="btn btn-danger" value="Search PN">
						</form>
				</td>
			</tr>
		</table>
		
		</div>
				
				
				
	  <?php if(isset($_REQUEST['search_member_lastname'])) 
			{ ?>
				<div><br/>Search <span class='w3-text-red'>"<?php echo $_REQUEST['search_member_lastname']; ?>"</span> Results:<br/>
					<table class="table table-hover" >
							<tr>
								<th width=150>Member Code / CIS</th>
								<th width=200>Member Name</th>
								<th width=150>Loan Number</th>
								<th width=150>Loan Amount</th>
								<th width=150>Date of Release</th>
								<th></th>
								<th width=100></th>
								<th width=100></th>
							</tr>
						
							<?php
							if(isset($_REQUEST['membercode']))
							{
								$membercode=$_REQUEST['membercode'];
								$membercode11="member_code=$membercode and";
							}else{ $membercode11=""; }
							
							$term = $_REQUEST['search_member_lastname'];
							$sq2 = "select * from m_members where $membercode11 l_name like '%$term%' order by l_name asc";
							$rlt2 = mysqli_query($conn, $sq2) or die(mysqli_error($conn));
							$rw2 = mysqli_fetch_assoc($rlt2); ?>

							<?php

							do {

								$member_code = $rw2['member_code'];
								$sq3 = "select * from m_loans where member_code=$member_code";
								$rlt3 = mysqli_query($conn, $sq3) or die(mysqli_error($conn));
								$rw3 = mysqli_fetch_assoc($rlt3);
								

								echo "<tr><td>" . $rw2['member_code'] . "</td>
			           <td><a href='admin.php?members=1&membersearch=1&membercode=".$rw2['member_code']."'>".$rw2['l_name'].", ". $rw2['f_name']."</a></td>
					   <td colspan='4'>";

								echo "<table>";
								do {
									echo "<tr>";
										
									  if($rw3['loan_type']=='str')
										{ $type = 'Straight'; }
								  elseif($rw3['loan_type']=='dim')
										{ $type = 'Diminishing'; }
									else{ $type=''; }
										
										echo "
										    <td width='150'>" .$rw3['loan_no'] . " <i class='w3-tiny'>$type</i></td>
											<td width='150'>" . number_format($rw3['loan_amount'], 2, '.', ',') . "</td>
											<td width='150'>" . $rw3['date_approve'] . "</td>
										     ";
											 
									 echo "<td>
										   <form method='get' action='m_loans/script_view_loan_details.php' target='_blank'>
										   <input name='loans' type='hidden' value='1'>
										   <input name='membercode' type='hidden' value='".$rw2['member_code']."'>
										   <input name='search_member_lastname' type='hidden' value='".$rw2['l_name']."'>
										   <input name='loan_no' type='hidden' value='".$rw3['loan_no']."'>
										   <input name='update' type='hidden' value='0' />
										   <input name='id' type='hidden' value='' />";
									
				if($access['b4']==1){ echo "<input name='view_history' type='submit' class='btn btn-success' value='View Loan Details'>"; }
								  	 
									 echo "</form>
										   </td>
										   </tr>";
									} while ($rw3 = mysqli_fetch_assoc($rlt3));
								echo "</table>"; ?>
								<td>
									<form method='get' action='m_loans/create_loans.php'>
										<input name='member_code' type='hidden' value='<?php echo $rw2['member_code']; ?>'>
										<input name='search_member_lastname' type='hidden' value='<?php echo $_REQUEST['search_member_lastname']; ?>'>
		  <?php if($access['b3']==1){ ?><input name='create_loan' type='submit' class='btn btn-warning' value='Create Loan'><?php } ?>
									</form>
								</td>
								<?php echo "</td></tr>"; ?>

					<?php } while ($rw2 = mysqli_fetch_assoc($rlt2)); ?>

					</table>

				</div>
		<?php } 
		
		
		
		  if(isset($_REQUEST['search_pn'])) 
			{ ?>
				<div><br/><br/><br/><br/><br/><br/>Search <span class='w3-text-red'>"<?php echo $_REQUEST['search_pn']; ?>"</span> Results:<br/>
					<table class="table table-hover" >
							<tr>
								<th width=150>Member Code / CIS</th>
								<th width=200>Member Name</th>
								<th width=150>Loan Number</th>
								<th width=150>Loan Amount</th>
								<th width=150>Date of Release</th>
								<th></th>
								<th width=100></th>
								<th width=100></th>
							</tr>
						
							
							<?php
							$term = $_REQUEST['search_pn'];
							$sq3 = "select * from m_loans where loan_no like '%$term%'";
							$rlt3 = mysqli_query($conn, $sq3) or die(mysqli_error($conn));
							$rw3 = mysqli_fetch_assoc($rlt3);
							
							
							$member_code11 = $rw3['member_code'];
							$sq2 = "select * from m_members where member_code=$member_code11";
							$rlt2 = mysqli_query($conn, $sq2) or die(mysqli_error($conn));
							$rw2 = mysqli_fetch_assoc($rlt2);
							
							
								
								

			 echo "<tr><td>" . $rw3['member_code'] . "</td>
			           <td><a href='admin.php?members=1&membersearch=1&membercode=".$rw3['member_code']."'>".$rw2['l_name'].", ". $rw2['f_name']."</a></td>
					   <td colspan='4'>";

								echo "<table>";
								do {
									echo "<tr>";
										
									  if($rw3['loan_type']=='str')
										{ $type = 'Straight'; }
								  elseif($rw3['loan_type']=='dim')
										{ $type = 'Diminishing'; }
									else{ $type=''; }
										
										echo "
										    <td width='150'>" .$rw3['loan_no'] . " <i class='w3-tiny'>$type</i></td>
											<td width='150'>" . number_format($rw3['loan_amount'], 2, '.', ',') . "</td>
											<td width='150'>" . $rw3['date_approve'] . "</td>
										     ";
											 
									 echo "<td>
										   <form method='get' action='m_loans/script_view_loan_details.php' target='_blank'>
										   <input name='loans' type='hidden' value='1'>
										   <input name='membercode' type='hidden' value='".$rw2['member_code']."'>
										   <input name='search_member_lastname' type='hidden' value='".$rw2['l_name']."'>
										   <input name='loan_no' type='hidden' value='".$rw3['loan_no']."'>
										   <input name='update' type='hidden' value='0' />
										   <input name='id' type='hidden' value='' />";
									
				if($access['b4']==1){ echo "<input name='view_history' type='submit' class='btn btn-success' value='View Loan Details'>"; }
								  	 
									 echo "</form>
										   </td>
										   </tr>";
									} while ($rw3 = mysqli_fetch_assoc($rlt3));
								echo "</table>"; ?>
								<td>
									<form method='get' action='m_loans/create_loans.php'>
										<input name='member_code' type='hidden' value='<?php echo $rw2['member_code']; ?>'>
										<input name='search_member_lastname' type='hidden' value='<?php echo $_REQUEST['search_member_lastname']; ?>'>
		  <?php if($access['b3']==1){ ?><input name='create_loan' type='submit' class='btn btn-warning' value='Create Loan'><?php } ?>
									</form>
								</td>
								<?php echo "</td></tr>"; ?>

					

					</table>

				</div>
		<?php }
		
		
		
		
		
		
		
		
		
		
		
		} ?>