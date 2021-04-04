<?php include 'inc/header.php'; ?>
<?php include 'inc/mobile_header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'inc/desktop_header.php'; ?>
<?php include_once '../classes/Product.php';
    $pd = new Product();
 ?>

                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">Product List</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All Product</option>
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
                                                <th width="5%">
                                                    SL.
                                                </th>
                                                <th width="25%">Title</th>
                                                <th width="10%">Category</th>
                                                <th width="10%">Brand</th>
                                                <th width="10%">Price</th>
                                                <th width="10%">stock</th>
                                                <th width="30%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $getpro = $pd->getAllProduct();
                                            if ($getpro) {
                                                $i=0;
                                                while ($result = $getpro->fetch_assoc()){
                                                $i++;
                                         ?>

                                            <tr class="tr-shadow">
                                                <td>
                                                   <?php echo $i; ?>
                                                </td>
                                            <td><?php echo $result['title']; ?></td>
                                            <td><?php echo $result['category']; ?></td>
                                            <td><?php echo $result['brand']; ?></td>
                                            <td>$<?php echo $result['price']; ?></td>
                                            <td>$<?php echo $result['stock']; ?></td>

                                                <td> <a target="_blank" title="VIEW" href="../product_details.php?pid=<?php echo $result['id']; ?>">view</a>   |
                                                     <a title="UPDATE" href="updatepro.php?pid=<?php echo $result['id']; ?>">update</a>   |
                                                  <a title="DELETE" href="#"><i class="fa fa-trash" aria-hidden="true"></i></a>

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