CREATE TABLE
IF
	NOT EXISTS `users` (
		`id` INT NOT NULL AUTO_INCREMENT,
		`name` VARCHAR ( 60 ) NOT NULL,
		`surname` VARCHAR ( 60 ) NOT NULL,
		`email` VARCHAR ( 60 ) NOT NULL,
		`phone` VARCHAR ( 20 ) NOT NULL,
		PRIMARY KEY ( `id` ) 
	);
CREATE TABLE
IF
	NOT EXISTS `clients` (
		`id` INT NOT NULL,
		`name` VARCHAR ( 60 ) NOT NULL,
		`surname` VARCHAR ( 60 ) NOT NULL,
		`email` VARCHAR ( 60 ) NOT NULL,
		`phone` VARCHAR ( 20 ) NOT NULL,
		`age` INT NOT NULL,
		`security_number` VARCHAR ( 0 ) NOT NULL,
		`birthdate` date NOT NULL 
	);
CREATE TABLE
IF
	NOT EXISTS `files` (
		`id` INT NOT NULL AUTO_INCREMENT,
		`published_by_id` INT NOT NULL,
		`published_by_name` VARCHAR ( 60 ) NOT NULL,
		`about_client_id` INT NOT NULL,
		`about_client_name` VARCHAR ( 60 ) NOT NULL,
		`creation_date` datetime NOT NULL,
		`modification_date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
		`path_to_file` VARCHAR ( 255 ) NOT NULL,
		`title` VARCHAR ( 255 ) NOT NULL,
		`job` INT ( 11 ) NOT NULL,
		`tag` INT ( 11 ) NOT NULL,
		`categorie` INT ( 11 ) NOT NULL,
		PRIMARY KEY ( `id` ) 
	);
CREATE TABLE
IF
	NOT EXISTS `tags` ( `id` INT ( 11 ) NOT NULL AUTO_INCREMENT, `tag_name` VARCHAR ( 255 ) NOT NULL, PRIMARY KEY ( `id` ) );
CREATE TABLE
IF
	NOT EXISTS `categories` ( `id` INT ( 11 ) NOT NULL AUTO_INCREMENT, `category_name` VARCHAR ( 255 ) NOT NULL, PRIMARY KEY ( `id` ) );
CREATE TABLE
IF
	NOT EXISTS `jobs` (
		`id` INT ( 11 ) NOT NULL AUTO_INCREMENT,
		`job_id` INT ( 11 ) NOT NULL,
		`job_name` VARCHAR ( 255 ) NOT NULL,
		`section_id` INT ( 11 ) NOT NULL,
		`section_name` VARCHAR ( 255 ) NOT NULL,
		PRIMARY KEY ( `id` ) 
	);
CREATE TABLE
IF
	NOT EXISTS `sections` ( `id` INT ( 11 ) NOT NULL AUTO_INCREMENT, `section_name` VARCHAR ( 255 ) NOT NULL, PRIMARY KEY ( `id` ) );
CREATE TABLE
IF
	NOT EXISTS `jobs_titles` ( `id` INT ( 11 ) NOT NULL AUTO_INCREMENT, `job_name` VARCHAR ( 255 ) NOT NULL, PRIMARY KEY ( `id` ) );
ALTER TABLE `clients` ADD CONSTRAINT `id` FOREIGN KEY ( `id` ) REFERENCES `users` ( `id` );
ALTER TABLE `clients` ADD CONSTRAINT `name` FOREIGN KEY ( `name` ) REFERENCES `users` ( `name` );
ALTER TABLE `clients` ADD CONSTRAINT `surname` FOREIGN KEY ( `surname` ) REFERENCES `users` ( `surname` );
ALTER TABLE `clients` ADD CONSTRAINT `email` FOREIGN KEY ( `email` ) REFERENCES `users` ( `email` );
ALTER TABLE `clients` ADD CONSTRAINT `phone` FOREIGN KEY ( `phone` ) REFERENCES `users` ( `phone` );
ALTER TABLE `files` ADD CONSTRAINT `published_by_name` FOREIGN KEY ( `name` ) REFERENCES `users` ( `name` );
ALTER TABLE `files` ADD CONSTRAINT `published_by_id` FOREIGN KEY ( `id` ) REFERENCES `users` ( `id` );
ALTER TABLE `files` ADD CONSTRAINT `about_client_name` FOREIGN KEY () REFERENCES `users` ( `name` );
ALTER TABLE `files` ADD CONSTRAINT `about_client_id` FOREIGN KEY () REFERENCES `users` ( `id` );
ALTER TABLE `jobs` ADD CONSTRAINT `job_name` FOREIGN KEY () REFERENCES `jobs_titles` ( `job_name` );
ALTER TABLE `jobs` ADD CONSTRAINT `job_id` FOREIGN KEY () REFERENCES `jobs_titles` ( `id` );
ALTER TABLE `jobs` ADD CONSTRAINT `section_name` FOREIGN KEY () REFERENCES `sections` ( `section_name` );
ALTER TABLE `jobs` ADD CONSTRAINT `section_id` FOREIGN KEY () REFERENCES `sections` ( `id` );
ALTER TABLE `files` ADD CONSTRAINT `job` FOREIGN KEY () REFERENCES `jobs` ( `id` );
ALTER TABLE `files` ADD CONSTRAINT `tag` FOREIGN KEY () REFERENCES `tags` ( `id` );
ALTER TABLE `files` ADD CONSTRAINT `categorie` FOREIGN KEY () REFERENCES `categories` ( `id` );
