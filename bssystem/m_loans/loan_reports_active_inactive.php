<?php
		if(isset($_REQUEST['loan_reports_active_inactive']))
		{ ?><br/>
			<table class='table'>
				<tr align='center'>
					<td colspan='2'>LIST OF  BORROWER / ASSOCIATE</td>
				</tr>
				<tr align='center'>
					<td>ACTIVE</td><td>INACTIVE</td>
				</tr>
				<tr>
					<td>
						<?php
						$s="SELECT a.f_name, a.m_name, a.l_name
							FROM m_members a
							INNER JOIN m_loans b
								ON a.member_code = b.member_code
							ORDER BY a.l_name ASC";
						$q=mysqli_query($conn, $s) or die(mysql_error($conn));
						$r=mysqli_fetch_assoc($q);
						
						do
						{
							echo "<table class='w3-table'>
									<tr>";
								echo "<td>".$r['l_name']." ,".$r['f_name']." ".$r['m_name']."</td>";
							  echo "</tr>
								 </table>";
						}while($r=mysqli_fetch_assoc($q));
						?>
					</td>
					
					<td>
						<?php
						$s1="SELECT b.member_code, a.f_name, a.m_name, a.l_name
							FROM m_members a
							LEFT JOIN m_loans b
								ON a.member_code = b.member_code
							ORDER BY a.l_name ASC";
						$q1=mysqli_query($conn, $s1) or die(mysql_error($conn));
						$r1=mysqli_fetch_assoc($q1);
						
						echo "<table class='w3-table'>";
						do
						{
							if(!$r1['member_code'])
							{
							  echo "<tr>";
								echo "<td>".$r1['l_name']." ,".$r1['f_name']." ".$r1['m_name']."</td>";
							  echo "</tr>";
							}else{}	 
						}while($r1=mysqli_fetch_assoc($q1));
						echo "</table>";
						?>
					</td>
				</tr>	
			</table>
	<?php
		}
		?>	