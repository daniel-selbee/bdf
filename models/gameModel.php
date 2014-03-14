<?php

class gameModel {


    public function __construct(){

    } // __construct


    /**
     * @return array Records from the database, as an array of arrays
     */

    public function getAll() {

        $statement = $this->db->prepare("
	       SELECT games.title, genreTB.genre, platformTB.platform
           FROM games
           JOIN genreTB,  platformTB
           WHERE  games.genreId = genreTB.genreId AND  games.platformId = platformTB.platformId;
        ");


        try {
        if ($statement->execute()){
            $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $rows;
            } // if execute
        }
        catch(\PDOException $e) {
            echo "Couldn't query the database.";
            var_dump($e);
        } //catch
        return array();
        } // getGame
} 