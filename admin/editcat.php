<?php include 'inc/header.php'; ?>
<?php include 'inc/mobile_header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'inc/desktop_header.php'; ?>
<?php include_once '../classes/Category.php';
    $ct = new Category();
 ?>
 <?php 
if (isset($_GET['cid'])) {
    $cid = $_GET['cid'];
}
  ?>
<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $updatecat = $ct->UpdateCategory($_POST, $cid);
    }
 ?>

                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="title-5 m-b-35">Update Category</h3>
                                <?php if (isset($updatecat)) {
                                    echo $updatecat;
                                } ?>
                                <?php $getCat = $ct->getCategoryById($cid);
                                    if ($getCat) {
                                        $value = $getCat->fetch_assoc();
                                    
                                 ?>

                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Category Name</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="name" value="<?php echo $value['name']; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Create
                                        </button>
                                    </div>
                                </form>
                            <?php } ?>


                            </div>
                        </div>
                        
<?php include 'inc/footer.php'; ?>