DROP TABLE comments;

CREATE TABLE comments
(
	comment_id int(5),
	user_id int(5),
	event_id int(5),
	comment_response_id int(5),
	comment_text varchar(200),
	comment_date datetime,
	disabled varchar(1)	
);