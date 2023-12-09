<?php
include_once('DBConnect.php');

class AuthModel
{
	public function isUserAlreadyLogin()
	{
		session_start();

		if ($_SESSION['is_login'] && $_SESSION['role'] == 'user') {
			return true;
		} else {
			return false;
		}
	}

	public function isAdminAlreadyLogin()
	{
		session_start();

		if (!$_SESSION['is_login'] || $_SESSION['role'] != 'admin') {
			var_dump('masuk');
			header('Location: index.php');
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

	public function requestLogin($username, $password)
	{
		$dBConnect = new DBConnect();
		$dataSql = mysqli_query($dBConnect->connect, "SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
		$data = $dataSql->fetch_array();

		if ($username == $data['username'] and $password == $data['password']) {
			$_SESSION['user_id'] 	= $data['user_id'];
			$_SESSION['name'] 		= $data['name'];
			$_SESSION['username']   = $data['username'];
			$_SESSION['role']		= $data['role'];
			$_SESSION['is_login'] 	= true;
			return TRUE;
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

	public function requestLogout()
	{
		session_destroy();
		return true;
	}
}
