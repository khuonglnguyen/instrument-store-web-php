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
				header("Location:index.php");
			} else {
				$alert = "Username hoặc password không đúng!";
				return $alert;
			}
		}
	}
}
?>