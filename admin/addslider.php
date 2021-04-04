<?php include 'inc/header.php'; ?>
<?php include 'inc/mobile_header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'inc/desktop_header.php'; ?>
<?php include_once '../classes/Category.php';
    $ct = new Category();
 ?>
<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $addslider = $ct->addNewSlider($_POST);
    }
 ?>

                        <div class="row">
                            <div class="col-md-12">
                                <h3 class="title-5 m-b-35">Add New Slider</h3>
                                <hr>
                                <?php if (isset($addslider)) {
                                    echo $addslider;
                                } ?>
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Slider Title</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="title" placeholder="Text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Slider Sub-Title</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="subtitle" placeholder="Text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Slider Image</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="file"  name="image" placeholder="Text" class="form-control">
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Create
                                        </button>
                                    </div>
                                </form>


                            </div>
                        </div>
                        
<?php include 'inc/footer.php'; ?>