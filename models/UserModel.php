<?php
include_once('DBConnect.php');

class UserModel
{
	public function requestDetail() {
        $userId = $_SESSION['user_id'];
		$dBConnect = new DBConnect();
		$data = mysqli_query($dBConnect->connect, "SELECT * FROM tb_user WHERE user_id='$userId'");
		return $data->fetch_array();
	}

	public function requestUpdateProfile($username, $name) {
        $userId = $_SESSION['user_id'];
		$dBConnect = new DBConnect();
        $query = mysqli_query($dBConnect->connect, "UPDATE tb_user  
                                                SET  username='$username', name='$name'
                                                WHERE user_id='$userId'");
		return $query;
	}

    public function requestUpdatePassword($password) {
        $userId = $_SESSION['user_id'];
		$dBConnect = new DBConnect();
        $query = mysqli_query($dBConnect->connect, "UPDATE tb_user  
                                                SET  password='$password' 
                                                WHERE user_id='$userId'");
		return $query;
	}

    public function requestUpdatePhoto($image) {
        $userId = $_SESSION['user_id'];
		$dBConnect = new DBConnect();
        $query = mysqli_query($dBConnect->connect, "UPDATE tb_user  
                                                SET  image='$image' 
                                                WHERE user_id='$userId'");
		return $query;
	}
}
