-- Make columns nullable.

ALTER TABLE event_templates
  CHANGE COLUMN user_id user_id INT(5) UNSIGNED null;


 insert into event_dates
 	values
 	(8,1, DATE_ADD('1990-01-01 01:02:02',INTERVAL 2 DAY));
