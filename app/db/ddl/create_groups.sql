create table IF NOT EXISTS groups
(
	group_id int(5),
	admin_id int(5),
	name varchar(50),
	group_created datetime
);