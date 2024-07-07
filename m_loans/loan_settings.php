  <?php if(isset($_REQUEST['loan_settings'])) 
	    { ?>	
		<div class="col-xs-10">
			<br/>
			<table class='table'>
				<tr class='w3-green'>
					<td><b>LOAN RATES</b></td><td><b>LOAN TERMS</b></td>
				</tr>
				<tr>		
					<td>
						<table class='table w3-border'>
							<tr>
								<td>ID</td>
								<td>INTEREST RATE</td>
								<td>INTEREST DESCRIPTION</td>
								<td>CREATED BY</td>
								<td>DATE TIME</td>
							</tr>
							<?php
							$s_r="select * from m_loans_rates order by id asc";
							$q_r=mysqli_query($conn, $s_r) or die(mysql_error($conn));
							$r_r=mysqli_fetch_assoc($q_r);
							do{
								echo "<tr>
										<td>".$r_r['id']."</td>
										<td>".$r_r['interest_rate']."</td>
										<td>".$r_r['rate_desc']."</td>
										<td>".$r_r['add_by']."</td>
										<td>".$r_r['add_date']."</td>
									  </tr>";
							}while($r_r=mysqli_fetch_assoc($q_r));
							?>
						</table>
					</td>
					<td>
						<table class='table w3-border'>
							<tr>
								<td>ID</td>
								<td>LOAN TERM</td>
								<td>TERM DESCRIPTION</td>
								<td>CREATED BY</td>
								<td>DATE TIME</td>
							</tr>
							<?php
							$s_r="select * from m_loans_terms order by id asc";
							$q_r=mysqli_query($conn, $s_r) or die(mysql_error($conn));
							$r_r=mysqli_fetch_assoc($q_r);
							do{
								echo "<tr>
										<td>".$r_r['id']."</td>
										<td>".$r_r['loan_terms']."</td>
										<td>".$r_r['terms_desc']."</td>
										<td>".$r_r['add_by']."</td>
										<td>".$r_r['add_date']."</td>
									  </tr>";
							}while($r_r=mysqli_fetch_assoc($q_r));
							?>
						</table>
					</td>
				</tr>	
			</table>
			
			<?php if($access['b2']==1)
			{ if(isset($_REQUEST['add_success'])){ echo "<div align='center'><b class='w3-text-green w3-large'>New Data Add Success!</b></div>";}
			?>
			<table class='table'>
				<tr class='w3-lime'>
					<td><b>ADD LOAN RATES</b></td><td><b>ADD LOAN TERMS</b></td>
				</tr>
				<tr>		
					<td>
						<table class='table w3-border'>
							<tr>
								<td>INTEREST RATE</td>
								<td>INTEREST DESCRIPTION</td>
								<td>CREATED BY</td>
							</tr>
							<tr>
								<form method='get' action='m_loans/script_loans_settings.php'>
								<td><input required name='interest_rate' type='number' step='any'></td>
								<td><input required name='interest_desc' type='type'></td>
								<td><input type='submit' value='ADD RATE' onclick='return confirm("ADD RATE NOW?")'></td>
								</form>
							</tr>
						</table>
					</td>
					<td>
						<table class='table w3-border'>
							<tr>
								<td>LOAN TERM</td>
								<td>TERM DESCRIPTION</td>
								<td>CREATED BY</td>
							</tr>
							<tr>
								<form method='get' action='m_loans/script_loans_settings.php'>
								<td><input required name='loan_term' type='number' step='any'></td>
								<td><input required name='term_desc' type='type'></td>
								<td><input type='submit' value='ADD TERM' onclick='return confirm("ADD TERM NOW?")'></td>
								</form>
							</tr>
						</table>
					</td>
				</tr>	
			</table>
	  <?php } ?>
	  
	 </div>		
  <?php } ?>	 