CREATE TABLE `users` (
`id` int NOT NULL AUTO_INCREMENT,
`name` varchar(60) NOT NULL,
`surname` varchar(60) NOT NULL,
`email` varchar(60) NOT NULL,
`phone` varchar(20) NOT NULL,
PRIMARY KEY (`id`) 
);
CREATE TABLE `clients` (
`age` int NOT NULL,
`security_number` varchar(0) NOT NULL,
`birthdate` date NOT NULL
);
CREATE TABLE `files` (
`id` int NOT NULL,
`creation_date` datetime NOT NULL,
`modification_date` datetime NOT NULL ON UPDATE CURRENT_TIMESTAMP,
`path_to_file` varchar(255) NOT NULL,
`title` varchar(255) NOT NULL,
PRIMARY KEY (`id`) 
);
CREATE TABLE `tags` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`tag_name` varchar(255) NOT NULL
);
CREATE TABLE `categories` (
);
CREATE TABLE `categorie` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`category_name` varchar(255) NOT NULL
);
CREATE TABLE `jobs` (
`id` int(11) NOT NULL AUTO_INCREMENT,
PRIMARY KEY (`id`) 
);
CREATE TABLE `sections` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`section_name` varchar(255) NOT NULL,
PRIMARY KEY (`id`) 
);
CREATE TABLE `jobs_titles` (
`id` int(11) NOT NULL AUTO_INCREMENT,
`job_name` varchar(255) NOT NULL,
PRIMARY KEY (`id`) 
);

ALTER TABLE `clients` ADD CONSTRAINT `id` FOREIGN KEY () REFERENCES `users` (`id`);
ALTER TABLE `clients` ADD CONSTRAINT `name` FOREIGN KEY () REFERENCES `users` (`name`);
ALTER TABLE `clients` ADD CONSTRAINT `surname` FOREIGN KEY () REFERENCES `users` (`surname`);
ALTER TABLE `clients` ADD CONSTRAINT `email` FOREIGN KEY () REFERENCES `users` (`email`);
ALTER TABLE `clients` ADD CONSTRAINT `phone` FOREIGN KEY () REFERENCES `users` (`phone`);
ALTER TABLE `files` ADD CONSTRAINT `published_by_name` FOREIGN KEY () REFERENCES `users` (`name`);
ALTER TABLE `files` ADD CONSTRAINT `published_by_id` FOREIGN KEY () REFERENCES `users` (`id`);
ALTER TABLE `files` ADD CONSTRAINT `about_client_name` FOREIGN KEY () REFERENCES `users` (`name`);
ALTER TABLE `files` ADD CONSTRAINT `about_client_id` FOREIGN KEY () REFERENCES `users` (`id`);
ALTER TABLE `jobs` ADD CONSTRAINT `job_name` FOREIGN KEY () REFERENCES `jobs_titles` (`job_name`);
ALTER TABLE `jobs` ADD CONSTRAINT `job_id` FOREIGN KEY () REFERENCES `jobs_titles` (`id`);
ALTER TABLE `jobs` ADD CONSTRAINT `section_name` FOREIGN KEY () REFERENCES `sections` (`section_name`);
ALTER TABLE `jobs` ADD CONSTRAINT `section_id` FOREIGN KEY () REFERENCES `sections` (`id`);
ALTER TABLE `files` ADD CONSTRAINT `job` FOREIGN KEY () REFERENCES `jobs` (`id`);
ALTER TABLE `files` ADD CONSTRAINT `tag` FOREIGN KEY () REFERENCES `tags` (`id`);
ALTER TABLE `files` ADD CONSTRAINT `categorie` FOREIGN KEY () REFERENCES `categorie` (`id`);

