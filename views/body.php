<?php
echo "<center>";
foreach($data as $d){

    echo " <a href=?action=details&$id=".$d["gameId"].">reviews</a>";
    echo "<br>";
}
echo "</center>";


?>
