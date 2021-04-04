<?Php
	$filepath = realpath(dirname(__FILE__));
 include_once ($filepath.'/../lib/Database.php'); 
 include_once ($filepath.'/../helpers/Format.php'); 
 ?>

<?php
/**
 * Customer Class
 */
class Customer {
	
	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function customerRegistration($data){
		$name = mysqli_real_escape_string($this->db->link, $data['name']);
		$email = mysqli_real_escape_string($this->db->link, $data['email']);
		$password = mysqli_real_escape_string($this->db->link, $data['password']);
		$country = mysqli_real_escape_string($this->db->link, $data['country']);
		$city = mysqli_real_escape_string($this->db->link, $data['city']);
		$stlocation = mysqli_real_escape_string($this->db->link, $data['stlocation']);
		$zip = mysqli_real_escape_string($this->db->link, $data['zip']);
		$phone = mysqli_real_escape_string($this->db->link, $data['phone']);

	    if (empty($name) || empty($email) || empty($password) || empty($country) || empty($city) || empty($stlocation) || empty($zip) || empty($phone)) {
	    	$msg = "  <div class='alert alert-danger'>
			    <strong>Error!</strong> Field Must Not Be  Empty.
			  </div>";
        	return $msg;
	    }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$msg = "  <div class='alert alert-danger'>
				    <strong>Error!</strong> Invalid Email.
				  </div>";
	        	return $msg;
	   	}else{
	    	$mailquery = "SELECT * FROM tbl_customer WHERE email = '$email'";
	    	$mailchk = $this->db->select($mailquery);
	    	if ($mailchk) {
		    	$msg = "  <div class='alert alert-danger'>
				    <strong>Error!</strong> Email Already Exist.
				  </div>";
	        	return $msg;	    	
	   		}else{
		    	$password = mysqli_real_escape_string($this->db->link, md5($data['password']));
				$query = "INSERT INTO tbl_customer(name, email, password, country, city, stlocation, zip, phone) VALUES('$name', '$email', '$password', '$country', '$city', '$stlocation', '$zip', '$phone')";
		   		$insertRow = $this->db->insert($query);

		   		if ($insertRow) {
		   			$msg = "  <div class='alert alert-success'>
				    <strong>Error!</strong> Registration is successfully Completed.
				  </div>";
	        	return $msg;
	   		}else{
	   			$msg = "  <div class='alert alert-danger'>
			    <strong>Error!</strong> Email Already Exist.
			  </div>";
        	return $msg;
	   		}	    	
	    }
	}

	}

	public function customerLogin($data){
		$email = mysqli_real_escape_string($this->db->link, $data['email']);
		$password = mysqli_real_escape_string($this->db->link, $data['password']);

		if (empty($email) || empty($password)) {
			$msg = "<span style='color: red;'>Field Must Not be Empty.</span>";
			return $msg;
		}else{

			$password = mysqli_real_escape_string($this->db->link, md5($data['password']));
			$query = "SELECT * FROM tbl_customer WHERE email='$email' AND password='$password'";
			$getRow = $this->db->select($query);
			if ($getRow) {
				$value = $getRow->fetch_assoc();
				Session::set('cmrlogin', true);
				Session::set('cmrId', $value['id']);
				Session::set('cmrName', $value['name']);
				echo "<script>window.location = 'cart.php'</script>";
			}else{
				$msg = "<span style='color: red;'>Email or Password is not Correct.</span>";
				return $msg;
			}
		}
	}

	public function getCustmerData($id){
		$query = "SELECT * FROM tbl_customer WHERE id='$id'";
		$getRow = $this->db->select($query);

		return $getRow;
	}

	public function updateCustomerInfo($data, $id){
		$name = mysqli_real_escape_string($this->db->link, $data['name']);
		$email = mysqli_real_escape_string($this->db->link, $data['email']);
		$country = mysqli_real_escape_string($this->db->link, $data['country']);
		$city = mysqli_real_escape_string($this->db->link, $data['city']);
		$stlocation = mysqli_real_escape_string($this->db->link, $data['stlocation']);
		$zip = mysqli_real_escape_string($this->db->link, $data['zip']);
		$phone = mysqli_real_escape_string($this->db->link, $data['phone']);

	    if (empty($name) || empty($email) || empty($country) || empty($city) || empty($stlocation) || empty($zip) || empty($phone)) {
	    	$msg = "  <div class='alert alert-danger'>
			    <strong>Error!</strong> Field Must Not Be  Empty.
			  </div>";
        	return $msg;
	    }else{
			$query = "UPDATE tbl_customer
						SET
						name = '$name',
						email = '$email',
						country = '$country',
						city = '$city',
						stlocation = '$stlocation',
						zip = '$zip',
						phone = '$phone'
						WHERE id='$id';";
	   		$updateRow = $this->db->update($query);

	   		if ($updateRow) {
		   			$msg = "  <div class='alert alert-success'>
				    <strong>Error!</strong> Your Details Updated successfully.
				  </div>";
	        	return $msg;
	   		}else{
	   			$msg = "  <div class='alert alert-danger'>
			    <strong>Error!</strong> Your Details is not Updated.
			  </div>";
        	return $msg;
	   		}	    		
	    }
	
	}
}