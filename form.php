<?php
	require "dbconn.php";


	if(isset($_POST['submit'])){
		$firstname 	= 	checkInput($_POST['firstname']);
		$lastname	= 	checkInput($_POST['lastname']);
		$email 		= 	checkInput($_POST['email']);
		$password 	= 	md5(checkInput($_POST['password']));
		$phonenumber=	checkInput($_POST['phonenumber']);
		$country 	= 	checkInput($_POST['country']);
		$gender 	= 	checkInput($_POST['gender']);

		if (!empty($firstname) && !empty($lastname) && !empty($email) && !empty($password) && !empty($phonenumber) && !empty($country) && !empty($gender)) {
			
			$query = "SELECT `Email` FROM `users` WHERE `Email` = '$email'";
			$query_run = mysql_query($query);

			if (mysql_num_rows($query_run) == 1) {
				echo "user details already exist";

			}else {
				$query_insert = "INSERT INTO `users` (`id`, `firstName`, `lastName`, `Email`, `password`, `phoneNumber`, `country`, `gender`)  VALUES('','$firstname', '$lastname', '$email', '$password', '$phonenumber','$country', '$gender')";
				$query_insert_run = mysql_query($query_insert);

				if ($query_insert_run) {
					header('location:success.html');
				} else {
					echo "<script> alert('Application is unsuccessful!')</script>";
				}
			}
		}else {
			echo '<span style="color:red"> fill in all fields </span>';
		}
	}

	function checkInput($userinput) {
		$userinput = trim($userinput);
		$userinput = stripslashes($userinput);
		$userinput = htmlspecialchars($userinput);
		return $userinput;
	}
?>