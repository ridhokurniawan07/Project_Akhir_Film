<?php
include_once('DBConnect.php');

class GenretModel
{
	public function requestGenreDetail($genre_id)
	{
		$dBConnect = new DBConnect();
		$data = mysqli_query($dBConnect->connect, "SELECT * FROM tb_genre WHERE genre_id='$genre_id'");
		return $data->fetch_array();
	}

	public function requestGenreList()
	{
		$dBConnect = new DBConnect();
		$data = mysqli_query($dBConnect->connect, "SELECT * FROM tb_genre");
		while ($row = mysqli_fetch_array($data)) {
			$dataList[] = $row;
		}
		return $dataList ?? null;
	}

	public function requestCreateGenre($genre_name) {
		$dBConnect = new DBConnect();
		$query = mysqli_query($dBConnect->connect, "INSERT INTO tb_genre (genre_name) VALUES ('$genre_name')");
		return $query;
	}
	
	public function requestUpdateGenre($genre_id, $genre_name) {
        $dBConnect = new DBConnect();
        $query = mysqli_query($dBConnect->connect, "UPDATE tb_genre  
                                                SET  genre_name='$genre_name' 
                                                WHERE genre_id='$genre_id'");
		return $query;
    }

	function requestDeleteGenre($genre_id)
	{
		$dBConnect = new DBConnect();
		$query = mysqli_query($dBConnect->connect, "DELETE FROM tb_genre WHERE genre_id=$genre_id");
		return $query;
	}
}