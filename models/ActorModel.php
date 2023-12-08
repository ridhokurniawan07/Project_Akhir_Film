<?php
include_once('DBConnect.php');

class ActorModel
{
	public function requestDetailByActorName($actorName)
	{
		$dBConnect = new DBConnect();
		$data = mysqli_query($dBConnect->connect, "SELECT * FROM tb_actor WHERE name_actor = '$actorName'");
		return $data->fetch_array();
	}
}