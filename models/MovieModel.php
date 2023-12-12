<?php
include_once('DBConnect.php');

class MovieModel
{
	public function requestList()
	{
		$dBConnect = new DBConnect();
		$data = mysqli_query($dBConnect->connect, "SELECT * FROM tb_film");
		while ($row = mysqli_fetch_array($data)) {
			$dataList[] = $row;
		}
		return $dataList ?? null;
	}

    public function requestSearch($keyword)
	{
		$dBConnect = new DBConnect();
		$data = mysqli_query($dBConnect->connect, "SELECT 
                                                        tb_film.film_id, 
                                                        tb_film.film_name, 
                                                        tb_genre.genre_name, 
                                                        tb_film.film_release, 
                                                        tb_film.film_description, 
                                                        GROUP_CONCAT(tb_actor.name_actor) AS actors, 
                                                        tb_film.film_image
                                                    FROM 
                                                        tb_film
                                                    LEFT JOIN 
                                                        tb_genre ON tb_film.genre_id = tb_genre.genre_id
                                                    LEFT JOIN 
                                                        tb_film_actor ON tb_film.film_id = tb_film_actor.film_id
                                                    LEFT JOIN 
                                                        tb_actor ON tb_film_actor.actor_id = tb_actor.actor_id
                                                    WHERE 
                                                        tb_film.film_name LIKE '%$keyword%'
                                                    GROUP BY 
                                                        tb_film.film_id;
                                                    ");
		while ($row = mysqli_fetch_array($data)) {
			$dataList[] = $row;
		}
		return $dataList ?? null;
	}

    public function requestMovieRating($film_id) {
        $dBConnect = new DBConnect();
        $average_rating_query = "SELECT AVG(rating) as avg_rating FROM tb_review WHERE film_id = $film_id";
        $average_rating_result = mysqli_query($dBConnect->connect, $average_rating_query);
        $average_rating_row = mysqli_fetch_assoc($average_rating_result);
        $average_rating = number_format($average_rating_row['avg_rating'], 1);
        return $average_rating;
    }

    public function requestUpdateMovieSeen($film_id, $seenCounter) {
        $dBConnect = new DBConnect();
        $query = mysqli_query($dBConnect->connect, "UPDATE tb_film  
                                                SET  visited_counter='$seenCounter' 
                                                WHERE film_id='$film_id'");
		return $query;
    }
}