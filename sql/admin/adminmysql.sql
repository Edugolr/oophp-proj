DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
    `id` INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    `username` VARCHAR(50) NOT NULL UNIQUE,
    `password` VARCHAR(255) NOT NULL,
    `firstname`VARCHAR(50),
    `lastname` VARCHAR(50),
	`gender` VARCHAR(6) ,
    `phoneNumber` VARCHAR(75),
    `bonus` BOOLEAN,
    `created_at` DATETIME DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO `users` (`username`, `password`) VALUES
	("admin", "admin");
INSERT INTO `users` (`username`, `password`, `firstname`) VALUES
	("christofer.wikman@gmail.com", "user", "Christofer");