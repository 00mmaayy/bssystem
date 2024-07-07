<?php
//FUNCTION
function dateChange($date)
{
	$month = date("m", strtotime($date));
	$day = date("d", strtotime($date));
	$year = date("Y", strtotime($date));
	
	if ($month >= 12) {
		$month = 1;
		$year += 1;
	} else {
		$month += 1;
	}
	
	return "$year-$month-$day";
}


include('../conn/conn.php');
session_start();
if (!isset($_SESSION['username'])) {
	$loc = 'Location: index.php?msg=requires_login ' . $_SESSION['username'];
	header($loc);
}


//VARIABLES
$username = $_SESSION['username'];
$search_member_lastname = $_REQUEST['search_member_lastname'];

$member_code = $_REQUEST['member_code'];
$loan_date = $_REQUEST['loan-date'];
$loan_no = $_REQUEST['loan_no'];
$loan_amount = $_REQUEST['loan_amount'];
$service_charge = $_REQUEST['service_charge'];
$insurance_premium = $_REQUEST['insurance_premium'];
$notarial_fee = $_REQUEST['notarial_fee'];
$interest_rate = $_REQUEST['interest_rate'];
$loan_term = $_REQUEST['loan_term'];
$loan_type = $_REQUEST['computation'];
$loan_sched = $_REQUEST['loan-sched'];
$semi_month = $_REQUEST['semi-month'];
$semi_day_first = $_REQUEST['semi-date-first'];
$semi_day_second = $_REQUEST['semi-date-second'];
$semi_year = $_REQUEST['semi-year'];
$semi_date = "$semi_year-$semi_day_first-$semi_year";

$other_charges = $_REQUEST['other_charges'];
if ($other_charges == "") {
	$other_charges = 0;
}
$other_charges_remarks = $_REQUEST['other_charges_remarks'];
if ($other_charges_remarks == "") {
	$other_charges_remarks = "NA";
}

//interest
$interest_percentage = $interest_rate * 100;
$interest_amount = $loan_amount * $interest_rate;
$interest_total = $interest_amount * $loan_term;

//loan amount
$loan_full = $loan_amount + $interest_total;

//ammortization
$principal_ammortization = $loan_amount / $loan_term;
$ammortization = $loan_full / $loan_term;
$dim_ammortization = $loan_amount / $loan_term;
$dim_balance = $loan_amount;
$interest_total = 0;


//diminishing loan
if ($loan_type == 'dim') {
	$balance = $loan_amount;
	for ($i = 1; $i <= $loan_term; $i++) {
		$interest = $balance * $interest_rate;
		$payment = $dim_ammortization + $interest;
		$balance -= $dim_ammortization;
		$interest_total += $interest;
	}
	$loan_full = $loan_amount;
	$dim_loan_full = $interest_total + $loan_amount;
} ?>

<br>
<a href="../admin.php?loans=1&member_code=<?php echo $_REQUEST['member_code']; ?>&search_member_lastname=<?php echo $_REQUEST['search_member_lastname']; ?>" class="w3-padding"><i class="fa fa-reply fa-fw"></i> RETURN</a>
<br/>

<?php
$ss1 = "SELECT * FROM m_members WHERE member_code=$member_code";
$qq1 = mysqli_query($conn, $ss1) or die(mysqli_error($conn));
$rr1 = mysqli_fetch_assoc($qq1);
echo "Client Name: " . $rr1['f_name'] . " " . $rr1['m_name'] . " " . $rr1['l_name'] . "<br>";
echo "Address: " . $rr1['present_address_street'] . " " . $rr1['present_address_bgy'] . " " . $rr1['present_address_city'] . " " . $rr1['present_address_province'] . " " . $rr1['present_zipcode'] . "<br><br>";


$date = date('m-d-Y');
$t1 = date('d');

$date_granted = date('m-d-Y', strtotime($loan_date));
$date_maturity = date('m-d-Y', strtotime($loan_date . "+$loan_term months"));
$date_end = date('Y-m-d', strtotime($loan_date . "+$loan_term months"));

if ($loan_sched == 'mon') {
	$date_change = $loan_date;
} else {
	$semi_month -= 1;
	if ($semi_month == 0) {
		$semi_month = 12;
		$semi_year -= 1;
	}
	$date_change = "$semi_year-$semi_month-$semi_day_first";
}


//$date_change = date('Y-m') . "-$t1";

if ($loan_sched == 'semi') {
	$date_end = date('Y-m-', strtotime($date_end)) . $semi_day_second;
	$date_maturity = date('m-', strtotime($date_end)) . $semi_day_second . date('-Y', strtotime($date_end));
}

//COMMENTS
//$date_day=date('d');
//$date_month=date('m');
//$date_year=date('Y');
//echo "Omar --> Day ".$date_day." <-- Omar<br>";
//echo "Omar --> Month ".$date_month." <-- Omar<br>";
//echo "Omar --> Year ".$date_year." <-- Omar<br><br>";
//echo "Insurance Premium: ".number_format($insurance_premium, 2, '.', ',')."<br>";
//echo "Notarial Fee: ".number_format($notarial_fee, 2, '.', ',')."<br><br>";



echo "PN No. $loan_no <br>";
echo "Interest Rate: $interest_percentage <br>";
echo "Loan Amount: Php " . number_format($loan_amount, 2) . "<br>";
echo "Loan Term: $loan_term Months <br><br>";

echo "Date Granted: $date_granted<br>Maturity Date: $date_maturity <br>";


?>
<br>
Amortization Schedule<br>
<table border="1" cellspacing="0" cellpadding="0">
	<tr align="center">
		<td width="100">No. of Month</td>
		<td width="100">Date</td>
		<td width="100">Principal</td>
		<td width="100">Interest</td>
		<td width="100">Monthly Due</td>
		<td width="100">Principal Balance</td>
		<?php if ($loan_type == "dim") : ?>
			<td width="100">Full Loan Balance</td>
		<?php endif; ?>
	</tr>
	<tr align="center">
		<td></td>
		<td><?php echo $date_granted; ?></td>
		<td></td>
		<td></td>
		<td></td>
		<td><?php echo number_format($loan_full, 2); ?></td>
		<?php if ($loan_type == "dim") : ?>
			<td><?php echo number_format($dim_loan_full, 2); ?></td>
		<?php endif; ?>
	</tr>
	<?php

	$s1 = "INSERT INTO m_loans (member_code,loan_no,loan_amount,loan_schedule,service_charge,other_charge,other_charge_remarks,insurance,notarial_fee,effective_interest_rate,loan_term,loan_type,date_approve,date_mature,posted_by,date_created,time_created)
     VALUES ($member_code,'$loan_no',$loan_amount,'$loan_sched',$service_charge,$other_charges,'$other_charges_remarks',$insurance_premium,$notarial_fee,$interest_rate,$loan_term,'$loan_type','$loan_date','$date_end','$username',CURRENT_DATE(),CURRENT_TIME())";
	$q1 = mysqli_query($conn, $s1) or die(mysqli_error($conn));
	
	$username=$_SESSION['username'];
	$trans="create new loan:$loan_no amount:$loan_amount release:$loan_date loan sched:$loan_sched loantype:$loan_type for member code $member_code";
	$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
	$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	
	//----Straght Computation Start----
	if ($loan_type == "str") {
		$balance = $loan_full;
		$num = 1;
		if ($loan_sched == 'mon') {
			for ($i = 1; $i <= $loan_term; $i++) {
				$date_change = dateChange($date_change);
				$date_granted = date('m-d-Y', strtotime($date_change));
				$balance -= $ammortization;



				echo "<tr align='center'><td>$i</td>";
				echo "<td>$date_granted</td>
				<td>" . number_format($principal_ammortization, 2) . "</td>
				<td>$interest_amount</td>
				<td>" . number_format($ammortization, 2) . "</td> 
				<td>" . number_format($balance, 2) . "</td></tr>";

				$s = "INSERT INTO m_loans_data_details (member_code,loan_no,loan_amount,effective_interest_rate,loan_term,amort_number,amort_date_sched,amort_principal,amort_interest,amort_due,principal_balance)
				VALUES ($member_code,'$loan_no',$loan_amount,$interest_rate,$loan_term,$i,'$date_change',$principal_ammortization,$interest_amount,$ammortization,$balance)";
				$q = mysqli_query($conn, $s) or die(mysqli_error($conn));
			}
		} elseif ($loan_sched == 'semi') {
			$semi_principal = $principal_ammortization / 2;
			$semi_interest = $interest_amount / 2;
			$semi_ammort = $ammortization / 2;

			for ($i = 0; $i < $loan_term; $i++) {
				$date_change = dateChange($date_change);
				$date = date('m', strtotime($date_change)) . "-" . $semi_day_first . "-" . date('Y', strtotime($date_change));
				$semi_date = date('Y-m-', strtotime($date_change)) . $semi_day_first;

				for ($j = 0; $j < 2; $j++) {
					$balance -= $semi_ammort;
					echo "<tr align='center'><td>$num</td>";
					echo "<td>$date</td>
					<td>" . number_format($semi_principal, 2) . "</td>
					<td>$semi_interest</td>
					<td>" . number_format($semi_ammort, 2) . "</td> 
					<td>" . number_format($balance, 2) . "</td></tr>";
					$s = "INSERT INTO m_loans_data_details (member_code,loan_no,loan_amount,effective_interest_rate,loan_term,amort_number,amort_date_sched,amort_principal,amort_interest,amort_due,principal_balance)
					VALUES ($member_code,'$loan_no',$loan_amount,$interest_rate,$loan_term,$num,'$semi_date',$semi_principal,$semi_interest,$semi_ammort,$balance)";
					$q = mysqli_query($conn, $s) or die(mysqli_error($conn));
					
					/* Changing last day of date dependent on month */
					if (date('m', strtotime($date_change)) == 2 && $semi_day_second > 29) {
						$semi_date = date('Y-m-', strtotime($date_change)) . "28";
						$date = date('m', strtotime($date_change)) . "-28-" . date('Y', strtotime($date_change));
					} elseif ((date('m', strtotime($date_change)) == 4 || date('m', strtotime($date_change)) == 6 || date('m', strtotime($date_change)) == 9 || date('m', strtotime($date_change)) == 11) && $semi_day_second > 30) {
						$semi_date = date('Y-m-', strtotime($date_change)) . "30";
						$date = date('m', strtotime($date_change)) . "-30-" . date('Y', strtotime($date_change));
					} else {
						$semi_date = date('Y-m-', strtotime($date_change)) . $semi_day_second;
						$date = date('m', strtotime($date_change)) . "-" . $semi_day_second . "-" . date('Y', strtotime($date_change));
					}


					$num++;
				}
			}
		}
	}
	//----Straght Computation End----


	//----Diminishing Computation Start---- 
	if ($loan_type == "dim") {
		$balance = $dim_loan_full;
		$semi_balance = $dim_loan_full;
		if ($loan_sched == 'mon') {
			for ($i = 1; $i <= $loan_term; $i++) {
				$dim_interest = $dim_balance * $interest_rate;
				$dim_payment = $dim_ammortization + $dim_interest;
				$dim_balance -= $dim_ammortization;
				$balance -= $dim_payment;
				$date_change = dateChange($date_change);
				$date_granted = date('m-d-Y', strtotime($date_change));
				echo "<tr align='center'><td>$i</td>";
				echo "<td>$date_granted</td>
							<td>" . number_format($dim_ammortization, 2) . "</td>
							<td>$dim_interest</td>
							<td>" . number_format($dim_payment, 2) . "</td> 
							<td>" . number_format($dim_balance, 2) . "</td>
							<td>" . number_format($balance, 2) . "</td></tr>";

				$s = "INSERT INTO m_loans_data_details (member_code,loan_no,loan_amount,effective_interest_rate,loan_term,amort_number,amort_date_sched,amort_principal,amort_interest,amort_due,principal_balance)
				VALUES ($member_code,'$loan_no',$loan_amount,$interest_rate,$loan_term,$i,'$date_change',$dim_ammortization,$dim_interest,$dim_payment,$balance)";
				$q = mysqli_query($conn, $s) or die(mysqli_error($conn));
			}
		} elseif ($loan_sched == 'semi') {
			$num = 1;
			for ($i = 0; $i < $loan_term; $i++) {
				$dim_interest = $dim_balance * $interest_rate;
				$dim_payment = $dim_ammortization + $dim_interest;
				$date_change = dateChange($date_change);
				$date = date('m', strtotime($date_change)) . "-" . $semi_day_first . "-" . date('Y', strtotime($date_change));
				$semi_date = date('Y-m-', strtotime($date_change)) . $semi_day_first;
				$semi_dim_balance = $dim_balance;

				for ($j = 0; $j < 2; $j++) {
					$semi_dim_interest = $dim_interest / 2;
					$semi_dim_ammortization = $dim_ammortization / 2;
					$semi_payment = $dim_payment / 2;
					$semi_dim_balance -= $semi_dim_ammortization;
					$semi_balance -= $semi_payment;
					echo "<tr align='center'><td> $num</td> ";
					echo "<td> $date</td>
							<td> " . number_format($semi_dim_ammortization, 2) . "</td>
							<td> $semi_dim_interest</td>
							<td> " . number_format($semi_payment, 2) . "</td> 
							<td>" . number_format($semi_dim_balance, 2) . "</td>
							<td>" . number_format($semi_balance, 2) . "</td></tr>";
					$s = "INSERT INTO m_loans_data_details (member_code,loan_no,loan_amount,effective_interest_rate,loan_term,amort_number,amort_date_sched,amort_principal,amort_interest,amort_due,principal_balance)
							VALUES ($member_code,'$loan_no',$loan_amount,$interest_rate,$loan_term,$num,'$semi_date',$semi_dim_ammortization,$semi_dim_interest,$semi_payment,$semi_balance)";
					$q = mysqli_query($conn, $s) or die(mysqli_error($conn));

					/* Changing last day of date dependent on month */
					if (date('m', strtotime($date_change)) == 2 && $semi_day_second > 29) {
						$semi_date = date('Y-m-', strtotime($date_change)) . "28";
						$date = date('m', strtotime($date_change)) . "-28-" . date('Y', strtotime($date_change));
					} elseif ((date('m', strtotime($date_change)) == 4 || date('m', strtotime($date_change)) == 6 || date('m', strtotime($date_change)) == 9 || date('m', strtotime($date_change)) == 11) && $semi_day_second > 30) {
						$semi_date = date('Y-m-', strtotime($date_change)) . "30";
						$date = date('m', strtotime($date_change)) . "-30-" . date('Y', strtotime($date_change));
					} else {
						$semi_date = date('Y-m-', strtotime($date_change)) . $semi_day_second;
						$date = date('m', strtotime($date_change)) . "-" . $semi_day_second . "-" . date('Y', strtotime($date_change));
					}

					$num++;
				}
				$dim_balance -= $dim_ammortization;
				$balance -= $dim_payment;
			}
		}
	}
	//----Diminishing Computation End---- 
	echo "</table>"; 
	?>