<?php
include_once('DBConn.php');

class UserModel
{
	public function request_user_detail($username)
	{
		$conn = new DBConn();
		$data = mysqli_query($conn->koneksi, "SELECT * FROM tb_user WHERE username='$username'");
		return $data->fetch_array();
	}

	public function request_change_password($username, $old_password, $new_password)
	{
		$processValidation = $this->password_validation($username, $old_password);
		if ($processValidation) {
			$processChangePassword = $this->change_password($username, $new_password);
			if ($processChangePassword) {
				return true;
			} else {
				return false;
			}
		} else {
			return false;
		}
	}

	public function password_validation($username, $old_password) {
		$conn = new DBConn();
		$query = mysqli_query($conn->koneksi, "SELECT * FROM tb_user WHERE username='$username' AND password='$old_password");
		if (isset($query)) {
			return true;
		} else {
			return false;
		}
	}

	public function change_password($username, $new_password) {
		$conn = new DBConn();
		$query = mysqli_query($conn->koneksi, "UPDATE tb_user  
                               SET password='$new_password'
                               WHERE username='$username'");
		return $query;
	}
}