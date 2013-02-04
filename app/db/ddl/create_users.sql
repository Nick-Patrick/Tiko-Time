drop table users;

create table users
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
	email varchar(60),
	disabled varchar(1)	
);