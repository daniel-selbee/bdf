<?php

include 'DB.php';
class gameModel extends DB{


    //public function __construct(){

    //} // __construct

    public function getAll(){

        $sql =
           "SELECT games.gameId, games.title, genreTB.genre, platformTB.platform
 FROM games
JOIN genreTB
 	on  games.genreId = genreTB.genreId
 join  platformTB
 	on games.platformId = platformTB.platformId";
        $st = $this->db->prepare($sql);
        $st->execute();

        return $st->fetchAll();

    }

    public function getOne($id=0){
    echo $id;
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