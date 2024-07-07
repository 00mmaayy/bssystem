<?php if(isset($_REQUEST['shares'])) { ?>   
	<div class="w3-col">
      <div class="w3-container w3-blue w3-padding-15">
	    <div class="w3-left w3-xlarge"><i class="fa fa-share-alt w3-xlarge"></i>  Shares</div>
      </div>
		
		<br/>
			
				<div class="col-xs-4">
					<div class="w3-left">Search Member Shares:</div>
				</div><br/>
				<form method="get">
					<input name="shares" type="hidden" value="1">
					<div class="col-xs-4">
						<input class="form-control" id="ex1" placeholder="Input Lastname" name="search_member_lastname" type="text" />
					</div>
					<input type="submit" class="btn btn-danger" value="Search"><br><br>
				</form>
				
				
				
				
<?php 				
	if(isset($_REQUEST['summary']))
		{
			$sxx="select 
					( select sum(amount) from m_shares where account_tag='cash_receipts' ) as total_deposit,
					( select sum(amount) from m_shares where account_tag='cash_disbursement' ) as total_withdrawal
				 ";
			$qxx=mysqli_query($conn, $sxx) or die(mysqli_error($conn));
			$rxx=mysqli_fetch_assoc($qxx);
			
			
			$sxx4="select date, time, amount from m_shares where account_tag='cash_receipts' order by time,date desc limit 1";
			$qxx4=mysqli_query($conn, $sxx4) or die(mysqli_error($conn));
			$rxx4=mysqli_fetch_assoc($qxx4);		
			
			$sxx5="select date, time, amount from m_shares where account_tag='cash_disbursement' order by time,date desc limit 1";
			$qxx5=mysqli_query($conn, $sxx5) or die(mysqli_error($conn));
			$rxx5=mysqli_fetch_assoc($qxx5);	
			
			echo "<div class='w3-container'><br/>
					<table class='table'>
						<tr class='w3-lime'>
							<td colspan='7' class='w3-large'>
								<b>SHARES SUMMARY</b>
							</td>
						</tr>
						<tr class='w3-sand'>
							<td>TOTAL DEPOSITS</td>
							<td>LAST DEPOSIT AMOUNT / DATE</td>
							<td>LAST WITHDRAWAL AMOUNT / DATE</td>
						</tr>"; 
						echo "<tr class='w3-hover-pale-red'>
								<td>".number_format($rxx['total_deposit']-$rxx['total_withdrawal'],2)."</td>
								<td>(".number_format($rxx4['amount'],2).") ".$rxx4['date']." ".$rxx4['time']."</td>
								<td>(".number_format($rxx5['amount'],2).") ".$rxx5['date']." ".$rxx5['time']."</td>
							  </tr>";
				echo "</table>";
			echo "</div>";
		}
?>									
				
				
				
				

				<?php if (isset($_REQUEST['search_member_lastname'])) { ?>
					<div><br/>Search <span class='w3-text-red'>"<?php echo $_REQUEST['search_member_lastname']; ?>"</span> Results:<br/>
						<table class="table table-hover">
							<thead>
								<tr>
									<th width=150>Member Code / CIS</th>
									<th width=200>Member Name</th>
									<th width=150>Shares</th>
									<th>Date of Last Transaction</th>
									<th></th>
								</tr>
							</thead>
							<tbody>
								<?php
								if(isset($_REQUEST['membercode']))
								{
								$membercode=$_REQUEST['membercode'];
								$membercode11="a.member_code=$membercode and";
								}else{ $membercode11=""; }
							
								
								$term = $_REQUEST['search_member_lastname'];
								$sq2 = "select a.*, b.trans_date from m_members a left join m_shares b on a.member_code=b.member_code where $membercode11 l_name like '%$term%' order by l_name asc";
								$rlt2 = mysqli_query($conn, $sq2) or die(mysqli_error($conn));
								$rw2 = mysqli_fetch_assoc($rlt2);

								do {

									$member_code = $rw2['member_code'];
									//deposit total
									$sq3 = "select sum(amount) as deposit_total from m_shares where account_tag='cash_receipts' and member_code=$member_code";
									$rlt3 = mysqli_query($conn, $sq3) or die(mysqli_error($conn));
									$rw3 = mysqli_fetch_assoc($rlt3);
									
									//withdrawal total
									$sq7 = "select sum(amount) as withdrawal_total from m_shares where account_tag='cash_disbursement' and member_code=$member_code";
									$rlt7 = mysqli_query($conn, $sq7) or die(mysqli_error($conn));
									$rw7 = mysqli_fetch_assoc($rlt7);
									

									$sharetotal = number_format($rw3['deposit_total']-$rw7['withdrawal_total'],2);
									
									if($sharetotal<=0){ $sharetotal1="<b class='w3-text-red'>".$sharetotal."</b>"; }
									              else{ $sharetotal1="<b class='w3-text-indigo'>".$sharetotal."</b>"; }

									echo "<tr><td>" . $rw2['member_code'] . "</td>
			           <td><a href='admin.php?members=1&search_member_lastname=".$rw2['l_name']."&membersearch=1&membercode=".$rw2['member_code']."'>".$rw2['l_name'].", ".$rw2['f_name']."</a></td>
					   <td>Php $sharetotal1</td>";
					   
					   if($sharetotal > 0)
					    {
							echo "<td>" . date('m/d/Y',strtotime($rw2['trans_date'])) . "</td>";
						}
						else { echo "<td></td>";}
						
				 echo "<td>
					   <form method='get'>
					   <input name='shares' type='hidden' value='1'>
		               <input name='membercode' type='hidden' value='" . $rw2['member_code'] . "'>
					   <input name='search_member_lastname' type='hidden' value='" . $rw2['l_name'] . "'>";
				
					if($access['d2']==1)
					{  echo "<input name='manage_shares' type='submit' class='btn btn-warning' value='Manage Shares'>&nbsp;&nbsp;&nbsp;"; }
					
					if($access['d3']==1)	
				    {  echo "<input name='view_history' type='submit' class='btn btn-success' value='View Shares History'></form></td>"; }
									echo "</tr>"; ?>

									<?php if (isset($_REQUEST['view_history'])) { ?>
										<tr>
											<td>
												<form method="get" action="m_shares/script_view_shares_history.php" target="_blank">
													<input name="shares" type="hidden" value="1">
													<input name="membercode" type="hidden" value="<?php echo $rw2['member_code']; ?>">
													<input name="l_name" type="hidden" value="<?php echo $rw2['l_name']; ?>">
													<input type="submit" class="btn btn-danger" value="Generate Shares History">
												</form>
											</td>
										</tr>
									<?php } ?>

									
									
									
									
								<?php if (isset($_REQUEST['manage_shares'])) 
									    { ?>
										<tr>
											<td colspan="3">
											
												<hr/>
												<div style='border-style:dotted' align='center'><b>SHARE ACCOUNT MANAGEMENT</b></div>
												<br/>
												
												<div align='center'>
													<a class='btn btn-info' href='admin.php?shares=1&membercode=<?php echo $_REQUEST['membercode']; ?>&search_member_lastname=<?php echo $_REQUEST['search_member_lastname']; ?>&manage_shares=Manage+Shares&account_tag=cash_receipts'>CASH RECEIPTS (IN)</a>
													&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
													<a class='btn btn-info' href='admin.php?shares=1&membercode=<?php echo $_REQUEST['membercode']; ?>&search_member_lastname=<?php echo $_REQUEST['search_member_lastname']; ?>&manage_shares=Manage+Shares&account_tag=cash_disbursement'>CASH DISBURSEMENT (OUT)</a>
												</div>
												
												<br/><br/>
												<?php if(isset($_REQUEST['account_tag'])){ echo "<b class='w3-text-red w3-large'>".$_REQUEST['account_tag']."</b>"; } ?>
												<div style='border-bottom:1px dashed black; height=2px; width=100%'></div>
												<br/>
												
										<?php if(isset($_REQUEST['account_tag']))
										      { ?>
										  
										  
										  
										  
										  
												<form method="get" action="m_shares/script_shares_transactions.php">
														<input name="membercode" type="hidden" value="<?php echo $rw2['member_code']; ?>">
														<input name="search_member_lastname" type="hidden" value="<?php echo $rw2['l_name']; ?>">
														
													<div class="col-xs-7">
														Input Amount
														<input required class="form-control" id="ex1" placeholder="Amount" name="account_amount" type="number" />
														
														<br/>
														
													
															<?php if($_REQUEST['account_tag']=='cash_receipts') 
																	{ ?>
																	
																	<input name="account_tag" type="hidden" value="<?php echo $_REQUEST['account_tag']; ?>">
																	
																	Transaction
																	<select required class="form-control" name="account_transaction" />
																		<option disabled selected></option>
																		<option value='capital_shares'>Capital Shares</option>
																	</select>
																	
															  <?php } 
																  
																  if($_REQUEST['account_tag']=='cash_disbursement')
																	{ ?>
																		
																	<input name="account_tag" type="hidden" value="<?php echo $_REQUEST['account_tag']; ?>">
																	
																	Transaction
																	<select required class="form-control" name="account_transaction" />
																		<option disabled selected></option>
																		<option value='withdrawal_of_capital_share'>Withdrawal of Capital Share</option>
																	</select>	
																		
															  <?php } ?>
															
												
											 			
														<br />
														
														Transaction Date
														<input required class="form-control" id="ex1" name="trans_date" type="date" value="<?php echo date("Y-m-d"); ?>">
														
														<br />
														
														Remarks (optional)
														<input class="form-control" id="ex1" placeholder="Remarks" name="remarks" type="text">
													</div>
													
														<br />
														
														<input type="submit" class="btn btn-danger" value="Update" onclick="return confirm('Are you sure?')">
												</form>
											
											  <?php } ?>	
												
											</td>
										</tr>
										
								<?php } ?>

									
									
									<?php if (isset($_REQUEST['add_success'])) {
										echo "<tr><td><div style='color:#0066FF' class='w3-left w3-small'>Shares Updated!</div></td></tr>";
									} ?>


								<?php } while ($rw2 = mysqli_fetch_assoc($rlt2)); ?>

							</tbody>
						</table>

					</div>

	</div>
			<?php }
} ?>
