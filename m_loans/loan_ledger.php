<?php 	
session_start();
include('../conn/conn.php');
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }

$username=$_SESSION['username'];
			
if(isset($_REQUEST['loan_ledger']))
{
		 
		 $member_code=$_REQUEST['membercode'];
		 $loan_no=$_REQUEST['loan_no'];
		 
		 $s="select f_name, m_name, l_name from m_members where member_code = $member_code ";
		 $q=mysqli_query($conn, $s) or die(mysqli_error());
		 $r=mysqli_fetch_assoc($q);
		 
		 $s1="select * from m_loans where member_code = $member_code and loan_no = '$loan_no'";
		 $q1=mysqli_query($conn, $s1) or die(mysqli_error());
		 $r1=mysqli_fetch_assoc($q1);
		 
		 echo "CLIENT NAME: ".$r['l_name'].", ".$r['f_name']." ".$r['m_name'];
		 echo "<br/>";
		 echo "LOAN NO: $loan_no<br/>";
		 echo "LOAN AMOUNT: ".number_format($r1['loan_amount'],2);
		 
		 ?>
		 <br/><br/>
		 <form method='get' action='script_loan_payment.php'>
				
					<input name='membercode' type='hidden' value='<?php echo $_REQUEST['membercode']; ?>'>
					<input name='loan_no' type='hidden' value='<?php echo $_REQUEST['loan_no'] ?>'>
				
				<br/>
				<hr/>
				<br/>
					
				<table>
					<tr>
						<td>OR DATE</td>
						<td>OR NUMBER</td>
						<td>PRINTCIPAL PAYMENT</td>
						<td>INTEREST PAYMENT</td>
						<td>PENALTY PAYMENT</td>
						<td>PAYMENT REMARKS</td>
					</tr>
					<tr>
						<td><input name='or_date' type='date' value='<?php echo date('Y-m-d'); ?>' required></td>
						<td><input name='or_number' type='number' placeholder='OR Number' required></td>
						<td><input name='principal_payment_amount' type='number' placeholder='Principal Amount Here' step='any'></td>
						<td><input name='interest_payment_amount' type='number' placeholder='Interest Amount Here' step='any'></td>
						<td><input name='penalty' type='number' placeholder='Penalty' step='any'></td>
						<td><input name='loan_payment_remarks' type='text'></td>
						<td><input name='ledger_transaction'type='submit' value='POST TRANSACTION' onclick='return confirm("Post Transaction Now?")'></td>
					</tr>
				</table>	
				
		 </form>
		 
		 <br/>
		 <hr/>
		 <br/>
		 
		 
		 <?php
			$s2="select * from m_loans_ledger where loan_no = '$loan_no' order by trans_id asc";
			$q2=mysqli_query($conn, $s2) or die(mysqli_error());
			$r2=mysqli_fetch_assoc($q2);
		 ?>
		 <link rel="stylesheet" href="../css/w3.css">
		 <table class="w3-table">
					<tr>
						<td>COUNT</td>
						<td>TRANS ID</td>
						<td>OR DATE</td>
						<td>OR NUMBER</td>
						<td>PRINTCIPAL PAYMENT</td>
						<td>INTEREST PAYMENT</td>
						<td>PENALTY PAYMENT</td>
						<td>TOTAL PAYMENT</td>
						<td>OUTSTANDING BALANCE</td>
						<td>PAYMENT REMARKS</td>
						<td>POSTED BY</td>
						<td>POSTED DATE</td>
						<td>POSTED TIME</td>
					</tr>
					<?php 
					$x=1;
					
					$out_1 = 0 ;
					
					do{ ?>
					<tr>
						<td><?php echo $x++; ?></td>
						<td><?php echo $r2['trans_id']; ?></td>
						<td><?php echo $r2['or_date']; ?></td>
						<td><?php echo $r2['or_number']; ?></td>
						<td><?php echo number_format($r2['principal_payment'],2); ?></td>
						<td><?php echo number_format($r2['interest_payment'],2); ?></td>
						<td><?php echo number_format($r2['penalty'],2); ?></td>
						
						<td><?php $out = $r2['principal_payment'] + $r2['interest_payment'] + $r2['penalty'] ; 
									echo number_format($out, 2);
							?></td>	
						
						<td><?php 
									
									$out_1 += $r2['principal_payment'];
									echo $out_total = number_format($r1['loan_amount'] - $out_1, 2);
							?></td>
						
						<td><?php echo $r2['post_remarks']; ?></td>
						<td><?php echo $r2['posted_by']; ?></td>
						<td><?php echo $r2['posting_date']; ?></td>
						<td><?php echo $r2['posting_time']; ?></td>
					</tr>
					<?php
					}while($r2=mysqli_fetch_assoc($q2));
					
					$s3="select sum(principal_payment) as principal_payment_total, sum(penalty) as penalty_total, sum(interest_payment) as interest_payment_total
							from m_loans_ledger where loan_no = '$loan_no'";
					$q3=mysqli_query($conn, $s3) or die(mysqli_error());
					$r3=mysqli_fetch_assoc($q3);
					?>
					<tr>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
						<td><?php echo number_format($r3['principal_payment_total'],2); ?></td>
						<td><?php echo number_format($r3['interest_payment_total'],2); ?></td>
						<td><?php echo number_format($r3['penalty_total'],2); ?></td>
						<td><?php echo number_format($r3['principal_payment_total']+$r3['interest_payment_total']+$r3['penalty_total'],2); ?></td>
						<td></td>
						<td></td>
						<td></td>
						<td></td>
					</tr>
				</table>	
<?php		 
}
?>
