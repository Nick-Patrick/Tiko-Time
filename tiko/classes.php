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
		
		$output = "<h1>" . $months[$this->curMon] . "</h1>";

		$output .= "<table class='calender-tab'><thead>";
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
			
			$output .= "<td><a class='cala' href='" . $daycount . "'>" . $daycount . "</td>";

		}

		if ($masterCounter <= 7) {
			for ($i = 1; $i < $masterCounter; $i++) {
				$output .= "<td></td>";
			}
		}

		$output .= "</tr></tbody></table>";

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