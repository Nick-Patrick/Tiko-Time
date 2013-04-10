## Alter constraints to give primary keys

## Clients ##

ALTER TABLE `clients`
   ADD PRIMARY KEY(
     `client_id`);

ALTER TABLE `clients`
    CHANGE COLUMN `client_id` `client_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT;

###################

## Comments ##

ALTER TABLE `comments`
   ADD PRIMARY KEY(
     `comment_id`);

ALTER TABLE `comments`
    CHANGE COLUMN `comment_id` `comment_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT;

###################


## Config ##

ALTER TABLE `config`
   ADD PRIMARY KEY(
     `user_id`);

ALTER TABLE `config`
    CHANGE COLUMN `user_id` `user_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT;

###################

## Events ##

ALTER TABLE `events`
   ADD PRIMARY KEY(
     `event_id`);

ALTER TABLE `events`
    CHANGE COLUMN `event_id` `event_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT;

###################

## Events Custom ##

ALTER TABLE `events_custom`
   ADD PRIMARY KEY(
     `events_custom_id`);

ALTER TABLE `events_custom`
    CHANGE COLUMN `events_custom_id` `events_custom_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT;

###################

## Event Client ##

ALTER TABLE `event_client`
   ADD PRIMARY KEY(
     `user_id`);

ALTER TABLE `event_client`
    CHANGE COLUMN `user_id` `user_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT;

###################

## Event Templates ##

ALTER TABLE `event_templates`
   ADD PRIMARY KEY(
     `event_template_id`);

ALTER TABLE `event_templates`
    CHANGE COLUMN `event_template_id` `event_template_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT;

###################

## Groups ##

ALTER TABLE `groups`
   ADD PRIMARY KEY(
     `group_id`);

ALTER TABLE `groups`
    CHANGE COLUMN `group_id` `group_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT;

###################

## Group User ##

ALTER TABLE `group_user`
   ADD PRIMARY KEY(
     `group_user_id`);

ALTER TABLE `group_user`
    CHANGE COLUMN `group_user_id` `group_user_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT;

###################

## Messages ##

ALTER TABLE `messages`
   ADD PRIMARY KEY(
     `message_id`);

ALTER TABLE `messages`
    CHANGE COLUMN `message_id` `message_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT;

###################

## Notifications ##

ALTER TABLE `notifications`
   ADD PRIMARY KEY(
     `notification_id`);

ALTER TABLE `notifications`
    CHANGE COLUMN `notification_id` `notification_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT;

###################

## Users ##

ALTER TABLE `users`
   ADD PRIMARY KEY(
     `user_id`);

ALTER TABLE `users`
    CHANGE COLUMN `user_id` `user_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT;

###################

## User Message ##

ALTER TABLE `user_message`
   ADD PRIMARY KEY(
     `user_message_id`);

ALTER TABLE `user_message`
    CHANGE COLUMN `user_message_id` `user_message_id` INT(5) UNSIGNED NOT NULL AUTO_INCREMENT;

###################





###################

#Alter foreign keys to unsigned and not null when required

## Comments ##

ALTER TABLE comments
    CHANGE COLUMN user_id user_id INT(5) UNSIGNED NOT NULL;

ALTER TABLE comments
    CHANGE COLUMN event_id event_id INT(5) UNSIGNED;

ALTER TABLE comments
    CHANGE COLUMN comment_response_id comment_response_id INT(5) UNSIGNED;

## Events Custom ##

ALTER TABLE events_custom
	CHANGE COLUMN event_template_id event_template_id INT(5) UNSIGNED NOT NULL;

## Event Client ##

ALTER TABLE event_client
	CHANGE COLUMN event_id event_id INT(5) UNSIGNED NOT NULL;

ALTER TABLE event_client
	CHANGE COLUMN client_id client_id INT(5) UNSIGNED;

## EVENT TEMPLATES ##

ALTER TABLE event_templates
	CHANGE COLUMN user_id user_id INT(5) UNSIGNED NOT NULL;

## GROUPS ##

ALTER TABLE groups
	CHANGE COLUMN admin_id admin_id INT(5) UNSIGNED;

## GROUP USER ##

ALTER TABLE group_user
	CHANGE COLUMN group_id group_id INT(5) UNSIGNED NOT NULL;

ALTER TABLE group_user
	CHANGE COLUMN user_id user_id INT(5) UNSIGNED NOT NULL;

ALTER TABLE group_user
	CHANGE COLUMN account_type account_type INT(5) UNSIGNED;

## NOTIFICATIONS ##

ALTER TABLE notifications
	CHANGE COLUMN user_id user_id INT(5) UNSIGNED NOT NULL;

ALTER TABLE notifications
	CHANGE COLUMN event_id event_id INT(5) UNSIGNED;

ALTER TABLE user_message
	CHANGE COLUMN message_id message_id INT(5) UNSIGNED NOT NULL;

ALTER TABLE user_message
	CHANGE COLUMN user_id user_id INT(5) UNSIGNED;

###################

#Alter constraints to add foreign keys

## Comments ##

ALTER TABLE comments
   ADD CONSTRAINT fk_comments_user_id
   FOREIGN KEY (user_id)
   REFERENCES users(user_id);

ALTER TABLE comments
	ADD CONSTRAINT fk_comments_event_id
	FOREIGN KEY (event_id)
	REFERENCES events(event_id);

## Events Custom ##

ALTER TABLE events_custom
	ADD CONSTRAINT fk_events_event_template_id
	FOREIGN KEY (event_template_id)
	REFERENCES event_templates (event_template_id);

## Groups ##

ALTER TABLE groups
	ADD CONSTRAINT fk_groups_admin_id
	FOREIGN KEY (admin_id)
	REFERENCES users(user_id);

## Group User ##

ALTER TABLE group_user
	ADD CONSTRAINT fk_group_user_group_id
	FOREIGN KEY (group_id)
	REFERENCES groups(group_id);

ALTER TABLE group_user
	ADD CONSTRAINT fk_group_user_user_id
	FOREIGN KEY (user_id)
	REFERENCES users(user_id);

## Notifications ##

ALTER TABLE notifications
	ADD CONSTRAINT fk_notifications_user_id
	FOREIGN KEY (user_id)
	REFERENCES users(user_id);

ALTER TABLE notifications
	ADD CONSTRAINT fk_notifications_event_id
	FOREIGN KEY (event_id)
	REFERENCES events(event_id);

## User Message ##

ALTER TABLE user_message
	ADD CONSTRAINT fk_user_message_message_id
	FOREIGN KEY (message_id)
	REFERENCES messages(message_id);

ALTER TABLE user_message
	ADD CONSTRAINT fk_user_message_user_id
	FOREIGN KEY (user_id)
	REFERENCES users(user_id);



###################

## Event Dates - Primary and Foreign Keys ##

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

#######################

