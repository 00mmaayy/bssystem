<?php 
session_start();
include('../conn/conn.php');
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }
?>
<link rel="stylesheet" href="../css/w3.css">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<br/>
<div class='container'>
	<table class="table table-hover">
								<tr>
									<th>Count</th>
									<th width=150>Member Code / CIS</th>
									<th width=150>Member TYPE</th>
									<th width=200>Member Name</th>
									<th width=150>Gender</th>
									<th width=150>Status</th>
									<th>Address</th>
								</tr>
		<?php
		$sq2 = "select * from m_members where member_type='Associate' order by l_name asc";
		$rlt2 = mysqli_query($conn, $sq2) or die(mysqli_error($conn));
		$rw2 = mysqli_fetch_assoc($rlt2);
		$x=1;
		do {
			echo "<tr><td class='w3-text-gray'>".$x++.".</td><td>" . $rw2['member_code'] . "</td>
			      <td>" . $rw2['member_type'] . "</td>
				  <td><a href='../admin.php?members=1&membersearch=1&membercode=" . $rw2['member_code'] . "'>" . $rw2['l_name'] . ", " . $rw2['f_name'] . "</a></td>
				  <td>" . $rw2['gender'] . "</td><td>" . $rw2['civil_status'] . "</td><td>" . $rw2['present_address_street'] . " " . $rw2['present_address_bgy'] . " " . $rw2['present_address_city'] . " " . $rw2['present_address_province'] . " " . $rw2['present_zipcode'] . "</td>";
			echo "</tr>";
			} while ($rw2 = mysqli_fetch_assoc($rlt2));
		?>
		
	</table>
</div>