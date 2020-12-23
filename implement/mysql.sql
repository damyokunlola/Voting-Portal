CREATE TABLE `users` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `firstname` varchar(250),
  `lastname` varchar(250),
  `age` int,
  `email` varchar(250),
  `phonenumber` varchar(50),
  `pollingunit` int,
  `pwd` varchar(250)
);

CREATE TABLE `candidate` (
  `id` int PRIMARY KEY AUTO_INCREMENT,
  `can_id` int,
  `fullname` varchar(250),
  `age` int,
  `position` varchar(50),
  
);

CREATE TABLE `votes` (
  `can_id` int,
  `votes_count` int
);

ALTER TABLE `candidate` ADD FOREIGN KEY (`can_id`) REFERENCES `users` (`id`);

ALTER TABLE `votes` ADD FOREIGN KEY (`can_id`) REFERENCES `candidate` (`id`);