<?php
include('../conn/conn.php');
session_start();
if (!isset($_SESSION['username']))
{
	$loc = 'Location: index.php?msg=requires_login ' . $_SESSION['username'];
	header($loc);
}
$username=$_SESSION['username'];

if(isset($_REQUEST['interest_rate']))
{
$interest_rate=$_REQUEST['interest_rate'];
$interest_desc=$_REQUEST['interest_desc'];

mysqli_query($conn, "insert into m_loans_rates (interest_rate,rate_desc,add_by,add_date) values ($interest_rate,'$interest_desc','$username',now())") or die(mysql_error($conn));

$trans="add interest_rate:$interest_rate interest_desc:$interest_desc";
$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());

header('Location: ../admin.php?loans=1&loan_settings=1&add_success=1');
}


if(isset($_REQUEST['loan_term']))
{
$loan_term=$_REQUEST['loan_term'];
$term_desc=$_REQUEST['term_desc'];

mysqli_query($conn, "insert into m_loans_terms (loan_terms,terms_desc,add_by,add_date) values ($loan_term,'$term_desc','$username',now())") or die(mysql_error($conn));

$trans="add loan_term:$loan_term term_desc:$term_desc";
$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());

header('Location: ../admin.php?loans=1&loan_settings=1&add_success=1');
}

?>