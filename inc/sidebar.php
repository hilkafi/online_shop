<div class="row">
<div id="sidebar" class="span3">
<div class="well well-small">
	<ul class="nav nav-list">
		<?php $getAllCat = $cat->getAllCategory();
			if ($getAllCat) {
				while ($result = $getAllCat->fetch_assoc()) {
		 ?>
		<li><a href="product_archive.php?cn=<?php echo $result['name']; ?>"><span class="icon-chevron-right"></span><?php echo $result['name']; ?></a></li>
	<?php }} ?>
		<li style="border:0"> &nbsp;</li>
	</ul>
</div>

			  <div class="well well-small alert alert-warning cntr">
				  <h2>50% Discount</h2>
				  <p> 
					 only valid for online order. <br><br><a class="defaultBtn" href="#">Click here </a>
				  </p>
			  </div>
			  <div class="well well-small" ><a href="#"><img src="assets/img/paypal.jpg" alt="payment method paypal"></a></div>
			
			<a class="shopBtn btn-block" href="#">Upcoming products <br><small>Click to view</small></a>
			<br>
			<br>

			<ul class="nav nav-list promowrapper">
			<?php $getSpecial = $pd->getSpecialProduct();
				if ($getSpecial) {
					while ($result = $getSpecial->fetch_assoc()) {
			 ?>
			<li>
			  <div class="thumbnail">
				<a class="zoomTool" href="product_details.php?pid=<?php echo $result['id']; ?>" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<img src="admin/<?php echo $result['image1']; ?>" alt="bootstrap ecommerce templates">
				<div class="caption">
				  <h4><a class="defaultBtn" href="product_details.php?pid=<?php echo $result['id']; ?>">VIEW</a> <span class="pull-right">$<?php echo $result['price']; ?></span></h4>
				</div>
			  </div>
			</li>
			<li style="border:0"> &nbsp;</li>
		<?php }} ?>

		  </ul>

	</div>