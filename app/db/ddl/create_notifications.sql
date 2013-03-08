create table IF NOT EXISTS notifications
(
	notification_id int(5),
	notification_timestamp DATETIME,
	user_id int(5),
	event_id int(5),
	status varchar(1),
	has_read varchar(1)
);