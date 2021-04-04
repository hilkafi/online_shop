<?php
 include 'inc/header.php';
 Session::checkCmrSession();
 include 'inc/sidebar.php';
 ?>
  <?php if (isset($_GET['confirm'])) {
    $oid = $_GET['confirm'];
     $proreceive = $ct->ProductReceived($oid);
 } ?>
  <?php if (isset($_GET['del'])) {
    $oid = $_GET['del'];
     $delOrder = $ct->deleteOrderedProduct($oid);
 } ?>

	<div class="span9">
	<div class="well np">

		<div class="well">
		<h4>Your Order Details</h4>
            <?php if (isset($delOrder)) {
            echo $delOrder;
            } ?>
		<table class="table table-bordered table-condensed">
                            <tr>
                                <th>SL</th>
                                <th>Product Name</th>
                                <th>Image</th>
                                <th>Quantity</th>
                                <th>Total Price</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            <?php 
                                $cmrId = Session::get('cmrId');
                                $getOrder = $ct->getOrderedProduct($cmrId);
                                if ($getOrder) {
                                    $i=0;
                                    while ($result = $getOrder->fetch_assoc()) {
                                    $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $result['productName']; ?></td>
                                <td><img width="100" src="admin/<?php echo $result['image']; ?>" alt=""></td>
                                <td>$<?php echo $result['quantity']; ?></td>
                                <td><?php echo $result['price']; ?></td>
                                 <td><?php echo $fm->formatDate($result['date']); ?></td>
                                 <td><?php if ($result['status'] == 0) {
                                            echo "Pending";
                                            }elseif($result['status'] == 1){ 
                                            echo "Shifted";
                                             }else{
                                                echo "Completed";
                                            } ?></td>
                                <td>
                                    <?php if ($result['status'] == '1') { ?> 
                                             <a href="?confirm=<?php echo $result['id']; ?>">confirm</a>
                                        <?php }elseif($result['status'] == '2'){ ?>
                                             <a href="?del=<?php echo $result['id']; ?>">Delete</a>
                                   <?php    }else{
                                                echo "N/A";
                                   } ?></td>
                            </tr>

                            <?php }} ?>
                        </table>
		</div>
	
	</div>
	</div>
<?php include 'inc/footer.php'; ?>