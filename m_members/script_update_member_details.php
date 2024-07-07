<?php
include('../conn/conn.php');
session_start();
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }
$s="select * from company";
$q=mysqli_query($conn, $s) or die(mysqli_error($conn));
$r=mysqli_fetch_assoc($q);

$membercode=$_REQUEST['membercode'];
$s1="select * from m_members where member_code=$membercode";
$q1=mysqli_query($conn, $s1) or die(mysqli_error($conn));
$r1=mysqli_fetch_assoc($q1);

$username=$_SESSION['username'];

if(isset($_GET['submit']))
{
  if(isset($_GET['member_type']))
  {
   $member_type=$_GET['member_type'];
   $s1="update m_members set member_type='$member_type' where member_code=$membercode";
   $q1=mysqli_query($conn, $s1) or die(mysqli_error($conn));
   
   $trans="cis_no: $membercode, change member type to $member_type";
   $log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
   $log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
   
  }	  
  if(isset($_GET['title']))
  {
   $title=$_GET['title'];
   $s1="update m_members set title='$title' where member_code=$membercode";
   $q1=mysqli_query($conn, $s1) or die(mysqli_error($conn));
   
   $trans="cis_no: $membercode, change title to $title";
   $log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
   $log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
  }	  
  if(isset($_GET['f_name']))
  {
   $f_name=$_GET['f_name'];
   $s1="update m_members set f_name='$f_name' where member_code=$membercode";
   $q1=mysqli_query($conn, $s1) or die(mysqli_error($conn));
   
   $trans="cis_no: $membercode, change first name to to $f_name";
   $log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
   $log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
  }	 
  if(isset($_GET['m_name']))
  {
   $m_name=$_GET['m_name'];
   $s1="update m_members set m_name='$m_name' where member_code=$membercode";
   $q1=mysqli_query($conn, $s1) or die(mysqli_error($conn)); 
   
   $trans="cis_no: $membercode, change middle name to $m_name";
   $log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
   $log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
   }	 
  if(isset($_GET['l_name']))
  {
    $l_name=$_GET['l_name'];
   $s1="update m_members set l_name='$l_name' where member_code=$membercode";
   $q1=mysqli_query($conn, $s1) or die(mysqli_error($conn));
   
   $trans="cis_no: $membercode, change last name to $l_name";
   $log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
   $log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
  }	 
  if(isset($_GET['gender']))
  {
   $gender=$_GET['gender'];
   $s1="update m_members set gender='$gender' where member_code=$membercode";
   $q1=mysqli_query($conn, $s1) or die(mysqli_error($conn));
   
   $trans="cis_no: $membercode, change gender to $gender";
   $log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
   $log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
  }	 
  if(isset($_GET['civil_status']))
  {
   $civil_status=$_GET['civil_status'];
   $s1="update m_members set civil_status='$civil_status' where member_code=$membercode";
   $q1=mysqli_query($conn, $s1) or die(mysqli_error($conn));
   
   $trans="cis_no: $membercode, change civil status to $civil_status";
   $log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
   $log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
  }	 
  if(isset($_GET['birth_date']))
  {
   $birth_date=$_GET['birth_date'];
   $s1="update m_members set birth_date='$birth_date' where member_code=$membercode";
   $q1=mysqli_query($conn, $s1) or die(mysqli_error($conn));
   
   $trans="cis_no: $membercode, change birth date to $birth_date";
   $log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
   $log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
  }	 
  if(isset($_GET['birth_place']))
  {
   $birth_place=$_GET['birth_place'];
   $s1="update m_members set birth_place='$birth_place' where member_code=$membercode";
   $q1=mysqli_query($conn, $s1) or die(mysqli_error($conn));
   
   $trans="cis_no: $membercode, change birth place to $birth_place";
   $log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
   $log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
  }	 
  if(isset($_GET['present_address_street']))
  {
   $present_address_street=$_GET['present_address_street'];
   $s1="update m_members set present_address_street='$present_address_street' where member_code=$membercode";
   $q1=mysqli_query($conn, $s1) or die(mysqli_error($conn));
   
   $trans="cis_no: $membercode, change present_address_street to $present_address_street";
   $log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
   $log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
  }
  if(isset($_GET['present_address_barangay']))
  {
   $present_address_barangay=$_GET['present_address_barangay'];
   $s1="update m_members set present_address_bgy='$present_address_barangay' where member_code=$membercode";
   $q1=mysqli_query($conn, $s1) or die(mysqli_error($conn));
   
   $trans="cis_no: $membercode, change present_address_barangay to $present_address_barangay";
   $log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
   $log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
  }  
  if(isset($_GET['present_address_city']))
  {
   $present_address_city=$_GET['present_address_city'];
   $s1="update m_members set present_address_city='$present_address_city' where member_code=$membercode";
   $q1=mysqli_query($conn, $s1) or die(mysqli_error($conn));
   
   $trans="cis_no: $membercode, change present_address_city to $present_address_city";
   $log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
   $log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
  }
  if(isset($_GET['present_address_province']))
  {
   $present_address_province=$_GET['present_address_province'];
   $s1="update m_members set present_address_province='$present_address_province' where member_code=$membercode";
   $q1=mysqli_query($conn, $s1) or die(mysqli_error($conn));
   
   $trans="cis_no: $membercode, change present_address_province to $present_address_province";
   $log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
   $log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
  }	
   if(isset($_GET['present_address_zipcode']))
  {
   $present_address_zipcode=$_GET['present_address_zipcode'];
   $s1="update m_members set present_zipcode='$present_address_zipcode' where member_code=$membercode";
   $q1=mysqli_query($conn, $s1) or die(mysqli_error($conn));
   
   $trans="cis_no: $membercode, change present_address_zipcode to $present_address_zipcode";
   $log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
   $log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
  }
  if(isset($_GET['permanent_address_street']))
  {
   $permanent_address_street=$_GET['permanent_address_street'];
   $s1="update m_members set permanent_address_street='$permanent_address_street' where member_code=$membercode";
   $q1=mysqli_query($conn, $s1) or die(mysqli_error($conn));
   
   $trans="cis_no: $membercode, change permanent_address_street to $permanent_address_street";
   $log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
   $log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
  }
  if(isset($_GET['permanent_address_barangay']))
  {
   $permanent_address_barangay=$_GET['permanent_address_barangay'];
   $s1="update m_members set permanent_address_bgy='$permanent_address_barangay' where member_code=$membercode";
   $q1=mysqli_query($conn, $s1) or die(mysqli_error($conn));
   
   $trans="cis_no: $membercode, change permanent_address_barangay to $permanent_address_barangay";
   $log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
   $log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
  }  
  if(isset($_GET['permanent_address_city']))
  {
   $permanent_address_city=$_GET['permanent_address_city'];
   $s1="update m_members set permanent_address_city='$permanent_address_city' where member_code=$membercode";
   $q1=mysqli_query($conn, $s1) or die(mysqli_error($conn));
   
   $trans="cis_no: $membercode, change permanent_address_city to $permanent_address_city";
   $log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
   $log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
  }
  if(isset($_GET['permanent_address_province']))
  {
   $permanent_address_province=$_GET['permanent_address_province'];
   $s1="update m_members set permanent_address_province='$permanent_address_province' where member_code=$membercode";
   $q1=mysqli_query($conn, $s1) or die(mysqli_error($conn));
   
   $trans="cis_no: $membercode, change permanent_address_province to $permanent_address_province";
   $log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
   $log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
  }	
  if(isset($_GET['permanent_address_zipcode']))
  {
   $permanent_address_zipcode=$_GET['permanent_address_zipcode'];
   $s1="update m_members set permanent_zipcode='$permanent_address_zipcode' where member_code=$membercode";
   $q1=mysqli_query($conn, $s1) or die(mysqli_error($conn));
   
   $trans="cis_no: $membercode, change permanent_address_zipcode to $permanent_address_zipcode";
   $log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
   $log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
  }
  if(isset($_GET['home_number']))
  {
   $home_number=$_GET['home_number'];
   $s1="update m_members set home_number='$home_number' where member_code=$membercode";
   $q1=mysqli_query($conn, $s1) or die(mysqli_error($conn));
   
   $trans="cis_no: $membercode, home_number to $home_number";
   $log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
   $log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
  }
  if(isset($_GET['mobile_number']))
  {
    $mobile_number=$_GET['mobile_number'];
   $s1="update m_members set mobile_number='$mobile_number' where member_code=$membercode";
   $q1=mysqli_query($conn, $s1) or die(mysqli_error($conn));
   
   $trans="cis_no: $membercode, mobile_number to $mobile_number";
   $log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
   $log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
  }
  if(isset($_GET['email']))
  {
    $email=$_GET['email'];
   $s1="update m_members set email='$email' where member_code=$membercode";
   $q1=mysqli_query($conn, $s1) or die(mysqli_error($conn));
   
   $trans="cis_no: $membercode, email to $email";
   $log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
   $log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
  }
  if(isset($_GET['id_presented']))
  {
    $id_presented=$_GET['id_presented'];
   $s1="update m_members set id_presented='$id_presented' where member_code=$membercode";
   $q1=mysqli_query($conn, $s1) or die(mysqli_error($conn));
   
   $trans="cis_no: $membercode, id_presented to $id_presented";
   $log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
   $log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
  }
  if(isset($_GET['tin']))
  {
    $tin=$_GET['tin'];
   $s1="update m_members set tin='$tin' where member_code=$membercode";
   $q1=mysqli_query($conn, $s1) or die(mysqli_error($conn));
   
   $trans="cis_no: $membercode, tin to $tin";
   $log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
   $log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
  }
  if(isset($_GET['f_name_spouse']))
  {
   $f_name_spouse=$_GET['f_name_spouse'];
   $s1="update m_members set f_name_spouse='$f_name_spouse' where member_code=$membercode";
   $q1=mysqli_query($conn, $s1) or die(mysqli_error($conn));
   
   $trans="cis_no: $membercode, f_name_spouse to $f_name_spouse";
   $log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
   $log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
  }
  if(isset($_GET['m_name_spouse']))
  {
   $m_name_spouse=$_GET['m_name_spouse'];
   $s1="update m_members set m_name_spouse='$m_name_spouse' where member_code=$membercode";
   $q1=mysqli_query($conn, $s1) or die(mysqli_error($conn));
   
   $trans="cis_no: $membercode, m_name_spouse to $m_name_spouse";
   $log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
   $log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
  }
  if(isset($_GET['l_name_spouse']))
  {
   $l_name_spouse=$_GET['l_name_spouse'];
   $s1="update m_members set l_name_spouse='$l_name_spouse' where member_code=$membercode";
   $q1=mysqli_query($conn, $s1) or die(mysqli_error($conn));
   
   $trans="cis_no: $membercode, l_name_spouse to $l_name_spouse";
   $log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
   $log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
  }
  if(isset($_GET['no_of_children']))
  {
   $no_of_children=$_GET['no_of_children'];
   $s1="update m_members set no_of_children='$no_of_children' where member_code=$membercode";
   $q1=mysqli_query($conn, $s1) or die(mysqli_error($conn));
   
   $trans="cis_no: $membercode, no_of_children to $no_of_children";
   $log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
   $log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
  }

$loc1='Location: script_update_member_details.php?membersearch='.$_GET['membersearch'].'&members='.$_GET['members'].'&membercode='.$_GET['membercode'];
header($loc1);
}

?>
<!DOCTYPE html>
<html>
<title><?php echo $r['company_name']; ?></title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<body class="w3-light-grey"><br/>
<div class="w3-container w3-blue w3-padding-15">
<div class="w3-left w3-xlarge"><i class="fa fa-address-book w3-xlarge"></i>  Update Member Details</div>
</div>
<br/>
<a href="../admin.php?<?php echo "&members=".$_GET['members']."&membersearch=".$_GET['membersearch']."&membercode=".$_GET['membercode'];?>" class="w3-padding" ><i class="fa fa-reply fa-fw"></i>  RETURN</a><br/><br/>
   
   <div class="col-xs-7">
   
	   <div class="form-group">
       <label for="sel1">Member Type: <?php echo $r1['member_type'];?></label>
           <form method="get">
		   <input name="members" type="hidden" value="<?php echo $_GET['members'];?>">
	       <input name="membersearch" type="hidden" value="<?php echo $_GET['membersearch'];?>">
		   <input name="membercode" type="hidden" value="<?php echo $_GET['membercode'];?>">
		   <table><tr><td width="100">
		   <select required name="member_type" class="form-control" id="sel1">
            <option disabled selected></option><option>Regular</option><option>Associate</option>
           </select>
	     </td>
	     <td>&nbsp;&nbsp;<input name="submit" type="submit" class="btn btn-primary" value="Update Now" onclick="return confirm('Are you sure?')">
		  </form>
         </td></tr></table>
	   </div>
   
	 <!-------------------------------------------------------------------------------------->  
       <div class="form-group">
       <label for="sel1">Title: <?php echo $r1['title'];?></label>
           <form method="get">
		   <input name="members" type="hidden" value="<?php echo $_GET['members'];?>">
	       <input name="membersearch" type="hidden" value="<?php echo $_GET['membersearch'];?>">
		   <input name="membercode" type="hidden" value="<?php echo $_GET['membercode'];?>">
		   <table><tr><td width="100">
		   <select required name="title" class="form-control" id="sel1">
            <option></option><option>Mr</option><option>Ms</option><option>Dr</option><option>Atty</option><option>Engr</option>
           </select>
	     </td>
	     <td>&nbsp;&nbsp;<input name="submit" type="submit" class="btn btn-primary" value="Update Now" onclick="return confirm('Are you sure?')">
		  </form>
         </td></tr></table>
	   </div>
	 <!-------------------------------------------------------------------------------------->	   
	   <label for="sel1">Name: <?php echo $r1['f_name']." ".$r1['m_name']." ".$r1['l_name'];?></label>
	   
	   <form method="get">
	   <input name="members" type="hidden" value="<?php echo $_GET['members'];?>">
	   <input name="membersearch" type="hidden" value="<?php echo $_GET['membersearch'];?>">
	   <input name="membercode" type="hidden" value="<?php echo $_GET['membercode'];?>">
	   <table><tr><td width="500">
	   <input required class="form-control" id="ex1" placeholder="First Name: <?php echo $r1['f_name'];?>" name="f_name" type="text" /></td>
	   <td>&nbsp;&nbsp;<input name="submit" type="submit" class="btn btn-primary" value="Update Now" onclick="return confirm('Are you sure?')"></td></tr></table>
	   </form>
	   
	   <form method="get">
	   <input name="members" type="hidden" value="<?php echo $_GET['members'];?>">
	   <input name="membersearch" type="hidden" value="<?php echo $_GET['membersearch'];?>">
	   <input name="membercode" type="hidden" value="<?php echo $_GET['membercode'];?>">
	   <table><tr><td width="500">
	   <input required class="form-control" id="ex1" placeholder="Midde Name: <?php echo $r1['m_name'];?>" name="m_name" type="text" /></td>
	   <td>&nbsp;&nbsp;<input name="submit" type="submit" class="btn btn-primary" value="Update Now" onclick="return confirm('Are you sure?')"></td></tr></table>
	   </form>
	   
	   <form method="get">
	   <input name="members" type="hidden" value="<?php echo $_GET['members'];?>">
	   <input name="membersearch" type="hidden" value="<?php echo $_GET['membersearch'];?>">
	   <input name="membercode" type="hidden" value="<?php echo $_GET['membercode'];?>">
	   <table><tr><td width="500">
	   <input required class="form-control" id="ex1" placeholder="Last Name: <?php echo $r1['l_name'];?>" name="l_name" type="text" />
	   </td><td>&nbsp;&nbsp;<input name="submit" type="submit" class="btn btn-primary" value="Update Now" onclick="return confirm('Are you sure?')"></td></tr></table>
	   </form>
	 <!-------------------------------------------------------------------------------------->	   
	   <br/><div class="form-group">
       <label for="sel1">Gender: <?php echo $r1['gender']; ?></label>
       <form method="get">
		   <input name="members" type="hidden" value="<?php echo $_GET['members'];?>">
	       <input name="membersearch" type="hidden" value="<?php echo $_GET['membersearch'];?>">
		   <input name="membercode" type="hidden" value="<?php echo $_GET['membercode'];?>">
		   <table><tr><td width="100">
	       <select required name="gender" class="form-control" id="sel1">
            <option></option><option>Male</option><option>Female</option>
           </select></td>
	       <td>&nbsp;&nbsp;<input name="submit" type="submit" class="btn btn-primary" value="Update Now" onclick="return confirm('Are you sure?')">
		  </form>
         </td></tr></table>
       </div>
	 <!-------------------------------------------------------------------------------------->	   
	   <div class="form-group">
       <label for="sel1">Civil Status: <?php echo $r1['civil_status']; ?></label>
       <form method="get">
		   <input name="members" type="hidden" value="<?php echo $_GET['members'];?>">
	       <input name="membersearch" type="hidden" value="<?php echo $_GET['membersearch'];?>">
		   <input name="membercode" type="hidden" value="<?php echo $_GET['membercode'];?>">
		   <table><tr><td width="100">
	   
	   <select required name="civil_status" class="form-control" id="sel1">
         <option></option><option>Single</option><option>Married</option><option>Widower</option><option>Devorced</option>
       </select></td>
	   <td>&nbsp;&nbsp;<input name="submit" type="submit" class="btn btn-primary" value="Update Now" onclick="return confirm('Are you sure?')">
		  </form>
         </td></tr></table>
       </div>
	 <!-------------------------------------------------------------------------------------->	   
	   <?php 
        $sd="SELECT DATE_FORMAT(birth_date,'%d/%m/%Y') AS birth_date FROM m_members where member_code=$membercode";
		$qd=mysqli_query($conn, $sd) or die(mysqli_error($conn));
        $rd=mysqli_fetch_assoc($qd);
	   ?>
	   <label for="sel1">Birth Date: <?php echo $rd['birth_date']; ?></label>
	   <form method="get">
	   <input name="members" type="hidden" value="<?php echo $_GET['members'];?>">
	   <input name="membersearch" type="hidden" value="<?php echo $_GET['membersearch'];?>">
	   <input name="membercode" type="hidden" value="<?php echo $_GET['membercode'];?>">
	   <table><tr><td width="500">
	   <input required class="form-control" name="birth_date" type="date" />
	   </td><td>&nbsp;&nbsp;<input name="submit" type="submit" class="btn btn-primary" value="Update Now" onclick="return confirm('Are you sure?')"></td></tr></table>
	   </form>
	   
	   <form method="get">
	   <input name="members" type="hidden" value="<?php echo $_GET['members'];?>">
	   <input name="membersearch" type="hidden" value="<?php echo $_GET['membersearch'];?>">
	   <input name="membercode" type="hidden" value="<?php echo $_GET['membercode'];?>">
	   <table><tr><td width="500">
	   <input required class="form-control" id="ex1" placeholder="Birth Place: <?php echo $r1['birth_place'];?>" name="birth_place" type="text" />
	   </td><td>&nbsp;&nbsp;<input name="submit" type="submit" class="btn btn-primary" value="Update Now" onclick="return confirm('Are you sure?')"></td></tr></table>
	   </form>
	 <!-------------------------------------------------------------------------------------->	   
	   <br/><label for="sel1">Present Address:</label>
	   <form method="get">
	   <input name="members" type="hidden" value="<?php echo $_GET['members'];?>">
	   <input name="membersearch" type="hidden" value="<?php echo $_GET['membersearch'];?>">
	   <input name="membercode" type="hidden" value="<?php echo $_GET['membercode'];?>">
	   <table><tr><td width="500">
	   <input required class="form-control" id="ex1" placeholder="Street: <?php echo $r1['present_address_street'];?>" name="present_address_street" type="text" />
	   </td><td>&nbsp;&nbsp;<input name="submit" type="submit" class="btn btn-primary" value="Update Now" onclick="return confirm('Are you sure?')"></td></tr></table>
	   </form>
	   
	   <form method="get">
	   <input name="members" type="hidden" value="<?php echo $_GET['members'];?>">
	   <input name="membersearch" type="hidden" value="<?php echo $_GET['membersearch'];?>">
	   <input name="membercode" type="hidden" value="<?php echo $_GET['membercode'];?>">
	   <table><tr><td width="500">
	   <input required class="form-control" id="ex1" placeholder="Barangay: <?php echo $r1['present_address_bgy'];?>" name="present_address_barangay" type="text" />
	   </td><td>&nbsp;&nbsp;<input name="submit" type="submit" class="btn btn-primary" value="Update Now" onclick="return confirm('Are you sure?')"></td></tr></table>
	   </form>
	   
	   <form method="get">
	   <input name="members" type="hidden" value="<?php echo $_GET['members'];?>">
	   <input name="membersearch" type="hidden" value="<?php echo $_GET['membersearch'];?>">
	   <input name="membercode" type="hidden" value="<?php echo $_GET['membercode'];?>">
	   <table><tr><td width="500">
	   <input required class="form-control" id="ex1" placeholder="City: <?php echo $r1['present_address_city'];?>" name="present_address_city" type="text" />
	   </td><td>&nbsp;&nbsp;<input name="submit" type="submit" class="btn btn-primary" value="Update Now" onclick="return confirm('Are you sure?')"></td></tr></table>
	   </form>
	   
	   <form method="get">
	   <input name="members" type="hidden" value="<?php echo $_GET['members'];?>">
	   <input name="membersearch" type="hidden" value="<?php echo $_GET['membersearch'];?>">
	   <input name="membercode" type="hidden" value="<?php echo $_GET['membercode'];?>">
	   <table><tr><td width="500">
	   <input required class="form-control" id="ex1" placeholder="Province: <?php echo $r1['present_address_province'];?>" name="present_address_province" type="text" />
	   </td><td>&nbsp;&nbsp;<input name="submit" type="submit" class="btn btn-primary" value="Update Now" onclick="return confirm('Are you sure?')"></td></tr></table>
	   </form>
	   
	   <form method="get">
	   <input name="members" type="hidden" value="<?php echo $_GET['members'];?>">
	   <input name="membersearch" type="hidden" value="<?php echo $_GET['membersearch'];?>">
	   <input name="membercode" type="hidden" value="<?php echo $_GET['membercode'];?>">
	   <table><tr><td width="500">
	   <input required class="form-control" id="ex1" placeholder="Zipcode: <?php echo $r1['present_zipcode'];?>" name="present_address_zipcode" type="number" />
	   </td><td>&nbsp;&nbsp;<input name="submit" type="submit" class="btn btn-primary" value="Update Now" onclick="return confirm('Are you sure?')"></td></tr></table>
	   </form><br/>
	 <!-------------------------------------------------------------------------------------->	   
	   <label for="sel1">Permanent Address:</label>
	   <form method="get">
	   <input name="members" type="hidden" value="<?php echo $_GET['members'];?>">
	   <input name="membersearch" type="hidden" value="<?php echo $_GET['membersearch'];?>">
	   <input name="membercode" type="hidden" value="<?php echo $_GET['membercode'];?>">
	   <table><tr><td width="500">
	   <input required class="form-control" id="ex1" placeholder="Street: <?php echo $r1['permanent_address_street'];?>" name="permanent_address_street" type="text" />
	   </td><td>&nbsp;&nbsp;<input name="submit" type="submit" class="btn btn-primary" value="Update Now" onclick="return confirm('Are you sure?')"></td></tr></table>
	   </form>
	   
	   <form method="get">
	   <input name="members" type="hidden" value="<?php echo $_GET['members'];?>">
	   <input name="membersearch" type="hidden" value="<?php echo $_GET['membersearch'];?>">
	   <input name="membercode" type="hidden" value="<?php echo $_GET['membercode'];?>">
	   <table><tr><td width="500">
	   <input required class="form-control" id="ex1" placeholder="Barangay: <?php echo $r1['permanent_address_bgy'];?>" name="permanent_address_barangay" type="text" />
	   </td><td>&nbsp;&nbsp;<input name="submit" type="submit" class="btn btn-primary" value="Update Now" onclick="return confirm('Are you sure?')"></td></tr></table>
	   </form>
	   
	   <form method="get">
	   <input name="members" type="hidden" value="<?php echo $_GET['members'];?>">
	   <input name="membersearch" type="hidden" value="<?php echo $_GET['membersearch'];?>">
	   <input name="membercode" type="hidden" value="<?php echo $_GET['membercode'];?>">
	   <table><tr><td width="500">
	   <input required class="form-control" id="ex1" placeholder="City / Municipality: <?php echo $r1['permanent_address_city'];?>" name="permanent_address_city" type="text" />
	   </td><td>&nbsp;&nbsp;<input name="submit" type="submit" class="btn btn-primary" value="Update Now" onclick="return confirm('Are you sure?')"></td></tr></table>
	   </form>
	   
	   <form method="get">
	   <input name="members" type="hidden" value="<?php echo $_GET['members'];?>">
	   <input name="membersearch" type="hidden" value="<?php echo $_GET['membersearch'];?>">
	   <input name="membercode" type="hidden" value="<?php echo $_GET['membercode'];?>">
	   <table><tr><td width="500">
	   <input required class="form-control" id="ex1" placeholder="Province: <?php echo $r1['permanent_address_province'];?>" name="permanent_address_province" type="text" />
	   </td><td>&nbsp;&nbsp;<input name="submit" type="submit" class="btn btn-primary" value="Update Now" onclick="return confirm('Are you sure?')"></td></tr></table>
	   </form>
	   
	   <form method="get">
	   <input name="members" type="hidden" value="<?php echo $_GET['members'];?>">
	   <input name="membersearch" type="hidden" value="<?php echo $_GET['membersearch'];?>">
	   <input name="membercode" type="hidden" value="<?php echo $_GET['membercode'];?>">
	   <table><tr><td width="500">
	   <input required class="form-control" id="ex1" placeholder="Zipcode: <?php echo $r1['permanent_zipcode'];?>" name="permanent_address_zipcode" type="number" />
	   </td><td>&nbsp;&nbsp;<input name="submit" type="submit" class="btn btn-primary" value="Update Now" onclick="return confirm('Are you sure?')"></td></tr></table>
	   </form>
	 <!-------------------------------------------------------------------------------------->	   
	   <br/>
	   <label for="sel1">Contacts:</label>
	   <form method="get">
	    <input name="members" type="hidden" value="<?php echo $_GET['members'];?>">
	   <input name="membersearch" type="hidden" value="<?php echo $_GET['membersearch'];?>">
	   <input name="membercode" type="hidden" value="<?php echo $_GET['membercode'];?>">
	   <table><tr><td width="500">
	   <input required class="form-control" id="ex1" placeholder="Telephone: <?php echo $r1['home_number'];?>" name="home_number" type="number" />
	   </td><td>&nbsp;&nbsp;<input name="submit" type="submit" class="btn btn-primary" value="Update Now" onclick="return confirm('Are you sure?')"></td></tr></table>
	   </form>
	   
	   <form method="get">
	   <input name="members" type="hidden" value="<?php echo $_GET['members'];?>">
	   <input name="membersearch" type="hidden" value="<?php echo $_GET['membersearch'];?>">
	   <input name="membercode" type="hidden" value="<?php echo $_GET['membercode'];?>">
	   <table><tr><td width="500">
	   <input required class="form-control" id="ex1" placeholder="Mobile: <?php echo $r1['mobile_number'];?>" name="mobile_number" type="number" />
	   </td><td>&nbsp;&nbsp;<input name="submit" type="submit" class="btn btn-primary" value="Update Now" onclick="return confirm('Are you sure?')"></td></tr></table>
	   </form>
	   
	   <form method="get">
	   <input name="members" type="hidden" value="<?php echo $_GET['members'];?>">
	   <input name="membersearch" type="hidden" value="<?php echo $_GET['membersearch'];?>">
	   <input name="membercode" type="hidden" value="<?php echo $_GET['membercode'];?>">
	   <table><tr><td width="500">
	   <input required class="form-control" id="ex1" placeholder="Email: <?php echo $r1['email'];?>" name="email" type="text" />
	   </td><td>&nbsp;&nbsp;<input name="submit" type="submit" class="btn btn-primary" value="Update Now" onclick="return confirm('Are you sure?')"></td></tr></table>
	   </form>
	   
	 <!-------------------------------------------------------------------------------------->	   
	   <br/>
	   <label for="sel1">ID:</label>
	   
	   <form method="get">
	   <input name="members" type="hidden" value="<?php echo $_GET['members'];?>">
	   <input name="membersearch" type="hidden" value="<?php echo $_GET['membersearch'];?>">
	   <input name="membercode" type="hidden" value="<?php echo $_GET['membercode'];?>">
	   <table><tr><td width="500">
	   <input required class="form-control" id="ex1" placeholder="ID Presented:&nbsp; <?php echo $r1['id_presented']; ?>" name="id_presented" type="text" />
	   </td><td>&nbsp;&nbsp;<input name="submit" type="submit" class="btn btn-primary" value="Update Now" onclick="return confirm('Are you sure?')"></td></tr></table>
	   </form>
	   
	   <form method="get">
	   <input name="members" type="hidden" value="<?php echo $_GET['members'];?>">
	   <input name="membersearch" type="hidden" value="<?php echo $_GET['membersearch'];?>">
	   <input name="membercode" type="hidden" value="<?php echo $_GET['membercode'];?>">
	   <table><tr><td width="500">
	   <input required class="form-control" id="ex1" placeholder="TIN: <?php echo $r1['tin']; ?>" name="tin" type="number" />
	   </td><td>&nbsp;&nbsp;<input name="submit" type="submit" class="btn btn-primary" value="Update Now" onclick="return confirm('Are you sure?')"></td></tr></table>
	   </form>
	 <!-------------------------------------------------------------------------------------->	   
	   <br/>
	   <label for="sel1">Spouse Name: <?php echo $r1['f_name_spouse']." ".$r1['m_name_spouse']." ".$r1['l_name_spouse']; ?></label>
	   
	   <form method="get">
	   <input name="members" type="hidden" value="<?php echo $_GET['members'];?>">
	   <input name="membersearch" type="hidden" value="<?php echo $_GET['membersearch'];?>">
	   <input name="membercode" type="hidden" value="<?php echo $_GET['membercode'];?>">
	   <table><tr><td width="500">
	   <input required class="form-control" id="ex1" placeholder="First Name: <?php echo $r1['f_name_spouse']; ?>" name="f_name_spouse" type="text" />
	   </td><td>&nbsp;&nbsp;<input name="submit" type="submit" class="btn btn-primary" value="Update Now" onclick="return confirm('Are you sure?')"></td></tr></table>
	   </form>
	   
	   <form method="get">
	   <input name="members" type="hidden" value="<?php echo $_GET['members'];?>">
	   <input name="membersearch" type="hidden" value="<?php echo $_GET['membersearch'];?>">
	   <input name="membercode" type="hidden" value="<?php echo $_GET['membercode'];?>">
	   <table><tr><td width="500">
	   <input required class="form-control" id="ex1" placeholder="Middle Name: <?php echo $r1['m_name_spouse']; ?>" name="m_name_spouse" type="text" />
	   </td><td>&nbsp;&nbsp;<input name="submit" type="submit" class="btn btn-primary" value="Update Now" onclick="return confirm('Are you sure?')"></td></tr></table>
	   </form>
	   
	   <form method="get">
	   <input name="members" type="hidden" value="<?php echo $_GET['members'];?>">
	   <input name="membersearch" type="hidden" value="<?php echo $_GET['membersearch'];?>">
	   <input name="membercode" type="hidden" value="<?php echo $_GET['membercode'];?>">
	   <table><tr><td width="500">
	   <input required class="form-control" id="ex1" placeholder="Last Name: <?php echo $r1['l_name_spouse']; ?>" name="l_name_spouse" type="text" />
	   </td><td>&nbsp;&nbsp;<input name="submit" type="submit" class="btn btn-primary" value="Update Now" onclick="return confirm('Are you sure?')"></td></tr></table>
	   </form>
	   
	   <form method="get">
	   <input name="members" type="hidden" value="<?php echo $_GET['members'];?>">
	   <input name="membersearch" type="hidden" value="<?php echo $_GET['membersearch'];?>">
	   <input name="membercode" type="hidden" value="<?php echo $_GET['membercode'];?>">
	   <table><tr><td width="500">
	   <input required class="form-control" id="ex1" placeholder="No. of Dependents: <?php echo $r1['no_of_children']; ?>" name="no_of_children" type="number" />
	   </td><td>&nbsp;&nbsp;<input name="submit" type="submit" class="btn btn-primary" value="Update Now" onclick="return confirm('Are you sure?')"></td></tr></table>
	   </form>
	 <!-------------------------------------------------------------------------------------->
	   <br/>&nbsp;	    
	</div>
</body>
</html>