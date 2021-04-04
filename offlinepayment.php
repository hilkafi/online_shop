<?php
 include 'inc/header.php';
 include 'inc/sidebar.php';
 ?>

<?php
    if (isset($_GET['orderid']) && $_GET['orderid'] == 'order') {
        $cmrId = Session::get('cmrId');
        $insertOrder = $ct->orderProduct($cmrId);
        $delData = $ct->deleteCartProduct();
        echo "<script>window.location = 'success.php'</script>";
    }

 ?>

	<div class="span9">
	<div class="well np">
		<div class="well">
		<table class="table table-bordered table-condensed">
                        <tr>
                            <th>SL</th>
                            <th>Product Name</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                        </tr>
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
                            <td><?php echo $result['productName']; ?></td>
                            <td>$<?php echo $result['price']; ?></td>
                             <td><?php echo $result['quantity']; ?></td>
                            <td><?php 
                                $total = $result['price']*$result['quantity'];
                                echo $total;
                             ?></td>
                        
                        </tr>
                        <?php $sum = $sum + $total;
                                $qty = $qty + $result['quantity'];
                         ?>
                        <?php }} ?>
                    </table>
                </div>
                <div class="well">
                    <?php 
                        $checkCart = $ct->checkCartTable();
                            if ($checkCart) { ?>
                    <table class="table table-bordered table-condensed">
                        <tr>
                            <td>Sub Total</td>
                            <td>$<?php echo $sum; ?></td>
                        </tr>
                        <tr>
                            <td>VAT</td>
                            <td>10% ($<?php echo $vat = $sum* 0.1;; ?>)</td>
                        </tr>
                        <tr>
                            <td><strong>Grand Total</strong></td>
                            <td>$<?php 
                                $vat = $sum* 0.1;
                                $grandTotal = $sum + $vat;
                                echo '<strong>'.$grandTotal.'<strong>';
                            ?></td>
                        </tr>
                   </table>
                <?php } ?>
            </div>
            <div class="well">
                    <?php 
                $id = Session::get('cmrId');
                $getdata = $cmr->getCustmerData($id);
                if ($getdata) {
                    while ($result = $getdata->fetch_assoc()) {
                     ?>
                <table class="table table-bordered table-condensed">
                    <tr><td colspan="3"><h4 style="text-align: center; font-weight: bold">Your Details</h4></td></tr>
                    <tr>
                        <td width="20%">Name</td>
                        <td><?php echo $result['name']; ?></td>
                    </tr>
                    <tr>
                        <td>Adrress</td>
                        <td><?php echo $result['stlocation']; ?></td>
                    </tr>
                    <tr>
                        <td>City</td>
                        <td><?php echo $result['city']; ?></td>
                    </tr>
                     <tr>
                        <td>Country</td>
                        <td><?php echo $result['country']; ?></td>
                    </tr>
                     <tr>
                        <td>Zip-Code</td>
                        <td><?php echo $result['zip']; ?></td>
                    </tr>
                     <tr>
                        <td>E-mail</td>
                        <td><?php echo $result['email']; ?></td>
                    </tr>
                     <tr>
                        <td>Phone</td>
                        <td><?php echo $result['phone']; ?></td>
                    </tr>
                      <tr>
                        <td></td>
                        <td><a href="editprofile.php">Update Your Details</a></td>
                    </tr>
                </table>
        <?php }} ?>
    </div>
    <div class="well">
        <a href="?orderid=order" class="shopBtn btn-large pull-right">Place Order</a>
    </div>
	</div>
	</div>
<?php include 'inc/footer.php'; ?>