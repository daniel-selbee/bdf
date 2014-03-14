<?php
echo "<center>";
foreach($data as $d){

    echo " <a href=?action=details&gameId=".$d["gameId"].">".$d["title"]."</a>";
    echo "<br>";
}
echo "</center>";


?>
