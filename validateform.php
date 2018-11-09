<?php 
	
	$message = '';
	$firstnameErr ='';
	$lastnameErr ='';
	$emailErr = '';
	$pwdErr = '';
	$conpwdErr = '';
	$phonenumberErr = '';
	$countryErr = '';
	$genderErr = '';
	
	if(isset($_POST['submit'])){
		$firstname 	= 	checkInput($_POST['firstname']);
		$lastname	= 	checkInput($_POST['lastname']);
		$email 		= 	checkInput($_POST['email']);
		$password 	= 	checkInput($_POST['password']);
		$conpwd 	=	checkInput($_POST['conpwd']);
		$phonenumber=	checkInput($_POST['phonenumber']);
		$country 	= 	checkInput($_POST['country']);
		//$gender 	= 	checkInput($_POST['gender']); //i can't seems to validate gender.

		if (empty($firstname) || empty($lastname) || empty($email) || empty($password) || empty($conpwd) || empty($phonenumber) || empty($country)) {
			
			$message = 'All fields are required';
			
		} else {

			if (is_numeric($firstname)) {
				$firstnameErr = 'only letters are required';
			}

			if (is_numeric($lastname)) {
				$lastnameErr = 'only letters are required';
			}

			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      			$emailErr = 'Invalid email address'; 
    		}

    		if (strlen($password) < 6 || strlen($password) > 8) {
    			$pwdErr = 'password should be 6-8 characters';
    		}

    		if ($password != $conpwd) {
    			$conpwdErr = 'password does not match';
    		}

    		if (!is_numeric($phonenumber)) {
				$phonenumberErr = 'only numbers are required';
			} else if (strlen($phonenumber != 11)) {
				$phonenumberErr = 'phone number should be 11 digit';
			}

			if (is_numeric($country)) {
				$countryErr = 'only letters are required';
			}
		} 
	}

	function checkInput($userinput) {
	 	$userinput = trim($userinput);
	 	$userinput = stripslashes($userinput);
	 	$userinput = htmlspecialchars($userinput);
	 	return $userinput;
	}	
?>

<!DOCTYPE html>
<html>
<head>
	<title>form validation</title>
	<script type="text/javascript">
		function validateForm() {
			var firstname = document.forms.regForm.firstname;
			var numericExp = /[0-9]/;
			if (firstname.value == "" || firstname.value.match(numericExp) ){
				alert("please enter a valid first name");
				firstname.focus();
				return false;
			}

			var lastname = document.forms.regForm.lastname;
			var numericExp = /[0-9]/;
			if (lastname.value == "" || lastname.value.match(numericExp) ){
				alert("please enter a valid last name");
				lastname.focus();
				return false;
			}

			var email = document.forms.regForm.email;
			var emailExp = /^w+[+.w-]*@([w-]+.)*w+[w-]*.([a-z]{2,4}|d+)$/;
			var atpos = email.value.indexOf('@');
			var dotpos = email.value.indexOf('.');
			var pos = dotpos - atpos;
			if (email.value == "" || email.value.match(emailExp) || pos < 5){
				alert("please enter a valid email address");
				email.focus();
				return false;
			}

			var password = document.forms.regForm.password;
			if (password.value == "" || password.value.length < 6 || password.value.length > 9) {
				alert("please your password should be 6-8 characters");
				password.focus();
				return false;
			}

			var conpwd = document.forms.regForm.conpwd;
			if (conpwd.value != password.value){
				alert("please your password do not match");
				conpwd.focus();
				return false;
			}

			var phonenumber = document.forms.regForm.phonenumber;
			var alphaExp = /[a-zA-Z]/;
			if (phonenumber.value == "" || phonenumber.value.match(alphaExp) || phonenumber.value.length != 11){
				alert("please enter a valid phone number");
				phonenumber.focus();
				return false;
			}

			var country = document.forms.regForm.country;
			var numericExp = /[0-9]/;
			if (country.value == "" || country.value.match(numericExp) ){
				alert("please enter a valid country");
				country.focus();
				return false;
			}

			var gender = document.forms.regForm.gender;
			if (gender.value == ""){
				alert("please choose a gender");
				//gender.focus();
				return false;
			}
		}	
	</script>
	<style type="text/css">
		.error {
			color: red;
		}
		.success {
			color: green;
		}
	</style>
</head>
<body>
	
	<form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>" id="regForm" onsubmit="return validateForm()">
		<fieldset>
			<p class="error"><?php echo $message; ?></p>
			<legend><h2>Create An Account</h2></legend>
			<span class="error">* required</span>
			<br><br>
			<label for="firstname">First Name</label>
			<input type="text" name="firstname" placeholder="Enter first name"><span class="error"> * <?php echo $firstnameErr; ?></span>
			<br><br>
			<label for="lastname">Last Name </label>
			<input type="text" name="lastname" placeholder="Enter last name"><span class="error"> * <?php echo $lastnameErr; ?></span>
			<br><br>
			<label for="email">Email</label>
			<input type="text" name="email" placeholder="Eg. xyz@abc.com"><span class="error"> * <?php echo $emailErr; ?></span>
			<br><br>
			<label for="password">password</label>
			<input type="text" name="password" placeholder="Enter password"><span class="error"> * <?php echo $pwdErr; ?></span>
			<br><br>
			<label for="confirmpwd">Confirm Password</label>
			<input type="text" name="conpwd" placeholder="Confirm password"><span class="error"> * <?php echo $conpwdErr; ?></span>
			<br><br>
			<label for="phonenumber">Phone Number</label>
			<input type="tel" name="phonenumber" placeholder="Eg. +234 8123456789"><span class="error"> * <?php echo $phonenumberErr; ?></span>
			<br><br>
			<label for="country">Country</label>
			<input type="text" name="country" placeholder="E.g Nigeria"><span class="error"> * <?php echo $countryErr; ?></span>
			<br><br>
			<label>Gender</label>
			<input type="radio" name="gender" value="male"> Male
			<input type="radio" name="gender" value="female"> Female <span class="error">
			<br><br>
			<button name="submit" id="btn">Sign Up</button>
		</fieldset>
	</form>
	
</body>
</html>