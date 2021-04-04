<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
class Product{
	private $db;
	private $fm;

	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function addProduct($data){
		$title = $this->fm->validation($data['title']);
		$category = $this->fm->validation($data['category']);	
		$brand = $this->fm->validation($data['brand']);
		$price = $this->fm->validation($data['price']);
		$stock = $this->fm->validation($data['stock']);
		$style =  $this->fm->validation($data['style']);
		$p_usage =  $this->fm->validation($data['p_usage']);
		$season =  $this->fm->validation($data['season']);
		$description = $this->fm->validation($data['description']);
		$color1 =  $this->fm->validation($data['color1']);
		$color2 =  $this->fm->validation($data['color2']);
		$color3 = $this->fm->validation($data['color3']);
		$status = $this->fm->validation($data['status']);

		$title = mysqli_real_escape_string($this->db->link, $title);
		$category = mysqli_real_escape_string($this->db->link, $category);
		$brand = mysqli_real_escape_string($this->db->link, $brand);
		$price = mysqli_real_escape_string($this->db->link, $price);
		$stock = mysqli_real_escape_string($this->db->link, $stock);
		$style = mysqli_real_escape_string($this->db->link, $style);
		$p_usage = mysqli_real_escape_string($this->db->link, $p_usage);
		$season = mysqli_real_escape_string($this->db->link, $season);
		$description = mysqli_real_escape_string($this->db->link, $description);
		$color1 = mysqli_real_escape_string($this->db->link, $color1);
		$color2 = mysqli_real_escape_string($this->db->link, $color2);
		$color3 = mysqli_real_escape_string($this->db->link, $color3);
		$status = mysqli_real_escape_string($this->db->link, $status);


		$permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name1 = $_FILES['image1']['name'];
        $file_size1 = $_FILES['image1']['size'];
        $file_temp1 = $_FILES['image1']['tmp_name'];

        $file_name2 = $_FILES['image2']['name'];
        $file_size2 = $_FILES['image2']['size'];
        $file_temp2 = $_FILES['image2']['tmp_name'];

        $file_name3 = $_FILES['image3']['name'];
        $file_size3 = $_FILES['image3']['size'];
        $file_temp3 = $_FILES['image3']['tmp_name'];

        $div1 = explode('.', $file_name1);
        $file_ext1 = strtolower(end($div1));
        $file_real_name1 = $div1[0];
        $unique_image1 = substr(md5($file_real_name1), 0, 10).'.'.$file_ext1;
        $image1 = "product_image/".$unique_image1;

        $div2 = explode('.', $file_name2);
        $file_ext2 = strtolower(end($div2));
        $file_real_name2 = $div2[0];
        $unique_image2 = substr(md5($file_real_name2), 0, 10).'.'.$file_ext2;
        $image2 = "product_image/".$unique_image2;

        $div3 = explode('.', $file_name3);
        $file_ext3 = strtolower(end($div3));
        $file_real_name3 = $div3[0];
        $unique_image3 = substr(md5($file_real_name3), 0, 10).'.'.$file_ext3;
        $image3 = "product_image/".$unique_image3;


		if ( $title == '' || $category == '0' || $brand == '0' || $price == '' || $stock == '' || $style == '' || $p_usage == '' || $season == '' || $description == '' || $file_name1 == '' || $file_name2 == '' || $file_name3 == '' || $color1 == '' || $status == '') {
        	$msg = "  <div class='alert alert-danger'>
			    <strong>Error!</strong> Field Must Not Be  Empty.
			  </div>";
        	return $msg;
        }elseif ($file_size1 >1048567 || $file_size2 > 1048567 || $file_size3 > 1048567) {
        	$msg = "<div class='alert alert-danger'>
			    <strong>Error!</strong> Image Size Must Be Less Than 1MB.
			  </div>";
        	return $msg;
        }elseif (in_array($file_ext1, $permited) === false || in_array($file_ext2, $permited) === false || in_array($file_ext3, $permited) === false) {
        	$msg = "<div class='alert alert-danger'><strong>Error! </strong>You Can Upload Only:-".implode(' , ', $permited)."!!</div>";
        	return $msg;
        }else{
        	move_uploaded_file($file_temp1, $image1);
        	move_uploaded_file($file_temp2, $image2);
        	move_uploaded_file($file_temp3, $image3);
        	$query = "INSERT INTO tbl_product(title, category, brand, price, image1, image2, image3, color1, color2, color3, stock, style, p_usage, season, description, status) VALUES('$title', '$category', '$brand', '$price', '$image1', '$image2', '$image3', '$color1', '$color2', '$color3', '$stock', '$style', '$p_usage', '$season', '$description', '$status')";

        	$addpro = $this->db->insert($query);
        	if ($addpro) {
        		$msg = "  <div class='success alert-success'>
			    		<strong>Success!</strong> Product added successfully.
			  			</div>";
        		return $msg;
        	}else{
        		$msg = "  <div class='alert alert-danger'>
			    	<strong>Error!</strong>Product Not Added.
			  		</div>";
        		return $msg;     		
        	}
        }

    }

    public function updateProduct($data, $pid){
		$title = $this->fm->validation($data['title']);
		$category = $this->fm->validation($data['category']);	
		$brand = $this->fm->validation($data['brand']);
		$price = $this->fm->validation($data['price']);
		$stock = $this->fm->validation($data['stock']);
		$style =  $this->fm->validation($data['style']);
		$p_usage =  $this->fm->validation($data['p_usage']);
		$season =  $this->fm->validation($data['season']);
		$description = $this->fm->validation($data['description']);
		$color1 =  $this->fm->validation($data['color1']);
		$color2 =  $this->fm->validation($data['color2']);
		$color3 = $this->fm->validation($data['color3']);
		$status = $this->fm->validation($data['status']);

		$title = mysqli_real_escape_string($this->db->link, $title);
		$category = mysqli_real_escape_string($this->db->link, $category);
		$brand = mysqli_real_escape_string($this->db->link, $brand);
		$price = mysqli_real_escape_string($this->db->link, $price);
		$stock = mysqli_real_escape_string($this->db->link, $stock);
		$style = mysqli_real_escape_string($this->db->link, $style);
		$p_usage = mysqli_real_escape_string($this->db->link, $p_usage);
		$season = mysqli_real_escape_string($this->db->link, $season);
		$description = mysqli_real_escape_string($this->db->link, $description);
		$color1 = mysqli_real_escape_string($this->db->link, $color1);
		$color2 = mysqli_real_escape_string($this->db->link, $color2);
		$color3 = mysqli_real_escape_string($this->db->link, $color3);
		$status = mysqli_real_escape_string($this->db->link, $status);


		$permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name1 = $_FILES['image1']['name'];
        $file_size1 = $_FILES['image1']['size'];
        $file_temp1 = $_FILES['image1']['tmp_name'];

        $file_name2 = $_FILES['image2']['name'];
        $file_size2 = $_FILES['image2']['size'];
        $file_temp2 = $_FILES['image2']['tmp_name'];

        $file_name3 = $_FILES['image3']['name'];
        $file_size3 = $_FILES['image3']['size'];
        $file_temp3 = $_FILES['image3']['tmp_name'];

        $div1 = explode('.', $file_name1);
        $file_ext1 = strtolower(end($div1));
        $file_real_name1 = $div1[0];
        $unique_image1 = substr(md5($file_real_name1), 0, 10).'.'.$file_ext1;
        $image1 = "product_image/".$unique_image1;

        $div2 = explode('.', $file_name2);
        $file_ext2 = strtolower(end($div2));
        $file_real_name2 = $div2[0];
        $unique_image2 = substr(md5($file_real_name2), 0, 10).'.'.$file_ext2;
        $image2 = "product_image/".$unique_image2;

        $div3 = explode('.', $file_name3);
        $file_ext3 = strtolower(end($div3));
        $file_real_name3 = $div3[0];
        $unique_image3 = substr(md5($file_real_name3), 0, 10).'.'.$file_ext3;
        $image3 = "product_image/".$unique_image3;

        if ( $title == '' || $category == '0' || $brand == '0' || $price == '' || $stock == '' || $style == '' || $p_usage == '' || $season == '' || $description == '' || $color1 == '' || $status == '') {
        	$msg = "  <div class='alert alert-danger'>
			    <strong>Error!</strong> Field Must Not Be  Empty.
			  </div>";
        	return $msg;
        }else{
        	if (!empty($file_name1) && !empty($file_name2) && !empty($file_name3) ) {
        		if ($file_size1 >1048567 || $file_size2 > 1048567 || $file_size3 > 1048567) {
        				$msg = "<div class='alert alert-danger'>
			    		<strong>Error!</strong> Image Size Must Be Less Than 1MB.
			  			</div>";
        			return $msg;
        		}elseif (in_array($file_ext1, $permited) === false || in_array($file_ext2, $permited) === false || in_array($file_ext3, $permited) === false) {
        				$msg = "<div class='alert alert-danger'><strong>Error! </strong>You Can Upload Only:-".implode(' , ', $permited)."!!</div>";
        			return $msg;
        		}else{
        			move_uploaded_file($file_temp1, $image1);
        			move_uploaded_file($file_temp2, $image2);
        			move_uploaded_file($file_temp3, $image3);
        			$query = "UPDATE tbl_product SET
        						title = '$title',
        						category = '$category',
        						brand = '$brand',
        						price = '$price',
        						image1 = '$image1',
        						image2 = '$image2',
        						image3 = '$image3',
        						color1 = '$color1',
        						color2 = '$color2',
        						color3 = '$color3',
        						stock = '$stock',
        						style = '$style',
        						p_usage = '$p_usage',
        						season = '$season',
        						description = '$description',
        						status = '$status'
        					WHERE id = '$pid'";
        			$uppro = $this->db->update($query);
        			if ($uppro) {
        				$msg = "  <div class='success alert-success'>
			    			<strong>Success!</strong> Product Updated successfully.
			  				</div>";
        				return $msg;
        			}else{
        				$msg = "  <div class='alert alert-danger'>
			    			<strong>Error!</strong>Product Not Updated.
			  				</div>";
        				return $msg;     		
        			}
        		}
        	}else{
        		$query = "UPDATE tbl_product SET
        						title = '$title',
        						category = '$category',
        						brand = '$brand',
        						price = '$price',
        						color1 = '$color1',
        						color2 = '$color2',
        						color3 = '$color3',
        						stock = '$stock',
        						style = '$style',
        						p_usage = '$p_usage',
        						season = '$season',
        						description = '$description',
        						status = '$status'
        					WHERE id = '$pid'";
        			$uppro = $this->db->update($query);
        			if ($uppro) {
        				$msg = "  <div class='success alert-success'>
			    			<strong>Success!</strong> Product Updated successfully.
			  				</div>";
        				return $msg;
        			}else{
        				$msg = "  <div class='alert alert-danger'>
			    			<strong>Error!</strong>Product Not Updated.
			  				</div>";
        				return $msg;     		
        			}
        	}
        }

    }

    public function getAllProduct(){
    	$query = "SELECT * FROM tbl_product ORDER BY id DESC";
    	$getpro = $this->db->select($query);
    	return $getpro;
    }

    public function getProduct(){
    	$query = "SELECT * FROM tbl_product WHERE status = '0' ORDER BY id DESC LIMIT 3";
    	$getpro = $this->db->select($query);
    	return $getpro;
    }

    public function getProductById($pid){
    	$query = "SELECT * FROM tbl_product WHERE id = '$pid'";
    	$getpro = $this->db->select($query);
    	return $getpro;
    }

    public function getFeaturedProduct(){
    	$query = "SELECT * FROM tbl_product WHERE status = '1' ORDER BY id DESC LIMIT 3";
    	$getPro = $this->db->select($query);
    	return $getPro;
    }

    public function getNewProduct(){
    	$query = "SELECT * FROM tbl_product WHERE status = '0' ORDER BY id DESC LIMIT 4";
    	$getPro = $this->db->select($query);
    	return $getPro;
    }

    public function getNewFeatureProduct(){
    	$query = "SELECT * FROM tbl_product WHERE status = '1' ORDER BY id DESC LIMIT 4";
    	$getPro = $this->db->select($query);
    	return $getPro;
    }
	
    public function getSpecialProduct(){
        $query = "SELECT * FROM tbl_product WHERE status = '2' LIMIT 3";
        $getPro = $this->db->select($query);
        return $getPro;
    }

    public function getProductByCategory($cn){
        $query = "SELECT * FROM tbl_product WHERE category = '$cn'";
        $getPro = $this->db->select($query);
        return $getPro;
    }
}