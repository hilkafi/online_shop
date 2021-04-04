<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
class Category{
	private $db;
	private $fm;

	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function addCategory($data){
		$name = $this->fm->validation($data['name']);
		$name = mysqli_real_escape_string($this->db->link, $name);

		if ($name == '') {
			$msg = "  <div class='alert alert-danger'>
			    <strong>Error!</strong> Field Must Not Be  Empty.
			  </div>";
        	return $msg;
		}else{
			$query = "INSERT INTO tbl_cat(name) VALUES('$name')";
			$addCat = $this->db->insert($query);

			if ($addCat) {
        		$msg = "  <div class='alert alert-success'>
			    		<strong>Success!</strong> Category added successfully.
			  			</div>";
        		return $msg;
			}else{
			$msg = "  <div class='alert alert-danger'>
			    <strong>Error!</strong> Field Must Not Be  Empty.
			  </div>";
        	return $msg;
			}
		}
	}

	public function getAllCategory(){
		$query = "SELECT * FROM tbl_cat";
		$getcat = $this->db->select($query);

		return $getcat;
	}

	public function addProductBrand($data){
		$name = $this->fm->validation($data['name']);
		$name = mysqli_real_escape_string($this->db->link, $name);

		if ($name == '') {
			$msg = "  <div class='alert alert-danger'>
			    <strong>Error!</strong> Field Must Not Be  Empty.
			  </div>";
        	return $msg;
		}else{
			$query = "INSERT INTO tbl_brand(name) VALUES('$name')";
			$addbrand = $this->db->insert($query);

			if ($addbrand) {
        		$msg = "  <div class='alert alert-success'>
			    		<strong>Success!</strong> Brand added successfully.
			  			</div>";
        		return $msg;
			}else{
			$msg = "  <div class='alert alert-danger'>
			    <strong>Error!</strong> Brand Not Added.
			  </div>";
        	return $msg;
			}
		}
	}

	public function getAllBrand(){
		$query = "SELECT * FROM tbl_brand";
		$getbrand = $this->db->select($query);

		return $getbrand;
	}

	public function addNewSlider($data){
		$title = $this->fm->validation($data['title']);
		$subtitle = $this->fm->validation($data['subtitle']);
		$title = mysqli_real_escape_string($this->db->link, $title);
		$subtitle = mysqli_real_escape_string($this->db->link, $subtitle);

		$permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $file_real_name = $div[0];
        $unique_image = substr(md5($file_real_name), 0, 10).'.'.$file_ext;
        $image = "slider_image/".$unique_image;

        if ($title == '' || $subtitle == '' || $file_name == '') {
			$msg = "  <div class='alert alert-danger'>
			    <strong>Error!</strong> Field Must Not Be  Empty.
			  </div>";
        	return $msg;     		
        }elseif(in_array($file_ext, $permited) === false){
			$msg = "<div class='alert alert-danger'><strong>Error! </strong>You Can Upload Only:-".implode(' , ', $permited)."!!</div>";
        	return $msg;
        }elseif($file_size >1048567 ){
        	$msg = "<div class='alert alert-danger'>
			    <strong>Error!</strong> Image Size Must Be Less Than 1MB.
			  </div>";
        	return $msg;
        }else{
        	move_uploaded_file($file_temp, $image);
        	$query = "INSERT INTO tbl_slider(image, title, subtitle) VALUES('$image', '$title', '$subtitle')";
			$addslider = $this->db->insert($query);
        	if ($addslider) {
        		$msg = "  <div class='success alert-success'>
			    		<strong>Success!</strong> Slider added successfully.
			  			</div>";
        		return $msg;
        	}else{
        		$msg = "  <div class='alert alert-danger'>
			    	<strong>Error!</strong>Slider Not Added.
			  		</div>";
        		return $msg;     		
        	}

        }


	}

	public function getAllSlider(){
		$query = "SELECT * FROM tbl_slider";
		$getSlide = $this->db->select($query);
		return $getSlide;
	}

	public function getSliderById($sid){
		$query = "SELECT * FROM tbl_slider WHERE id = '$sid'";
		$getSlide = $this->db->select($query);
		return $getSlide;
	}

	public function updateSlider($data, $sid){
		$title = $this->fm->validation($data['title']);
		$subtitle = $this->fm->validation($data['subtitle']);
		$title = mysqli_real_escape_string($this->db->link, $title);
		$subtitle = mysqli_real_escape_string($this->db->link, $subtitle);

		$permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $file_real_name = $div[0];
        $unique_image = substr(md5($file_real_name), 0, 10).'.'.$file_ext;
        $image = "slider_image/".$unique_image;

        if ($title == '' || $subtitle == '') {
			$msg = "  <div class='alert alert-danger'>
			    <strong>Error!</strong> Field Must Not Be  Empty.
			  </div>";
        	return $msg;     		
        }else{
        	if (!empty($file_name)) {
        		if(in_array($file_ext, $permited) === false){
					$msg = "<div class='alert alert-danger'><strong>Error! </strong>You Can Upload Only:-".implode(' , ', $permited)."!!</div>";
        			return $msg;
       			 }elseif($file_size >1048567 ){
        			$msg = "<div class='alert alert-danger'>
			   		 <strong>Error!</strong> Image Size Must Be Less Than 1MB.
			  		</div>";
        			return $msg;
       			 }else{
       			 	move_uploaded_file($file_temp, $image);
       			 	$query = "UPDATE tbl_slider
       			 				SET image = '$image',
       			 					title = '$title',
       			 					subtitle = '$subtitle'
       			 				WHERE id = '$sid'";
       			 	$updateSlide = $this->db->update($query);
       			 	if ($updateSlide) {
       			 		$msg = "  <div class='success alert-success'>
			    		<strong>Success!</strong> Slider Updated successfully.
			  			</div>";
        				return $msg;
        			}else{
        				$msg = "  <div class='alert alert-danger'>
			    		<strong>Error!</strong>Slider Not Updated.
			  			</div>";
        				return $msg;     		
        				}
       			 	}
       			}else{
        		$query = "UPDATE tbl_slider
       			 				SET title = '$title',
       			 					subtitle = '$subtitle'
       			 				WHERE id = '$sid'";
       			 	$updateSlide = $this->db->update($query);
       			 	if ($updateSlide) {
       			 		$msg = "  <div class='success alert-success'>
			    		<strong>Success!</strong> Slider Updated successfully.
			  			</div>";
        				return $msg;
        			}else{
        				$msg = "  <div class='alert alert-danger'>
			    		<strong>Error!</strong>Slider Not Updated.
			  			</div>";
        				return $msg;     		
        			}
       			}
        	}
        }
	
	public function getCategoryById($cid){
		$query = "SELECT * FROM tbl_cat WHERE id = '$cid'";
		$getPro = $this->db->select($query);
		return $getPro;
	}

	public function UpdateCategory($data, $cid){
		$name = $this->fm->validation($data['name']);
		$name = mysqli_real_escape_string($this->db->link, $name);

		$query = "UPDATE tbl_cat
					SET name = '$name'
					WHERE id = '$cid'";
		$updateCat = $this->db->update($query);
		if ($updateCat) {
	 		$msg = "<div class='success alert-success'>
				<strong>Success!</strong> Category Updated successfully.
				</div>";
			return $msg;
		}else{
			$msg = "  <div class='alert alert-danger'>
				<strong>Error!</strong>Category Not Updated.
				</div>";
			return $msg;     		
	}

	}

	public function addManufactures($data){
		$name = $this->fm->validation($data['name']);
		$name = mysqli_real_escape_string($this->db->link, $name);

		$permited  = array('jpg', 'jpeg', 'png', 'gif');
	    $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $file_real_name = $div[0];
        $unique_image = substr(md5($file_real_name), 0, 10).'.'.$file_ext;
        $image = "photos/".$unique_image;

        if ($name == '' || $file_name == '') {
			$msg = "  <div class='alert alert-danger'>
			    <strong>Error!</strong> Field Must Not Be  Empty.
			  </div>";
        	return $msg;     		
        }elseif(in_array($file_ext, $permited) === false){
			$msg = "<div class='alert alert-danger'><strong>Error! </strong>You Can Upload Only:-".implode(' , ', $permited)."!!</div>";
        	return $msg;
        }elseif($file_size >1048567 ){
        	$msg = "<div class='alert alert-danger'>
			    <strong>Error!</strong> Image Size Must Be Less Than 1MB.
			  </div>";
        	return $msg;
        }else{
        	move_uploaded_file($file_temp, $image);
        	$query = "INSERT INTO tbl_manufactures(name, image) VALUES('$name', '$image')";
			$addmanufac = $this->db->insert($query);
			if ($addmanufac) {
					$msg = "<div class='success alert-success'>
					<strong>Success!</strong> Manufactures Added successfully.
					</div>";
				return $msg;
			}else{
				$msg = "  <div class='alert alert-danger'>
				<strong>Error!</strong>Manufactures Not Added.
				</div>";
			return $msg;     		
			}
		}


	}

	public function getAllManufactures(){
		$query = "SELECT * FROM tbl_manufactures";
		$getManuFac = $this->db->select($query);
		return $getManuFac;
	}

	public function getSocialLink(){
		$query = "SELECT * FROM tbl_social WHERE id = '1'";
		$getLink = $this->db->select($query);
		return $getLink;
	}
}