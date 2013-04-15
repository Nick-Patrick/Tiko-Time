create table IF NOT EXISTS bug_reports
(
	bug_report_id int(5),
	name varchar(50),
	description varchar(250),
	recipient_name varchar(100),
	recipient_email varchar(150)
);

ALTER TABLE `bug_reports`
   ADD PRIMARY KEY(
     `bug_report_id`);

ALTER TABLE `bug_reports`
    CHANGE COLUMN `bug_report_id` `bug_report_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT;