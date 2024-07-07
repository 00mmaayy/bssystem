<?php 				
	if(isset($_REQUEST['summary']))
		{
			$sxx="select a.*, b.l_name, b.m_name, b.f_name
				  from m_loans a 
				  left join m_members b on a.member_code=b.member_code";
			$qxx=mysqli_query($conn, $sxx) or die(mysqli_error($conn));
			$rxx=mysqli_fetch_assoc($qxx);
			$x=1;
			echo "<div class='w3-container'><br/>
					<table class='table'>
						<tr class='w3-lime'>
							<td colspan='7' class='w3-large'>
								<b>LIST OF LOANS</b>
							</td>
						</tr>
						<tr class='w3-sand'>
							<td>NAME</td>
							<td>LOAN NO</td>
							<td align='right'>AMOUNT</td>
							<td>SCHEDULE</td>
							<td>APPROVED</td>
							<td>MATURE</td>
							<td>STATUS</td>
						</tr>"; 
					do{
						echo "<tr class='w3-hover-pale-red'>
								<td>".$x++.". ".$rxx['l_name'].", ".$rxx['f_name']." ".$rxx['m_name']."</td>
								<td>".$rxx['loan_no']."</td>
								<td align='right'>".number_format($rxx['loan_amount'],2)."</td>
								<td>".$rxx['loan_schedule']."</td>
								<td>".$rxx['date_approve']."</td>
								<td>".$rxx['date_mature']."</td>
								<td>";
										switch($rxx['loan_status'])
										{
											case 0: echo "<span class='w3-text-green'>OPEN</span>"; break;
											case 1: echo "<span class='w3-text-red'>CLOSED</span>"; break;
										}
						  echo "</td>
							  </tr>";
					}while($rxx=mysqli_fetch_assoc($qxx));
						
						
						$sxx2="select sum(loan_amount) as loan_amount1 from m_loans";
						$qxx2=mysqli_query($conn, $sxx2) or die(mysqli_error($conn));
						$rxx2=mysqli_fetch_assoc($qxx2);
						
						echo "<tr>
								<td colspan='3' align='right'><b>".number_format($rxx2['loan_amount1'],2)."</b></td>
							 </tr>
					    </table>";
			echo "</div>";
		}
  ?>