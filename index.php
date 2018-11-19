<!DOCTYPE html>
<html>
<head>
	<title>cool forum</title>
</head>
<body>
<h1>cool forum</h1>

<hr>

<?php
	include 'connecttodb.php';

	$query = "SELECT * FROM message ORDER BY time;";
	$result = mysqli_query($connection, $query);
	if (!$result) {
	       die("databases query failed.");
	}

	while ($row = mysqli_fetch_assoc($result)) {
		echo "<b><a href=getuserposts.php?name=" . $row['name'] . ">" . $row['name'] . "</a></b> at " . $row['time'] . "<br>";
		echo $row['message'];
		echo "<hr>";
	}
	mysqli_free_result($result);
?>

<form action="newpost.php" method="post" >
    name: <input type="text" name="name" value="anonymous"><br>
    message: <input type="text" name="message" value=""><br>
    <input type="submit" value="post">
</form>

<hr>

</body>
</html>

