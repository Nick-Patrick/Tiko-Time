<?php
	//EVENT TEMPLATES
	$event_template = new event_template('', $_SESSION['user_id'], '', '');
	$event_templates = $event_template->getEventTemplatesByUser();

	$user = new users($_SESSION['user_id'], '', '', '', '', '', '', '', '', '', '', '', '', '', '');
	$user_info = $user->show_my_info();
?>

<section class="app_wrapper">
	<section class="my_account_wrapper">
		<ul>
			<li>
				<section>
					<h2>My Stats</h2>
					<section></section>
				</section>

				<section>
				<h2>My Account Status</h2>
				<section></section>
				</section>
			</li>
			<li>
				<section>
					<h2>My Information</h2>
					<section>
						<ul>
							<li><span>Email:</span><?php echo mysql_result($user_info, 0, "email")?></li>
							<li><span>First Name:</span><?php echo mysql_result($user_info, 0, "first_name")?></li>
							<li><span>Surname:</span><?php echo mysql_result($user_info, 0, "last_name")?></li>
							<li><span>Address:</span><?php echo mysql_result($user_info, 0, "address1")?></li>
							<li><span>Address:</span><?php echo mysql_result($user_info, 0, "address2")?></li>
							<li><span>Address:</span><?php echo mysql_result($user_info, 0, "address3")?></li>
							<li><span>Town:</span><?php echo mysql_result($user_info, 0, "town")?></li>
							<li><span>County:</span><?php echo mysql_result($user_info, 0, "county")?></li>
							<li><span>Postcode:</span><?php echo mysql_result($user_info, 0, "postcode")?></li>
							<li><span>Country:</span><?php echo mysql_result($user_info, 0, "country")?></li>
							<li><span>Phone:</span><?php echo mysql_result($user_info, 0, "phone")?></li>
						</ul>

						<a href="">change my password</a>
						<a href="">edit my information</a>
					</section>	
				</section>

				<section>
					<h2>My Custom Templates</h2>
					<section>
						<ul>
						<?php 
							while ($row = mysql_fetch_array($event_templates)) {
								echo "<li>" . $row['event_template_name'] . "" . $row['event_options'] . "<li>";
							}
						?>
						</ul>
						<a href="">new</a>
						<a href="">edit</a>
						<a href="">delete</a>
					</section>
				</section>
			</li>
		</ul>
	</section>
</section>