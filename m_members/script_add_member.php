<?php 
session_start();
include('../conn/conn.php');
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }

$user_creator=$_SESSION['username'];
$addmember=$_GET['addmember'];
$members=$_GET['members'];

$member_type1=$_GET['member_type1'];

$title=$_GET['title'];
$f_name=$_GET['f_name'];
$m_name=$_GET['m_name'];
$l_name=$_GET['l_name'];
$gender=$_GET['gender'];
$civil_status=$_GET['civil_status'];
$birth_date=$_GET['birth_date'];
$birth_place=$_GET['birth_place'];
$present_address_street=$_GET['present_address_street'];
$present_address_barangay=$_GET['present_address_barangay'];
$present_address_city=$_GET['present_address_city'];
$present_address_province=$_GET['present_address_province'];
$present_address_zipcode=$_GET['present_address_zipcode'];
$permanent_address_street=$_GET['permanent_address_street'];
$permanent_address_barangay=$_GET['permanent_address_barangay'];
$permanent_address_city=$_GET['permanent_address_city'];
$permanent_address_province=$_GET['permanent_address_province'];
$permanent_address_zipcode=$_GET['permanent_address_zipcode'];
$home_number=$_GET['home_number'];
$mobile_number=$_GET['mobile_number'];
$email=$_GET['email'];
$id_presented=$_GET['id_presented'];
$tin=$_GET['tin'];
$f_name_spouse=$_GET['f_name_spouse'];
$m_name_spouse=$_GET['m_name_spouse'];
$l_name_spouse=$_GET['l_name_spouse'];
$no_of_children=$_GET['no_of_children'];

$sql="insert into m_members (member_type,title,f_name,m_name,l_name,gender,civil_status,birth_date,birth_place,present_address_street,present_address_bgy,present_address_city,present_address_province,present_zipcode,permanent_address_street,permanent_address_bgy,permanent_address_city,permanent_address_province,permanent_zipcode,home_number,mobile_number,email,id_presented,tin,f_name_spouse,m_name_spouse,l_name_spouse,no_of_children,created_by,created_date)
   values ('$member_type1','$title','$f_name','$m_name','$l_name','$gender','$civil_status','$birth_date','$birth_place','$present_address_street','$present_address_barangay','$present_address_city','$present_address_province',$present_address_zipcode,'$permanent_address_street','$permanent_address_barangay','$permanent_address_city','$permanent_address_province',$permanent_address_zipcode,$home_number,$mobile_number,'$email','$id_presented',$tin,'$f_name_spouse','$m_name_spouse','$l_name_spouse',$no_of_children,'$user_creator',curdate())";
$query=mysqli_query($conn, $sql) or die(mysql_error());


$username=$_SESSION['username'];
$trans="Add New $member_type1 : $title $l_name $m_name $f_name";
$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());


$return='Location: ../admin.php?members=1&addmember=1&success=1';
header($return);
?>
