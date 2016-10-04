DROP TABLE IF EXISTS `#__quotesbox`;

CREATE TABLE `#__quotesbox` (
	`id`       INT(6) NOT NULL AUTO_INCREMENT,
  `quote` text,
  `author` varchar(128) NOT NULL,
	`published` tinyint(4) NOT NULL,
	`daily` INT,
	PRIMARY KEY (`id`)
)
	ENGINE =InnoDB
	DEFAULT CHARSET =utf8;
