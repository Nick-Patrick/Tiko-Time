<?php
	require("header.php");

	if (isset($_SESSION["reg_errors"])) {
		$reg_error_messages = $_SESSION["reg_errors"];

		$email = $_SESSION["email"];
		$password = $_SESSION["password"];
		$password_check = $_SESSION["password_check"];
		$first_name = $_SESSION["first_name"];
		$surname = $_SESSION["surname"];
		$address1 = $_SESSION["address1"];
		$address2 = $_SESSION["address2"];
		$address3 = $_SESSION["address3"];
		$town = $_SESSION["town"];
		$county = $_SESSION["county"];
		$postcode = $_SESSION["postcode"];
		$country = $_SESSION["country"];
		$phone = $_SESSION["phone"];


		unset($_SESSION["reg_errors"], $_SESSION["email"], $_SESSION["password"], $_SESSION["password_check"], $_SESSION["first_name"], $_SESSION["surname"], $_SESSION["address1"], $_SESSION["address2"], $_SESSION["address3"], $_SESSION["town"], $_SESSION["county"], $_SESSION["postcode"], $_SESSION["country"], $_SESSION["phone"]);
	} else {
		$email = "";
		$password = "";
		$password_check = "";
		$first_name = "";
		$surname = "";
		$address1 = "";
		$address2 = "";
		$address3 = "";
		$town = "";
		$county = "";
		$postcode = "";
		$country = "";
		$phone = "";
	}
?>
<section class="reg_error_messages"><?php echo $reg_error_messages; ?></section>
<form action="includes/scripts/fn_register_user.php" method="POST">
	<ul>
		<li><label for="email">Email:</label><input type="email" name="email" value="<?php echo $email; ?>"></li>
		<li><label for="password">Password:</label><input type="password" name="password" value="<?php echo $password; ?>"></li>
		<li><label for="password_check">Retype Password:</label><input type="password" name="password_check" value="<?php echo $password_check; ?>"></li>
		<li><label for="first_name">First Name:</label><input type="text" name="first_name" value="<?php echo $first_name; ?>"></li>
		<li><label for="surname">Surname:</label><input type="text" name="surname" value="<?php echo $surname; ?>"></li>
		<li><label for="address1">Address1:</label><input type="text" name="address1" value="<?php echo $address1; ?>"></li>
		<li><label for="address2">Address2:</label><input type="text" name="address2" value="<?php echo $address2; ?>"></li>
		<li><label for="address3">Address3:</label><input type="text" name="address3" value="<?php echo $address3; ?>"></li>
		<li><label for="town">Town:</label><input type="text" name="town" value="<?php echo $town; ?>"></li>
		<li><label for="county">County:</label><input type="text" name="county" value="<?php echo $county; ?>"></li>
		<li><label for="postcode">Postcode:</label><input type="text" name="postcode" value="<?php echo $postcode; ?>"></li>
		<li><label for="country">Country:</label><input type="text" name="country" value="<?php echo $country; ?>"></li>
		<li><label for="phone">Phone:</label><input type="text" name="phone" value="<?php echo $phone; ?>"></li>
		<li><label for="reg_submit"></label><input type="submit" name="reg_submit" value="Register"></li>
	</ul>
</form>

<?php
	require("footer.php");
?>