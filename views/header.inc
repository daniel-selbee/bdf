<!DOCTYPE html>
<head>
    <title>Game Critique</title>
    <link rel="stylesheet" type="text/css" href="CSS/main.css" />
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>

</head>
<body>
<div class ="wrapper">
<header>
    <h1><a href="?action=">Game Critique</a></h1>
    <p>Review your games here.</p>
    <nav>
        <ul>
            <li><a href="?action=">HOME</a></li>
            <?
            if($_SESSION["loggedin"]==1){
                echo "<li><a href='index.php?action=logout'>LOGOUT</a></li>";
                echo "<ul id='add_review'><li><a href='protected.php?action='>Protected</a></li><li><a href='protected.php?action=add'>Add Review</a></li></ul>";
            }else{
                echo "<li><a href='index.php?action=login'>LOGIN</a></li>";
            }

        echo "</ul>";

    echo "</nav>";

echo "</header>";
?>
