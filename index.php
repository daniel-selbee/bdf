<?php
require_once "models/db.php";
require_once "models/gameModel.php";
require_once "views/details.php";

$db_user = "root";

$db_pass = "root";

$model = new GenreModel(MY_DSN, MY_USER, MY_PASS);

$view = new GameViewHtml(); //can use the json or html view here

$view->showHeader('Game Critique');

$view->showFooter();

$view->showGames($model->getGame());
