<?php include 'inc/header.php'; ?>
<?php include 'inc/mobile_header.php'; ?>
<?php include 'inc/sidebar.php'; ?>
<?php include 'inc/desktop_header.php'; ?>
<?php include_once '../classes/Category.php'; ?>
<?php
    include_once ('../classes/Product.php');
    $pd = new Product();
    $ct = new Category();
?>
<?php 
if (isset($_GET['pid'])) {
    $pid = $_GET['pid'];
}
 ?>
<?php 
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $upPro = $pd->updateProduct($_POST, $pid);
    }
 ?>

                        <div class="row">
                            <div class="col-md-12">
                                <?php if (isset($upPro)) {
                                    echo $upPro;
                                } ?>
                        <?php $getPro = $pd->getProductById($pid);
                            if ($getPro) {
                                while ($result = $getPro->fetch_assoc()) {
                                    
                         ?>
                                <form action="" method="post" enctype="multipart/form-data" class="form-horizontal">
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Product Title</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="title" value="<?php echo $result['title']; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="select" class=" form-control-label">Category</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <select name="category" id="select" class="form-control">
                                                        <option value="0">Please select Category</option>
                                <?php $getCat = $ct->getAllCategory();
                                if ($getCat) {
                                    while ($cat_result = $getCat->fetch_assoc()) { ?>
                                        <option <?php if (strtolower($cat_result['name']) == strtolower($result['category'])) { echo "selected"; } ?> value="<?php echo $cat_result['name']; ?>"><?php echo $cat_result['name']; ?></option>
                                        <?php }} ?>
                                                </select>
                                            </div>
                                    </div>
                                    <div class="row form-group">
                                            <div class="col col-md-3">
                                                    <label for="select" class=" form-control-label">Brand</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                    <select name="brand" id="select" class="form-control">
                                                        <option value="0">Please select Brand</option>
                                <?php $getbrand = $ct->getAllBrand();
                                if ($getbrand) {
                                    while ($brand_result = $getbrand->fetch_assoc()) { ?>
                                        <option <?php if (strtolower($brand_result['name']) == strtolower($result['brand'])) { echo "selected"; } ?> value="<?php echo $brand_result['name']; ?>"><?php echo $brand_result['name']; ?></option>
                                <?php }} ?>
                                                    </select>
                                            </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Price</label>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <input type="text" id="text-input" name="price" value="<?php echo $result['price']; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Colour-1</label>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <input type="text" id="text-input" name="color1" value="<?php echo $result['color1']; ?>" class="form-control">
                                        </div>
                                    </div>
                                   <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Colour-2</label>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <input type="text" id="text-input" name="color2" value="<?php echo $result['color2']; ?>" class="form-control">
                                        </div>
                                    </div>
                                   <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Colour-3</label>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <input type="text" id="text-input" name="color3" value="<?php echo $result['color3']; ?>" class="form-control">
                                        </div>
                                    </div>

                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Item in Stock</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="stock" value="<?php echo $result['stock']; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Style</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="style" value="<?php echo $result['style']; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Season</label>
                                        </div>
                                        <div class="col-12 col-md-9">
                                            <input type="text" id="text-input" name="season" value="<?php echo $result['season']; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col col-md-3">
                                            <label for="text-input" class=" form-control-label">Usage</label>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <input type="text" id="text-input" name="p_usage" value="<?php echo $result['p_usage']; ?>" class="form-control">
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-multiple-input" class=" form-control-label">Product Image-1</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="file-multiple-input" name="image1" class="form-control-file">
                                                </div>
                                    </div>
                                    <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-multiple-input" class=" form-control-label">Product Image-2</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="file-multiple-input" name="image2" class="form-control-file">
                                                </div>
                                    </div>
                                    <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="file-multiple-input" class=" form-control-label">Product Image-3</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <input type="file" id="file-multiple-input" name="image3" class="form-control-file">
                                                </div>
                                    </div>
                                            <div class="row form-group">
                                                <div class="col col-md-3">
                                                    <label for="textarea-input" class=" form-control-label">Product Descriptions</label>
                                                </div>
                                                <div class="col-12 col-md-9">
                                                    <textarea name="description" id="textarea-input" rows="9" placeholder="Content..." class="form-control"><?php echo $result['description']; ?></textarea>
                                                </div>
                                            </div>
                                    <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="select" class=" form-control-label">Product Post Type</label>
                                            </div>
                                            <div class="col-12 col-md-3">
                                                <select name="status" id="select" class="form-control">
                                                    <option <?php if ($result['status'] == '0') { echo 'selected';
                                                    } ?> value="0">Normal</option>
                                                    <option <?php if ($result['status'] == '1') { echo 'selected';
                                                    } ?> value="1">Featured</option>
                                                    <option <?php if ($result['status'] == '2') { echo 'selected';
                                                    } ?> value="2">Speacial</option>
                                                </select>
                                            </div>
                                    </div>
                                <?php }} ?>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                        </button>
                                        <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                        </button>
                                    </div>
                                </form>


                            </div>
                        </div>
                        
<?php include 'inc/footer.php'; ?>