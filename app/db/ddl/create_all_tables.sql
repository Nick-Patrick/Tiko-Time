CREATE TABLE IF NOT EXISTS clients
(
	client_id int(5),
	lead_id int(5),
	company_name varchar(50),
	title varchar(5),
	first_name varchar(30),
	last_name varchar(30),
	address1 varchar(50),
	address2 varchar(50),
	address3 varchar(50),
	town varchar(50),
	county varchar(50),
	postcode varchar(10),
	country varchar(50),
	phone varchar(30),
	workphone varchar(30),
	email varchar(60),
	disabled varchar(1)
);

CREATE TABLE IF NOT EXISTS comments
(
	comment_id int(5),
	user_id int(5),
	event_id int(5),
	comment_response_id int(5),
	comment_text varchar(200),
	comment_date datetime,
	disabled varchar(1)	
);

CREATE TABLE IF NOT EXISTS config
(
	user_id int(5),
	config varchar(500)
);

create table IF NOT EXISTS event_client
(
	user_id int(5),
	event_id int(5),
	client_id int(5)
);

CREATE TABLE IF NOT EXISTS event_templates
(
	event_template_id int(5),
	user_id int(5),
	event_template_name varchar(30),
	event_options varchar(200)	
);

create table IF NOT EXISTS events
(
	event_id int(5),
	name varchar(50),
	description varchar(250),
	time_start datetime,
	time_end datetime,
	type varchar(50),
	status varchar(1),
	location varchar(40),
	custom1 varchar(50),
	custom2 varchar(50),
	custom3 varchar(50),
	custom4 varchar(50),
	custom5 varchar(50)
);

create table IF NOT EXISTS group_user
(
	group_user_id int(5),
	group_id int(5),
	user_id int(5),
	account_type int(5)
);

create table IF NOT EXISTS groups
(
	group_id int(5),
	admin_id int(5),
	name varchar(50),
	group_created datetime
);

create table IF NOT EXISTS messages
(
	message_id int(5),
	title varchar(50),
	comment varchar(5000),
	message_timestamp datetime
);

create table IF NOT EXISTS notifications
(
	notification_id int(5),
	notification_timestamp DATETIME,
	user_id int(5),
	event_id int(5),
	status varchar(1),
	has_read varchar(1)
);

create table if not exists user_message
(
	user_message_id int(5),
	message_id int(5),
	user_id int(5),
	status varchar(1)
);


create table IF NOT EXISTS users
(	user_id int(5),
	email varchar(80),
	userpass varchar(300),
	first_name varchar(30),
	last_name varchar(30),
	address1 varchar(50),
	address2 varchar(50),
	address3 varchar(50),
	town varchar(50),
	county varchar(50),
	postcode varchar(10),
	country varchar(50),
	phone varchar(30),
	disabled varchar(1)	
);

CREATE TABLE IF NOT EXISTS events_custom
(
	events_custom_id int(5),
	event_template_id int(5),
	events_name varchar(50),
	event_name_value varchar(250)
);

CREATE TABLE IF NOT EXISTS event_dates
(
	event_date_id int(5),
	event_id int(5),
	event_date datetime	
);
