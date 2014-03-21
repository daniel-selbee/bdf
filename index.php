<?php
session_start();
//my index page
include 'models/viewModel.php';
include 'models/gameModel.php';


$pagename = 'index';

$views = new viewModel();
$games = new gameModel();

//I want to show the header here
if(@$_GET["action"]!="checklogin" && @$_GET["action"]!="logout"){
    $views->getView("views/header.inc");
}

//Here I want to show the initial list
if(!empty($_GET["action"])){
    if($_GET["action"]=="home"){
    $result = $games->getAll();
    $views->getView("views/body.php", $result);
    } //home closing

    if($_GET["action"]=="details"){

        $result = $games->getOne($_GET["gameId"]);
        $views->getView("views/details.php",$result);
    }

    if($_GET["action"]=="login"){
        $views->getView("views/loginform.html");
    }

    if($_GET["action"]=="checklogin"){
        $result = $games->checkLogin($_POST["user_name"],$_POST["password"]);
        if(count($result)>0) {
            //IS THIS INTERFERING WITH "action" WHEN LOGGED IN
            header("location: protected.php?action=");
        }else{
            $views->getView("views/header.inc");
            echo "<p id='login_error'>Login Error</p>";
            echo "<style>form{ margin: 50px auto}</style>";
            $views->getView("views/loginform.html");
        }
    }if($_GET["action"]=="logout"){
        $games->logout();
        header("location: index.php");
    }

}else{
    $result = $games->getAll();
    $views->getView("views/body.php", $result);

}

// Here I want to show the footer
$views->getView("views/footer.inc");

?>