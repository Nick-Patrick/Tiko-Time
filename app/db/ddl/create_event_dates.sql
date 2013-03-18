CREATE TABLE IF NOT EXISTS event_dates
(
	event_date_id int(5),
	event_id int(5),
	event_date datetime	
);

ALTER TABLE `event_dates`
   ADD PRIMARY KEY(
     `event_date_id`);

ALTER TABLE `event_dates`
   CHANGE COLUMN event_date_id event_date_id INT(5) UNSIGNED NOT NULL AUTO_INCREMENT;

ALTER TABLE event_dates
	CHANGE COLUMN event_id event_id INT(5) UNSIGNED;

ALTER TABLE event_dates
   ADD CONSTRAINT fk_ev_dates_event_id
   FOREIGN KEY (event_id)
   REFERENCES events(event_id);