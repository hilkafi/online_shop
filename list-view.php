<?php include 'inc/header.php';
 include 'inc/sidebar.php';
 ?>
<div class="span9">
<div class="well well-small">

	<?php $getAllPro = $pd->getAllProduct();
			if ($getAllPro) {
				while ($result = $getAllPro->fetch_assoc()) {
	 ?>
	<div class="row-fluid">	  
		<div class="span2">
			<img src="admin/<?php echo $result['image1']; ?>" alt="">
		</div>
		<div class="span6">
			<h5><?php echo $result['title']; ?></h5>
			<p>
			<?php echo $fm->textShorten($result['description'], 100); ?>
			</p>
		</div>
		<div class="span4 alignR">
		<form class="form-horizontal qtyFrm">
		<h3> $<?php echo $result['price']; ?></h3>
		<label class="checkbox">
			<input type="checkbox">  Adds product to compair
		</label><br>
		<div class="btn-group">
		  <a href="product_details.php?pid=<?php echo $result['id']; ?>" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
		  <a href="product_details.php?pid=<?php echo $result['id']; ?>" class="shopBtn">VIEW</a>
		 </div>
			</form>
		</div>
	</div>
	<hr class="soften">
<?php }} ?>
	
</div>
</div>
</div>
<?php  include 'inc/footer.php'; ?>