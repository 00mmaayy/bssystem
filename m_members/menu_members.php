<?php if(isset($_REQUEST['members'])) { ?>
	  <div class="w3-col">
		<div class="w3-container w3-blue w3-padding-15">
			<div class="w3-left w3-xlarge">
				<i class="fa fa-address-book w3-xlarge"></i> Members
			</div>
		</div>
			<br/>
			<?php if($access['a2']==1) { ?><a href="admin.php?members=1&addmember=1" class="w3-padding"><i class="fa fa-address-book fa-fw"></i> Add Member</a><?php } ?>
			<a href="admin.php?members=1&membersearch=1" class="w3-padding"><i class="fa fa-search fa-fw"></i> Member Search</a>


			<!--Add Member field start-->
			<?php if (isset($_REQUEST['addmember'])) { ?>
				<div class="w3-padding w3-large"><br/>Add Member ( <span style="color:#FF0000">*</span> required fields )</div>

				<form method="get" action="m_members/script_add_member.php">
					<div class="col-xs-4">

						<?php if (isset($_REQUEST['success'])) { ?><div style="color:#0066FF" class="w3-left w3-large">Member Added Successfully!</div><br /><br /><?php } ?>

						<input name="members" type="hidden" value="<?php echo $_REQUEST['members']; ?>">
						<input name="addmember" type="hidden" value="<?php echo $_REQUEST['addmember']; ?>">
						
						<div class="form-group">
							<label for="sel1"><span style="color:#FF0000">*</span> Member Type:</label>
							<select required name="member_type1" class="form-control" id="sel1">
								<option disabled selected></option>
								<option>Regular</option>
								<option>Associate</option>
							</select>
						</div>

						<div class="form-group">
							<label for="sel1"><span style="color:#FF0000">*</span> Title:</label>
							<select required name="title" class="form-control" id="sel1">
								<option disabled selected></option>
								<option>Mr</option>
								<option>Ms</option>
								<option>Dr</option>
								<option>Atty</option>
								<option>Engr</option>
							</select>
						</div>

						<label for="sel1"><span style="color:#FF0000">*</span> Name: </label>
						<input required class="form-control" id="ex1" placeholder="First Name" name="f_name" type="text" />
						<input required class="form-control" id="ex1" placeholder="Middle Name" name="m_name" type="text" />
						<input required class="form-control" id="ex1" placeholder="Last Name" name="l_name" type="text" /><br />

						<div class="form-group">
							<label for="sel1"><span style="color:#FF0000">*</span> Gender:</label>
							<select required name="gender" class="form-control" id="sel1">
								<option></option>
								<option>Male</option>
								<option>Female</option>
							</select>
						</div>

						<div class="form-group">
							<label for="sel1"><span style="color:#FF0000">*</span> Civil Status:</label>
							<select required name="civil_status" class="form-control" id="sel1">
								<option></option>
								<option>Single</option>
								<option>Married</option>
								<option>Widower</option>
								<option>Devorced</option>
							</select>
						</div>

						<label for="sel1"><span style="color:#FF0000">*</span> Birth Date:</label>
						<input required class="form-control" name="birth_date" type="date" />
						<input required class="form-control" id="ex1" placeholder="Birth Place" name="birth_place" type="text" /><br />

						<label for="sel1"><span style="color:#FF0000">*</span> Present Address:</label>
						<input required class="form-control" id="ex1" placeholder="Street" name="present_address_street" type="text" />
						<input required class="form-control" id="ex1" placeholder="Barangay" name="present_address_barangay" type="text" />
						<input required class="form-control" id="ex1" placeholder="City" name="present_address_city" type="text" />
						<input required class="form-control" id="ex1" placeholder="Province" name="present_address_province" type="text" />
						<input required class="form-control" id="ex1" placeholder="Zipcode" name="present_address_zipcode" type="number" /><br />

						<label for="sel1"><span style="color:#FF0000">*</span> Permanent Address:</label>
						<input required class="form-control" id="ex1" placeholder="Street" name="permanent_address_street" type="text" />
						<input required class="form-control" id="ex1" placeholder="Barangay" name="permanent_address_barangay" type="text" />
						<input required class="form-control" id="ex1" placeholder="City / Municipality" name="permanent_address_city" type="text" />
						<input required class="form-control" id="ex1" placeholder="Province" name="permanent_address_province" type="text" />
						<input required class="form-control" id="ex1" placeholder="Zipcode" name="permanent_address_zipcode" type="number" /><br />

						<label for="sel1"><span style="color:#FF0000">*</span> Contacts:</label>
						<input required class="form-control" id="ex1" placeholder="Telephone" name="home_number" type="number" />
						<input required class="form-control" id="ex1" placeholder="Mobile" name="mobile_number" type="number" />
						<input required class="form-control" id="ex1" placeholder="Email" name="email" type="text" /></br>

						<label for="sel1"><span style="color:#FF0000">*</span> ID:</label>
						<input required class="form-control" id="ex1" placeholder="ID Presented" name="id_presented" type="text" />
						<input required class="form-control" id="ex1" placeholder="TIN" name="tin" type="number" /><br />

						<label for="sel1"><span style="color:#FF0000">*</span> Spouse Name:</label>
						<input required class="form-control" id="ex1" placeholder="First Name" name="f_name_spouse" type="text" />
						<input required class="form-control" id="ex1" placeholder="Middle Name" name="m_name_spouse" type="text" />
						<input required class="form-control" id="ex1" placeholder="Last Name" name="l_name_spouse" type="text" />
						<input required class="form-control" id="ex1" placeholder="Number of Dependents" name="no_of_children" type="number" />
						<br />

						<input type="submit" class="btn btn-primary" value="Add Member Now" onclick="return confirm('Are you sure?')">
					</div>
				</form>

			<?php } ?>
			<!--Add Member field End-->

			
			
			
			
			
			
			<!--Search Member field Start-->
			<?php if (isset($_REQUEST['membersearch'])) { ?><br/><br/>
				
				<form method="get">
					<div class="col-xs-4">
					Member Search:
					<input class="form-control" id="ex1" placeholder="Input Lastname" name="search_member_lastname" type="text" />
					<input name="membersearch" type="hidden" value="<?php echo $_REQUEST['membersearch']; ?>">
					<input name="members" type="hidden" value="<?php echo $_REQUEST['members']; ?>">
					</div>
					<br/>
					<input name="member_search_result" type="submit" class="btn btn-danger" value="Search">
				</form>
					<br/>
				<?php if (isset($_REQUEST['member_search_result'])) 
				    { ?>

					<div><br/>Search <span class='w3-text-red'>"<?php echo $_REQUEST['search_member_lastname']; ?>"</span> Results:<br/>
						<table class="table table-hover">
								<tr>
									<th width=150>Member Code / CIS</th>
									<th width=200>Member Name</th>
									<th width=150>Gender / Status</th>
									<th>Address</th>
								</tr>
								<?php
								$term = $_REQUEST['search_member_lastname'];
								$sq2 = "select * from m_members where l_name like '%$term%' order by l_name asc";
								$rlt2 = mysqli_query($conn, $sq2) or die(mysqli_error($conn));
								$rw2 = mysqli_fetch_assoc($rlt2);
								do {
									echo "<tr><td>" . $rw2['member_code'] . "</td>
											  <td><a href='admin.php?members=1&membersearch=1&membercode=" . $rw2['member_code'] . "'>" . $rw2['l_name'] . ", " . $rw2['f_name'] . "</a></td>
											  <td>" . $rw2['gender'] . " / " . $rw2['civil_status'] . "</td><td>" . $rw2['present_address_street'] . " " . $rw2['present_address_bgy'] . " " . $rw2['present_address_city'] . " " . $rw2['present_address_province'] . " " . $rw2['present_zipcode'] . "</td>";
									echo "</tr>";
								} while ($rw2 = mysqli_fetch_assoc($rlt2)); ?>

						</table>
					</div>

			  <?php } ?>

			</div>
		<?php } ?>
		<!--Search Member field End-->


		
		
		
		
		
		<?php //View Members Start
		if(isset($_REQUEST['membercode']))
		{
			$member_code = $_REQUEST['membercode'];
			$sq23 = "select * from m_members where member_code=$member_code";
			$rlt23 = mysqli_query($conn, $sq23) or die(mysqli_error($syshubconn));
			$rw23 = mysqli_fetch_assoc($rlt23); ?>
			

			
			<a href='admin.php?shares=1&view_share=1&membercode=<?php echo $_REQUEST['membercode']; ?>&search_member_lastname=<?php echo $rw23['l_name']; ?>' class='w3-padding'><i class="fa fa-search fa-fw"></i> View Share</a>
			<a href='admin.php?savings=1&view_savings=1<?php echo '&membercode='.$_REQUEST['membercode']; ?>&search_member_lastname=<?php echo $rw23['l_name']; ?>' class="w3-padding"><i class="fa fa-search fa-fw"></i> View Savings</a>
			<a href='admin.php?loans=1&search_member_loan=1&search_member_lastname=<?php echo $rw23['l_name'].'&membercode='.$_REQUEST['membercode']; ?>' class='w3-padding'><i class="fa fa-search fa-fw"></i> View or Create Loan</a>
			
			<?php
			echo "<div>";
			echo "<table class='table'>";
			echo "<tr><td width='250'>Member Code / CIS No. </td><td><strong>" . $_REQUEST['membercode'] . "</strong></td></tr><br/>";
			echo "<tr><td width='250'>Member Type. </td><td><strong>" . $rw23['member_type'] . "</strong></td></tr><br/>";
			echo "<tr><td>Name</td><td><strong>" . $rw23['title'] . ". " . $rw23['f_name'] . " " . $rw23['m_name'] . " " . $rw23['l_name'] . "</strong></td></tr>";
			echo "<tr><td>Gender / Status</td><td><strong>" . $rw23['gender'] . " / " . $rw23['civil_status'] . "</strong></td></tr>";
			echo "<tr><td>Birth Date / Place</td><td><strong>" . $rw23['birth_date'] . " / " . $rw23['birth_place'] . "</strong></td></tr>";
			echo "<tr><td>Present Address</td><td><strong>" . $rw23['present_address_street'] . ", Bgy. " . $rw23['present_address_bgy'] . " " . $rw23['present_address_city'] . ", " . $rw23['present_address_province'] . ", " . $rw23['present_zipcode'] . "</strong></td></tr>";
			echo "<tr><td>Permanent Address</td><td><strong>" . $rw23['permanent_address_street'] . ", Bgy. " . $rw23['permanent_address_bgy'] . " " . $rw23['permanent_address_city'] . ", " . $rw23['permanent_address_province'] . ", " . $rw23['permanent_zipcode'] . "</strong></td></tr>";
			echo "<tr><td>Home No.</td><td><strong>" . $rw23['home_number'] . "</strong></td></tr>";
			echo "<tr><td>Mobile No.</td><td><strong>" . $rw23['mobile_number'] . "</strong></td></tr>";
			echo "<tr><td>Email</td><td><strong>" . $rw23['email'] . "</strong></td></tr>";
			echo "<tr><td>ID Presented</td><td><strong>" . $rw23['id_presented'] . "</strong></td></tr>";
			echo "<tr><td>TIN</td><td><strong>" . $rw23['tin'] . "</strong></td></tr>";
			echo "<tr><td>Spouse Name</td><td><strong>" . $rw23['f_name_spouse'] . " " . $rw23['m_name_spouse'] . " " . $rw23['l_name_spouse'] . "</strong></td></tr>";
			echo "<tr><td>Number of Dependents</td><td><strong>" . $rw23['no_of_children'] . "</strong></td></tr>";
			echo "<tr><td>"; ?>
			
			<?php if($access['a3']==1) { ?>
			<form method="get" action="m_members/script_update_member_details.php">
				<input name="membersearch" type="hidden" value="<?php echo $_REQUEST['membersearch']; ?>">
				<input name="members" type="hidden" value="<?php echo $_REQUEST['members']; ?>">
				<input name="membercode" type="hidden" value="<?php echo $_REQUEST['membercode']; ?>">
				<input type="submit" class="btn btn-danger" value="Edit Member Details">
			</form>
			<?php } ?>

			</td>
			</tr>
<?php echo "</table>
			</div>";
		} //View Member End ?>
	
</div>
<?php 

		if(isset($_REQUEST['summary']))
		{
			$sxx="select
					( select count(member_type) from m_members where member_type='Regular') as m_regular,
					( select count(member_type) from m_members where member_type='Associate') as m_associate,
					( select count(member_type) from m_members where member_type='Regular' and gender='Male') as m_male_regular,
					( select count(member_type) from m_members where member_type='Regular' and gender='Female') as m_female_regular,
					( select count(member_type) from m_members where member_type='Associate' and gender='Male') as m_male_associate,
					( select count(member_type) from m_members where member_type='Associate' and gender='Female') as m_female_associate,
					( select count(gender) from m_members where gender='Male') as m_male,
					( select count(gender) from m_members where gender='Female') as m_female	
				 ";
			$qxx=mysqli_query($conn, $sxx) or die(mysqli_error($conn));
			$rxx=mysqli_fetch_assoc($qxx);
			
			echo "<div class='w3-container'><br/>
					<table class='table'>
						<tr class='w3-lime'>
							<td colspan='4' class='w3-large'>
								<b>MEMBERS SUMMARY</b>
							</td>
						</tr>
						<tr>
							<td><b class='w3-text-red w3-large'>".$rxx['m_regular']."</b> &nbsp;&nbsp;&nbsp;REGULAR MEMBERS</td>
							<td><b class='w3-text-red w3-large'>".$rxx['m_associate']."</b> &nbsp;&nbsp;&nbsp;ASSOCIATE MEMBERS</td>
						</tr>
						<tr>
							<td><b class='w3-text-red w3-large'>".$rxx['m_male_regular']."</b> &nbsp;&nbsp;&nbsp;MALE</td>
							<td><b class='w3-text-red w3-large'>".$rxx['m_male_associate']."</b> &nbsp;&nbsp;&nbsp;MALE</td>
						</tr>
						<tr>
							<td><b class='w3-text-red w3-large'>".$rxx['m_female_regular']."</b> &nbsp;&nbsp;&nbsp;FEMALE</td>
							<td><b class='w3-text-red w3-large'>".$rxx['m_female_associate']."</b> &nbsp;&nbsp;&nbsp;FEMALE</td>
						</tr>
						<tr>
							<td><a href='m_members/script_members_regular.php' target='_blank'>Show Detailed List</a></td>
							<td><a href='m_members/script_members_associate.php' target='_blank'>Show Detailed List</a></td>
						</tr>
				  </div>";
		}

} ?>