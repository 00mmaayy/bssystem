<?php 
session_start();
include('../conn/conn.php');
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); } ?>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" href="../css/font-awesome.min.css">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<script src="../js/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<?php
//User access level update script start -----
if(isset($_REQUEST['user_access_update']))
{
	
$user_access=$_REQUEST['user_access'];
$username=$_SESSION['username'];

//MEMBERS--
if(isset($_REQUEST['a1']))
	{ 	mysqli_query($conn, "update user_access set a1=1 where username='$user_access' "); 
		$trans="access_level update for $user_access a1=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set a1=0 where username='$user_access' ");
		$trans="access_level update for $user_access a1=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}
	
if(isset($_REQUEST['a2']))
	{ 	mysqli_query($conn, "update user_access set a2=1 where username='$user_access' "); 
		$trans="access_level update for $user_access a2=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set a2=0 where username='$user_access' ");
		$trans="access_level update for $user_access a2=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}

if(isset($_REQUEST['a3']))
	{ 	mysqli_query($conn, "update user_access set a3=1 where username='$user_access' "); 
		$trans="access_level update for $user_access a3=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set a3=0 where username='$user_access' ");
		$trans="access_level update for $user_access a3=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	
//MEMBERS--

//LOANS--
if(isset($_REQUEST['b1']))
	{ 	mysqli_query($conn, "update user_access set b1=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b1=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b1=0 where username='$user_access' ");
		$trans="access_level update for $user_access b1=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}

if(isset($_REQUEST['b2']))
	{ 	mysqli_query($conn, "update user_access set b2=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b2=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b2=0 where username='$user_access' ");
		$trans="access_level update for $user_access b2=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}
	
if(isset($_REQUEST['b3']))
	{ 	mysqli_query($conn, "update user_access set b3=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b3=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b3=0 where username='$user_access' ");
		$trans="access_level update for $user_access b3=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	
	
if(isset($_REQUEST['b4']))
	{ 	mysqli_query($conn, "update user_access set b4=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b4=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b4=0 where username='$user_access' ");
		$trans="access_level update for $user_access b4=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	

if(isset($_REQUEST['b5']))
	{ 	mysqli_query($conn, "update user_access set b5=1 where username='$user_access' "); 
		$trans="access_level update for $user_access b5=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set b5=0 where username='$user_access' ");
		$trans="access_level update for $user_access b5=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}		
//LOANS--

//SAVINGS--
if(isset($_REQUEST['c1']))
	{ 	mysqli_query($conn, "update user_access set c1=1 where username='$user_access' "); 
		$trans="access_level update for $user_access c1=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set c1=0 where username='$user_access' ");
		$trans="access_level update for $user_access c1=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}

if(isset($_REQUEST['c2']))
	{ 	mysqli_query($conn, "update user_access set c2=1 where username='$user_access' "); 
		$trans="access_level update for $user_access c2=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set c2=0 where username='$user_access' ");
		$trans="access_level update for $user_access c2=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	
	
if(isset($_REQUEST['c3']))
	{ 	mysqli_query($conn, "update user_access set c3=1 where username='$user_access' "); 
		$trans="access_level update for $user_access c3=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set c3=0 where username='$user_access' ");
		$trans="access_level update for $user_access c3=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}		
//SAVINGS--

//SHARES--
if(isset($_REQUEST['d1']))
	{ 	mysqli_query($conn, "update user_access set d1=1 where username='$user_access' "); 
		$trans="access_level update for $user_access d1=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set d1=0 where username='$user_access' ");
		$trans="access_level update for $user_access d1=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}

if(isset($_REQUEST['d2']))
	{ 	mysqli_query($conn, "update user_access set d2=1 where username='$user_access' "); 
		$trans="access_level update for $user_access d2=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set d2=0 where username='$user_access' ");
		$trans="access_level update for $user_access d2=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	
	
if(isset($_REQUEST['d3']))
	{ 	mysqli_query($conn, "update user_access set d3=1 where username='$user_access' "); 
		$trans="access_level update for $user_access d3=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set d3=0 where username='$user_access' ");
		$trans="access_level update for $user_access d3=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}		
//SHARES--

//CASHFLOW--
if(isset($_REQUEST['e1']))
	{ 	mysqli_query($conn, "update user_access set e1=1 where username='$user_access' "); 
		$trans="access_level update for $user_access e1=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set e1=0 where username='$user_access' ");
		$trans="access_level update for $user_access e1=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}
//CASHFLOW--

//SETTING--
if(isset($_REQUEST['z1']))
	{ 	mysqli_query($conn, "update user_access set z1=1 where username='$user_access' "); 
		$trans="access_level update for $user_access z1=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set z1=0 where username='$user_access' ");
		$trans="access_level update for $user_access z1=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}

if(isset($_REQUEST['z2']))
	{ 	mysqli_query($conn, "update user_access set z2=1 where username='$user_access' "); 
		$trans="access_level update for $user_access z2=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set z2=0 where username='$user_access' ");
		$trans="access_level update for $user_access z2=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	
	
if(isset($_REQUEST['z3']))
	{ 	mysqli_query($conn, "update user_access set z3=1 where username='$user_access' "); 
		$trans="access_level update for $user_access z3=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set z3=0 where username='$user_access' ");
		$trans="access_level update for $user_access z3=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}

if(isset($_REQUEST['z4']))
	{ 	mysqli_query($conn, "update user_access set z4=1 where username='$user_access' "); 
		$trans="access_level update for $user_access z4=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set z4=0 where username='$user_access' ");
		$trans="access_level update for $user_access z4=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}		
	
if(isset($_REQUEST['z5']))
	{ 	mysqli_query($conn, "update user_access set z5=1 where username='$user_access' "); 
		$trans="access_level update for $user_access z5=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set z5=0 where username='$user_access' ");
		$trans="access_level update for $user_access z5=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}

if(isset($_REQUEST['z6']))
	{ 	mysqli_query($conn, "update user_access set z6=1 where username='$user_access' "); 
		$trans="access_level update for $user_access z6=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set z6=0 where username='$user_access' ");
		$trans="access_level update for $user_access z6=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	
	
if(isset($_REQUEST['z7']))
	{ 	mysqli_query($conn, "update user_access set z7=1 where username='$user_access' "); 
		$trans="access_level update for $user_access z7=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set z7=0 where username='$user_access' ");
		$trans="access_level update for $user_access z7=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}

if(isset($_REQUEST['z8']))
	{ 	mysqli_query($conn, "update user_access set z8=1 where username='$user_access' "); 
		$trans="access_level update for $user_access z8=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set z8=0 where username='$user_access' ");
		$trans="access_level update for $user_access z8=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}

if(isset($_REQUEST['z9']))
	{ 	mysqli_query($conn, "update user_access set z9=1 where username='$user_access' "); 
		$trans="access_level update for $user_access z9=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set z9=0 where username='$user_access' ");
		$trans="access_level update for $user_access z9=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	
	
if(isset($_REQUEST['z10']))
	{ 	mysqli_query($conn, "update user_access set z10=1 where username='$user_access' "); 
		$trans="access_level update for $user_access z10=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set z10=0 where username='$user_access' ");
		$trans="access_level update for $user_access z10=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}

if(isset($_REQUEST['z11']))
	{ 	mysqli_query($conn, "update user_access set z11=1 where username='$user_access' "); 
		$trans="access_level update for $user_access z11=1";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	} 
	else { 	mysqli_query($conn, "update user_access set z11=0 where username='$user_access' ");
		$trans="access_level update for $user_access z11=0";
		$log_sql="insert into logbook (date,time,username,transaction) values (curdate(),curtime(),'$username','$trans')";
		$log_query=mysqli_query($conn, $log_sql) or die(mysqli_error());
	}	
//SETTING--

$loca='Location: ../m_settings/script_access_level.php?updated=1&user_access='.$_REQUEST['user_access'];
header($loca);
}
//User access level update script end -----
?>

<?php echo "<div align='center'><br><strong><a href='../admin.php?settings=1'>RETURN</a></strong></div>";?>
<hr>
<div align='center' class='w3-text-red'><strong>ACCESS LEVEL EDITOR</strong></div><br>

<?php
$s="select username from users order by username asc";
$q=mysqli_query($conn, $s) or die(mysqli_error());
$r=mysqli_fetch_assoc($q);

if(isset($_REQUEST['user_access'])) 
{
$user_access=$_REQUEST['user_access'];
$s1="select * from user_access where username='$user_access' ";
$q1=mysqli_query($conn, $s1) or die(mysqli_error());
$access=mysqli_fetch_assoc($q1);
}

echo "<form align='center' method='get'>
      <select name='user_access'><option disabled selected>select user</option>";
do{
echo "<option>".$r['username']."</option>";	
}while($r=mysqli_fetch_assoc($q));
echo "</select>
      <input type='submit' value='Show / Edit Access'>
      </form>";
?>

<hr>

<div align='center'><strong>USER ACCESS LIST FOR ACCOUNT&nbsp;&nbsp;<?php echo "<span class='w3-xlarge w3-text-red'>".$_REQUEST['user_access']."</span>";  if(isset($_REQUEST['updated'])) { echo "&nbsp;&nbsp;<span class='w3-xlarge w3-text-green'>Updated!</span>"; } ?></strong></div>

<br>
<div class='container'>
<form method='get'>
<input name='user_access' type='hidden' value='<?php echo $user_access; ?>'>
<input name='user_access_update' type='hidden' value='1'>

	
	<!--Access checkbox for Members Start ------->
	<table>
		<tr><td colspan='2'><input name='a1' type='checkbox' <?php if($access['a1']==1){ echo "checked";} ?> >&nbsp;<strong>MEMBERS</strong>&nbsp;<span class='w3-tiny'>a1</td></tr>
		<tr><td>&nbsp;&nbsp;</td><td colspan='2'><input name='a2' type='checkbox' <?php if($access['a2']==1){ echo "checked";} ?> >&nbsp;Add Member&nbsp;<span class='w3-tiny'>a2</td></tr>
		<tr><td>&nbsp;&nbsp;</td><td colspan='2'><input name='a3' type='checkbox' <?php if($access['a3']==1){ echo "checked";} ?> >&nbsp;Edit Member Details&nbsp;<span class='w3-tiny'>a3</td></tr>
		<tr><td colspan='2'>&nbsp;</td></tr>
	</table>
	<!--Access checkbox for Members End ------->
	
	
	
	<!--Access checkbox for Loans Start ------->
	<table>
		<tr><td colspan='2'><input name='b1' type='checkbox' <?php if($access['b1']==1){ echo "checked";} ?> >&nbsp;<strong>LOANS</strong>&nbsp;<span class='w3-tiny'>b1</td></tr>
		<tr><td>&nbsp;&nbsp;</td><td colspan='2'><input name='b2' type='checkbox' <?php if($access['b2']==1){ echo "checked";} ?> >&nbsp;Add Loan Terms / Loan Rates&nbsp;<span class='w3-tiny'>b2</td></tr>
		<tr><td>&nbsp;&nbsp;</td><td colspan='2'><input name='b3' type='checkbox' <?php if($access['b3']==1){ echo "checked";} ?> >&nbsp;Create Loan&nbsp;<span class='w3-tiny'>b3</td></tr>
		<tr><td>&nbsp;&nbsp;</td><td colspan='2'><input name='b4' type='checkbox' <?php if($access['b4']==1){ echo "checked";} ?> >&nbsp;View Loan Details&nbsp;<span class='w3-tiny'>b4</td></tr>
		<tr><td>&nbsp;&nbsp;</td><td colspan='2'>&nbsp;&nbsp;&nbsp;&nbsp;<input name='b5' type='checkbox' <?php if($access['b5']==1){ echo "checked";} ?> >&nbsp;Loan Payments&nbsp;<span class='w3-tiny'>b5</td></tr>
		<tr><td colspan='2'>&nbsp;</td></tr>
	</table>
	<!--Access checkbox for Loans End ------->
	
	
	<!--Access checkbox for Cashflow Start ------->
	<table>
		<tr><td colspan='2'><input name='e1' type='checkbox' <?php if($access['e1']==1){ echo "checked";} ?> >&nbsp;<strong>CASH FLOW</strong>&nbsp;<span class='w3-tiny'>e1</td></tr>
		<tr><td colspan='2'>&nbsp;</td></tr>
	</table>
	<!--Access checkbox for Cashflow End ------->
	
	
	<!--Access checkbox for Savings Start ------->
	<table>
		<tr><td colspan='2'><input name='c1' type='checkbox' <?php if($access['c1']==1){ echo "checked";} ?> >&nbsp;<strong>SAVINGS</strong>&nbsp;<span class='w3-tiny'>c1</td></tr>
		<tr><td>&nbsp;&nbsp;</td><td colspan='2'><input name='c2' type='checkbox' <?php if($access['c2']==1){ echo "checked";} ?> >&nbsp;Manage Savings&nbsp;<span class='w3-tiny'>c2</td></tr>
		<tr><td>&nbsp;&nbsp;</td><td colspan='2'><input name='c3' type='checkbox' <?php if($access['c3']==1){ echo "checked";} ?> >&nbsp;View Savings History&nbsp;<span class='w3-tiny'>c3</td></tr>
		<tr><td colspan='2'>&nbsp;</td></tr>
	</table>
	<!--Access checkbox for Savings End ------->


	
	<!--Access checkbox for Shares Start ------->
	<table>
		<tr><td colspan='2'><input name='d1' type='checkbox' <?php if($access['d1']==1){ echo "checked";} ?> >&nbsp;<strong>SHARES</strong>&nbsp;<span class='w3-tiny'>d1</td></tr>
		<tr><td>&nbsp;&nbsp;</td><td colspan='2'><input name='d2' type='checkbox' <?php if($access['d2']==1){ echo "checked";} ?> >&nbsp;Manage Shares&nbsp;<span class='w3-tiny'>d2</td></tr>
		<tr><td>&nbsp;&nbsp;</td><td colspan='2'><input name='d3' type='checkbox' <?php if($access['d3']==1){ echo "checked";} ?> >&nbsp;View Savings History&nbsp;<span class='w3-tiny'>d3</td></tr>
		<tr><td colspan='2'>&nbsp;</td></tr>
	</table>
	<!--Access checkbox for Shares End ------->
	


	<!--Access checkbox for Setting Start ------->
	<table>
    <tr><td colspan='2'><input name='z1' type='checkbox' <?php if($access['z1']==1){ echo "checked";} ?> >&nbsp;<strong>SETTINGS</strong>&nbsp;<span class='w3-tiny'>z1</td></tr>
	   <tr><td>&nbsp;&nbsp;</td><td><input name='z2' type='checkbox' <?php if($access['z2']==1){ echo "checked";} ?> >&nbsp;User Maintenance&nbsp;<span class='w3-tiny'>z2</td></tr>
       <tr><td>&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;&nbsp;<input name='z3' type='checkbox' <?php if($access['z3']==1){ echo "checked";} ?> >&nbsp;Change Password&nbsp;<span class='w3-tiny'>z3</td></tr>		   
	   <tr><td>&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;&nbsp;<input name='z4' type='checkbox' <?php if($access['z4']==1){ echo "checked";} ?> >&nbsp;Create User&nbsp;<span class='w3-tiny'>z4</td></tr>	
	   <tr><td>&nbsp;&nbsp;</td><td>&nbsp;&nbsp;&nbsp;&nbsp;<input name='z11' type='checkbox' <?php if($access['z11']==1){ echo "checked";} ?> >&nbsp;User Clear/Enable/Disable&nbsp;<span class='w3-tiny'>z11</td></tr>	
	   <tr><td>&nbsp;&nbsp;</td><td><input name='z5' type='checkbox' <?php if($access['z5']==1){ echo "checked";} ?> >&nbsp;User Position&nbsp;<span class='w3-tiny'>z5</td></tr>
	   <tr><td>&nbsp;&nbsp;</td><td><input name='z6' type='checkbox' <?php if($access['z6']==1){ echo "checked";} ?> >&nbsp;Company Details&nbsp;<span class='w3-tiny'>z6</td></tr>
	   <tr><td>&nbsp;&nbsp;</td><td><input name='z7' type='checkbox' <?php if($access['z7']==1){ echo "checked";} ?> >&nbsp;Create Access Level&nbsp;<span class='w3-tiny'>z7</td></tr>
	   <tr><td>&nbsp;&nbsp;</td><td><input name='z8' type='checkbox' <?php if($access['z8']==1){ echo "checked";} ?> >&nbsp;Backup Database&nbsp;<span class='w3-tiny'>z8</td></tr>
	   <tr><td>&nbsp;&nbsp;</td><td><input name='z9' type='checkbox' <?php if($access['z9']==1){ echo "checked";} ?> >&nbsp;Logbook Viewer&nbsp;<span class='w3-tiny'>z9</td></tr>
	   <tr><td>&nbsp;&nbsp;</td><td><input name='z10' type='checkbox' <?php if($access['z10']==1){ echo "checked";} ?> >&nbsp;Departments&nbsp;<span class='w3-tiny'>z10</td></tr>
	<tr><td colspan='2'>&nbsp;</td></tr>
	</table>
	<!--Access checkbox for Setting End ------->

		
	<div align='center'><input class='btn btn-danger w3-xlarge' type="submit" value="Update Access" onclick="return confirm('Update Access? Sigurado ka?')"></div>
</form>
</div>