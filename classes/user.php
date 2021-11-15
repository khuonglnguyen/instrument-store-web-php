<?php
$filepath = realpath(dirname(__FILE__));
include($filepath . '/../lib/session.php');
Session::checkLogin(); // call function check login to check session
include_once($filepath . '/../lib/database.php');
include_once($filepath . '/../helpers/format.php');
?>



<?php
/**
 * 
 */
class user
{
	private $db;
	private $fm;
	public function __construct()
	{
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function login($email, $password)
	{
		$email = $this->fm->validation($email); //call fucntion validation from file Format to check
		$password = $this->fm->validation($password);

		$email = mysqli_real_escape_string($this->db->link, $email);
		$password = mysqli_real_escape_string($this->db->link, $password); //mysqli call 2 variable. (email and link) biến link -> gọi conect db từ file db

		if (empty($email) || empty($password)) {
			$alert = "Email và password không được để trống!";
			return $alert;
		} else {
			$query = "SELECT * FROM users WHERE email = '$email' AND password = '$password' LIMIT 1 ";
			$result = $this->db->select($query);

			if ($result != false) {
				$value = $result->fetch_assoc();
				Session::set('user', true); // set user is true
				Session::set('userId', $value['id']);
				Session::set('email', $value['email']);
				Session::set('fullName', $value['fullName']);
				Session::set('role_id', $value['role_id']);
				header("Location:index.php");
			} else {
				$alert = "Username hoặc password không đúng!";
				return $alert;
			}
		}
	}

	public function insert($data)
	{
		$fullName = mysqli_real_escape_string($this->db->link, $data['fullName']);
		$email = mysqli_real_escape_string($this->db->link, $data['email']);
		$dob = mysqli_real_escape_string($this->db->link, $data['dob']);
		$address = mysqli_real_escape_string($this->db->link, $data['address']);
		$password = mysqli_real_escape_string($this->db->link, md5($data['password']));

		if ($fullName == "" || $email == "" || $dob == "" || $email == "" || $password == "") {
			$alert = '<span class="error">Vui lòng nhập vào đầy đủ thông tin tài khoản</span>';
			return $alert;
		} else {
			$check_email = "SELECT * FROM users WHERE email='$email' LIMIT 1";
			$result_check = $this->db->select($check_email);
			if ($result_check) {
				$alert = '<span class="error">Email đã tồn tại</span>';
				return $alert;
			} else {
				$query = "INSERT INTO users VALUES (NULL,'$email','$fullName','$dob','$password',2,1,'$address') ";
				$result = $this->db->insert($query);
				if ($result) {
					return '<span class="success">Đăng ký tài khoản thành công!</span>';
				} else {
					return '<span class="error">Đăng ký tài khoản thất bại!</span>';
				}
			}
		}
	}
}
?>