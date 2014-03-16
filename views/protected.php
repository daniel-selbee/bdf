<?php
//protected view
foreach($data as $d){
    echo " <b>Title: </b>";
    echo "\n".$d["title"];
    echo " <b>Genre: </b>";
    echo $d["genre"];
    echo "<b>Platform: </b>";
    echo $d["platform"];
    echo "<br>";
    echo " <a href=''>Review</a>";
    echo " <a href=''>Edit</a>";
    echo " <a href=''>Delete</a>";
    echo "<br>";
}
?>