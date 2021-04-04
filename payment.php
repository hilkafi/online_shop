<?php
 include 'inc/header.php';
 Session::checkCmrSession();
 include 'inc/sidebar.php';
 ?>
 <?php
    include_once ('classes/Product.php');
    $pd = new Product();
?>
<style>
.payment{width: 500px; min-height: 200px; text-align: center; border: 1px solid #ddd; margin: 0 auto; padding: 50px; margin-top: 20px;}
.payment h2{border-bottom: 1px solid #ddd; margin-bottom: 70px; padding-bottom: 10px;}
.payment a{background: #ff0000;  border-radius: 3px; color: #fff; font-size: 25px; padding: 5px 30px;}
.back a{width: 160px; margin: 5px auto 0; padding: 7px 0px; text-align: center;display: block;background: #555;border: 1px solid #333; color: #fff;border-radius: 3px; font-size: 25px;margin-bottom: 80px; margin-top: 40px;}
</style>

	<div class="span9">
	<div class="well np">
		<div class="payment">
                <h2>Choose Your Payment Option</h2>
                <a href="offlinepayment.php">Offline</a>
                <a href="#">Online</a>
            </div>
            <div class="back">
                <a href="cart.php">Previous</a>
        </div>
	</div>
</div>

<?php include 'inc/footer.php'; ?>