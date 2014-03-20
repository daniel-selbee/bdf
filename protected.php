<?php
session_start();
include 'models/protector.php';

//my protected controller
include 'models/viewModel.php';
include 'models/gameModel.php';

$pagename = 'protected';

$views = new viewModel();
$games = new gameModel();

//I want to show the header here
$views->getView("views/header.inc");

//Here I want to show the initial list
if(!empty($_GET["action"])){

    if($_GET["action"]=="update"){

        $result = $games->getOne($_GET["game_id"]);
        $views->getView("views/updateform.html", $result);



    }else if($_GET["action"]=="updateaction"){
        $games->update($_GET["user_id"],$_POST["user_email"]);
        $result = $games->getAll();
        $views->getView("views/protected.php",$result);
    }
}else if($_GET["action"]=="delete"){
    //PROTECTED PAGE //CRUD WILL GO IN HERE


}
//HERE I WANT TO SHOW THE FOOTER
$views->getView("views/footer.inc");