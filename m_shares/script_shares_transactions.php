<?php 
session_start();
include('../conn/conn.php');
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }

$username=$_SESSION['username'];

$membercode=$_REQUEST['membercode'];
$amount=$_REQUEST['account_amount'];
$tag=$_REQUEST['account_tag'];
$transaction=$_REQUEST['account_transaction'];
$trans_date=$_REQUEST['trans_date'];
$remarks=$_REQUEST['remarks'];

$search_member_lastname=$_REQUEST['search_member_lastname'];

$sql="insert into m_shares (member_code,amount,account_tag,transaction,trans_date,date,time,remarks,update_by) values ($membercode,$amount,'$tag','$transaction','$trans_date',curdate(),curtime(),'$remarks','$username')";
$query=mysqli_query($conn, $sql) or die(mysqli_error($conn));

$trans="$tag $transaction $amount member_code:$membercode $remarks";
$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());

$return='Location: ../admin.php?shares=1&membercode='.$_REQUEST['membercode'].'&search_member_lastname='.$_REQUEST['search_member_lastname'].'&manage_shares=Manage+Shares';
header($return);
?>
