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
    echo " <a href='?action=update&id=".$d["user_id"]."'>Edit</a>";
    echo " <a href='?action=delete&id=".$d["user_id"]."'>Delete</a>";
    echo "<br>";
}
?>