<?php

class DB{

    public  function __construct(){
        //Try creating new PDO connection to DB, var_dump error if any issue with connection
        try {

            $dsn = "mysql:dbname=bdf1403;host=127.0.0.1";
            $db_user = "root";
            $db_pass = "root";

            $this->$db = new PDO($dsn, $db_user, $db_pass);


        } catch (PDOException $error) {
            var_dump($error);
        }


    }

}