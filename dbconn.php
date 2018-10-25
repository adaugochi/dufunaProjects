<?php 
	$hostname = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'dufuna_fem';

	$conn = mysql_connect($hostname, $username, $password);

	if (!$conn || !mysql_select_db($dbname) ) {
		die("could not connect");
	}
?>