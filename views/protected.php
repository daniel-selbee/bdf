<div id="protected_list">
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
    //echo " <a href=''>Review</a>"; I MIGHT ADD THIS FUNCTIONALITY LATER
    echo "<ul><li> <a href='?action=update&id=".$d["gameId"]."'>Edit</a></li>";
    echo " <li><a href='?action=delete&id=".$d["gameId"]."'>Delete</a></li></ul>";
}
?>
</div>