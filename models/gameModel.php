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
        //$sql = "select * from users where user_name=:uname and user_password=:password";
        //MD5(CONCAT(:password, user_salt); not working above
        //select md5(concat(user_password,user_salt)) from users
        $sql = "select * from users where  user_name = :uname and user_password  = md5(CONCAT(:password,user_salt)) ";

        $st = $this->db->prepare($sql);

        $st->execute(array(":uname"=>$uname,":password"=>$password));

        //$num = $st->rowCount();
        $row = $st->fetchAll();
        @$row = $row[0];

        if(count($row) !=0){
           // var_dump($row["user_id"]);
            $_SESSION["loggedin"] = 1;
            $_SESSION["session_user_name"] = $row["user_fullname"];
        }else{
            $_SESSION["loggedin"] = 0;
            $_SESSION["session_user_name"]="";
        }

        return $row;
    }

    public function logout(){
        $_SESSION["loggedin"] = 0;
        $_SESSION["session_user_name"]="";
    }
}
?>