<?php
    $filepath = realpath(dirname(__FILE__));
	include_once ($filepath.'/../lib/Database.php');
	include_once ($filepath.'/../helpers/Format.php');
class User{
	private $db;
	private $fm;

	function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function addNewUser($data){
		$username = $this->fm->validation($data['username']);
		$name = $this->fm->validation($data['name']);
		$email = $this->fm->validation($data['email']);
		$password = $this->fm->validation($data['password']);
		$role = $this->fm->validation($data['role']);

		$username = mysqli_real_escape_string($this->db->link, $username);
		$name = mysqli_real_escape_string($this->db->link, $name);
		$email = mysqli_real_escape_string($this->db->link, $email);
		$role = mysqli_real_escape_string($this->db->link, $role);

		$permited  = array('jpg', 'jpeg', 'png');
	    $file_name = $_FILES['image']['name'];
        $file_size = $_FILES['image']['size'];
        $file_temp = $_FILES['image']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $file_real_name = $div[0];
        $unique_image = substr(md5($file_real_name), 0, 10).'.'.$file_ext;
        $image = "photos/".$unique_image;

        if ($username == '' || $name == '' || $email == '' || $file_name == '' || $password == '' || $role == '') {
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
			$password = mysqli_real_escape_string($this->db->link, md5($password));
        	$query = "INSERT INTO tbl_user(username, name, image, email, password, role) VALUES('$username', '$name', '$image', '$email', '$password', '$role')";
			$addmanufac = $this->db->insert($query);
			if ($addmanufac) {
					$msg = "<div class='success alert-success'>
					<strong>Success!</strong> User Added successfully.
					</div>";
				return $msg;
			}else{
				$msg = "  <div class='alert alert-danger'>
				<strong>Error!</strong>User Not Added.
				</div>";
			return $msg;     		
			}
		}

	}

	public function getAllUser(){
		$query = "SELECT * FROM tbl_user ORDER BY id DESC";
		$getuser = $this->db->select($query);
		return $getuser;
	}

	public function userLogin($data){
	$email = mysqli_real_escape_string($this->db->link, $data['email']);
	$password = mysqli_real_escape_string($this->db->link, $data['password']);

	if (empty($email) || empty($password)) {
		$msg = "<span style='color: red;'>Field Must Not be Empty.</span>";
		return $msg;
	}else{

		$password = mysqli_real_escape_string($this->db->link, md5($data['password']));
		$query = "SELECT * FROM tbl_user WHERE email='$email' AND password='$password'";
		$getRow = $this->db->select($query);
		if ($getRow) {
			$value = $getRow->fetch_assoc();
			Session::set('usrlogin', true);
			Session::set('usrId', $value['id']);
			Session::set('name', $value['name']);
			echo "<script>window.location = 'index.php'</script>";
		}else{
			$msg = "<span style='color: red;'>Email or Password is not Correct.</span>";
			return $msg;
		}
	}
}

	public function getUserData($usrId){
		$query = "SELECT * FROM tbl_user WHERE id = '$usrId'";
		$getData = $this->db->select($query);
		return $getData;
	}

	public function sendMsg($data){
		$name = $this->fm->validation($data['name']);
		$email = $this->fm->validation($data['email']);
		$subject = $this->fm->validation($data['subject']);
		$details = $this->fm->validation($data['details']);


		$name = mysqli_real_escape_string($this->db->link, $name);
		$email = mysqli_real_escape_string($this->db->link, $email);
		$subject = mysqli_real_escape_string($this->db->link, $subject);
		$details = mysqli_real_escape_string($this->db->link, $details);

		if ($name == '' || $email == '' || $details == '' || $subject == '') {
			$msg = "  <div class='alert alert-danger'>
			    <strong>Error!</strong> Field Must Not Be  Empty.
			  </div>";
        	return $msg;   
		}else{
			$query = "INSERT INTO tbl_msg(name, email, subject, details) VALUES('$name', '$email', '$subject', '$details')";
			$insertRow = $this->db->insert($query);
			if ($insertRow) {
					$msg = "<div class='success alert-success'>
					<strong>Success!</strong> Message Sent successfully.
					</div>";
				return $msg;
			}else{
				$msg = "  <div class='alert alert-danger'>
				<strong>Error!</strong>Message Not Sent.
				</div>";
			return $msg;     		
			}

		}

	}

}