<?php

class gameModel {


    public function __construct(){

    } // __construct

    public function getAll(){

        $sql =
           "SELECT games.title, genreTB.genre, platformTB.platform
           FROM games
           JOIN genreTB,  platformTB
           WHERE  games.genreId = genreTB.genreId AND  games.platformId = platformTB.platformId";
        $st = $this->db->prepare($sql);
        $st->executre();

        return $st->fetchAll();

    }
}
?>