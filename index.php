<?php
include 'models/viewModel.php';
include 'models/gameModel.php';


$pagename = 'index';

$views = new viewModel();
$games = new gameModel();

//I want to show the header here
$views->getView("views/header.inc");

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

} //empty closing
else{
    $result = $games->getAll();
    $views->getView("views/body.php", $result);

}

// Here I want to show the footer
$views->getView("views/footer.inc");
