DROP TABLE IF EXISTS `#__quotesbox`;

CREATE TABLE `#__quotesbox` (
	`id`       INT(11) NOT NULL AUTO_INCREMENT,
  `quote` text,
  `author` varchar(128) NOT NULL,
	`published` tinyint(4) NOT NULL,
	PRIMARY KEY (`id`)
)
	ENGINE =InnoDB
	DEFAULT CHARSET =utf8;

INSERT INTO `#__quotesbox` (`quote`, `author`) VALUES
('Hello World!', 'Program'),
('Good bye World!', 'Dying program');
