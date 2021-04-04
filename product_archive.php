<?php include 'inc/header.php'; 
	 include 'inc/sidebar.php';
?>
<?php 
if (isset($_GET['cn'])) {
	$cn = $_GET['cn'];
}
 ?>

	<div class="span9">

	<div class="well well-small">
	<h3><?php echo $cn." Products"; ?></h3>
		<div class="row-fluid">
		  <ul class="thumbnails">

	<?php $getCatPro = $pd->getProductByCategory($cn);
			if ($getCatPro) {
				while ($result = $getCatPro->fetch_assoc()) {
	 ?>
			<li class="span4">
			  <div class="thumbnail">
				<a href="product_details.php?pid=<?php echo $result['id']; ?>" class="overlay"></a>
				<a class="zoomTool" href="product_details.php?pid=<?php echo $result['id']; ?>" title="add to cart"><span class="icon-search"></span> QUICK VIEW</a>
				<a href="product_details.php?pid=<?php echo $result['id']; ?>"><img src="admin/<?php echo $result['image1']; ?>" alt=""></a>
				<div class="caption cntr">
					<p>Manicure & Pedicure</p>
					<p><strong> $<?php echo $result['price']; ?></strong></p>
					<h4><a class="shopBtn" href="product_details.php?pid=<?php echo $result['id']; ?>" title="add to cart"> Add to cart </a></h4>
					<div class="actionList">
						<a class="pull-left" href="#">Add to Wish List </a> 
						<a class="pull-left" href="#"> Add to Compare </a>
					</div> 
					<br class="clr">
				</div>
			  </div>
			</li>
			<?php }}else{
				echo "THIS CATEGORY HAVE NO PRODUCTS";
			} ?>
		  </ul>
		</div>
	
	
	</div>
	</div>
	</div>
<?php include 'inc/footer.php'; ?>