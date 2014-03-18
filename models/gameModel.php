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

    public function checkLogin($uname='', $password=''){
        $sql = "select * from users where user_name=:uname and user_password=:password";
        //MD5(CONCAT(user_salt,:password); not working above
        $st = $this->db->prepare($sql);
        $st->execute(array(":uname"=>$uname,":password"=>$password));

        $num = $st->rowCount();

        if($num>-0){
            $_SESSION["loggedin"] = 1;

        }else{
            $_SESSION["loggedin"] = 0;
        }

        return $st->fetchAll(PDO::FETCH_COLUMN, 0);
    }

    public function logout(){
        $_SESSION["loggedin"] = 0;
    }
}
?>