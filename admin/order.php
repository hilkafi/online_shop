<?php include 'inc/header.php'; ?>
<?php include 'inc/mobile_header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'inc/desktop_header.php'; ?>
<?php include_once '../classes/Cart.php';
    $ct = new Cart();
 ?>
 <?php if (isset($_GET['ap'])) {
    $pid = $_GET['ap'];
     $apOrder = $ct->approveOrder($pid);
 } ?>

 <?php if (isset($_GET['del'])) {
    $oid = $_GET['del'];
     $delOrder = $ct->deleteOrderedProduct($oid);
 } ?>

                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Order List</h3>
                                <?php if (isset($delOrder)) {
                                        echo $delOrder;
                                } ?>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Order</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>
                                        <div class="rs-select2--light rs-select2--sm">
                                            <select class="js-select2" name="time">
                                                <option selected="selected">Today</option>
                                                <option value="">3 Days</option>
                                                <option value="">1 Week</option>
                                            </select>
                                            <div class="dropDownSelect2"></div>
                                        </div>

                                    </div>
                                    <div class="table-data__tool-right">
                                          <button class="au-btn-filter">
                                            <i class="zmdi zmdi-filter-list"></i>filters</button>
                                    </div>
                                </div>
                                <div class="table-responsive table-responsive-data2">
                                    <table class="table table-data2">
                                        <thead>
                                            <tr>
                                                <th>
                                                    SL.
                                                </th>
                                                <th>Title</th>
                                                <th>Price</th>
                                                <th>Quantity</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $getorderpro = $ct->getAllOrderedProduct();
                                            if ($getorderpro) {
                                                $i=0;
                                                while ($result = $getorderpro->fetch_assoc()){
                                                $i++;
                                         ?>

                                            <tr class="tr-shadow">
                                                <td>
                                                   <?php echo $i; ?>
                                                </td>
                                            <td><?php echo $result['productName']; ?></td>
                                            <td>$<?php echo $result['price']; ?></td>
                                            <td><?php echo $result['quantity']; ?></td>

                                                <td>
                                                    <?php if ($result['status'] == '0') { ?>
                                                 <a title="VIEW" href="?ap=<?php echo $result['id']; ?>">Approve</a>
                                                 <?php }elseif($result['status'] == '1'){
                                                        echo 'Shifted'; 
                                                    }else{
                                                        echo 'Completed';
                                                 } ?>   |
                                                 <?php if ($result['status'] == '2') { ?>
                                                  <a title="DELETE" href="?del=<?php echo $result['id']; ?>"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                              <?php }else{
                                                    echo "N/A";
                                              } ?>

                                                </td>
                                            
                                            </tr>
                                            <tr class="spacer"></tr>
                                        <?php }} ?>

                                                  </tbody>
                                    </table>
                                </div>
                                <!-- END DATA TABLE -->
                            </div>
                        </div>
<?php include 'inc/footer.php'; ?>