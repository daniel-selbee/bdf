<?php
session_start();
include 'models/protector.php';

//my protected controller
include 'models/viewModel.php';
include 'models/gameModel.php';

$pagename = 'protected';

$views = new viewModel();
$games = new gameModel();

$views->getView("views/header.inc");

//Here I want to show the initial list
if(!empty($_GET["action"])){

}else{
    //PROTECTED PAGE //CRUD WILL GO IN HERE LATER

}
//HERE I WANT TO SHOW THE FOOTER
$views->getView("views/footer.inc");