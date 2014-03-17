<?php

include 'DB.php';
class gameModel extends DB{


    public function getAll(){

        $sql =
           "SELECT games.gameId, games.title, genreTB.genre, platformTB.platform
             FROM games
            JOIN genreTB
                on  games.genreId = genreTB.genreId
             join  platformTB
                on games.platformId = platformTB.platformId";
        /*
         CAN I HAVE A SECOND QUERY HERE?
         IF NOT, HOW DO I LINK A 4TH UNRELATED TABLE TO MY LAST QUERY
         */

        $st = $this->db->prepare($sql);
        $st->execute();


        return $st->fetchAll();

    }

    public function getOne($id=0){
        $sql = "
	       SELECT games.gameId, games.title, genreTB.genre, platformTB.platform
 FROM games
JOIN genreTB
 	on  games.genreId = genreTB.genreId
 join  platformTB
 	on games.platformId = platformTB.platformId
 where games.gameId =:id";

        $st = $this->db->prepare($sql);
        $st->execute(array(":id"=>$id));

        return $st->fetchAll();
    }
}
?>