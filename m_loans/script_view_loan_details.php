<?php 
session_start();
include('../conn/conn.php');
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }
?>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<?php include("../m_settings/current_user.php"); ?>

<?php
$membercode=$_REQUEST['membercode'];
$loan_no=$_REQUEST['loan_no'];

$s9="select * from m_members where member_code=$membercode";
$q9=mysqli_query($conn, $s9) or die(mysqli_error($conn));
$r9=mysqli_fetch_assoc($q9);

$s91="select a.*, b.rate_desc 
	  from m_loans a
	  left join m_loans_rates b on a.effective_interest_rate=b.interest_rate
      where a.member_code=$membercode and a.loan_no='$loan_no'";
$q91=mysqli_query($conn, $s91) or die(mysqli_error($conn));
$r91=mysqli_fetch_assoc($q91);
?>
<hr>
<div class='container'>
<table>
	<tr>
		<td>
			<form method="get" action="script_view_pn_disclosure.php" target="_blank">
			<input type="hidden" name="membercode" value="<?php echo $membercode; ?>"/>
			<input type="hidden" name="loan_no" value="<?php echo $loan_no; ?>"/>
			<input type="submit" name="pn" value="View PN"/>&nbsp;&nbsp;&nbsp;
			<input type="submit" name="disclosure" value="Disclosure"/>&nbsp;&nbsp;&nbsp;
			</form>
		</td>	
		<td>
			<?php if($access['b5']==1) { ?>
			<form>
			<input type="hidden" name="membercode" value="<?php echo $membercode; ?>"/>
			<input type="hidden" name="loan_no" value="<?php echo $loan_no; ?>"/>
			<input type="submit" name="loan_payment" value="Loan Payments"/>
			</form>
			<?php } ?>
		</td>
	</tr>
</table>	
<?php
echo "Client Name: ".$r9['f_name']." ".$r9['m_name']." ".$r9['l_name']."<br>";
echo "Address: ".$r9['present_address_street']." ".$r9['present_address_bgy']." ".$r9['present_address_city']." ".$r9['present_address_province']." ".$r9['present_zipcode'];
echo "<br>";
echo "<br>";
echo "PN No. $loan_no<br>";
echo "Interest Rate: ".$r91['rate_desc']."<br>";
echo "Loan Amount: Php ".number_format($r91['loan_amount'], 2,'.',',')."<br>";
echo "Loan Term: ".$r91['loan_term']." Months<br>";
echo "Loan Type: ";
		switch($r91['loan_type'])
		{
			case 'str': echo "Straight"; break;
			case 'dim': echo "Diminishing"; break;
		}
echo "<br>";
echo "<br>";

echo "Date Granted: ".date('m/d/Y',strtotime($r91['date_approve']))."<br>";
echo "Date Maturity: ".date('m/d/Y',strtotime($r91['date_mature']))."<br>";

echo "<br>";
echo "Amortization Schedule";
$s="select * from m_loans_data_details where member_code=$membercode and loan_no='$loan_no' order by amort_number asc";
$q=mysqli_query($conn, $s) or die(mysqli_error($conn));
$r=mysqli_fetch_assoc($q);

$total_amount=number_format($r['amort_due']+$r['principal_balance'], 2, '.',',');

echo "<table border='1' cellspacing='0' cellpadding='0'>
        <tr align='center'>
			<td width='100'>No. of Month</td>
			<td width='100'>Date</td>
			<td width='100'>Principal</td>
			<td width='100'>Interest</td>
			<td width='100'>Monthly Due</td>
			<td width='100'>Principal Balance</td>
			<td width='100'>Remaining Actual</td>";
	
			if(isset($_REQUEST['loan_payment']))
			{ echo "<td colspan='9'>Payments <a href='script_view_loan_details.php?membercode=".$_REQUEST['membercode']."&loan_no=".$_REQUEST['loan_no']."'>(Hide)</a></td>"; }else{}

echo "</tr>
	  <tr align='center'>
		<td></td>
		<td class='w3-small'>".date('F d, Y',strtotime($r91['date_approve']))."</td>
		<td></td>
		<td></td>
		<td></td>
		<td>$total_amount</td>
		<td>".number_format($r91['loan_amount'],2)."</td>";
	
	if(isset($_REQUEST['loan_payment']))
	{
  echo "<td>Payments</td>
		<td>OR Number</td>
		<td colspan='2'>Principal & Interest Payments</td>
		<td>Posted By</td>
		<td>Date Posted</td>
		<td>Time Posted</td>
		<td>Remarks</td>
		<td>Update</td>
	  </tr>";
	}
	else{ echo "</tr>"; }

$skk="select sum(principal_payment) as principal_payment_total from m_loans_data_details where member_code=$membercode and loan_no='$loan_no'";
$qkk=mysqli_query($conn, $skk) or die(mysqli_error($conn));
$rkk=mysqli_fetch_assoc($qkk);
	
$payment_total = $rkk['principal_payment_total'];		
$penalty_total = 0;	

do{
	
$actual += $r['amort_principal'];

echo "<tr align='center'>
		<td width='50' align='center'>".$r['amort_number']."</td>
		<td width='100' class='w3-small'>".date('F d, Y',strtotime($r['amort_date_sched']))."</td>
		<td>".number_format($r['amort_principal'],2,'.',',')."</td>
		<td>".number_format($r['amort_interest'],2,'.',',')."</td>
		<td width='100'>".number_format($r['amort_due'], 2, '.', ',')."</td>
		<td>".number_format($r['principal_balance'], 2, '.', ',')."</td>
		<td>".number_format($r91['loan_amount']-$payment_total, 2, '.', ',')."</td>";
		
	if(isset($_REQUEST['loan_payment']))
	{	
	echo "<td>";
			
			if($r['payment']!=0)
				{ 
					echo "<span class='w3-tiny'>Payment total: </span>".number_format($r['payment'], 2, '.', ',')."<br/><br/>";
					echo "<span class='w3-tiny'>Principal: </span>".number_format($r['principal_payment'], 2, '.', ',')."<br/><br/>";
					echo "<span class='w3-tiny'>Interest: </span>".number_format($r['interest_payment'], 2, '.', ',')."<br/><br/>";
					echo "<span class='w3-tiny'>penalty: </span>".number_format($r['penalty'], 2, '.', ','); 
				}
			else{ echo "no payment";}
			
	echo "</td>";

//OR Details
	echo "<td>";
	
	if($r['or_number']!=0)
	{
		echo $r['or_number'];
	}
	else
	{
		?>
				
				<form class='w3-small' method='get' action='script_loan_payment.php'>
				
					<input name='tx_no' type='hidden' value='<?php echo $r['tx_no']; ?>'>
					<input name='membercode' type='hidden' value='<?php echo $r['member_code']; ?>'>
					<input name='loan_no' type='hidden' value='<?php echo $r['loan_no']; ?>'>
					<input name='loan_payment' type='hidden' value='Loan Payments' step='any'>
					
					<!-- <input name='payment_amount' type='number' placeholder='Amount Here' step='any' required> -->
					<br/>
					<input name='or_number' type='number' placeholder='OR Number / Date' required>
					<input name='or_date' type='date' value='<?php echo date('Y-m-d'); ?>' required>
					<br/><br/>
					
					<input name='penalty' type='number' placeholder='Penalty' step='any'>
					<br/><br/>
					<input type='submit' value='POST' onclick='return confirm("Post Payment Now?")'>
				
				</form>
				
		  <?php
	}
	
	echo "</td>";

	
//pricipal payment
	  echo "<td colspan='2'>"; 
				
			if($r['payment']!=0)
			{ echo "payments already posted";}
			else
			{	
				?>
				<br/>
				
				<form class='w3-small' method='get' action='script_loan_payment.php'>
					
					<input name='tx_no'        type='hidden' value='<?php echo $r['tx_no']; ?>'>
					<input name='membercode'   type='hidden' value='<?php echo $r['member_code']; ?>'>
					<input name='loan_no'      type='hidden' value='<?php echo $r['loan_no']; ?>'>
					
					<input name='principal_interest_payment' type='hidden' value='Principal Interest Payments' step='any'>
					
					<input name='principal_payment_amount' type='number' placeholder='Principal Amount Here' step='any' required>
					<input name='interest_payment_amount' type='number' placeholder='Interest Amount Here' step='any' required>
					
					<br/><br/>
					
					<input type='submit' value='POST' onclick='return confirm("Post Principal and Interest Payment Now?")'>
				
				</form>

<?php 
			}
			echo "</td>";
	
	
	
	echo "<td>".$r['posted_by']."</td>";
	
	echo "<td class='w3-small'>";
			if($r['payment']!=0)
				{ echo date('F d, Y',strtotime($r['posting_date'])); }
			else{}
	echo "</td>";
	
	echo "<td class='w3-small'>";
			if($r['payment']!=0)
				{ echo date('h:i a',strtotime($r['posting_time'])); }
			else{}
	echo "</td>";
	
			
	echo "<td class='w3-tiny'>";		
			if($r['payment']==0)
				{ echo $r['post_remarks']; }
			
			else if($r['payment']!=0 and $r['post_remarks']=="")
				{ ?>
				
				<form class='w3-tiny' method='get' action='script_loan_payment.php'>
					<input name='tx_no' type='hidden' value='<?php echo $r['tx_no']; ?>'>
					<input name='membercode' type='hidden' value='<?php echo $r['member_code']; ?>'>
					<input name='loan_no' type='hidden' value='<?php echo $r['loan_no']; ?>'>
					<input name='loan_payment_remarks' type='text' required><br/>
					<input type='submit' value='ADD REMARKS' onclick='return confirm("Post Remarks Now?")'>
				</form>
				
		  <?php }
		  
			else 
				{ echo $r['post_remarks']; }
	echo "</td>";
	
	
			  if($r['payment']!=0 and $r['post_remarks']!="")
				{ echo "<td>
							<a class='fa fa-pencil' href='script_loans_override.php?membercode=".$r['member_code']."&loan_no=".$r['loan_no']."&tx_no=".$r['tx_no']."&payment=".$r['payment']."'></a>
						</td>";
				}
			else{ echo "<td></td>"; }	
	
	}else{ }
		
echo "</tr>";
	
	$payment_total += $r['payment']-$r['payment'];
	$penalty_total += $r['penalty'];
	
  } while($r=mysqli_fetch_assoc($q));
echo "</table>";

echo "Payment Total: ".number_format($payment_total,2)."<br/>";
echo "Penalty Total: ".number_format($penalty_total,2);

echo "<table border='0' cellpadding='0' cellspacing='0'>
        <tr height='100'>
		  <td width='200'>Prepared by: </td><td>Checked by:</td><td>Approved by:</td>
		</tr>
		<tr>
		  <td width='200'>_______________</td><td width='200'>_______________</td><td width='200'>_______________</td>
		</tr>
		<tr height='50'>
		  <td width='200'></td><td width='200' colspan='2' align='center' valign='bottom'>_______________</td>
		</tr>
		<tr>
		  <td width='200'></td><td width='200' colspan='2' align='center' valign='bottom'>Borrower</td>
		</tr>
	  </table>";

?>
</div>