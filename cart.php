<?php include 'inc/header.php'; ?>
<?php 
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $quantity = $_POST['quantity'];
        $cartId = $_POST['cartId'];
        $updateCart = $ct->updateCartQuantity($cartId, $quantity);
    }
 ?>
  <?php if (isset($_GET['del'])) {
    $cid = $_GET['del'];
     $delOrder = $ct->delCartProduct($cid);
 } ?>
	<div class="row">
	<div class="span12">
    <ul class="breadcrumb">
		<li><a href="index.html">Home</a> <span class="divider">/</span></li>
		<li class="active">Check Out</li>
    </ul>
	<div class="well well-small">
				<?php $getCartItem = $ct->getCartItem();
					if ($getCartItem) {
						$counRow = mysqli_num_rows($getCartItem); ?>
		<h1>Check Out <small class="pull-right"> <?php echo $counRow; ?> Items are in the cart </small></h1>
				<?php } ?>
	<hr class="soften"/>	

	<table class="table table-bordered table-condensed">
              <thead>
                <tr>
                	<th width="10%">SL.</th>
                  <th width="15%">Product</th>
                  <th width="20%">Description</th>
                  <th width="15%">Unit price</th>
                  <th width="15%">Qty </th>
                  <th width="15%">Total</th>
                  <th width="10%">Action</th>
				</tr>
              </thead>
              <tbody>
		<?php 
			$getPd = $ct->getCartProduct();
			if ($getPd) {
				$i=0;
				$sum = 0;
				$qty = 0;
				while ($result = $getPd->fetch_assoc()) {
				$i++;
		?>
                <tr>
                  <td><?php echo $i; ?></td>
                  <td><img width="100" src="admin/<?php echo $result['image']; ?>" alt=""></td>
                  <td><?php echo $result['productName']; ?></td>
                  <td>$<?php echo $result['price']; ?></td>
					<td>
						<form action="" method="post">
							<input type="hidden" name="cartId" value="<?php echo $result['id']; ?>"/>
							<input type="number" name="quantity" value="<?php echo $result['quantity']; ?>"/>
							<input type="submit" name="submit" value="Update"/>
						</form>
					</td>
                  <td>$<?php $total = $result['price']*$result['quantity'];
									echo $total; ?></td>
					<td><a title="DELETE" href="?del=<?php echo $result['id']; ?>">DELETE</a></td>
                </tr>
                <tr>
                </tr>
                <?php $sum = $sum + $total;
									$qty = $qty + $result['quantity'];
									Session::set('sum', $sum);
									Session::set('qty', $qty);
							 ?>
							<?php }} ?>
            </tbody>
        </table>
        				<?php 
							$checkCart = $ct->checkCartTable();
								if ($checkCart) { ?>
                <table class="table table-bordered table-condensed" width="400">
							<tr>
								<th>Sub Total : </th>
								<td>$<?php echo $sum; ?></td>
							</tr>
							<tr>
								<th>VAT : </th>
								<td>10%</td>
							</tr>
							<tr>
								<th>Grand Total :</th>
								<td><?php 
									$vat = $sum* 0.1;
									$grandTotal = $sum + $vat;
									echo $grandTotal;
								?></td>
							</tr>
					   </table>
					<?php }else{
						echo "<script>window.location = 'index.php'</script>";
					} ?>
            <table class="table table-bordered">
			<tbody>
				 <tr>
                  <td> 
				<form class="form-inline">
				  <label style="min-width:159px"> VOUCHERS Code: </label> 
				<input type="text" class="input-medium" placeholder="CODE">
				<button type="submit" class="shopBtn"> ADD</button>
				</form>
				</td>
                </tr>
				
			</tbody>
				</table>	
	<a href="products.html" class="shopBtn btn-large"><span class="icon-arrow-left"></span> Continue Shopping </a>
	<a href="payment.php" class="shopBtn btn-large pull-right">Next <span class="icon-arrow-right"></span></a>

</div>
</div>
</div>
<?php include 'inc/footer.php'; ?>