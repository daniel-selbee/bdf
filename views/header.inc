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
    <?php
            //IF LOGGED IN
            if($_SESSION["loggedin"]==1){
                /*MAIN NAV*/
                echo "<li><a href='index.php?action=logout'>LOGOUT</a></li>";?>
                <!-- END PHP TAG -->
                <!-- WELCOME MESSAGE -->

                <p id='clear'></p>

                <p id="welcome">Welcome,

                    <?php
                    echo $_SESSION["session_user_name"];
                    echo "<br>"."Your email: ".$_SESSION["session_user_email"];
                    ?></p>

            <?php //START PHP TAG
                /*PAGE NAV*/
                echo "<p id='clear'></p>";
                echo "<p id='access'><a href='protected.php?action'>Access Games</a></p>";
                echo "<p id='add_review'><a href='protected.php?action=add'>Add Game</a></p>";
            //IF LOGGED OUT
            }else{
                echo "<li><a href='index.php?action=login'>LOGIN</a></li>";
            }
            //echo "<li><a href='index.php?action=register'>REGISTER</a></li>";
        echo "</ul>";

    echo "</nav>";

echo "</header>";
    ?>
