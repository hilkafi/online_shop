<?Php include 'lib/Session.php';
	Session::init();
 ?>
<?php 
include 'helpers/Format.php';
	spl_autoload_register(function($class){
			include_once 'classes/'.$class.'.php';
	});


$pd = new Product();
$fm = new Format();
$ct = new Cart();
$cat = new Category();
$cmr = new Customer();
$usr = new User();
 ?>
<?php if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
		$cmrLog = $cmr->customerLogin($_POST);
} 

 $login = Session::get('cmrlogin'); 

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>Twitter Bootstrap shopping cart</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Bootstrap styles -->
    <link href="assets/css/bootstrap.css" rel="stylesheet"/>
    <!-- Customize styles -->
    <link href="style.css" rel="stylesheet"/>
    <!-- font awesome styles -->
	<link href="assets/font-awesome/css/font-awesome.css" rel="stylesheet">
		<!--[if IE 7]>
			<link href="css/font-awesome-ie7.min.css" rel="stylesheet">
		<![endif]-->

		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->

	<!-- Favicons -->
    <link rel="shortcut icon" href="assets/ico/favicon.ico">
  </head>
<body>
<!-- 
	Upper Header Section 
-->
<div class="navbar navbar-inverse navbar-fixed-top">
	<div class="topNav">
		<div class="container">
			<div class="alignR">
				<div class="pull-left socialNw">
					<?php $getSocila = $cat->getSocialLink();
						if($getSocila) {
							$value = $getSocila->fetch_assoc();
					 ?>
					<a href="<?php echo $value['tw']; ?>" target="_blank"><span class="icon-twitter"></span></a>
					<a href="<?php echo $value['fb']; ?>"><span class="icon-facebook"></span></a>
					<a href="<?php echo $value['yt']; ?>"><span class="icon-youtube"></span></a>
					<a href="<?php echo $value['th']; ?>"><span class="icon-tumblr"></span></a>
				<?php } ?>
				</div>
				<a href="index.php"> <span class="icon-home"></span> Home</a> 
				 <?php if ($login == true) { ?>
				<a href="myaccount.php"><span class="icon-user"></span> My Account</a>
				<?php } ?> 
				<a href="register.php"><span class="icon-edit"></span> Free Register </a> 
				<a href="contact.php"><span class="icon-envelope"></span> Contact us</a>
				<?php $getCartItem = $ct->getCartItem();
					if ($getCartItem) {
						$counRow = mysqli_num_rows($getCartItem);
						$amount = Session::get('sum');
				 ?>
				<a href="cart.php"><span class="icon-shopping-cart"></span> <?php echo $counRow; ?> Item(s) - <span class="badge badge-warning"> $<?php echo $amount; ?></span></a>
			<?php } ?>
			</div>
		</div>
	</div>
</div>

<!--
Lower Header Section 
-->
<div class="container">
<div id="gototop"> </div>
<header id="header">
<div class="row">
	<div class="span4">
	<h1>
	<a class="logo" href="index.php"><span>Twitter Bootstrap ecommerce template</span> 
		<img src="assets/img/logo-bootstrap-shoping-cart.png" alt="bootstrap sexy shop">
	</a>
	</h1>
	</div>
	<div class="span4">
	<div class="offerNoteWrapper">
	<h1 class="dotmark">
	<i class="icon-cut"></i>
		Shop Now and Get Exclusive Discount!
	</h1>
	</div>
	</div>
	<div class="span4 alignR">
	<p><br> <strong> Support (24/7) :  01740137954 </strong><br><br></p>
	<span class="btn btn-mini">[ 2 ] <span class="icon-shopping-cart"></span></span>
	<span class="btn btn-warning btn-mini">$</span>
	<span class="btn btn-mini">&pound;</span>
	<span class="btn btn-mini">&euro;</span>
	</div>
</div>
</header>

<!--
Navigation Bar Section 
-->
<?php 
	//Log Out System
	if (isset($_GET['log']) && $_GET['log'] == 'logout') {
		$ct->deleteCartProduct();
		Session::destroy();

	}
 ?>
<div class="navbar">
	  <div class="navbar-inner">
		<div class="container">
		  <a data-target=".nav-collapse" data-toggle="collapse" class="btn btn-navbar">
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		  </a>
		  <div class="nav-collapse">
			<ul class="nav">
				<?php $path = $_SERVER['SCRIPT_FILENAME'];
						$filename = basename($path, '.php');
				 ?>
			  <li <?php if($filename == 'index'){ ?> class="active" <?php } ?>><a href="index.php">Home</a></li>
			  <li <?php if($filename == 'list-view'){ ?> class="active" <?php } ?>><a href="list-view.php">List View</a></li>
			  <li <?php if($filename == 'grid-view'){ ?> class="active" <?php } ?>><a href="grid-view.php">Grid View</a></li>
			</ul>

			<ul class="nav pull-right">
				<form action="#" class="navbar-search pull-left">
				  <input type="text" placeholder="Search" class="search-query span2">
				</form>
				<?php if ($login == true) { ?>
				<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="icon-lock"></span><?php echo Session::get('cmrName'); ?> <b class="caret"></b></a>
				<div class="dropdown-menu">
				<form class="form-horizontal loginFrm">
				  <div class="control-group">
					<a href="">Your Account</a>
				  </div>
				  <div class="control-group">
					<a href="">Settings</a>
				  </div>
				  <div class="control-group">
					<a class="shopBtn btn-block" href="?log=logout" style="color: #fff">Log Out</a>
				  </div>
				</form>
				</div>
			</li>
				 <?php }else{ ?>
			<li class="dropdown">
				<a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="icon-lock"></span> Login <b class="caret"></b></a>
				<div class="dropdown-menu">
				<form action="" method="POST" class="form-horizontal loginFrm">
				  <div class="control-group">
					<input type="text" name="email" class="span2" id="inputEmail" placeholder="Email">
				  </div>
				  <div class="control-group">
					<input type="password" name="password" class="span2" id="inputPassword" placeholder="Password">
				  </div>
				  <div class="control-group">
					<label class="checkbox">
					<input type="checkbox"> Remember me
					</label>
					<button type="submit" name="login" class="shopBtn btn-block">Sign in</button>
				  </div>
				</form>
				</div>
			</li>
		<?php } ?>
			</ul>
		  </div>
		</div>
	  </div>
	</div>
<!-- 
Body Section 
-->