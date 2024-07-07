<?php 
if(isset($_REQUEST['loans']))
{
?>
<div class="w3-col">
		<div class="w3-container w3-blue w3-padding-15">
			<div class="w3-left w3-xlarge">
				<i class="fa fa-calculator w3-xlarge"></i> Loans
			</div>
		</div>
		
		
	<br/>
			
<a href="admin.php?loans=1&search_member_loan=1" class="w3-padding"><i class="fa fa-search fa-fw"></i> Loan Search</a>
<a href="admin.php?loans=1&loan_settings=1" class="w3-padding"><i class="fa fa-gear fa-fw"></i> Loan Settings</a>
<a href="admin.php?loans=1&loan_reports_active_inactive=1" class="w3-padding"><i class="fa fa-calendar fa-fw"></i> Loan Report(Active/Inactive Members/Assiciates)</a>
<a href="admin.php?loans=1&loan_reports_loan_listing=1" class="w3-padding"><i class="fa fa-calendar fa-fw"></i> Loan Listing</a>		
	
	<br/>
	
<div class="col-xs-4"><?php include('search_member_loan.php'); ?></div>
<?php
include('summary.php');
include('loan_settings.php');
include('loan_reports_active_inactive.php');
include('loan_reports_loan_listing.php');
 
} 
?>
</div>