<?php 
session_start();
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }

include('../conn/conn.php');

$membercode=$_REQUEST['membercode'];
$s8="select * from m_savings where member_code='$membercode' order by tx_no asc";
$q8=mysqli_query($conn, $s8) or die(mysqli_error($conn));
$r8=mysqli_fetch_assoc($q8);

$s9="select * from m_members where member_code=$membercode";
$q9=mysqli_query($conn, $s9) or die(mysqli_error($conn));
$r9=mysqli_fetch_assoc($q9);

echo "Member Name: <strong>".$r9['f_name']." ".$r9['m_name']." ".$r9['l_name']."</strong><br>";
echo "Member Code: <strong>".$membercode."</strong><br><br>";
echo "<table>
		<tr align='center'>
			<td>TXNO</td><td width='20'>&nbsp;</td>
			<td>DATE/TIME</td><td width='20'>&nbsp;</td>
			<td>IN</td><td width='20'>&nbsp;</td>
			<td>OUT</td><td width='20'>&nbsp;</td>
			<td>TRX1</td><td width='20'>&nbsp;</td>
			<td>TRX2</td><td width='20'>&nbsp;</td>
			<td>POSTED BY</td>
		</tr>";

$x=1;
do{
echo "<tr align='center'>
		<td>".$x++."</td><td width='20'>&nbsp;</td>
		<td>".$r8['date']." / ".$r8['time']."</td><td width='20'>&nbsp;</td>";
		
	if($r8['account_tag']=="cash_receipts")
	{ echo "<td align='right'>".number_format($r8['amount'],2)."</td><td width='20'>&nbsp;</td><td width='20'>-</td><td width='20'>&nbsp;</td>"; }

	else
	{ echo "<td width='20'>-</td><td width='20'>&nbsp;</td><td align='right'>".number_format($r8['amount'],2)."</td><td width='20'>&nbsp;</td>"; }
		
  echo "<td>".$r8['account_tag']."</td><td width='20'>&nbsp;</td>
		<td>".$r8['transaction']."</td><td width='20'>&nbsp;</td>
		<td>".$r8['update_by']."</td>
	 </tr>";
} while($r8=mysqli_fetch_assoc($q8));
?>