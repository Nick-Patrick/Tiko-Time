alter table events
ADD user_id int(5)
UNSIGNED;

ALTER TABLE events
	ADD CONSTRAINT fk_events_user_id
	FOREIGN KEY (user_id)
	REFERENCES users(user_id);