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