<?php
 include 'inc/header.php';
 include 'inc/sidebar.php';
 ?>
 <?php
    include_once ('classes/Product.php');
    $pd = new Product();
?>

	<div class="span9">
	<div class="well np">

		<div class="well">
		<h4>Success</h4>
		<p>Your Order has been successfully Completed....</p>
		<p>Your payable amount is <strong>$<?php echo Session::get('sum') + Session::get('sum')*0.1; ?></strong></p>
		<p>Your Order Details is <a href="orderdetails.php" class="btn btn-primary">here</a></p>
		</div>
	
	</div>
	</div>
<?php include 'inc/footer.php'; ?>