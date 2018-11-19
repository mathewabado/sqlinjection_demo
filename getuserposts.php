<!DOCTYPE html>
<html>
<?php $name=$_GET['name'];?>
<head>
	<title><?php echo $name?></title>
</head>
<body>
<h1>
<?php echo "posts by " . $name;?>
</h1>

<hr>

<?php
	include 'connecttodb.php';

	$query = "SELECT * FROM message WHERE name = \"" . $name . "\";";
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

<a href='index.php'>back to main page</a>

<hr>
</body>
</html>
