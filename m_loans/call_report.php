<?php 		
session_start();
include('../conn/conn.php');
$username=$_SESSION['username'];
		
	if(isset($_REQUEST['call_report']))
		{
		  $member_code=$_REQUEST['member_code'];
		  $s="select * from m_members where member_code = $member_code";
		  $q=mysqli_query($conn, $s) or die(mysqli_error());
		  $r=mysqli_fetch_assoc($q);
?>	 
		 CLIENT: <?php echo $r['l_name'].", ".$r['f_name']." ".$r['m_name']; ?><br/>
		 ADDRESS: <?php echo $r['present_address_street']." ".$r['present_address_bgy']." ".$r['present_address_city']." ".$r['present_address_province']." ".$r['present_zipcode']; ?> <br/>
		 CONTACT: <?php echo $r['mobile_number']; ?><br/><br/>
		 <hr/>
		 <br/>
		 <table>
				<tr>
					<td>DATE</td>
					<td>REMARKS</td>
				</tr>
				
				<form method="get" action="script_call_report.php">
				<tr>
					<input name="call_report" type="hidden" value="1">
					<input name="member_code" type="hidden" value="<?php echo $_REQUEST['member_code']; ?>">
					<td valign="top"><input name="call_report_date" type="date" value="<?php echo date('Y-m-d'); ?>" required></td>
					<td><textarea name="report" rows="5" cols="100" required></textarea><br/>
					    <input type="submit" value="Post Report" onclick='return confirm("Post Report Now?")'></td>
				</tr>
				</form>
			
		 </table>
		 <br/>
		 <hr/>
		<link rel="stylesheet" href="../css/w3.css"> 
		 <table class="w3-table">
				<tr>
					<td>COUNT</td>
					<td>TRANS ID</td>
					<td>DATE</td>
					<td>REMARKS</td>
					<td>POSTED BY</td>
					<td>DATE POSTED</td>
				</tr>
				<?php
				$x=1;
				$sx="select * from m_loans_call_report where member_code = '$member_code' order by id desc";
				$qx=mysqli_query($conn, $sx) or die(mysqli_error());
				$rx=mysqli_fetch_assoc($qx);
				do{
					echo "<tr></tr>";
					echo    "<td>".$x++."</td><td>".$rx['id']."</td><td>".$rx['callreport_date']."</td><td>".$rx['callreport_remarks']."</td><td>".$rx['posted_by']."</td><td>".$rx['encoding_datetime']."</td>";
					echo "<tr></tr>";
				}while($rx=mysqli_fetch_assoc($qx));
				?>
				</form>
			
		 </table>
<?php		 
		}
  ?>
