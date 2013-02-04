drop table notifications;

create table notifications
(
	notification_id int(5),
	notification_timestamp timestamp,
	user_id int(5),
	event_id int(5),
	status varchar(1),
	read varchar(1)
);