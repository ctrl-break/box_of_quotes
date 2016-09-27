CREATE TABLE IF NOT EXISTS `#__vq_authors` (
  `id` smallint(6) NOT NULL,
  `name` varchar(128) NOT NULL,
  `alias` varchar(64) NOT NULL,
  `bio` text,
  `image` varchar(32) DEFAULT NULL,
  `thumb` varchar(32) DEFAULT NULL,
  `copyright` varchar(1024) DEFAULT NULL,
  `hits` smallint(5) unsigned NOT NULL DEFAULT '0',
  `ordering` tinyint(3) unsigned NOT NULL DEFAULT '0',
  `published` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `user_id` int(10) unsigned NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE IF NOT EXISTS `#__vq_quotes` (
  `id` int(11) unsigned NOT NULL,
  `quote` text,
  `created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `published` tinyint(1) unsigned NOT NULL DEFAULT '0',
  `ordering` smallint(5) unsigned NOT NULL DEFAULT '0',
  `hits` smallint(5) unsigned NOT NULL DEFAULT '0',
  `author_id` smallint(6) DEFAULT '0',
  `catid` int(11) DEFAULT '0',
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `#__vq_authors`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `alias` (`alias`);

ALTER TABLE `#__vq_quotes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_itpvq_quser_id` (`user_id`),
  ADD KEY `idx_itpvq_qcat_id` (`catid`),
  ADD KEY `idx_itpvq_qauthor_id` (`author_id`);


ALTER TABLE `#__vq_authors`
  MODIFY `id` smallint(6) NOT NULL AUTO_INCREMENT;
ALTER TABLE `#__vq_quotes`
  MODIFY `id` int(11) unsigned NOT NULL AUTO_INCREMENT;
