<?php
session_start();
include('../conn/conn.php');
if(!isset($_SESSION['username'])){
$loc='Location: index.php?msg=requires_login '.$_SESSION['username'];
header($loc); }

$membercode=$_REQUEST['membercode'];
$loan_no=$_REQUEST['loan_no'];

$s1="select * from m_loans_data_details where member_code=$membercode and loan_no='$loan_no'";
$q1=mysqli_query($conn, $s1) or die(mysqli_error($conn));
$r1=mysqli_fetch_assoc($q1);

$s="select * from m_loans where member_code=$membercode and loan_no='$loan_no'";
$q=mysqli_query($conn, $s) or die(mysqli_error($conn));
$r=mysqli_fetch_assoc($q);

$s9="select * from m_members where member_code=$membercode";
$q9=mysqli_query($conn, $s9) or die(mysqli_error($conn));
$r9=mysqli_fetch_assoc($q9);


if(isset($_REQUEST['payment'])){ 

echo "Client Name: ".$r9['f_name']." ".$r9['m_name']." ".$r9['l_name']."<br>";
echo "Address: ".$r9['present_address_street']." ".$r9['present_address_bgy']." ".$r9['present_address_city']." ".$r9['present_address_province']." ".$r9['present_zipcode'];
echo "<br>";
echo "<br>";
echo "PN No. $loan_no<br>";
if($r['effective_interest_rate']==0.015){$int="1.5 %";}elseif($r['effective_interest_rate']==0.020){$int="2 %";}
echo "Interest Rate: $int<br>";
echo "Loan Amount: Php ".number_format($r['loan_amount'], 2,'.',',')."<br>";
echo "Loan Term: ".$r['loan_term']." Months<br>";
echo "<br>";

echo "Date Granted: ".date('m-d-Y',strtotime($r['date_approve']))."<br>";
echo "Date Maturity: ".date('m-d-Y',strtotime($r['date_mature']))."<br>";

echo "<br>";
echo "Amortization Schedule";
$s3="select * from member_loan_data_details where member_code=$membercode and loan_no='$loan_no' order by amort_number asc";
$q3=mysql_query($s3) or die(mysql_error());
$r3=mysql_fetch_assoc($q3);

$total_amount=number_format($r3['amort_due']+$r3['principal_balance'], 2, '.',',');

echo "<table border='1' cellspacing='0' cellpadding='0'>
       <tr align='center'>
		<td width='100'><small>No. of Month</small></td>
		<td width='100'><small>Date</small></td>
		<td width='100'><small>Principal</small></td>
		<td width='100'><small>Interest</small></td>
		<td width='100'><small>Monthly Due</small></td>
		<td width='100'><small>Principal Balance</small></td>
		<td width='100'><small>Penalty</small></td>
		<td><small>Payment Amount</small></td>
		<td><small>Payment Remarks</small></td>
		<td></td>
		<td><small>Payment by</small></td>
		<td><small>Payment Date</small></td>
		<td><small>Payment Time</small></td>
	   </tr>
	  <tr align='center'><td></td><td><small>".date('m-d-Y',strtotime($r['date_approve']))."</small></td><td></td><td></td><td></td><td><small>$total_amount</small></td><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
do{
echo "<tr align='center'>
       <td width='50' align='center'><small>".$r3['amort_number']."</small></td>
	   <td width='100'><small>".date('m-d-Y',strtotime($r3['amort_date_sched']))."</small></td>
	   <td><small>".number_format($r3['amort_principal'],2,'.',',')."</small></td>
	   <td><small>".number_format($r3['amort_interest'],2,'.',',')."</small></td>
	   <td width='100'><small><span style='color:#FF0000'><strong>".number_format($r3['amort_due'], 2, '.', ',')."</strong></span></small></td>
	   <td><small>".number_format($r3['principal_balance'], 2, '.', ',')."</small></td>
	   <td>";
	   $remain=$r3['amort_due']-$r3['payment'];
	   if($r3['amort_date_sched']<=date('Y-m-d')){echo number_format($remain,2);}else{echo "-";}
	   echo "</td>
       
	   <td><small>";
	   if($r3['posted_by']=="")
	   {echo "<input required name='payment' type='number' step='any'>";}
       else{echo "";}
	   echo "</small></td>";
	   
	   echo "<td><small><input required name='payment_remarks' type='text'></small></td>
	   <td><small><input type='submit' value='update'></small></td>
		
	   <td></td>
	   <td></td>
	   <td></td>
	   </tr>";
  } while($r3=mysql_fetch_assoc($q3));
echo "</table>";
}



if(isset($_REQUEST['pn'])){	
function convertNumber($number)
{
    list($integer, $fraction) = explode(".", (string) $number);

    $output = "";

    if ($integer{0} == "-")
    {
        $output = "Negative ";
        $integer    = ltrim($integer, "-");
    }
    else if ($integer{0} == "+")
    {
        $output = "Positive ";
        $integer    = ltrim($integer, "+");
    }

    if ($integer{0} == "0")
    {
        $output .= "Zero";
    }
    else
    {
        $integer = str_pad($integer, 36, "0", STR_PAD_LEFT);
        $group   = rtrim(chunk_split($integer, 3, " "), " ");
        $groups  = explode(" ", $group);

        $groups2 = array();
        foreach ($groups as $g)
        {
            $groups2[] = convertThreeDigit($g{0}, $g{1}, $g{2});
        }

        for ($z = 0; $z < count($groups2); $z++)
        {
            if ($groups2[$z] != "")
            {
                $output .= $groups2[$z] . convertGroup(11 - $z) . (
                        $z < 11
                        && !array_search('', array_slice($groups2, $z + 1, -1))
                        && $groups2[11] != ''
                        && $groups[11]{0} == '0'
                            ? " "
                            : " "
                    );
            }
        }

        $output = rtrim($output, ", ");
    }

    if ($fraction > 0)
    {
        $output .= " and ";
        for ($i = 0; $i < strlen($fraction); $i++)
        {
            $output .= "" . $fraction{$i};
        }
    }

    return $output;
}

function convertGroup($index)
{
    switch ($index)
    {
        case 11:
            return " Decillion";
        case 10:
            return " Nonillion";
        case 9:
            return " Octillion";
        case 8:
            return " Septillion";
        case 7:
            return " Sextillion";
        case 6:
            return " Quintrillion";
        case 5:
            return " Quadrillion";
        case 4:
            return " Trillion";
        case 3:
            return " Billion";
        case 2:
            return " Million";
        case 1:
            return " Thousand";
        case 0:
            return "";
    }
}

function convertThreeDigit($digit1, $digit2, $digit3)
{
    $buffer = "";

    if ($digit1 == "0" && $digit2 == "0" && $digit3 == "0")
    {
        return "";
    }

    if ($digit1 != "0")
    {
        $buffer .= convertDigit($digit1) . " Hundred";
        if ($digit2 != "0" || $digit3 != "0")
        {
            $buffer .= " ";
        }
    }

    if ($digit2 != "0")
    {
        $buffer .= convertTwoDigit($digit2, $digit3);
    }
    else if ($digit3 != "0")
    {
        $buffer .= convertDigit($digit3);
    }

    return $buffer;
}

function convertTwoDigit($digit1, $digit2)
{
    if ($digit2 == "0")
    {
        switch ($digit1)
        {
            case "1":
                return "Ten";
            case "2":
                return "Twenty";
            case "3":
                return "Thirty";
            case "4":
                return "Forty";
            case "5":
                return "Fifty";
            case "6":
                return "Sixty";
            case "7":
                return "Seventy";
            case "8":
                return "Eighty";
            case "9":
                return "Ninety";
        }
    } else if ($digit1 == "1")
    {
        switch ($digit2)
        {
            case "1":
                return "Eleven";
            case "2":
                return "Twelve";
            case "3":
                return "Thirteen";
            case "4":
                return "Fourteen";
            case "5":
                return "Fifteen";
            case "6":
                return "Sixteen";
            case "7":
                return "Seventeen";
            case "8":
                return "Eighteen";
            case "9":
                return "Nineteen";
        }
    } else
    {
        $temp = convertDigit($digit2);
        switch ($digit1)
        {
            case "2":
                return "Twenty $temp";
            case "3":
                return "Thirty $temp";
            case "4":
                return "Forty $temp";
            case "5":
                return "Fifty $temp";
            case "6":
                return "Sixty $temp";
            case "7":
                return "Seventy $temp";
            case "8":
                return "Eighty $temp";
            case "9":
                return "Ninety $temp";
        }
    }
}

function convertDigit($digit)
{
    switch ($digit)
    {
        case "0":
            return "Zero";
        case "1":
            return "One";
        case "2":
            return "Two";
        case "3":
            return "Three";
        case "4":
            return "Four";
        case "5":
            return "Five";
        case "6":
            return "Six";
        case "7":
            return "Seven";
        case "8":
            return "Eight";
        case "9":
            return "Nine";
    }
}

 $num = number_format($r1['amort_due'],2);
 $num1 = number_format($r1['amort_due'],2,'.',',');
 $num_word = convertNumber($num);

 $number = 10.10;
$number = number_format($number, 2, ".", ",");
sscanf($number, '%d.%d', $whole, $fraction);
 
 ?>
<table width="800" border="0">
 <tr>
  <td colspan="2">&nbsp;</td>
 </tr>
 <tr>
  <td align="center" colspan="2"><strong>PROMISSORY NOTE<br>LOAN ACCOUNT NO.____________</strong><br><br><br>	</td>
 </tr>
 <tr>
  <td colspan="2">&nbsp;</td>
 </tr>
 <tr>
  <td colspan="2">PRINCIPAL P<?php echo number_format($r['loan_amount'],2,'.',',');?></td>
 </tr>
 <tr>
  <td colspan="2">RATE OF INTEREST: <?php if($r['effective_interest_rate']==0.015){ echo "1.5 %";}elseif($r['effective_interest_rate']==0.020){ echo "2 %";} ?> PER MONTH</td>
 </tr>
 <tr>
  <td colspan="2">LOAN TERM: <?php echo $r['loan_term']." MONTHS"; ?></td>
 </tr>
 <tr>
  <td colspan="2">DATE GRANTED: <?php echo date('m/d/Y',strtotime($r['date_approve'])); ?></td>
 </tr>
 <tr>
  <td colspan="2">MATURITY DATE: <?php echo date('m/d/Y',strtotime($r['date_mature'])); ?></td>
 </tr>
 <tr>
  <td colspan="2">&nbsp;</td>
 </tr>
 <tr>
  <td colspan="2"><br><p align="justify">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  FOR VALUED RECEIVED, I promise to pay the loan through deduction from my salary the amount of <?php echo "<strong>$num_word"; if($fraction==0){ echo " ";}else{ echo "/100 ";} echo "(P $num1)</strong>";?> every month until the loan shall have been paid.
  <br><br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  I agree that if any of the installments is not paid waen falls due or in case of my/our death, disability, retirement, resignation, absence without leave and separation from service, 
  the entire unpaid balance of this loan, including charges and interest shall become immediately payable without need of any formal demand judicial or extra judicial.
  <br><br>
  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  I hereby authorize and empower the <strong><?php $company=mysqli_fetch_assoc(mysqli_query($conn, "select company_name from company")); echo $company['company_name'] ?></strong> to deduct without notice when is due it irrespective of the date of maturity.
  </p></td>
 </tr>
 <tr align="center" valign="bottom">
  <td height="100">______________________________</td><td>______________________________</td>
 </tr>
 <tr align="center" valign="top">
  <td height="100"><br>BORROWER<br>(Signature over Printed Name)</td><td><br>SPOUSE OF BORROWER<br>(Signature over Printed Name)</td>
 </tr>
 <tr align="center">
  <td colspan="2">W I T N E S S</td>
 </tr>
 <tr align="center" valign="bottom">
  <td height="50">______________________________</td><td>______________________________</td>
 </tr>
 <tr><td>&nbsp;</td></tr>
</table>
<?php }

if(isset($_REQUEST['disclosure'])){ 

$cli_1="select * from m_members where member_code=$membercode";
$qcli1=mysqli_query($conn, $cli_1) or die(mysqli_error($conn));
$client=mysqli_fetch_assoc($qcli1);
 ?>
<table width="800" border="0">
 <tr><td colspan="3" align="center"><strong><?php $company=mysqli_fetch_assoc(mysqli_query($conn, "select company_name from company")); echo $company['company_name']; ?></strong></td></tr>
 <tr>
  <td colspan="3" align="center"><strong>DISCLOSURE STATEMENT FOR LOAN TRANSACTION</strong></td>
 </tr>
 <tr>
  <td colspan="3" height="25">&nbsp;</td>
 </tr>
 <tr>
  <td height="30">NAME OF BORROWER</td><td>:</td><td><?php echo $client['f_name']." ".$client['m_name']." ".$client['l_name']; ?></td>
 </tr>
 <tr>
  <td height="30">ADDRESS</td><td>:</td><td><?php echo $client['present_address_street']." ".$client['present_address_bgy']." ".$client['present_address_city']." ".$client['present_address_province']." ".$client['present_zipcode']; ?></td>
 </tr>
 <tr>
  <td height="30">LOAN TERM</td><td>:</td><td><?php echo $r['loan_term']." MONTHS"; ?></td>
 </tr>
 <tr>
  <td height="30">GRANTED</td><td>:</td><td><?php echo date('M d, Y',strtotime($r['date_approve'])); ?></td>
 </tr>
 <tr>
  <td height="30">MATURITY</td><td>:</td><td><?php echo date('M d, Y',strtotime($r['date_mature'])); ?></td>
 </tr>
 <tr><td height="20" colspan="3"></td></tr>
 <tr align="center"><td colspan="3">
  <table width="650" border="0">
   <tr valign="top" height="50"><td align="center">1.</td><td height="30" colspan="2">AMOUNT TO BE FINANCED<br>P <strong><?php echo number_format($r['loan_amount'],2); ?></strong></td></tr>
   <tr valign="top"><td align="center">2.</td><td height="70" colspan="2">FINANCE CHARGES:<br>a. Interest <strong><?php if($r['effective_interest_rate']==0.015){echo " 1.5%";}elseif($r['effective_interest_rate']==0.020){echo " 2%";} ?></strong> Per Month<br>
                                                                                              b. Service Charge (3% of Loan) <?php $sc=$r['loan_amount']*0.03; echo "<strong>P".number_format($sc,2)."</strong>"; ?></td></tr>
   <tr valign="top"><td align="center">3.</td><td height="90" colspan="2">NON-FINANCE CHARGES<br>a. Insurance Premium <?php if($r['insurance']==0){echo"_______________";}else{ echo "<strong>".number_format($r['insurance'],2)."</strong>";}?><br>
                                                                                                 b. Notarial Fee <strong>P <?php echo number_format($r['notarial_fee'],2) ?></strong>
																							 <br>c. Other Charge <strong>P <?php echo number_format($r['other_charge'],2)."</strong> (".$r['other_charge_remarks'].")"; ?></td></tr>
   <tr valign="top"><td align="center">4.</td><td height="50" colspan="2">TOTAL DEDUCTIONS FROM PROCEEDS OF LOAN<br><strong>P <?php $total_deduct=$sc+$r['notarial_fee']+$r['insurance']+$r['other_charge']; echo number_format($total_deduct,2); ?></strong></td></tr>
   <tr valign="top"><td align="center">5.</td><td height="50" colspan="2">NET PROCEEDS OF LOAN<br><strong>P <?php echo number_format($r['loan_amount']-$total_deduct, 2); ?></strong></td></tr>
   <tr valign="top"><td align="center">6.</td><td height="100" colspan="2">MODE OF PAYMENT:<br><br>Single Payment of <strong>P <?php echo number_format($r1['amort_due'],2); ?></strong> due on <strong><?php echo date('M d, Y',strtotime($r['date_mature'])); ?></strong><br>
   Total installment payment of <strong>P <?php echo number_format($r['effective_interest_rate']*$r['loan_amount']*$r['loan_term']+$r['loan_amount'],2); ?> </strong> Payable in <strong><?php echo $r['loan_term']; ?></strong> Months</td></tr>
  </table>
 </td></tr>
 <tr>
  <td>
  CERTIFIED CORRECT:
  </td>
 </tr>
 <tr align="center" valign="bottom">
  <td>&nbsp;</td><td>&nbsp;</td><td height="60">___________________________________</td>
 </tr>
 <tr align="center">
  <td>&nbsp;</td><td>&nbsp;</td><td>Manager</td>
 </tr>
 <tr height="130" align="justify">
  <td colspan="3">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;I ACKNOWLEDGE RECEIPT OF A COPY OF THIS STATEMENT PRIOR TO THE CONSUMATION OF THE CREDIT TRANSACTION AND THAT UNDERSTAND AND FULLY AGREE TO THE RULES AND CONDITIONS HEREOF.</td>
 </tr>
 <tr>
  <td valign="top">
  _________________________<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Date
  <br><br><br>
  _________________________<br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BORROWER<br>(Signature over Printed Name)
  </td>
  
  <td>
  </td>
  
  <td align="right">
  _________________________<br>Date&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
  <br><br><br>
  _________________________<br>SPOUSE OF BORROWER&nbsp;&nbsp;<br>(Signature over Printed Name)
  </td>
  </tr>
</table>
<?php } ?>