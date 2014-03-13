<?php
/**
 * Created by PhpStorm.
 * User: sulb1210
 * Date: 3/12/14
 * Time: 9:40 PM
 */

class GenreModel {

    private $db;

    public function __construct($dsn, $user, $pass){
        try {
        $this->db = new \PDO($dsn, $user, $pass);
        }
        catch (\PDOException $e) {
            var_dump($e);
        }
    } // __construct


    /**
     * @return array Records from the database, as an array of arrays
     */

    public function getGame() {

        $statement = $this->db->prepare("
	       SELECT games.title, genreTB.genre, platformTB.platform
           FROM games
           JOIN genreTB,  platformTB
           WHERE  games.genreId = genreTB.genreId AND  games.platformId = platformTB.platformId;
        ");
        // g stands for games, gametitle stands for title, gt stands for genreTB, gid stands for genreId
        // need to join the games table with the genreTB
        //select g.genreID, g.gametitle, gt.genre from games g join genreTB gt where g.gid  = gt.gid

        try {
        if ($statement->execute()){
            $rows = $statement->fetchAll(\PDO::FETCH_ASSOC);
            return $rows;
            } // if execute
        }
        catch(\PDOException $e) {
            echo "Couldn't query the database.";
            var_dump($e);
        }
        return array();
        } // getGenre
} 