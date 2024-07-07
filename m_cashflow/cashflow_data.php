<?php
    include '../conn/conn.php';
    if(isset($_POST['beg-sub']))
    {
		$date_today = date('Y-m-d');
		
		$beginning_oh = $_POST['oh-beg'];
        mysqli_query($conn,"INSERT INTO m_cashflow_balance(cf_beginning_balance_oh,bank_id,cf_balance_date,date_encoded) 
                            VALUES ($beginning_oh,0,'$date_today',NOW())") or die(mysqli_error($conn));

		
		$beginning_ob_1 = $_POST['ob-beg_1'];
        mysqli_query($conn,"INSERT INTO m_cashflow_balance(cf_beginning_balance_ob,bank_id,cf_balance_date,date_encoded) 
                            VALUES ($beginning_ob_1,1,'$date_today',NOW())") or die(mysqli_error($conn));

        
		$beginning_ob_2 = $_POST['ob-beg_2'];
        mysqli_query($conn,"INSERT INTO m_cashflow_balance(cf_beginning_balance_ob,bank_id,cf_balance_date,date_encoded) 
                            VALUES ($beginning_ob_2,2,'$date_today',NOW())") or die(mysqli_error($conn));

		
		header("location: menu_cashflow.php");

    }

    if(isset($_POST['cf-submit'])) {
        $type = $_POST['cf-type'];
        $ref = $_POST['cf-refnum'];
        $amount = $_POST['cf-amount'];
        $transact = $_POST['cf-transaction'];
		$bank_account = $_POST['cf_bank_account'];

        mysqli_query($conn, "INSERT INTO m_cashflow_daily(cf_type,cf_refnum,cf_amount,cf_transaction,cf_transaction_datetime,bank_id) 
                                VALUES('$type','$ref',$amount,'$transact',NOW(),'$bank_account')") or die(mysqli_error($conn));

        header("location: menu_cashflow.php");
    }

?>