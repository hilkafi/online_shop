<?php
 include 'inc/header.php';
 include 'inc/sidebar.php';
 ?>

	<div class="span9">
	<div class="well np">
		<div id="myCarousel" class="carousel slide homCar">
            <div class="carousel-inner">
    <?php $getSlider = $cat->getAllSlider();
        if ($getSlider) {
            while ($result = $getSlider->fetch_assoc()){
         ?>
			  <div class="item">
                <img style="width:100%" src="admin/<?php echo $result['image']; ?>" alt="bootstrap ecommerce templates">
                <div class="carousel-caption">
                      <h4><?php echo $result['title']; ?></h4>
                      <p><span><?php echo $result['subtitle']; ?></span></p>
                </div>
              </div>
          <?php }} ?>
            </div>
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">&lsaquo;</a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">&rsaquo;</a>
          </div>
        </div>
<!--
New Products
-->
	<div class="well well-small">
	<h3>New Products </h3>
	<?php echo  phpversion(); ?>
	<hr class="soften"/>
		<div class="row-fluid">
		<div id="newProductCar" class="carousel slide">
            <div class="carousel-inner">
			<div class="item active">
			  <ul class="thumbnails">
			 <?php $getPro = $pd->getNewProduct();
		  	if ($getPro) {
		  		while ($result = $getPro->fetch_assoc()) {
		  	 ?>
				<li class="span3">
				<div class="thumbnail">
					<a class="zoomTool" href="product_details.php?pid=<?php echo $result['id']; ?>" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
					<a href="#" class="tag"></a>
					<a href="product_details.php?pid=<?php echo $result['id']; ?>"><img src="admin/<?php echo $result['image1']; ?>" alt="bootstrap-ring"></a>
				</div>
				</li>
			<?php }} ?>
			  </ul>
			  </div>
		   <div class="item">
		  <ul class="thumbnails">
		  <?php $getPro = $pd->getNewFeatureProduct();
		  	if ($getPro) {
		  		while ($result = $getPro->fetch_assoc()) {
		  	 ?>
			<li class="span3">
			  <div class="thumbnail">
				<a class="zoomTool" href="product_details.php?pid=<?php echo $result['id']; ?>" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<a  href="product_details.php?pid=<?php echo $result['id']; ?>"><img src="admin/<?php echo $result['image1']; ?>" alt=""></a>
			  </div>
			</li>
		<?php }} ?>
		  </ul>
		  </div>
		   </div>
		  <a class="left carousel-control" href="#newProductCar" data-slide="prev">&lsaquo;</a>
            <a class="right carousel-control" href="#newProductCar" data-slide="next">&rsaquo;</a>
		  </div>
		  </div>
		<div class="row-fluid">
		  <ul class="thumbnails">
		  	<?php $getPro = $pd->getProduct();
		  	if ($getPro) {
		  		while ($result = $getPro->fetch_assoc()) {
		  	 ?>
			<li class="span4">
			  <div class="thumbnail">
				 
				<a class="zoomTool" href="product_details.php?pid=<?php echo $result['id']; ?>" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<a href="product_details.php?pid=<?php echo $result['id']; ?>"><img src="admin/<?php echo $result['image1']; ?>" alt=""></a>
				<div class="caption cntr">
					<p><?php echo $result['title']; ?></p>
					<p><strong> $<?php echo $result['price']; ?></strong></p>
					<h4><a class="shopBtn" href="#" title="add to cart"> Add to cart </a></h4>
					<div class="actionList">
						<a class="pull-left" href="#">Add to Wish List </a> 
						<a class="pull-left" href="#"> Add to Compare </a>
					</div> 
					<br class="clr">
				</div>
			  </div>
			</li>
		<?php }} ?>
		  </ul>
		</div>
	</div>
	<!--
	Featured Products
	-->
		<div class="well well-small">
		  <h3><a class="btn btn-mini pull-right" href="products.html" title="View more">VIew More<span class="icon-plus"></span></a> Featured Products  </h3>
		  <hr class="soften"/>
		  <div class="row-fluid">
		  <ul class="thumbnails">
		  	<?php $getFPro = $pd->getFeaturedProduct();
		  	if ($getFPro) {
		  		while ($fresult = $getFPro->fetch_assoc()) {
		  	 ?>
			<li class="span4">
			  <div class="thumbnail">
				<a class="zoomTool" href="product_details.php?pid=<?php echo $fresult['id']; ?>" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<a  href="product_details.php?pid=<?php echo $result['id']; ?>"><img src="admin/<?php echo $fresult['image1']; ?>" alt=""></a>
				<div class="caption">
				  <h5><?php echo $fresult['title']; ?></h5>
				  <h4>
					  <a class="defaultBtn" href="product_details.html" title="Click to view"><span class="icon-zoom-in"></span></a>
					  <a class="shopBtn" href="#" title="add to cart"><span class="icon-plus"></span></a>
					  <span class="pull-right">$<?php echo $fresult['price']; ?></span>
				  </h4>
				</div>
			  </div>
			</li>
		<?php }} ?>
			
		  </ul>	
	</div>
	</div>
		
	</div>
	</div>
<?php include 'inc/footer.php'; ?>