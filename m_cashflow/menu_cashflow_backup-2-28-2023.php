<?php
include '../conn/conn.php';
$date_today = date('Y-m-d');

//SQL QUERIES
$select_beginning = mysqli_query($conn, "SELECT * FROM m_cashflow_balance WHERE cf_balance_date = '$date_today'") or die(mysqli_error($conn));
$select_beginning_ob = mysqli_query($conn, "SELECT SUM(cf_beginning_balance_ob) AS beg_ob FROM m_cashflow_balance WHERE cf_balance_date = '$date_today'") or die(mysqli_error($conn));

$select_daily = mysqli_query($conn, "SELECT * FROM m_cashflow_daily WHERE cf_transaction_datetime LIKE '%$date_today%'") or die(mysqli_error($conn));
$select_daily_cashin_oh = mysqli_query($conn, "SELECT SUM(cf_amount) AS total_cashinoh FROM m_cashflow_daily WHERE cf_transaction_datetime LIKE '%$date_today%' AND (cf_type = 1)") or die(mysqli_error($conn));
$select_daily_cashin_ob = mysqli_query($conn, "SELECT SUM(cf_amount) AS total_cashinob FROM m_cashflow_daily WHERE cf_transaction_datetime LIKE '%$date_today%' AND (cf_type = 2)") or die(mysqli_error($conn));
$select_daily_cashout_oh = mysqli_query($conn, "SELECT SUM(cf_amount) AS total_cashoutoh FROM m_cashflow_daily WHERE cf_transaction_datetime LIKE '%$date_today%' AND cf_type = 4") or die(mysqli_error($conn));
$select_daily_cashout_ob = mysqli_query($conn, "SELECT SUM(cf_amount) AS total_cashoutob FROM m_cashflow_daily WHERE cf_transaction_datetime LIKE '%$date_today%' AND (cf_type = 5)") or die(mysqli_error($conn));

$select_cash_dep = mysqli_query($conn, "SELECT SUM(cf_amount) AS total_cashdep FROM m_cashflow_daily WHERE cf_transaction_datetime LIKE '%$date_today%' AND (cf_type = 3)") or die(mysqli_error($conn));
$select_cash_with = mysqli_query($conn, "SELECT SUM(cf_amount) AS total_cashwith FROM m_cashflow_daily WHERE cf_transaction_datetime LIKE '%$date_today%' AND (cf_type = 6)") or die(mysqli_error($conn));


//SQL RESULTS
$result_beginning = mysqli_fetch_assoc($select_beginning);
$result_beginning_ob = mysqli_fetch_assoc($select_beginning_ob);

$result_daily_ci_oh = mysqli_fetch_assoc($select_daily_cashin_oh);
$result_daily_ci_ob = mysqli_fetch_assoc($select_daily_cashin_ob);
$result_daily_co_oh = mysqli_fetch_assoc($select_daily_cashout_oh);
$result_daily_co_ob = mysqli_fetch_assoc($select_daily_cashout_ob);

$result_deposit = mysqli_fetch_assoc($select_cash_dep);
$result_withdrawal = mysqli_fetch_assoc($select_cash_with);


//SQL VARIABLES
$beginning_oh = $result_beginning['cf_beginning_balance_oh'];
$beginning_ob = $result_beginning_ob['beg_ob'];

$total_ci_oh = $result_daily_ci_oh['total_cashinoh'];
$total_ci_ob = $result_daily_ci_ob['total_cashinob'];
$total_co_oh = $result_daily_co_oh['total_cashoutoh'];
$total_co_ob = $result_daily_co_ob['total_cashoutob'];
$cash_deposit = $result_deposit['total_cashdep'];
$cash_withdrawal = $result_withdrawal['total_cashwith'];

$total_beginning = $beginning_ob + $beginning_oh;
$ending_oh = $beginning_oh + (($total_ci_oh + $cash_withdrawal) - ($total_co_oh + $cash_deposit));
$ending_ob = $beginning_ob + (($total_ci_ob + $cash_deposit) - ($total_co_ob + $cash_withdrawal));
$total_ending = $ending_oh + $ending_ob;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Basic cashflow</title>

    <link rel="stylesheet" href="../css/cashflow.css" />
</head>

<body>
    <div class="flex">
        <div class="input-container">
            <?php if ($result_beginning == NULL) : ?>
                <div class="cfbalance-container">
                    <h3 class="input-title">SET BEGINNING BALANCE</h3>
                    
					
					<form method="POST" action="cashflow_data.php">
					
                        <br/>On-Hand<input name="oh-beg" type="number" step="any" placeholder="Beginning On-hand" required />
						
						<?php 
									$s="select * from m_cashflow_banklist"; 
									$q=mysqli_query($conn, $s) or die(mysqli_error($conn));
									$rxx=mysqli_fetch_assoc($q);
									do{
									
									echo "<br/><br/>".$rxx['account_name']."<input name='ob-beg_".$rxx['bank_id']."' type='number' step='any' placeholder='".$rxx['account_no']."' required />";
									
									}while($rxx=mysqli_fetch_assoc($q));
						?>
						
						
						<input name="beg-sub" type="submit" value="SET BALANCE" onclick="return confirm('SET BALANCE?')" />
                    </form>
					
					
					
                </div>
            <?php endif; ?>
            <?php if ($result_beginning != NULL) : ?>
                <div class="cfinput-container">
                    <h3 class="input-title">CASHFLOW INPUT</h3>
                    <form method="POST" action="cashflow_data.php">
                        <select name="cf-type" required>
                            <option></option>
                            <option value="1">CASH IN</option>
                            <option value="4">CASH OUT</option>
                            <option value="2">CASH IN: BANK</option>
                            <option value="5">CASH OUT: BANK</option>
                            <option value="3">CASH DEPOSIT</option>
                            <option value="6">CASH WITHDRAWAL</option>
                        </select>
                        <input name="cf-refnum" type="text" placeholder="Ref/OR number" />
						
						<select name="cf_bank_account" required>
                            <option></option>
							<option value='0'>CASH</option>
							<?php 
									$s="select * from m_cashflow_banklist"; 
									$q=mysqli_query($conn, $s) or die(mysqli_error($conn));
									$rxx=mysqli_fetch_assoc($q);
									do{
									echo "<option value=".$rxx['bank_id'].">".$rxx['account_name']." | ".$rxx['account_no']."</option>";
									}while($rxx=mysqli_fetch_assoc($q));
									
							?>
                        </select>
                        
						<input name="cf-amount" type="number" step="any" placeholder="amount" />
                        <input name="cf-transaction" type="text" placeholder="transaction" />
                        <input name="cf-submit" type="submit" value="SET TRANSACTION" onclick="return confirm('SET TRANSACTION?')" />
                    </form>
                </div>
            <?php endif; ?>
        </div>

        <div class="data-container">
            <div class="balance-container flex">
                <div class="beginning-container flex">
                    <div>
                        <div class="data-label">Beginning Balance on-hand</div>
                        <div>₱ <?php echo number_format($beginning_oh, 2); ?></div>
					</div>

                    <div>
                        <div class="data-label">Beginning Balance on-bank</div>
						<div><?php 
								
								$sx="select a.cf_beginning_balance_ob, b.account_name, b.account_no 
										from m_cashflow_balance a 
										left join m_cashflow_banklist b 
											on a.bank_id = b.bank_id 
										where a.bank_id != 0 and a.cf_balance_date = '$date_today'";
								$qx=mysqli_query($conn, $sx) or die(mysqli_error($conn));
								$rx=mysqli_fetch_assoc($qx);
								do{
								echo "<br/>₱ ".$rx['cf_beginning_balance_ob']." / ".$rx['account_name'];
								}while($rx=mysqli_fetch_assoc($qx));
								
								echo "<br/>------";
								
								?></div>
						
                        <div>₱ <?php echo number_format($beginning_ob, 2); ?></div>
                    </div>

                </div>
                <div class="ending-container flex">
                    <div>
                        <div class="data-label">Ending Balance on-hand</div>
                        <div>₱ <?php echo number_format($ending_oh, 2); ?></div>
					</div>
                    <div>
                        <div class="data-label">Ending Balance on-bank</div>
                        <div>₱ <?php echo number_format($ending_ob, 2); ?></div>
					</div>
                </div>
            </div>
            <div class="table-header-container">
                <h3>
                    CASHFLOW <?php echo strtoupper(date('F d, Y')); ?>
                </h3>
                <div class="total-balance-container flex">
                    <div>
                        <div class="data-label">Total Beginning</div>
                        <div>₱ <?php echo number_format($total_beginning, 2); ?></div>
                    </div>
                    <div>
                        <div class="data-label">Total Ending</div>
                        <div>₱ <?php echo number_format($total_ending, 2); ?></div>
                    </div>
                </div>
            </div>

            <div>
                <table>
                    <thead>
                        <tr>
                            <th>CASH IN (ON HAND)</th>
                            <th>CASH IN (ON BANK)</th>
                            <th>CASH OUT (ON HAND)</th>
                            <th>CASH OUT (ON BANK)</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php while ($daily_row = mysqli_fetch_assoc($select_daily)) :
                            $type = $daily_row['cf_type'];
                            $amount = $daily_row['cf_amount'];
                            $transaction = $daily_row['cf_transaction'];
							$refnum = $daily_row['cf_refnum'];
							
							$bank1 = $daily_row['bank_id'];
							$s1 = "select * from m_cashflow_banklist where bank_id = '$bank1'";
							$q1 = mysqli_query($conn, $s1);
							$r1 = mysqli_fetch_assoc($q1);
							$bank = $r1['account_name']." | ".$r1['account_no'];

                            ?>
                            <tr>
                                <td>
                                    <?php if ($type == 1) : ?>
                                        <div class="cf_transaction"><?php echo $transaction." / ".$refnum; ?></div>
                                        <div class="cf_amount">₱ <?php echo number_format($amount, 2); ?></div>
                                    <?php elseif ($type == 6) : ?>
                                        <div class="cf_transaction"><?php echo $transaction." / ".$refnum; ?></div>
                                        <div class="cf_amount">₱ <?php echo number_format($amount, 2); ?></div>
                                    <?php else : ?>
                                        <div class="cf_transaction">-</div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($type == 2) : ?>
                                        <div class="cf_transaction"><?php echo $transaction." / ".$refnum." / ".$bank; ?></div>
                                        <div class="cf_amount">₱ <?php echo number_format($amount, 2); ?></div>
                                    <?php elseif ($type == 3) : ?>
                                        <div class="cf_transaction"><?php echo $transaction." / ".$refnum." / ".$bank; ?></div>
                                        <div class="cf_amount">₱ <?php echo number_format($amount, 2); ?></div>
                                    <?php else : ?>
                                        <div class="cf_transaction">-</div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($type == 4) : ?>
                                        <div class="cf_transaction"><?php echo $transaction." / ".$refnum; ?></div>
                                        <div class="cf_amount" style="color: red;">(₱ <?php echo number_format($amount, 2); ?>)</div>
                                    <?php elseif ($type == 3) : ?>
                                        <div class="cf_transaction"><?php echo $transaction." / ".$refnum; ?></div>
                                        <div class="cf_amount" style="color: red;">(₱ <?php echo number_format($amount, 2); ?>)</div>
                                    <?php else : ?>
                                        <div class="cf_transaction">-</div>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <?php if ($type == 5) : ?>
                                        <div class="cf_transaction"><?php echo $transaction." / ".$refnum." / ".$bank; ?></div>
                                        <div class="cf_amount" style="color: red;">(₱ <?php echo number_format($amount, 2); ?>)</div>
                                    <?php elseif ($type == 6) : ?>
                                        <div class="cf_transaction"><?php echo $transaction." / ".$refnum." / ".$bank; ?></div>
                                        <div class="cf_amount" style="color: red;">(₱ <?php echo number_format($amount, 2); ?>)</div>
                                    <?php else : ?>
                                        <div class="cf_transaction">-</div>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endwhile; ?>
                    </tbody>

                    <tfoot>
                        <tr>

                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>








<table border="1">
	<tr>
		<td colspan="7">DAILY CASH POSITION (<?php echo date('F d Y'); ?>)</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td>ONHAND</td>
		<td>CASH IN BANK - LBP</td>
		<td>CASH IN BANK - DBP</td>
		<td>CASH IN BANK - CESB</td>
		<td>TOTAL</td>
	</tr>
	<tr>
		<td></td>
		<td></td>
		<td><?php echo number_format($beginning_oh, 2); ?></td>
		<td><?php //LBP
								$sx1="select a.cf_beginning_balance_ob, b.account_name, b.account_no 
										from m_cashflow_balance a 
										left join m_cashflow_banklist b 
											on a.bank_id = b.bank_id 
										where a.bank_id = 1 and a.cf_balance_date = '$date_today'";
								$qx1=mysqli_query($conn, $sx1) or die(mysqli_error($conn));
								$rx1=mysqli_fetch_assoc($qx1);
								echo "<br/>₱ ".$rx1['cf_beginning_balance_ob'];
									
								?>
		</td>
		<td><?php //DBP
								$sx2="select a.cf_beginning_balance_ob, b.account_name, b.account_no 
										from m_cashflow_balance a 
										left join m_cashflow_banklist b 
											on a.bank_id = b.bank_id 
										where a.bank_id = 5 and a.cf_balance_date = '$date_today'";
								$qx2=mysqli_query($conn, $sx2) or die(mysqli_error($conn));
								$rx2=mysqli_fetch_assoc($qx2);
								echo "<br/>₱ ".$rx2['cf_beginning_balance_ob'];
								
								?>
		</td>
		<td><?php //CESB
								$sx3="select a.cf_beginning_balance_ob, b.account_name, b.account_no 
										from m_cashflow_balance a 
										left join m_cashflow_banklist b 
											on a.bank_id = b.bank_id 
										where a.bank_id = 2 and a.cf_balance_date = '$date_today'";
								$qx3=mysqli_query($conn, $sx3) or die(mysqli_error($conn));
								$rx3=mysqli_fetch_assoc($qx3);
								echo "<br/>₱ ".$rx3['cf_beginning_balance_ob'];
							
								?>
		</td>
		<td>
			<?php echo $rx1['cf_beginning_balance_ob']+$rx2['cf_beginning_balance_ob']+$rx3['cf_beginning_balance_ob']; ?> 
		</td>
	</tr>
	<tr>
		<td>Add Withdrawal</td>
		<td>
									<?php if ($type == 1) : ?>
											<div class="cf_transaction"><?php echo "<td>".$refnum."</td><td>". $transaction."</td>"; ?></div>
											<div class="cf_amount"><?php echo "<td>".number_format($amount, 2)."</td>"; ?></div>
                                    <?php elseif ($type == 6) : ?>
											<div class="cf_transaction"><?php echo "<td>".$transaction." / ".$refnum."</td>"; ?></div>
											<div class="cf_amount"><?php echo "<td>".number_format($amount, 2)."</td>"; ?></div>
                                    <?php else : ?>
											<div class="cf_transaction">-</div>
                                    <?php endif; ?>
                                
								
                                
                                    <?php if ($type == 2) : ?>
											<div class="cf_transaction"><?php echo "<td>".$refnum."</td><td>". $transaction."</td>"; ?></div>
											<div class="cf_amount"><?php echo "<td>".number_format($amount, 2)."</td>"; ?></div>
                                    <?php elseif ($type == 3) : ?>
											<div class="cf_transaction"><?php echo "<td>".$transaction." / ".$refnum."</td>"; ?></div>
											<div class="cf_amount"><?php echo "<td>".number_format($amount, 2)."</td>"; ?></div>
                                    <?php else : ?>
											<div class="cf_transaction">-</div>
                                    <?php endif; ?>
                                
								
                                
                                    <?php if ($type == 4) : ?>
											<div class="cf_transaction"><?php echo "<td>".$refnum."</td><td>". $transaction."</td>"; ?></div>
											<div class="cf_amount"><?php echo "<td>".number_format($amount, 2)."</td>"; ?></div>
                                    <?php elseif ($type == 3) : ?>
											<div class="cf_transaction"><?php echo "<td>".$transaction." / ".$refnum."</td>"; ?></div>
											<div class="cf_amount"><?php echo "<td>".number_format($amount, 2)."</td>"; ?></div>
                                    <?php else : ?>
											<div class="cf_transaction">-</div>
                                    <?php endif; ?>
                                
								
                                
                                    <?php if ($type == 5) : ?>
											<div class="cf_transaction"><?php echo "<td>".$refnum."</td><td>". $transaction."</td>"; ?></div>
											<div class="cf_amount"><?php echo "<td>".number_format($amount, 2)."</td>"; ?></div>
                                    <?php elseif ($type == 6) : ?>
											<div class="cf_transaction"><?php echo "<td>".$transaction." / ".$refnum."</td>"; ?></div>
											<div class="cf_amount"><?php echo "<td>".number_format($amount, 2)."</td>"; ?></div>
                                    <?php else : ?>
											<div class="cf_transaction">-</div>
                                    <?php endif; ?>
                                
        </td>
	</tr>
	
	
	
	<tr>
		<td>Cash Deposit</td>
		<td>
									<?php if ($type == 1) : ?>
											<div class="cf_transaction"><?php echo "<td>".$refnum."</td><td>". $transaction."</td>"; ?></div>
											<div class="cf_amount"><?php echo "<td>".number_format($amount, 2)."</td>"; ?></div>
                                    <?php elseif ($type == 6) : ?>
											<div class="cf_transaction"><?php echo "<td>".$transaction." / ".$refnum."</td>"; ?></div>
											<div class="cf_amount"><?php echo "<td>".number_format($amount, 2)."</td>"; ?></div>
                                    <?php else : ?>
											<div class="cf_transaction">-</div>
                                    <?php endif; ?>
                                
								
                                
                                    <?php if ($type == 2) : ?>
											<div class="cf_transaction"><?php echo "<td>".$refnum."</td><td>". $transaction."</td>"; ?></div>
											<div class="cf_amount"><?php echo "<td>".number_format($amount, 2)."</td>"; ?></div>
                                    <?php elseif ($type == 3) : ?>
											<div class="cf_transaction"><?php echo "<td>".$transaction." / ".$refnum."</td>"; ?></div>
											<div class="cf_amount"><?php echo "<td>".number_format($amount, 2)."</td>"; ?></div>
                                    <?php else : ?>
											<div class="cf_transaction">-</div>
                                    <?php endif; ?>
                                
								
                                
                                    <?php if ($type == 4) : ?>
											<div class="cf_transaction"><?php echo "<td>".$refnum."</td><td>". $transaction."</td>"; ?></div>
											<div class="cf_amount"><?php echo "<td>".number_format($amount, 2)."</td>"; ?></div>
                                    <?php elseif ($type == 3) : ?>
											<div class="cf_transaction"><?php echo "<td>".$transaction." / ".$refnum."</td>"; ?></div>
											<div class="cf_amount"><?php echo "<td>".number_format($amount, 2)."</td>"; ?></div>
                                    <?php else : ?>
											<div class="cf_transaction">-</div>
                                    <?php endif; ?>
                                
								
                                
                                    <?php if ($type == 5) : ?>
											<div class="cf_transaction"><?php echo "<td>".$refnum."</td><td>". $transaction."</td>"; ?></div>
											<div class="cf_amount"><?php echo "<td>".number_format($amount, 2)."</td>"; ?></div>
                                    <?php elseif ($type == 6) : ?>
											<div class="cf_transaction"><?php echo "<td>".$transaction." / ".$refnum."</td>"; ?></div>
											<div class="cf_amount"><?php echo "<td>".number_format($amount, 2)."</td>"; ?></div>
                                    <?php else : ?>
											<div class="cf_transaction">-</div>
                                    <?php endif; ?>
                                
        </td>
	</tr>
</table>

</body>
</html>