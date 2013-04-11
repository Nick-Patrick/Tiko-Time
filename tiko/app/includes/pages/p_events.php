<?php
	$events = new event('', '', '', '', '', '', '', '', '', '', '', '', '', $_SESSION["user_id"]);
	$event_list = $events->display_events();
?>

<section class="app_wrapper">
	<h2>My Events</h2>
	<section>
		<?php 
			while ($row = mysql_fetch_array($event_list)) {
				echo $row["event_id"];
			}

		?>
	</section>



</section>