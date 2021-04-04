<?php include 'inc/header.php'; ?>
<?php include 'inc/mobile_header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'inc/desktop_header.php'; ?>
<?php include_once '../classes/Category.php';
    $ct = new Category();
 ?>
<?php 
$usrId = Session::get('usrId'); 
 ?>

                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="title-5 m-b-35">Your Profile</h3>
                                <?php $getUser = $usr->getUserData($usrId);
                                    if ($getUser) {
                                            while ($result = $getUser->fetch_assoc()) {
                                 ?>
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Image</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <img src="<?php echo $result['image']; ?>">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="name" value="<?php echo $result['name']; ?>" readonly class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">UserName</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="username" value="<?php echo $result['username']; ?>" readonly class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Email</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="email" value="<?php echo $result['email']; ?>" readonly class="form-control">
                                        </div>
                                    </div>
                                </form>
                            <?php }} ?>


                            </div>
                        </div>
                        
<?php include 'inc/footer.php'; ?>