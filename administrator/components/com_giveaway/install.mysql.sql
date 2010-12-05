CREATE TABLE `#__giveaway_attendee` (
	`attendee_id` SERIAL,
	`name` VARCHAR(255),
	`email` VARCHAR(255),
	PRIMARY KEY(`attendee_id`)
);

CREATE TABLE `#__giveaway_swag` (
	`swag_id` SERIAL,
	`attendee_id` INT(11),
	`name` VARCHAR(255),
	PRIMARY KEY(`swag_id`)
);

