DROP TABLE event_templates;

CREATE TABLE event_templates
(
	event_template_id int(5),
	user_id int(5),
	event_template_name varchar(30),
	event_options varchar(200)	
);