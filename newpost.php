<?php
	include 'connecttodb.php';
	$name = $_POST["name"];
	$message = $_POST["message"];
	$time = new \DateTime("now", new \DateTimeZone("UTC"));
	$query= 'INSERT INTO message (name, time, message) VALUES ("' .$name .'","' . $time->format('Y-m-d H:i:s') . '","' . $message . '");';
	if (!mysqli_multi_query($connection,$query)) {
	  die ("Error while trying to add new post ". mysqli_error($connection));
	} else {
	  header('Location: index.php'); //send back to main page once it is done
	  exit;
	}
?>
