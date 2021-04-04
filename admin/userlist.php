<?php include 'inc/header.php'; ?>
<?php include 'inc/mobile_header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'inc/desktop_header.php'; ?>

                        <div class="row">
                            <div class="col-md-12">
                                <!-- DATA TABLE -->
                                <h3 class="title-5 m-b-35">User List</h3>
                                <div class="table-data__tool">
                                    <div class="table-data__tool-left">
                                        <div class="rs-select2--light rs-select2--md">
                                            <select class="js-select2" name="property">
                                                <option selected="selected">All User</option>
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
                                                <th>SL.</th>
                                                <th>name</th>
                                                <th>username</th>
                                                <th>Image</th>
                                                <th>Email</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php $getuser = $usr->getAllUser();
                                            if ($getuser) {
                                                $i=0;
                                                while ($result = $getuser->fetch_assoc()){
                                                $i++;
                                         ?>

                                            <tr class="tr-shadow">
                                                <td>
                                                   <?php echo $i; ?>
                                                </td>
                                                <td><?php echo $result['name']; ?></td>
                                                <td><?php echo $result['username']; ?></td>
                                                <td><img src="<?php echo $result['image']; ?>" width=100></td>
                                                <td><?php echo $result['email']; ?></td>
                                                 <td><?php if ($result['role'] == 0) {
                                                            echo "User";
                                                 }elseif($result['role'] == 1){
                                                        echo "Admin";
                                                 } ?></td>
                                                <td>

                                                     <a title="UPDATE" href="#">UPDATE</a>   |
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