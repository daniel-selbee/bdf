<div id="gamesList">
<ul>
<?php
foreach($data as $d){

    echo "<li><a href=?action=details&gameId=".$d["gameId"].">".$d["title"]."</a></li>";
    echo "<br>";
}
?>
</ul>
</div>
