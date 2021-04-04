<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
class Cart{
	private $db;
	private $fm;

	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function addToCart($quantity, $color, $pid){
		$quantity = $this->fm->validation($quantity);
		$color = $this->fm->validation($color);
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);
		$color = mysqli_real_escape_string($this->db->link, $color);
		$sId = session_id();

		$squery = "SELECT * FROM tbl_product WHERE id = '$pid'";
		$result = $this->db->select($squery)->fetch_assoc();

		$productName = $result['title'];
		$price = $result['price'];
		$image = $result['image1'];

		$checkquery = "SELECT * FROM tbl_cart WHERE productId = '$pid' AND sId='$sId'";
		$result = $this->db->select($checkquery);
		if ($result) {
			$msg = "<span class='error'>Product Already Added !<span>";
			return $msg;
		}elseif($quantity == ''){
			$msg = "<div class='alert alert-danger'>
			    <strong>Error!</strong> Quantity Must Not be Empty.
			  </div>";
        	return $msg;
		}else{
			$query = "INSERT INTO tbl_cart(sId, productId, productName, price, color, quantity, image) VALUES('$sId', '$pid', '$productName', '$price', '$color', '$quantity', '$image')";
	   		$insertRow = $this->db->insert($query);

	   		if ($insertRow) {
	   			echo "<script>window.location = 'cart.php'</script>";
	   		}else{
	   			echo "<script>window.location = '404.php'</script>";
	   		}
	   	}
	}

	public function getCartProduct(){
		$sId = session_id();
		$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
		$result = $this->db->select($query);

		return $result;
	}

	public function checkCartTable(){
		$sId = session_id();
		$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
		$getRow = $this->db->select($query);

		return $getRow;
	}

	public function updateCartQuantity($cartId, $quantity){
		$cartId = mysqli_real_escape_string($this->db->link, $cartId);
		$quantity = mysqli_real_escape_string($this->db->link, $quantity);

		if ($quantity <= 0) {
			$msg = "<span class='error'>Quantity Cannot be 0 or less than 0 ! </span>";
			return $msg;
		}else{

		$query = "UPDATE tbl_cart
						SET quantity = '$quantity'
						WHERE id = '$cartId'";
			$result = $this->db->update($query);
			if ($result) {
				echo "<script>window.location = 'cart.php'</script>";
			}else{
				$msg="<span class='success'>Cart Not Updated.</sapn>";
				return $msg;
			}
		}
	}

	public function orderProduct($cmrId){
		$sId = session_id();
		$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
		$getRow = $this->db->select($query);

		if ($getRow) {
			while ($result = $getRow->fetch_assoc()) {
				$productId = $result['productId'];
				$productName = $result['productName'];
				$quantity = $result['quantity'];
				$price = $result['price'] * $quantity;
				$image = $result['image'];

				$query = "INSERT INTO tbl_order(cmrId, productId, productName, quantity,  price,  image) VALUES('$cmrId', '$productId', '$productName', '$quantity', '$price', '$image')";
	   		$insertRow = $this->db->insert($query);

			}
		}
	}

	public function deleteCartProduct(){
		$sId = session_id();
		$query = "DELETE FROM tbl_cart WHERE sId='$sId'";
		$deleteRow = $this->db->delete($query);
	}

		public function getOrderedProduct($cmrId){
		$query = "SELECT * FROM tbl_order WHERE cmrId = '$cmrId' ORDER BY date DESC";
		$getRow = $this->db->select($query);

		return $getRow;
	}

	public function getAllOrderedProduct(){
		$query = "SELECT * FROM tbl_order ORDER BY id DESC";
		$getRow = $this->db->select($query);

		return $getRow;
	}

	public function approveOrder($pid){
		$query = "UPDATE tbl_order
					SET status = '1'
					WHERE id = '$pid'";
		$updateRow = $this->db->update($query);
	}

	public function ProductReceived($oid){
		$query = "UPDATE tbl_order
					SET status = '2'
					WHERE id = '$oid'";
		$updateRow = $this->db->update($query);
	}

	public function deleteOrderedProduct($oid){
		$query = "DELETE FROM tbl_order WHERE id = '$oid' ";
		$getRow = $this->db->delete($query);

		if ($getRow) {
			$msg = "  <div class='success alert-success'>
			    		<strong>Success!</strong>Order Deleted Successfully.
			  			</div>";
        		return $msg;
		}else{
			$msg = "  <div class='alert alert-danger'>
			    	<strong>Error!</strong>Order Not Deleted.
			  		</div>";
        		return $msg;  
		}
	}

	public function delCartProduct($cid){
		$sId = session_id();
		$query = "DELETE FROM tbl_cart WHERE id = '$cid' AND sId = '$sId'";
		$getRow = $this->db->delete($query);
	}

	public function getCartItem(){
		$sId = session_id();
		$query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
		$getRow = $this->db->select($query);

		return $getRow;
	}

	
}