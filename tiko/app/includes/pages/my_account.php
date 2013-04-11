<?php
	//EVENT TEMPLATES
	$event_template = new event_template('', $_SESSION['user_id'], '', '');
	$event_templates = $event_template->getEventTemplatesByUser();
?>

<section class="app_wrapper">
	<h2>My Stats</h2>
	<section></section>

	<h2>My Information</h2>
	<section>
		<a href="">edit</a>
	</section>

	<h2>My Custom Templates</h2>
	<section>
		<?php 
		echo "dsad";
		while ($row = mysql_fetch_array($event_templates)) {
			echo $row['event_options'];
		}
		?>
	</section>
</section>