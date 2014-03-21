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


if(!empty($_GET["action"])){
        if($_GET["action"]=="update"){

            $result = $games->getOne($_GET["id"]);
            $views->getView("views/updateform.html", $result);

        }else if($_GET["action"]=="updateaction"){

            //SHOULD BE USING UPDATE FROM GAMEMODEL. I DON'T SEE AN ISSUE HERE
            $games->update($_GET["id"],$_POST["title"], $_POST["genre"], $_POST["platform"]);

            //TEST...SHOWING POSTED VARIABLES FROM UPDATE FUNCTION
            foreach($_POST as $p){
                var_dump($p);
            }

            $result = $games->getAll(); //SHOULD REFRESH THE GAME LIST
            $views->getView("views/protected.php",$result);

            }else if($_GET["action"]=="delete"){

                $games->delete($_GET["id"]);
                $result = $games->getAll();
                $views->getView("views/protected.php", $result);


            }else if($_GET["action"]=="add"){
                //SHOULD DISPLAY THE ADD FORM, BUT IT ISN'T

                $views->getView("views/addform.html");

            }else if($_GET["action"]=="addaction"){

                $games->add($_POST["title"], $_POST["genre"], $_POST["platform"]);
                $result = $games->getAll();
                $views->getView("views/protected.php", $result);
            }

}else{
        $result = $games->getAll();
        $views->getView("views/protected.php", $result);
}
//remember this is a test... deleted brace in front of  action =='delete
//HERE I WANT TO SHOW THE FOOTER
$views->getView("views/footer.inc");