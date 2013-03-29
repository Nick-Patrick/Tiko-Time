<?php

include_once 'fn_mysql_connect.php';
$error = "<p>Ohh NOOO, An error occured :(</p>";

class calendar {
	private $curDay;
	private $curMon;
	private $curYear;
	private $currentDate;

	private $error = "<p>Ohh NOOO, An error occured :(</p>";
	private $event_template_id;


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
		if ($monthPrevious == 0) {
			$monthPrevious = 12;
			$yearPrevious = $this->curYear - 1;
		} else {
			$yearPrevious = $this->curYear;
		}


		$daysinprevmonth = cal_days_in_month(CAL_GREGORIAN, $monthPrevious, $yearPrevious);
	
		$output = "<section class='calendar-top'>";
		$output .= "<h2>" . $months[$this->curMon] . " " . $this->curYear . "</h2>";

		$output .= "</section><section class='calendar-main'>";

		$output .= "<table class='calendar-tab'><thead>";
		foreach ($days as $day) {
			$output .= "<th>" . $day . "</th>";
		}
		$output .= "</thead><tbody><tr>";

		/*MASTER COUNTER*/
		$masterCounter = 0;


		$dynamicDate = mktime(0, 0, 0, $monthPrevious, $daysinprevmonth, $yearPrevious);
		$startDay = date('N', $dynamicDate);
		//$startDay--;
		
		if ($startDay != 0) {
				$startDay;
				$blank = $startDay;
				if ($blank != 7) {
					for ($i = 0; $i < $blank; $i++) {
						$output .= "<td></td>";
						$masterCounter++;
					}
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
			
			$output .= "<td><button class='calendar-day' name='1234' rel='" . $this->curMon . "," . $this->curYear . "'>" . $daycount . "<span></span></button></td>";
			//onClick='popup(" . $daycount . ", " . $this->curMon . ", " . $this->curYear . ")'
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

	public function getCustomEvents($user_id) {
		$result = mysql_query("SELECT * FROM event_templates WHERE user_id = '" . mysql_real_escape_string($user_id) . "' OR user_id IS null");
		if (mysql_num_rows($result) > 0) {
			$output = "<select id='event_type'>";
			$output .= "<option selected='selected'>Please Select</option>";
			while ($row = mysql_fetch_array($result)) {
				$output .= "<option value='" . $row['event_template_id'] . "'>" . $row['event_template_name'] . "</option>";
			}
			$output .= "</select>";
			$output .= "<script src='includes/js/fn_load_event_form.js'></script>";
		} else {
			$output = $this->error;
		}
		echo $output;
	}

	public function getEventForm($event_template_id) { 
		$hours = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24);
		$minutes = array(0, 5, 10, 15, 20, 25, 30, 35, 40, 45, 50, 55);

		$result = mysql_query("SELECT event_options FROM event_templates WHERE event_template_id = '" . mysql_real_escape_string($event_template_id) . "'");
		$string = mysql_result($result, 0);
		if (mysql_num_rows($result) > 0) {
			$output = "<ul>";
			$output .= "<li><label for='name'>Name:</label><input type='text' id='new_event_name' name='name'></li>";
			$output .= "<li><label for='description'>Description:</label><textarea name='description' id='new_event_desc'></textarea></li>";
			$output .= "<li><label for='time_start'>Time Start:</label><span>Hours</span><select id='new_event_time_start_hours' name='time_start_hours'>";
			foreach ($hours as $hour) {
				$output .= "<option value='" . $hour . "'>" . $hour . "</option>";
			}
			$output .= "</select><span>Minutes:</span><select id='new_event_time_start_mins' name='time_start_mins'>";
			foreach ($minutes as $mins) {
				$output .= "<option value='" . $mins . "'>" . $mins . "</option>";
			}
			$output .= "</select></li>";
			$output .= "<li><label for='time_end'>Time End:</label><span>Hours</span><select id='new_event_time_end_hours' name='time_start_end'>";
			foreach ($hours as $hour) {
				$output .= "<option value='" . $hour . "'>" . $hour . "</option>";
			}
			$output .= "</select><span>Minutes:</span><select id='new_event_time_end_mins' name='time_end_mins'>";
			foreach ($minutes as $mins) {
				$output .= "<option value='" . $mins . "'>" . $mins . "</option>";
			}
			$output .= "</select><a href='' class='event_end_calendar'>Later date</a></li>";
			$output .= "<li><input type='hidden' name='type' value='' id='new_event_type'></li>";
			$output .= "<li><label for='location'>Location:</label><input type='text' id='new_event_location' name='location'></li>";

			$array = explode(",", $string);
			$i = 0;
			foreach ($array as &$res) {
				$i++;
				$output .= "<li><label for='=time_end'>" . $res . ":</label><input type='text' name='custom_" . $i . "'></li>";
			}
			$output .= "<li><label for='create_event'></label><button id='create_event_button'>Create</button></li>";
			$output .= "</ul>";
			$output .= "<script src='includes/js/fn_insert_event.js'></script>";
		} else {
			$output = $this->error;
		}
		return $output;
	}

	public function getEventsByDay($date) {
		$mysqldate = date('Y-m-d', strtotime($date));
		$result = mysql_query("SELECT * FROM events WHERE date(time_start) = '" . $mysqldate . "'");
		if (mysql_num_rows($result) > 0) {
			$output = "<h4>Planned Events</h4><ul>";
			while ($row = mysql_fetch_array($result)) {
				$datetime = new DateTime($row['time_start']);
				$time = $datetime->format('H:i');
				$output .= "<li><a href=''><span class='calendar-event-time'>" . $time . "</span><span class='calendar-event-icon'><img src='includes/images/icons/plane-icon.png'></span>" . $row['name'] . "</a></li>";
			}
			$output .= "</ul>";
		} else {
			$output = "Currently no events planned";
		}
		return $output;
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

class client {
	private $client_id; //int(5),
	private $lead_id; //int(5),
	private $company_name; //varchar(50),
	private $title; //varchar(5),
	private $first_name; //varchar(30),
	private $last_name; //varchar(30),
	private $address1; //varchar(50),
	private $address2; //varchar(50),
	private $address3; //varchar(50),
	private $town; //varchar(50),
	private $county; //varchar(50),
	private $postcode; //varchar(10),
	private $country; //varchar(50),
	private $phone; //varchar(30), workphone?
	private $email; //varchar(60),
	private $disabled; //varchar(1),

	function __construct($client_id, $lead_id, $company_name, $title, $first_name, $last_name, $address1, $address2, $address3, $town, $county, $postcode, $country, $phone, $email, $disabled) {
		$this->client_id = mysql_real_escape_string($client_id);
		$this->lead_id = mysql_real_escape_string($lead_id);
		$this->company_name = mysql_real_escape_string($company_name);
		$this->title = mysql_real_escape_string($title);
		$this->first_name = mysql_real_escape_string($first_name);
		$this->last_name = mysql_real_escape_string($last_namg);
		$this->address1 = mysql_real_escape_string($address1);
		$this->address2 = mysql_real_escape_string($address2);
		$this->address3 = mysql_real_escape_string($address3);
		$this->town = mysql_real_escape_string($town);
		$this->county = mysql_real_escape_string($county);
		$this->postcode = mysql_real_escape_string($postcod);
		$this->country = mysql_real_escape_string($country);
		$this->phone = mysql_real_escape_string($phone);
		$this->email = mysql_real_escape_string($email);
		$this->disabled = mysql_real_escape_string($disabled);
	}

	public function insert() {
		$result = mysql_query("INSERT INTO clients VALUES (null, '$this->lead_id', '$this->company_name', '$this->title', '$this->first_name', '$this->last_name', '$this->address1', '$this->address2', '$this->address3', '$this->town', '$this->county', '$this->postcode', '$this->country', '$this->phone', '$this->email', '$this->disabled')");
		if ($result) {
			return true;
		} else {
			return false;
		}
	}

	public function disable() {
		$result = mysql_query("UPDATE clients SET disabled='y' WHERE client_id='$this->client_id'");
		if ($result) {
			return true;
		} else {
			return false;
		}
	}

    public function setClient_id($x) {
        $this->client_id = mysql_real_escape_string($x);
    }

	public function getClient_id() {
        return $this->client_id;
    }

    public function setLead_id($x) {
        $this->lead_id = mysql_real_escape_string($x);
    }

	public function getLead_id() {
        return $this->lead_id;
    }

    public function setCompany_name($x) {
        $this->company_name = mysql_real_escape_string($x);
    }

	public function getCompany_name() {
        return $this->company_name;
    }

    public function setTitle($x) {
        $this->title = mysql_real_escape_string($x);
    }

	public function getTitle() {
        return $this->title;
    }

    public function setFirst_name($x) {
        $this->first_name = mysql_real_escape_string($x);
    }

	public function getFirst_name() {
        return $this->first_name;
    }

    public function setLast_name($x) {
        $this->last_name = mysql_real_escape_string($x);
    }

	public function getLast_name() {
        return $this->last_name;
    }

    public function setAddress1($x) {
        $this->address1 = mysql_real_escape_string($x);
    }

	public function getAddress1() {
        return $this->address1;
    }

    public function setAddress2($x) {
        $this->address2 = mysql_real_escape_string($x);
    }

	public function getAddress2() {
        return $this->address2;
    }

    public function setAddress3($x) {
        $this->address3 = mysql_real_escape_string($x);
    }

	public function getAddress3() {
        return $this->address3;
    }

    public function setTown($x) {
        $this->town = mysql_real_escape_string($x);
    }

	public function getTown() {
        return $this->town;
    }

    public function setCounty($x) {
        $this->county = mysql_real_escape_string($x);
    }

	public function getCounty() {
        return $this->county;
    }

    public function setPostcode($x) {
        $this->postcode = mysql_real_escape_string($x);
    }

	public function getPostcode() {
        return $this->postcode;
    }

    public function setCountry($x) {
        $this->country = mysql_real_escape_string($x);
    }

	public function getCountry() {
        return $this->country;
    }

    public function setPhone($x) {
        $this->phone = mysql_real_escape_string($x);
    }

	public function getPhone() {
        return $this->phone;
    }

    public function setEmail($x) {
        $this->email = mysql_real_escape_string($x);
    }

	public function getEmail() {
        return $this->email;
    }

    public function setDisabled($x) {
        $this->disabled = mysql_real_escape_string($x);
    }

	public function getDisabled() {
        return $this->disabled;
    }
}

class event {
	private $event_id; //int(5),
	private $name; //varchar(50),
	private $description; //varchar(250),
	private $time_start; //datetime,
	private $time_end; //datetime,
	private $type; //varchar(50),
	private $status; //varchar(1),
	private $location; //varchar(40)
	private $custom1;
	private $custom2;
	private $custom3;
	private $custom4;
	private $custom5;

	function __construct($event_id, $name, $description, $time_start, $time_end, $type, $status, $location, $custom1, $custom2, $custom3, $custom4, $custom5) {
		$this->event_id = mysql_real_escape_string($event_id);
		$this->name = mysql_real_escape_string($name);
		$this->description = mysql_real_escape_string($description);
		$this->time_start = mysql_real_escape_string($time_start);
		$this->time_end = mysql_real_escape_string($time_end);
		$this->type = mysql_real_escape_string($type);
		$this->status = mysql_real_escape_string($status);
		$this->location = mysql_real_escape_string($location);
		$this->custom1 = mysql_real_escape_string($custom1);
		$this->custom2 = mysql_real_escape_string($custom2);
		$this->custom3 = mysql_real_escape_string($custom3);
		$this->custom4 = mysql_real_escape_string($custom4);
		$this->custom5 = mysql_real_escape_string($custom5);
	}

	public function create() {
		if ($this->custom1 != 'null') {
			if ($this->custom2 != 'null') {
				if ($this->custom3 != 'null') {
					if ($this->custom4 != 'null') {
						if ($this->custom5 != 'null') {
							$result = mysql_query("INSERT INTO events VALUES (null, '$this->name', '$this->description', '$this->time_start', '$this->time_end', '$this->type', '$this->status', '$this->location', $this->custom1, $this->custom2, $this->custom3, $this->custom4, $this->custom5)");
						} else {
							$result = mysql_query("INSERT INTO events VALUES (null, '$this->name', '$this->description', '$this->time_start', '$this->time_end', '$this->type', '$this->status', '$this->location', $this->custom1, $this->custom2, $this->custom3, $this->custom4, null)");
						}
					} else {
						$result = mysql_query("INSERT INTO events VALUES (null, '$this->name', '$this->description', '$this->time_start', '$this->time_end', '$this->type', '$this->status', '$this->location', $this->custom1, $this->custom2, $this->custom3, null, null)");
					}
				} else {
					$result = mysql_query("INSERT INTO events VALUES (null, '$this->name', '$this->description', '$this->time_start', '$this->time_end', '$this->type', '$this->status', '$this->location', $this->custom1, $this->custom2, null, null, null)");
				}
			} else {
				$result = mysql_query("INSERT INTO events VALUES (null, '$this->name', '$this->description', '$this->time_start', '$this->time_end', '$this->type', '$this->status', '$this->location', '$this->custom1', null, null, null, null)");
			}
		} else {
			$result = mysql_query("INSERT INTO events VALUES (null, '$this->name', '$this->description', '$this->time_start', '$this->time_end', '$this->type', '$this->status', '$this->location', null, null, null, null, null)");
		}
		return $result;
	}

	public function insertBetweenDates($date) {
		$id = mysql_query("SELECT SCOPE_IDENTITY()");
		$result = mysql_query("INSERT INTO event_dates VALUES (null, $id, $date)");
		////////////////////////////////////////
	}

	public function getEventDetails() {
		$result = mysql_query("SELECT * FROM events WHERE event_id = '$this->event_id'");
		if (mysql_num_rows($result) > 0) {
			$output = "";
			
		}
	}

    public function setEvent_id($x) {
        $this->event_id = mysql_real_escape_string($x);
    }

	public function getEvent_id() {
        return $this->event_id;
    }

    public function setName($x) {
        $this->name = mysql_real_escape_string($x);
    }

	public function getName() {
        return $this->name;
    }

    public function setDescription($x) {
        $this->description = mysql_real_escape_string($x);
    }

	public function getDescription() {
        return $this->description;
    }

    public function setTime_start($x) {
        $this->time_start = mysql_real_escape_string($x);
    }

	public function getTime_start() {
        return $this->time_start;
    }

    public function setTime_end($x) {
        $this->time_end = mysql_real_escape_string($x);
    }

	public function getTime_end() {
        return $this->time_end;
    }

    public function setType($x) {
        $this->type = mysql_real_escape_string($x);
    }

	public function getType() {
        return $this->type;
    }

    public function setStatus($x) {
        $this->status = mysql_real_escape_string($x);
    }

	public function getStatus() {
        return $this->status;
    }

    public function setLocation($x) {
        $this->location = mysql_real_escape_string($x);
    }

	public function getLocation() {
        return $this->location;
    }
}

class users {
/*	user_id int(5),
+	email varchar(80),
+	userpass varchar(300),
title?
+	first_name varchar(30),
+	last_name varchar(30),
+	address1 varchar(50),
+	address2 varchar(50),
+	address3 varchar(50),
+	town varchar(50),
+	county varchar(50),
+	postcode varchar(10),
+	country varchar(50),
+	phone varchar(30),
mobile?
+	disabled varchar(1)*/
	private $user_id; //int(5),
	private $email; //varchar(80),
	private $userpass; //varchar(300),
	private $title; //varchar(5),
	private $first_name; //varchar(30),
	private $last_name; //varchar(30),
	private $address1; //varchar(50),
	private $address2; //varchar(50),
	private $address3; //varchar(50),
	private $town; //varchar(50),
	private $county; //varchar(50),
	private $postcode; //varchar(10),
	private $country; //varchar(50),
	private $phone; //varchar(30),
	private $disabled; //varchar(1),

	function __construct($user_id, $email, $title, $userpass, $first_name, $last_name, $address1, $address2, $address3, $town, $county, $postcode, $country, $phone, $disabled) {
		$this->user_id = mysql_real_escape_string($user_id);
		$this->email = mysql_real_escape_string($email);
		$this->title = mysql_real_escape_string($title);
		$this->userpass = mysql_real_escape_string($userpass);
		$this->first_name = mysql_real_escape_string($first_name);
		$this->last_name = mysql_real_escape_string($last_namg);
		$this->address1 = mysql_real_escape_string($address1);
		$this->address2 = mysql_real_escape_string($address2);
		$this->address3 = mysql_real_escape_string($address3);
		$this->town = mysql_real_escape_string($town);
		$this->county = mysql_real_escape_string($county);
		$this->postcode = mysql_real_escape_string($postcod);
		$this->country = mysql_real_escape_string($country);
		$this->phone = mysql_real_escape_string($phone);
		$this->disabled = mysql_real_escape_string($disabled);
	}

	public function insert() {
		$result = mysql_query("INSERT INTO users VALUES (null, '$this->user_id', '$this->email', '$this->userpass', '$this->title', '$this->first_name', '$this->last_name', '$this->address1', '$this->address2', '$this->address3', '$this->town', '$this->county', '$this->postcode', '$this->country', '$this->phone', '$this->disabled')");
		if ($result) {
			return true;
		} else {
			return false;
		}
	}

	public function disable() {
		$result = mysql_query("UPDATE users SET disabled='y' WHERE client_id='$this->user_id'");
		if ($result) {
			return true;
		} else {
			return false;
		}
	}

    public function setUser_id($x) {
        $this->user_id = mysql_real_escape_string($x);
    }

	public function getUser_id() {
        return $this->user_id;
    }

    public function setEmail($x) {
        $this->email = mysql_real_escape_string($x);
    }

	public function getEmail() {
        return $this->email;
    }

    public function setUserpass($x) {
        $this->userpass = mysql_real_escape_string($x);
    }

	public function getUserpass() {
        return $this->userpass;
    }

    public function setTitle($x) {
        $this->title = mysql_real_escape_string($x);
    }

	public function getTitle() {
        return $this->title;
    }

    public function setFirst_name($x) {
        $this->first_name = mysql_real_escape_string($x);
    }

	public function getFirst_name() {
        return $this->first_name;
    }

    public function setLast_name($x) {
        $this->last_name = mysql_real_escape_string($x);
    }

	public function getLast_name() {
        return $this->last_name;
    }

    public function setAddress1($x) {
        $this->address1 = mysql_real_escape_string($x);
    }

	public function getAddress1() {
        return $this->address1;
    }

    public function setAddress2($x) {
        $this->address2 = mysql_real_escape_string($x);
    }

	public function getAddress2() {
        return $this->address2;
    }

    public function setAddress3($x) {
        $this->address3 = mysql_real_escape_string($x);
    }

	public function getAddress3() {
        return $this->address3;
    }

    public function setTown($x) {
        $this->town = mysql_real_escape_string($x);
    }

	public function getTown() {
        return $this->town;
    }

    public function setCounty($x) {
        $this->county = mysql_real_escape_string($x);
    }

	public function getCounty() {
        return $this->county;
    }

    public function setPostcode($x) {
        $this->postcode = mysql_real_escape_string($x);
    }

	public function getPostcode() {
        return $this->postcode;
    }

    public function setCountry($x) {
        $this->country = mysql_real_escape_string($x);
    }

	public function getCountry() {
        return $this->country;
    }

    public function setPhone($x) {
        $this->phone = mysql_real_escape_string($x);
    }

	public function getPhone() {
        return $this->phone;
    }

    public function setDisabled($x) {
        $this->disabled = mysql_real_escape_string($x);
    }

	public function getDisabled() {
        return $this->disabled;
    }
}

class messages {
	private $message_id; //int(5),
	private $subject; //varchar(50),
	private $comment; //varchar(5000),
	private $message_timestamp; //datetime

	function __construct($message_id, $subject, $comment, $message_timestamp) {
		$this->message_id = mysql_real_escape_string($message_id);
		$this->subject = mysql_real_escape_string($subject);
		$this->comment = mysql_real_escape_string($comment);
		$this->message_timestamp = mysql_real_escape_string($message_timestamp);
	}

	public function insert() {
		$result = mysql_query("INSERT INTO messages VALUES (null, '$this->subject', '$this->comment', '$this->message_timestamp')");
		if ($result) {
			return true;
		} else {
			return false;
		}
	}

    public function setMessage_id($x) {
        $this->message_id = mysql_real_escape_string($x);
    }

	public function getMessage_id() {
        return $this->message_id;
    }

    public function setSubject($x) {
        $this->subject = mysql_real_escape_string($x);
    }

	public function getSubject() {
        return $this->subject;
    }

    public function setComment($x) {
        $this->comment = mysql_real_escape_string($x);
    }

	public function getComment() {
        return $this->comment;
    }

    public function setMessage_timestamp($x) {
        $this->message_timestamp = mysql_real_escape_string($x);
    }

	public function getMessage_timestamp() {
        return $this->message_timestamp;
    }
}

class comments {
	private $comment_id; //int(5),
	private $user_id; //int(5),
	private $event_id; //int(5),
	private $comment_response_id; //int(5),
	private $comment_text; //varchar(200),
	private $comment_date; //datetime,
	private $disabled; //varchar(1)	

	function __construct($comment_id, $user_id, $event_id, $comment_response_id, $comment_text, $comment_date, $disabled) {
		$this->comment_id = mysql_real_escape_string($comment_id);
		$this->user_id = mysql_real_escape_string($user_id);
		$this->event_id = mysql_real_escape_string($event_id);
		$this->comment_response_id = mysql_real_escape_string($comment_response_id);
		$this->comment_text = mysql_real_escape_string($comment_text);
		$this->comment_date = mysql_real_escape_string($comment_date);
		$this->disabled = mysql_real_escape_string($disabled);
	}

    public function setComment_id($x) {
        $this->comment_id = mysql_real_escape_string($x);
    }

	public function getComment_id() {
        return $this->comment_id;
    }

    public function setUser_id($x) {
        $this->user_id = mysql_real_escape_string($x);
    }

	public function getUser_id() {
        return $this->user_id;
    }

    public function setEvent_id($x) {
        $this->event_id = mysql_real_escape_string($x);
    }

	public function getEvent_id() {
        return $this->event_id;
    }

    public function setComment_response_id($x) {
        $this->comment_response_id = mysql_real_escape_string($x);
    }

	public function getComment_response_id() {
        return $this->comment_response_id;
    }

    public function setComment_text($x) {
        $this->comment_text = mysql_real_escape_string($x);
    }

	public function getComment_text() {
        return $this->comment_text;
    }

    public function setComment_date($x) {
        $this->comment_date = mysql_real_escape_string($x);
    }

	public function getComment_date() {
        return $this->comment_date;
    }

    public function setDisabled($x) {
        $this->disabled = mysql_real_escape_string($x);
    }

	public function getDisabled() {
        return $this->disabled;
    }
}

class notifications {
	private $notification_id; //int(5),
	private $notification_timestamp; //timestamp, DO WE WANNA CHANGE THIS TO DATETIME
	private $user_id; //int(5),
	private $event_id; //int(5),
	private $status; //varchar(1),
	private $has_read; //varchar(1)

	function __construct($notification_id, $notification_timestamp, $user_id, $event_id, $status, $read) {
	$this->notification_id = mysql_real_escape_string($notification_id);
	$this->notification_timestamp = mysql_real_escape_string($notification_timestamp);
	$this->user_id = mysql_real_escape_string($user_id);
	$this->event_id = mysql_real_escape_string($event_id);
	$this->status = mysql_real_escape_string($status);
	$this->has_read = mysql_real_escape_string($has_read);
	}

    public function setNotification_id($x) {
        $this->notification_id = mysql_real_escape_string($x);
    }

	public function getNotifcation_id() {
        return $this->notification_id;
    }

    public function setNotification_timestamp($x) {
        $this->notification_timestamp = mysql_real_escape_string($x);
    }

	public function getNotifcation_timestamp() {
        return $this->notification_timestamp;
    }

    public function setUser_id($x) {
        $this->user_id = mysql_real_escape_string($x);
    }

	public function getUser_id() {
        return $this->user_id;
    }

    public function setEvent_id($x) {
        $this->event_id = mysql_real_escape_string($x);
    }

	public function getEvent_id() {
        return $this->event_id;
    }

    public function setStatus($x) {
        $this->status = mysql_real_escape_string($x);
    }

	public function getStatus() {
        return $this->status;
    }

    public function setHasRead($x) {
        $this->has_read = mysql_real_escape_string($x);
    }

	public function getHasRead() {
        return $this->has_read;
    }
}

class groups {
	private $group_id; //int(5),
	private $admin_id; //int(5),
	private $name; //varchar(50)
	private $group_created; // ADD THIS INTO THE TABLE

	function __construct($group_id, $admin_id, $name, $group_created) {
		$this->group_id = mysql_real_escape_string($group_id);
		$this->admin_id = mysql_real_escape_string($admin_id);
		$this->name = mysql_real_escape_string($name);
		$this->group_created = mysql_real_escape_string($group_created);	
	}

	public function insert() {
		$result = mysql_query("INSERT INTO groups VALUES (null, '$this->admin_id', '$this->name', '$this->group_created')");
		if ($result) {
			return true;
		} else {
			return false;
		}
	}

    public function setGroup_id($x) {
        $this->group_id = mysql_real_escape_string($x);
    }

	public function getGroup_id() {
        return $this->group_id;
    }

    public function setAdmin_id($x) {
        $this->admin_id = mysql_real_escape_string($x);
    }

	public function getAdmin_id() {
        return $this->admin_id;
    }

    public function setName($x) {
        $this->name = mysql_real_escape_string($x);
    }

	public function getName() {
        return $this->name;
    }
}

?>