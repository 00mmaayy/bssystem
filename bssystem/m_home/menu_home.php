<!--Home Start-->
  <?php if(isset($_REQUEST['home'])) { ?>   
	<div class="w3-col">
      <div class="w3-container w3-blue w3-padding-15">
	    <div class="w3-left w3-xlarge"><i class="fa fa-home w3-xlarge"></i>  Home</div>
      </div>
	 
<?php date_default_timezone_set("Asia/Manila"); ?>
		<?php echo date('Y-m-d h:i:s a'); ?>
	 
    </div>
  <?php } ?>
  <!--Home End-->