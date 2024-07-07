  						      <a href="admin.php?home=1" class="w3-padding" ><i class="fa fa-home fa-fw"></i>  Home</a> <!--DEFAULT-->
							  
<?php if($access['a1']==1){ ?><a href="admin.php?loans=1&summary=1" class="w3-padding"><i class="fa fa-calculator fa-fw"></i>  Loans</a><?php } ?> <!--ADD-ON MODULE-->
<?php if($access['b1']==1){ ?><a href="admin.php?members=1&summary=1" class="w3-padding"><i class="fa fa-address-book fa-fw"></i>  Members</a><?php } ?> <!--ADD-ON MODULE-->
<?php if($access['c1']==1){ ?><a href="admin.php?savings=1&summary=1" class="w3-padding"><i class="fa fa-money fa-fw"></i>  Savings</a><?php } ?> <!--ADD-ON MODULE-->
<?php if($access['d1']==1){ ?><a href="admin.php?shares=1&summary=1" class="w3-padding"><i class="fa fa-share-alt fa-fw"></i>  Shares</a><?php } ?> <!--ADD-ON MODULE-->
<?php if($access['e1']==1){ ?><a href="m_cashflow/menu_cashflow.php" class="w3-padding" target="_blank"><i class="fa fa-suitcase fa-fw"></i>  Cash Flow</a><?php } ?> <!--ADD-ON MODULE-->
  
<?php if($access['z1']==1){ ?><a href="admin.php?settings=1" class="w3-padding" ><i class="fa fa-gear fa-fw"></i>  Settings</a><?php } ?> <!--DEFAULT-->
							  <a href="index.php?logout=1" class="w3-padding" ><i class="fa fa-power-off fa-fw"></i>  Logout</a>  <!--DEFAULT-->