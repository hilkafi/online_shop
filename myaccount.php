<?php
 include 'inc/header.php';
 Session::checkCmrSession();
 include 'inc/sidebar.php';
 ?>
 <?php 
 $cmrId = Session::get('cmrId');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$updateCmrData = $cmr->updateCustomerInfo($_POST, $cmrId);
}
  ?>

	<div class="span9">
	<div class="well np">
		<div class="well">
		<?php  
			
		$getUsr = $cmr->getCustmerData($cmrId);
			if ($getUsr) {
				while ($result = $getUsr->fetch_assoc()) {
		 ?>
		<form method="POST" action="" class="form-horizontal">
		<h3>Your Personal Details</h3>
		<?php if (isset($updateCmrData)) {
				echo $updateCmrData;
		} ?>
		<div class="control-group">
			<label class="control-label" for="inputFname">Name <sup>*</sup></label>
			<div class="controls">
			  <input type="text" name="name" id="inputFname" value="<?php echo $result['name']; ?>">
			</div>
		 </div>
		<div class="control-group">
		<label class="control-label" for="inputEmail">Email <sup>*</sup></label>
		<div class="controls">
		  <input type="text" name="email" value="<?php echo $result['email']; ?>">
		</div>
	  </div>	  
	  <div class="control-group">
		<label class="control-label">Country <sup>*</sup></label>
		<div class="controls">
		  <input type="text" name="country" value="<?php echo $result['country']; ?>">
		</div>
	  </div>
	  <div class="control-group">
		<label class="control-label">City <sup>*</sup></label>
		<div class="controls">
		  <input type="text" name="city" value="<?php echo $result['city']; ?>">
		</div>
	  </div>
	  <div class="control-group">
		<label class="control-label">Street Location <sup>*</sup></label>
		<div class="controls">
		  <input type="text" name="stlocation" value="<?php echo $result['stlocation']; ?>">
		</div>
	  </div>
	  	<div class="control-group">
			<label class="control-label" for="inputLname">Zip Code <sup>*</sup></label>
			<div class="controls">
			  <input type="text" name="zip" id="inputLname" value="<?php echo $result['zip']; ?>">
			</div>
		 </div>
		<div class="control-group">
			<label class="control-label" for="inputLname">Phone<sup>*</sup></label>
			<div class="controls">
			  <input type="text" name="phone" id="inputLname" value="<?php echo $result['phone']; ?>">
			</div>
		 </div>

	<div class="control-group">
		<div class="controls">
		 <input type="submit" name="updateAccount" value="Update" class="exclusive shopBtn">
		</div>
	</div>
	</form>
<?php }} ?>
	</div>
	</div>
	</div>
<?php include 'inc/footer.php'; ?>