-- Drop date columns from events table.

ALTER TABLE events
DROP COLUMN time_start;

ALTER TABLE events 
DROP COLUMN time_end;