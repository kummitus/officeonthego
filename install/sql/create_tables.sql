CREATE TABLE IF NOT EXISTS `bills` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `company` varchar(255) NOT NULL,
  `sum` double NOT NULL,
  `info` mediumtext,
  `path` varchar(255) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `u_id` (`u_id`)
);

CREATE TABLE IF NOT EXISTS `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `a_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `info` mediumtext,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`),
  KEY `a_id` (`a_id`)
);

CREATE TABLE IF NOT EXISTS `memberships` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `g_id` int(11) NOT NULL,
  `u_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `g_id` (`g_id`),
  KEY `u_id` (`u_id`)
);

CREATE TABLE IF NOT EXISTS `owners` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
);

CREATE TABLE IF NOT EXISTS `places` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `o_id` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) DEFAULT NULL,
  `maintenance` varchar(255) NOT NULL,
  `billingcode` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `o_id` (`o_id`)
);

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `g_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `info` mediumtext,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `g_id` (`g_id`),
  KEY `p_id` (`p_id`)
);

CREATE TABLE IF NOT EXISTS `times` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `u_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `t_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `t_id` (`t_id`),
  KEY `u_id` (`u_id`)
);

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `adminlevel` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
);

ALTER TABLE `bills`
  ADD CONSTRAINT `bills_ibfk_1` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`);

ALTER TABLE `groups`
  ADD CONSTRAINT `groups_ibfk_1` FOREIGN KEY (`a_id`) REFERENCES `users` (`id`);

ALTER TABLE `memberships`
  ADD CONSTRAINT `memberships_ibfk_1` FOREIGN KEY (`g_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `memberships_ibfk_2` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`);

ALTER TABLE `places`
  ADD CONSTRAINT `places_ibfk_1` FOREIGN KEY (`o_id`) REFERENCES `owners` (`id`);

ALTER TABLE `tasks`
  ADD CONSTRAINT `tasks_ibfk_1` FOREIGN KEY (`g_id`) REFERENCES `groups` (`id`),
  ADD CONSTRAINT `tasks_ibfk_2` FOREIGN KEY (`p_id`) REFERENCES `places` (`id`);

ALTER TABLE `times`
  ADD CONSTRAINT `fk_tt` FOREIGN KEY (`t_id`) REFERENCES `tasks` (`id`),
  ADD CONSTRAINT `fk_tu` FOREIGN KEY (`u_id`) REFERENCES `users` (`id`);
