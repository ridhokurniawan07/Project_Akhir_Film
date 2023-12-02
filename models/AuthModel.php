<?php
include_once('DBConnect.php');

class AuthModel
{
	public function isUserAlreadyLogin() {
		session_start();
		if ($_SESSION['is_login']) {
			return true;
		} else {
			return false;
		}
	}

	public function requestLogin($username, $password) {
		$dBConnect = new DBConnect();
		$dataSql = mysqli_query($dBConnect->connect, "SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
		$data = $dataSql->fetch_array();

		if ($username == $data['username'] and $password == $data['password']) {
			session_start();
			$_SESSION['name'] 		= $data['name'];
			$_SESSION['username']   = $data['username'];
			$_SESSION['is_login'] 	= true;
			return TRUE;
		} else {
			return FALSE;
		}
	}

	public function requestRegister($username, $email, $password, $role) {
		$dBConnect = new DBConnect();
		$query = mysqli_query($dBConnect->connect, "INSERT INTO tb_user (name, gambar, username, email, password, role) VALUES ('$username', '', '$username', '$email', '$password', '$role')");
        if ($query) {
			session_start();
			$_SESSION['name'] 		= $username;
			$_SESSION['username']   = $username;
			$_SESSION['is_login'] 	= true;
            $_SESSION['role']       = $role; 
			return TRUE;
		} else {
			return FALSE;
		}
	}

    public function requestLogout() {
        session_destroy();
        return true;
    }
}
