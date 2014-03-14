<?php
//$data is coming from the viewModel

foreach($data as $d){

    echo " <b>Title: </b>";
    echo "\n".$d["title"];
    echo " <b>Genre: </b>";
    echo $d["genre"];
    echo "<b>Platform</b>";
    echo $d["platform"];
    echo "<br>";
}

?>