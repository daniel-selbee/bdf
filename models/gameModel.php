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


        $row = $st->fetchAll();
        @$row = $row[0];

        if(count($row) !=0){

            $_SESSION["loggedin"] = 1;
            $_SESSION["session_user_name"] = $row["user_fullname"];
            $_SESSION["session_user_email"] = $row[3];//[3] IS THE USER'S EMAIL
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
    //IS THE REFRESH PROBLEM IN HERE THEN? THE DATABASE ISN'T BEING UPDATED
    public function update($id=0, $title='', $genre='', $platform=''){

        //SQL STATEMENT SHOULD BE WORKING. I DOUBLE CHECKED THIS INSIDE OF SQL PRO
        $sql =
        "update games,genreTB,platformTB
        set title = :title,
        genreTB.genre = :genre,
        platformTB.platform = :platform
        where gameId = :id";

        $st = $this->db->prepare($sql);
        $st->execute(array(":id"=>$id, ":title"=>$title, ":genre"=>$genre, ":platform"=>$platform));
    }

    public function delete($id=0){

        //SQL STATEMENT
        $sql =
        "delete from games
        where gameId = :id";

        $st = $this->db->prepare($sql);
        $st->execute(array(":id"=>$id));
    }
    //THE ADD FORM ISN'T SHOWING UP TO ALTER THIS YET
    public function add($title='', $genre='', $platform=''){
        $sql =
        "insert into games(title, genreId, platformId)
        values (:title, :genreId, :platformId)";
        $st = $this->db->prepare($sql);
        $st->execute(array(":title"=>$title, ":genreId"=>$genre, ":platformId"=>$platform));


}
}
?>