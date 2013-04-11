<?php
	require ("header.php");
?>
	<h1>THIS WILL BE THE SPLASH PAGE</h1>

	<form action="includes/scripts/fn_login_script.php" method="POST">
		<ul>
			<li><label for="email">Email:</label><input type="email" name="email" placeholder="joe@bloggs.com"></li>
			<li><label for="password">Password:</label><input type="password" name="password" placeholder="******"></li>
			<li><label for="log_in_submit"></label><input type="submit" name="log_in_submit" value="Log In"></li>
		</ul>
	</form>


<?php
	require ("footer.php");
?>