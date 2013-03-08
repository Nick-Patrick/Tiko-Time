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
