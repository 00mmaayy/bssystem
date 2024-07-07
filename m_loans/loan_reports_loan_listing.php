<?php
if(isset($_REQUEST['loan_reports_loan_listing']))
{ ?>
		<br/>
		<div class='w3-container'>
		
			<?php
				//$membercode=$_REQUEST['membercode'];
				//$loan_no=$_REQUEST['loan_no'];

				$s9="select a.l_name, a.f_name, b.member_code, b.loan_no, b.date_approve, b.date_mature, b.loan_status, b.loan_amount, b.loan_schedule, b.loan_term, b.loan_type, c.amort_principal
				     from m_loans b
					 left join m_members a on a.member_code=b.member_code
					 left join m_loans_data_details c on a.member_code=c.member_code and amort_number=1";
				$q9=mysqli_query($conn, $s9) or die(mysqli_error($conn));
				$r9=mysqli_fetch_assoc($q9);
				$x=1;
				
				echo "<table class='table' border = 1>
						<tr class='w3-light-blue' align='center'>
							<td></td>
							<td>Member Code</td>
							<td>Name</td>
							<td>Loan Number</td>
							<td>Approved</td>
							<td>Maturity</td>
							<td>Loan Status</td>
							<td>Amount</td>
							<td>Loan Schedule</td>
							<td>Loan Term</td>
							<td>Loan Type</td>
							<td>Amortization</td>
							<td>Amort Date</td>
						</tr>";
				
				do{
					echo "<tr class='w3-white w3-hover-pale-red'>";
					
					echo "<td>".$x++."</td>
						  <td>".$r9['member_code']."</td>
						  <td>".$r9['l_name'].", ".$r9['f_name']."</td>
						  <td align='right'>".$r9['loan_no']."</td>
						  <td align='right'>".date('F d, Y',strtotime($r9['date_approve']))."</td>
						  <td align='right'>".date('F d, Y',strtotime($r9['date_mature']))."</td>";
						  
						  
					echo"	  
						  <td align='right'>";
						  
						 if($r9['loan_status']==0){echo "Existing";}else{ echo "Fully Paid";}
					
					echo"	  
						  </td>";
						  
						  
					echo"	  
						  <td align='right'>".number_format($r9['loan_amount'],2)."
						  <td>".$r9['loan_schedule']."</td>
						  <td>".$r9['loan_term']."</td>
						  <td>".$r9['loan_type']."</td>
						  <td align='right'>".number_format($r9['amort_principal'],2)."</td>
					
						  <td>";
						  
						 $loan_to_check = $r9['loan_no'];
						 $date_today=date('Y-m-d',strtotime('-3 day'));
						 
						 $s8="select amort_date_sched from m_loans_data_details where loan_no='$loan_to_check' and amort_date_sched > '$date_today' limit 1";
				         $q8=mysqli_query($conn, $s8) or die(mysqli_error($conn));
				         $r8=mysqli_fetch_assoc($q8);
						 
						 if($r8['amort_date_sched'] < $date_today){ echo " Matured "; }
						 else{
						 echo date('F d, Y', strtotime($r8['amort_date_sched']));
						 }
						 
						 //$datetime1 = date_create(); // now
						 //$datetime2 = date_create($last_log);

					     //$interval = date_diff($datetime1, $datetime2);

					     //$days = $interval->format('%d'); // the time between your last login and now in days
						 
						 //if()
						 
					 
						  
					
					echo "</td>";
					
					echo "</tr>";
					
				}while($r9=mysqli_fetch_assoc($q9));
				
				echo "</table>";
				//$s91="select a.*, b.rate_desc 
				//from m_loans a
				//left join m_loans_rates b on a.effective_interest_rate=b.interest_rate
				//where a.member_code=$membercode and a.loan_no='$loan_no'";
				//$q91=mysqli_query($conn, $s91) or die(mysqli_error($conn));
				//$r91=mysqli_fetch_assoc($q91);
			?>
		</div>
<?php 	
}
?>