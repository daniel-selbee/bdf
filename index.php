<!doctype html>
<html>
<head>
<meta charset="UTF-8">
<title>Game Critique</title>
</head>

<body>
<h1>Game Critique</h1>
<p>Review your games here.</p>
<?php
$dsn = "mysql:host=127.0.0.1;port=8889; dbname=bdf1403";

$db_user = "root";

$db_pass = "root";

$db = new \PDO($dsn, $db_user, $db_pass);

$statement = $db->prepare("
	SELECT *
	FROM games
");
if ($statement->execute()){
	$rows = $statement->fetchAll(\PDO::FETCH_ASSOC);	
	foreach ($rows as $num => $row) {
		echo "<h2>${row['title']}</h2> <p>${row['genreId']}</p>";
	}
}

?>
</body>
</html>