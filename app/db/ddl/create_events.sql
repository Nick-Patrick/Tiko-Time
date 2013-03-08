create table IF NOT EXISTS events
(
	event_id int(5),
	name varchar(50),
	description varchar(250),
	time_start datetime,
	time_end datetime,
	type varchar(50),
	status varchar(1),
	location varchar(40)
);