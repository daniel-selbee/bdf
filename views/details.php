<?php
//$data is coming from the viewModel
echo "<center>";
foreach($data as $d){

    echo " <b>Title</b>";
    echo $d["title"];
    echo " <b>Genre</b>";
    echo $d["genre"];
    echo "<b>Platform</b>";
    echo $d["platform"];
    echo "<br>";
}
echo "</center>";

?>