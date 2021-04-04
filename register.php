<?php  
 include 'inc/header.php';
  Session::checkCmrLogin();
include 'inc/sidebar.php';
 ?>
<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submitAccount'])) {
		$addCmr = $cmr->customerRegistration($_POST);
} ?>

<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
		$cmrLog = $cmr->customerLogin($_POST);
} ?>


	<div class="span9">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Registration</li>
    </ul>
    <?php if (isset($addCmr)) {
    	echo $addCmr;
    } ?>
    <h3>Login</h3>
    <div class="well">
    	<form action="" method="POST">
    	<div class="control-group">
		<label class="control-label" for="inputEmail">Email <sup>*</sup></label>
		<div class="controls">
		  <input type="text" name="email" placeholder="Email">
		</div>
	  </div>	  
		<div class="control-group">
		<label class="control-label">Password <sup>*</sup></label>
		<div class="controls">
		  <input type="password" name="password" placeholder="Password">
		</div>
	  </div>
	  	<div class="control-group">
		<div class="controls">
		 <input type="submit" name="login" value="Login" class="exclusive shopBtn">
		</div>
	</div>
	</form>
	  <p>If you Don't have account then Registration Now</p>
    </div>
	<h3> Registration</h3>
	<div class="well">
	<form method="POST" action="" class="form-horizontal">
		<h3>Your Personal Details</h3>
		<div class="control-group">
			<label class="control-label" for="inputFname">Name <sup>*</sup></label>
			<div class="controls">
			  <input type="text" name="name" id="inputFname" placeholder="First Name">
			</div>
		 </div>
		<div class="control-group">
		<label class="control-label" for="inputEmail">Email <sup>*</sup></label>
		<div class="controls">
		  <input type="text" name="email" placeholder="Email">
		</div>
	  </div>	  
		<div class="control-group">
		<label class="control-label">Password <sup>*</sup></label>
		<div class="controls">
		  <input type="password" name="password" placeholder="Password">
		</div>
	  </div>
	  <div class="control-group">
		<label class="control-label">Country <sup>*</sup></label>
		<div class="controls">
		  <input type="text" name="country" placeholder="Country">
		</div>
	  </div>
	  <div class="control-group">
		<label class="control-label">City <sup>*</sup></label>
		<div class="controls">
		  <input type="text" name="city" placeholder="City">
		</div>
	  </div>
	  <div class="control-group">
		<label class="control-label">Street Location <sup>*</sup></label>
		<div class="controls">
		  <input type="text" name="stlocation" placeholder="Street Location">
		</div>
	  </div>
	  	<div class="control-group">
			<label class="control-label" for="inputLname">Zip Code <sup>*</sup></label>
			<div class="controls">
			  <input type="text" name="zip" id="inputLname" placeholder="Last Name">
			</div>
		 </div>
		<div class="control-group">
			<label class="control-label" for="inputLname">Phone<sup>*</sup></label>
			<div class="controls">
			  <input type="text" name="phone" id="inputLname" placeholder="Last Name">
			</div>
		 </div>

	<div class="control-group">
		<div class="controls">
		 <input type="submit" name="submitAccount" value="Register" class="exclusive shopBtn">
		</div>
	</div>
	</form>
</div>

<div class="well">
	<form class="form-horizontal" >
		<h3>Your Billing Details</h3>
		<div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div>
		 <div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <textarea></textarea>
			</div>
		</div>
	<div class="control-group">
		<div class="controls">
		 <input type="submit" name="submitAccount" value="Register" class="shopBtn exclusive">
		</div>
	</div>
	</form>
</div>


<div class="well">
	<form class="form-horizontal" >
		<h3>Your Account Details</h3>
		<div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div>
		<div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div><div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div><div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div><div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div><div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div><div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div><div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div><div class="control-group">
			<label class="control-label">Fiels label <sup>*</sup></label>
			<div class="controls">
			  <input type="text" placeholder=" Field name">
			</div>
		</div>
	<div class="control-group">
		<div class="controls">
		 <input type="submit" name="submitAccount" value="Register" class="exclusive shopBtn">
		</div>
	</div>
	</form>
</div>


</div>
</div>
<?php  include 'inc/footer.php'; ?>