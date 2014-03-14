<?php

include 'DB.php';
class gameModel extends DB{


    public function __construct(){

    } // __construct

    public function getAll(){

        $sql =
           "SELECT games.title, genreTB.genre, platformTB.platform
           FROM games
           JOIN genreTB,  platformTB
           WHERE  games.genreId = genreTB.genreId AND  games.platformId = platformTB.platformId";
        $st = $this->db->prepare($sql);
        $st->execute();

        return $st->fetchAll();

    }

    public function getOne($id=0){

        $sql = "
	       SELECT games.title, genreTB.genre, platformTB.platform
           FROM games
           JOIN genreTB,  platformTB
           WHERE  games.genreId = genreTB.genreId AND  games.platformId = platformTB.platformId";
        $st = $this->db->prepare($sql);
        $st->execute(array("gameId"=>$id));

        return $st->fetchAll();
    }
}
?>