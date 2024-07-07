<?php
session_start();
include('../conn/conn.php');
$username=$_SESSION['username'];

if(isset($_REQUEST['call_report']))
{	
			$member_code=$_REQUEST['member_code'];
			$call_report_date=$_REQUEST['call_report_date'];
			$report=$_REQUEST['report'];
			
			$sx="insert into m_loans_call_report
					(member_code, callreport_date, callreport_remarks, posted_by, encoding_datetime)
				 values
					('$member_code', '$call_report_date', '$report', '$username', now())";
			
			$qx=mysqli_query($conn, "$sx") or die(mysqli_error($conn));

$trans="Add callreport to membercode ".$_REQUEST['member_code']." by ".$_SESSION['username']." time: ".date('m/d/Y h:i A')." ";
$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error($conn));

header("Location: call_report.php?member_code=".$_REQUEST['member_code']."&search_member_lastname=".$_REQUEST['search_member_lastname']."&call_report=View+Call+Report");
}
?>