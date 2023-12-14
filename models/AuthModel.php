<?php
include_once('DBConnect.php');

class AuthModel
{
	public function isUserAlreadyLogin()
	{
		session_start();

		if (isset($_SESSION['is_user_login'])) {
			return true;
		} else {
			return false;
		}
	}

	public function isAdminAlreadyLogin()
	{
		session_start();

		if (isset($_SESSION['is_admin_login'])) {
			return true;
		} else {
			return false;
		}
	}

	public function isUsernameAlreadyExist($username)
	{
		$dBConnect = new DBConnect();
		$query = mysqli_query($dBConnect->connect, "SELECT * FROM tb_user WHERE username='$username'");

		if ($query->fetch_array() != null) {
			return true;
		} else {
			return false;
		}
	}

	public function requestLogin($username, $password, $role)
	{
		if ($role == 'admin') {
			session_start();
		}
		
		$dBConnect = new DBConnect();
		$dataSql = mysqli_query($dBConnect->connect, "SELECT * FROM tb_user WHERE username='$username' AND password='$password' AND role='$role'");
		$data = $dataSql->fetch_array();

		if ($username == $data['username'] and $password == $data['password']) {
			$_SESSION['user_id'] 	= $data['user_id'];
			$_SESSION['name'] 		= $data['name'];
			$_SESSION['username']   = $data['username'];

			if ($role == 'admin') {
				$_SESSION['is_admin_login'] = true;
			} else {
				$_SESSION['is_user_login'] = true;
			}
			return true;
		} else {
			return false;
		}
	}

	public function requestRegister($username, $email, $password, $role)
	{
		$dBConnect = new DBConnect();
		$query = mysqli_query($dBConnect->connect, "INSERT INTO tb_user (name, gambar, username, email, password, role) VALUES ('$username', '', '$username', '$email', '$password', '$role')");
		if ($query) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function requestLogout($role)
	{
		if ($role == 'admin') {
			unset($_SESSION['is_admin_login']);
		} else {
			unset($_SESSION['is_user_login']);
		}
		return true;
	}
}