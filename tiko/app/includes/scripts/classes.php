<?php
class calendar {
	private $curDay;
	private $curMon;
	private $curYear;
	private $currentDate;


	function __construct() {
		$this->curDay = date('d');
		$this->curMon = date('n');
		$this->curYear = date('Y');
		$this->currentDate = date('d-m-y');

		echo "<script> var month = " . $this->curMon . ";</script>";
		echo "<script> var year = " . $this->curYear . ";</script>";
	}

	public function showCalendar() {
		$days = array(
			0 => 'Mon',
			1 => 'Tue',
			2 => 'Wed',
			3 => 'Thu',
			4 => 'Fri', 
			5 => 'Sat', 
			6 => 'Sun'
			);

		$months = array(
			'1' => 'January', 
			'2' => 'February', 
			'3' => 'March', 
			'4' => 'April', 
			'5' => 'May', 
			'6' => 'June',
			'7' => 'July',
			'8' => 'August',
			'9' => 'September',
			'10' => 'October',
			'11' => 'November',
			'12' => 'December'
			);

		$daysinmonth = cal_days_in_month(CAL_GREGORIAN, $this->curMon, $this->curYear);

		$monthPrevious = $this->curMon - 1;
		if ($monthPrevious == 00) {
			$monthPrevious = 12;
			$this->curYear = $this->curYear - 1;
		}

		$daysinprevmonth = cal_days_in_month(CAL_GREGORIAN, $monthPrevious, $this->curYear);
		
		//$output = "<section><form action='index.php' method='post'><input type='submit' name='prev' value='Previous'><input type='submit' name='next' value='Next'></form></section>";
		
		$output = "<section class='calendar-top'>";
		$output .= "<h2>" . $months[$this->curMon] . " " . $this->curYear . "</h2>";
		/*$output .= '<section class="calendar-options">
		<form action="index.php" method="POST">
			<select name="month" id="mn">
				<option value="1">Jan</option>
				<option value="2">Feb</option>
				<option value="3">Mar</option>
				<option value="4">Apr</option>
				<option value="5">May</option>
				<option value="6">Jun</option>
				<option value="7">Jul</option>
				<option value="8">Aug</option>
				<option value="9">sep</option>
				<option value="10">Oct</option>
				<option value="11">Nov</option>
				<option value="12">Dec</option>
			</select>
			<select name="year" id="yr">
				<option value="2012">2012</option>
				<option value="2013" selected="selected">2013</option>
				<option value="2014">2014</option>
				<option value="2015">2015</option>
				<option value="2016">2016</option>
			</select>
		</form>


		<section><button id="p"><</button><button id="n">></button></section>
	</section>';*/
		$output .= "</section><section class='calendar-main'>";

		$output .= "<table class='calendar-tab'><thead>";
		foreach ($days as $day) {
			$output .= "<th>" . $day . "</th>";
		}
		$output .= "</thead><tbody><tr>";

		/*MASTER COUNTER*/
		$masterCounter = 0;


		$dynamicDate = mktime(0, 0, 0, $monthPrevious, $daysinprevmonth, $this->curYear);
		$startDay = date('N', $dynamicDate);
		//$startDay--;
		
		if ($startDay != 00) {
				$startDay;
				$blank = $startDay;
				for ($i = 0; $i < $blank; $i++) {
					$output .= "<td></td>";
					$masterCounter++;
				}
			}

		$daycount = 0;
		for ($count = 0; $count < $daysinmonth; $count++) {	
			$daycount++;

			
			if ($masterCounter >= 7) {
				$output .= "</tr><tr>";
				$masterCounter = 0;
			}

			$masterCounter++;	
			
			$output .= "<td><button onClick='popup(" . $daycount . ", " . $this->curMon . ", " . $this->curYear . ")'>" . $daycount . "</button></td>";
			
		}
		if ($masterCounter < 7) {
			$days_left = 7 - $masterCounter;
			for ($i = 0; $i < $days_left; $i++) {
				$output .= "<td></td>";
			}
		}

		$output .= "</tr></tbody></table></section>";
		$output .= "<script src='includes/js/pop_up.js'></script>";


		echo $output; 
	}

	public function getCurDay() {
        return $this->curDay;
    }

    public function setCurDay($x) {
        $this->curDay = $x;
    }

	public function getCurMon() {
        return $this->curMon;
    }

    public function setCurMon($x) {
        $this->curMon = $x;
    }

   	public function getCurYear() {
        return $this->curYear;
    }

    public function setCurYear($x) {
        $this->curYear = $x;
    }
}

?>