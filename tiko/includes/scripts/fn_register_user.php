<?php
	session_start();

	function emailCheck($field) {
		$field = filter_var($field, FILTER_SANITIZE_EMAIL);
		if (filter_var($field, FILTER_VALIDATE_EMAIL)) {
			return TRUE;
		} else {
			return FALSE;
		}
	}

	function setVariables() {
		$_SESSION["email"] = $email;
		$_SESSION["password"] = $password;
		$_SESSION["password_check"] = $password_check;
		$_SESSION["first_name"] = $first_name;
		$_SESSION["surname"] = $surname;
		$_SESSION["address1"] = $address1;
		$_SESSION["address2"] = $address2;
		$_SESSION["address3"] = $address3;
		$_SESSION["town"] = $town;
		$_SESSION["county"] = $county;
		$_SESSION["postcode"] = $postcode;
		$_SESSION["country"] = $country;
		$_SESSION["phone"] = $phone;
	}

	$messageStack = "<ul>";

	$email = $_POST["email"];
	$password = $_POST["password"];
	$password_check = $_POST["password_check"];
	$first_name = $_POST["first_name"];
	$surname = $_POST["surname"];
	$address1 = $_POST["address1"];
	$address2 = $_POST["address2"];
	$address3 = $_POST["address3"];
	$town = $_POST["town"];
	$county = $_POST["county"];
	$postcode = $_POST["postcode"];
	$country = $_POST["country"];
	$phone = $_POST["phone"];
	
	if (emailCheck($email)) {
		if (strlen($password) > 5) {
			if (!$password === $password_check) {

				$messageStack .= "<li><p>Yay this works</p></li>";
			} else {
				$messageStack .= "<li><p>Please ensure your passwords match</p></li>";
				setVariables();
			}
		} else {
			$messageStack .= "<li><p>Please enter a valid password.</p></li>";
			setVariables();
		}
	} else {
		$messageStack .= "<li><p>Please enter a valid email.</p></li>";
		setVariables();
	}

	$messageStack .= "</ul>";

	$_SESSION["reg_errors"] = $messageStack;

	$location = "Location: ../../register.php";
	header($location);

?>