<?php
 include 'inc/header.php';
 include 'inc/sidebar.php';
  if (isset($_GET['pid'])) {
  	$pid = (int)$_GET['pid'];
  }

 if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ) {
        $quantity = $_POST['quantity'];
        $color = $_POST['color'];
        $addCart = $ct->addToCart($quantity, $color, $pid);
    }

 ?>
	<div class="span9">
    <ul class="breadcrumb">
    <li><a href="index.html">Home</a> <span class="divider">/</span></li>
    <li><a href="products.html">Items</a> <span class="divider">/</span></li>
    <li class="active">Preview</li>
    </ul>	
	<div class="well well-small">
		<?php if (isset($addCart)) {
			echo $addCart;
		} ?>
		<?php $getPro = $pd->getProductById($pid);
		if ($getPro) {
		 	while ($result = $getPro->fetch_assoc()) {
		 		?>
	<div class="row-fluid">
			<div class="span5">
			<div id="myCarousel" class="carousel slide cntr">
                <div class="carousel-inner">
                  <div class="item active">
                   <a href="#"> <img src="admin/<?php echo $result['image1']; ?>" alt="" style="width:100%"></a>
                  </div>
                  <div class="item">
                     <a href="#"> <img src="admin/<?php echo $result['image2']; ?>" alt="" style="width:100%"></a>
                  </div>
                  <div class="item">
                    <a href="#"> <img src="admin/<?php echo $result['image3']; ?>" alt="" style="width:100%"></a>
                  </div>
                </div>
                <a class="left carousel-control" href="#myCarousel" data-slide="prev">‹</a>
                <a class="right carousel-control" href="#myCarousel" data-slide="next">›</a>
            </div>
			</div>
			<div class="span7">
				<h3><?php echo $result['title']; ?></h3>
				<hr class="soft"/>
				
				<form action="" method="POST" class="form-horizontal qtyFrm">
				  <div class="control-group">
					<label class="control-label"><span>$<?php echo $result['price']; ?></span></label>
					<div class="controls">
					<input type="number" name="quantity" class="span6" placeholder="Qty.">
					</div>
				  </div>
				
				  <div class="control-group">
					<label class="control-label"><span>Color</span></label>
					<div class="controls">
					  <select class="span11" name="color">
						  <option <?php echo $result['color1']; ?>><?php echo $result['color1']; ?></option>
						  <option <?php echo $result['color2']; ?>><?php echo $result['color2']; ?></option>
						  <option <?php echo $result['color3']; ?>><?php echo $result['color3']; ?></option>
						</select>
					</div>
				  </div>
				  <h4><?php echo $result['stock'] ?></h4>
				  <p><?php echo $fm->textShorten($result['description'], 100); ?>
				  <p>
				  <button type="submit" name="submit" class="shopBtn"><span class=" icon-shopping-cart"></span> Add to cart</button>
				</form>
			</div>
			</div>
				<hr class="softn clr"/>


            <ul id="productDetail" class="nav nav-tabs">
              <li class="active"><a href="#home" data-toggle="tab">Product Details</a></li>
              <li class=""><a href="#profile" data-toggle="tab">Related Products </a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Acceseries <b class="caret"></b></a>
                <ul class="dropdown-menu">
                  <li><a href="#cat1" data-toggle="tab">Category one</a></li>
                  <li><a href="#cat2" data-toggle="tab">Category two</a></li>
                </ul>
              </li>
            </ul>
            <div id="myTabContent" class="tab-content tabWrapper">
            <div class="tab-pane fade active in" id="home">
			  <h4>Product Information</h4>
                <table class="table table-striped">
				<tbody>
				<tr class="techSpecRow"><td class="techSpecTD1">Color:</td><td class="techSpecTD2"><?php echo $result['color1']; ?></td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Style:</td><td class="techSpecTD2"><?php echo $result['style']; ?></td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Season:</td><td class="techSpecTD2"><?php echo $result['season']; ?></td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Usage:</td><td class="techSpecTD2"><?php echo $result['p_usage']; ?></td></tr>
				<tr class="techSpecRow"><td class="techSpecTD1">Brand:</td><td class="techSpecTD2"><?php echo $result['brand']; ?></td></tr>
				</tbody>
				</table>
				<p><?php echo $result['description']; ?></p>

			</div>
		<?php }} ?>
			<div class="tab-pane fade" id="profile">
			<div class="row-fluid">	  
			<div class="span2">
				<img src="assets/img/d.jpg" alt="">
			</div>
			<div class="span6">
				<h5>Product Name </h5>
				<p>
				Nowadays the lingerie industry is one of the most successful business spheres.
				We always stay in touch with the latest fashion tendencies - 
				that is why our goods are so popular..
				</p>
			</div>
			<div class="span4 alignR">
			<form class="form-horizontal qtyFrm">
			<h3> $140.00</h3>
			<label class="checkbox">
				<input type="checkbox">  Adds product to compair
			</label><br>
			<div class="btn-group">
			  <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
			  <a href="product_details.html" class="shopBtn">VIEW</a>
			 </div>
				</form>
			</div>
		</div>
			<hr class="soft">
			<div class="row-fluid">	  
			<div class="span2">
				<img src="assets/img/d.jpg" alt="">
			</div>
			<div class="span6">
				<h5>Product Name </h5>
				<p>
				Nowadays the lingerie industry is one of the most successful business spheres.
				We always stay in touch with the latest fashion tendencies - 
				that is why our goods are so popular..
				</p>
			</div>
			<div class="span4 alignR">
			<form class="form-horizontal qtyFrm">
			<h3> $140.00</h3>
			<label class="checkbox">
				<input type="checkbox">  Adds product to compair
			</label><br>
			<div class="btn-group">
			  <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
			  <a href="product_details.html" class="shopBtn">VIEW</a>
			 </div>
				</form>
			</div>
	</div>
			<hr class="soft"/>
			<div class="row-fluid">	  
			<div class="span2">
				<img src="assets/img/d.jpg" alt="">
			</div>
			<div class="span6">
				<h5>Product Name </h5>
				<p>
				Nowadays the lingerie industry is one of the most successful business spheres.
				We always stay in touch with the latest fashion tendencies - 
				that is why our goods are so popular..
				</p>
			</div>
			<div class="span4 alignR">
			<form class="form-horizontal qtyFrm">
			<h3> $140.00</h3>
			<label class="checkbox">
				<input type="checkbox">  Adds product to compair
			</label><br>
			<div class="btn-group">
			  <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
			  <a href="product_details.html" class="shopBtn">VIEW</a>
			 </div>
				</form>
			</div>
	</div>
			<hr class="soft"/>
			<div class="row-fluid">	  
					<div class="span2">
						<img src="assets/img/d.jpg" alt="">
					</div>
					<div class="span6">
						<h5>Product Name </h5>
						<p>
						Nowadays the lingerie industry is one of the most successful business spheres.
						We always stay in touch with the latest fashion tendencies - 
						that is why our goods are so popular..
						</p>
					</div>
					<div class="span4 alignR">
					<form class="form-horizontal qtyFrm">
					<h3> $140.00</h3>
					<label class="checkbox">
						<input type="checkbox">  Adds product to compair
					</label><br>
					<div class="btn-group">
					  <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
					  <a href="product_details.html" class="shopBtn">VIEW</a>
					 </div>
						</form>
					</div>
			</div>
			<hr class="soften"/>
			<div class="row-fluid">	  
					<div class="span2">
						<img src="assets/img/d.jpg" alt="">
					</div>
					<div class="span6">
						<h5>Product Name </h5>
						<p>
						Nowadays the lingerie industry is one of the most successful business spheres.
						We always stay in touch with the latest fashion tendencies - 
						that is why our goods are so popular..
						</p>
					</div>
					<div class="span4 alignR">
					<form class="form-horizontal qtyFrm">
					<h3> $140.00</h3>
					<label class="checkbox">
						<input type="checkbox">  Adds product to compair
					</label><br>
					<div class="btn-group">
					  <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
					  <a href="product_details.html" class="shopBtn">VIEW</a>
					 </div>
						</form>
					</div>
			</div>
			</div>
              <div class="tab-pane fade" id="cat1">
                <p>Etsy mixtape wayfarers, ethical wes anderson tofu before they sold out mcsweeney's organic lomo retro fanny pack lo-fi farm-to-table readymade. Messenger bag gentrify pitchfork tattooed craft beer, iphone skateboard locavore carles etsy salvia banksy hoodie helvetica. DIY synth PBR banksy irony. Leggings gentrify squid 8-bit cred pitchfork. Williamsburg banh mi whatever gluten-free, carles pitchfork biodiesel fixie etsy retro mlkshk vice blog. Scenester cred you probably haven't heard of them, vinyl craft beer blog stumptown. Pitchfork sustainable tofu synth chambray yr.</p>
              <br>
              <br>
			  <div class="row-fluid">	  
					<div class="span2">
						<img src="assets/img/b.jpg" alt="">
					</div>
					<div class="span6">
						<h5>Product Name </h5>
						<p>
						Nowadays the lingerie industry is one of the most successful business spheres.
						We always stay in touch with the latest fashion tendencies - 
						that is why our goods are so popular..
						</p>
					</div>
					<div class="span4 alignR">
					<form class="form-horizontal qtyFrm">
					<h3> $140.00</h3>
					<label class="checkbox">
						<input type="checkbox">  Adds product to compair
					</label><br>
					<div class="btn-group">
					  <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
					  <a href="product_details.html" class="shopBtn">VIEW</a>
					 </div>
						</form>
					</div>
			</div>
			<hr class="soften"/>
			<div class="row-fluid">	  
					<div class="span2">
						<img src="assets/img/a.jpg" alt="">
					</div>
					<div class="span6">
						<h5>Product Name </h5>
						<p>
						Nowadays the lingerie industry is one of the most successful business spheres.
						We always stay in touch with the latest fashion tendencies - 
						that is why our goods are so popular..
						</p>
					</div>
					<div class="span4 alignR">
					<form class="form-horizontal qtyFrm">
					<h3> $140.00</h3>
					<label class="checkbox">
						<input type="checkbox">  Adds product to compair
					</label><br>
					<div class="btn-group">
					  <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
					  <a href="product_details.html" class="shopBtn">VIEW</a>
					 </div>
						</form>
					</div>
			</div>
			<hr class="soften"/>
			  </div>
              <div class="tab-pane fade" id="cat2">
                
				<div class="row-fluid">	  
					<div class="span2">
						<img src="assets/img/d.jpg" alt="">
					</div>
					<div class="span6">
						<h5>Product Name </h5>
						<p>
						Nowadays the lingerie industry is one of the most successful business spheres.
						We always stay in touch with the latest fashion tendencies - 
						that is why our goods are so popular..
						</p>
					</div>
					<div class="span4 alignR">
					<form class="form-horizontal qtyFrm">
					<h3> $140.00</h3>
					<label class="checkbox">
						<input type="checkbox">  Adds product to compair
					</label><br>
					<div class="btn-group">
					  <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
					  <a href="product_details.html" class="shopBtn">VIEW</a>
					 </div>
						</form>
					</div>
			</div>
			<hr class="soften"/>
			<div class="row-fluid">	  
					<div class="span2">
						<img src="assets/img/d.jpg" alt="">
					</div>
					<div class="span6">
						<h5>Product Name </h5>
						<p>
						Nowadays the lingerie industry is one of the most successful business spheres.
						We always stay in touch with the latest fashion tendencies - 
						that is why our goods are so popular..
						</p>
					</div>
					<div class="span4 alignR">
					<form class="form-horizontal qtyFrm">
					<h3> $140.00</h3>
					<label class="checkbox">
						<input type="checkbox">  Adds product to compair
					</label><br>
					<div class="btn-group">
					  <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
					  <a href="product_details.html" class="shopBtn">VIEW</a>
					 </div>
						</form>
					</div>
			</div>
			<hr class="soften"/>
			<div class="row-fluid">	  
					<div class="span2">
						<img src="assets/img/d.jpg" alt="">
					</div>
					<div class="span6">
						<h5>Product Name </h5>
						<p>
						Nowadays the lingerie industry is one of the most successful business spheres.
						We always stay in touch with the latest fashion tendencies - 
						that is why our goods are so popular..
						</p>
					</div>
					<div class="span4 alignR">
					<form class="form-horizontal qtyFrm">
					<h3> $140.00</h3>
					<label class="checkbox">
						<input type="checkbox">  Adds product to compair
					</label><br>
					<div class="btn-group">
					  <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
					  <a href="product_details.html" class="shopBtn">VIEW</a>
					 </div>
						</form>
					</div>
			</div>
			<hr class="soften"/>
			<div class="row-fluid">	  
					<div class="span2">
						<img src="assets/img/d.jpg" alt="">
					</div>
					<div class="span6">
						<h5>Product Name </h5>
						<p>
						Nowadays the lingerie industry is one of the most successful business spheres.
						We always stay in touch with the latest fashion tendencies - 
						that is why our goods are so popular..
						</p>
					</div>
					<div class="span4 alignR">
					<form class="form-horizontal qtyFrm">
					<h3> $140.00</h3>
					<label class="checkbox">
						<input type="checkbox">  Adds product to compair
					</label><br>
					<div class="btn-group">
					  <a href="product_details.html" class="defaultBtn"><span class=" icon-shopping-cart"></span> Add to cart</a>
					  <a href="product_details.html" class="shopBtn">VIEW</a>
					 </div>
						</form>
					</div>
			</div>
			<hr class="soften"/>
			
				</div>
            </div>

</div>
</div>
</div> <!-- Body wrapper -->
<?php  include 'inc/footer.php'; ?>