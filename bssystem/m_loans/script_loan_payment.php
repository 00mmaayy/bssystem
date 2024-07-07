<?php 
session_start();
include('../conn/conn.php');
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }

$username=$_SESSION['username'];

if(isset($_REQUEST['loan_payment']))
{	
			$tx_no=$_REQUEST['tx_no'];
			$membercode=$_REQUEST['membercode'];
			$loan_no=$_REQUEST['loan_no'];
			
			//$payment_amount=$_REQUEST['payment_amount'];
			
			$or_number=$_REQUEST['or_number'];
			$or_date=$_REQUEST['or_date'];
			$penalty=$_REQUEST['penalty'];

			mysqli_query($conn, "UPDATE m_loans_data_details SET or_number='$or_number', penalty='$penalty', posted_by='$username', posting_date='$or_date', posting_time=curtime() WHERE tx_no=$tx_no") or die(mysqli_error($conn));


$trans="Applied Payment for LoanNo ".$_REQUEST['loan_no']." tx_no=".$_REQUEST['tx_no'].", Amounting to ".$_REQUEST['payment_amount']." paid by ".$_SESSION['username']." time: ".date('m/d/Y h:i A')." ";
$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error($conn));
}

if(isset($_REQUEST['principal_interest_payment']))
{	
			$tx_no=$_REQUEST['tx_no'];
			$membercode=$_REQUEST['membercode'];
			$loan_no=$_REQUEST['loan_no'];
			
			$principal_payment= $_REQUEST['principal_payment_amount'];
			$interest_payment= $_REQUEST['interest_payment_amount'];
			$payment_amount= $principal_payment + $interest_payment;
			
			mysqli_query($conn, "UPDATE m_loans_data_details SET payment='$payment_amount', principal_payment = '$principal_payment', interest_payment = '$interest_payment'  WHERE tx_no=$tx_no") or die(mysqli_error($conn));


$trans="Applied Payment for LoanNo ".$_REQUEST['loan_no']." tx_no=".$_REQUEST['tx_no'].", Amounting to principal payment ".$_REQUEST['principal_payment']." and interest payment ".$_REQUEST['interest_payment']." paid by ".$_SESSION['username']." time: ".date('m/d/Y h:i A')." ";
$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error($conn));
}

if(isset($_REQUEST['loan_payment_remarks']))
{	
			$tx_no=$_REQUEST['tx_no'];
			$membercode=$_REQUEST['membercode'];
			$loan_no=$_REQUEST['loan_no'];
			$loan_payment_remarks=$_REQUEST['loan_payment_remarks'];

			mysqli_query($conn, "UPDATE m_loans_data_details SET post_remarks='$loan_payment_remarks', remarks_posted_by='$username' WHERE tx_no=$tx_no") or die(mysqli_error($conn));


$trans="Applied Remarks for LoanNo ".$_REQUEST['loan_no']." tx_no=".$_REQUEST['tx_no'].", msg(".$_REQUEST['loan_payment_remarks']." by ".$_SESSION['username']." time: ".date('m/d/Y h:i A')." ";
$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error($conn));
}

header("Location: script_view_loan_details.php?membercode=".$_REQUEST['membercode']."&loan_no=".$_REQUEST['loan_no']."&loan_payment=Loan+Payments");
?>