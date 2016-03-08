DROP TABLE IF EXISTS `user`;

/*
 * User
 */
CREATE TABLE `user` (
    id smallint NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username varchar(15) NOT NULL UNIQUE,
    password varchar(256) NOT NULL,
    firstName varchar(15) NOT NULL,
    lastName varchar(15) NOT NULL,
    email varchar(30) NOT NULL,
    phoneNumber varchar(15),
    createdAt timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
    /* priveleges, birthday, secretQuestion, secretAnswer, profilePicture, sessionId */
) ENGINE=INNODB;

/* Remove these for production application? These are here for our convenience right now. 
   Not sure how else to seed an admin account. */
INSERT INTO user VALUES
    (DEFAULT, 'Test', '$2y$10$cDYAjrH6f/Q9SMjd5/EiNOxWzG1M/3BbNQO3NNU/0WBWzs8IxpAoe', 'Test', 'Guy', 'testguy@gmail.com', '555-555-5555', DEFAULT),
    (DEFAULT, 'JacobMuchow', '$2y$10$cDYAjrH6f/Q9SMjd5/EiNOxWzG1M/3BbNQO3NNU/0WBWzs8IxpAoe', 'Jacob', 'Muchow', 'jacobamuchow@gmail.com', '555-355-8846', DEFAULT);
    /*(DEFAULT, 'Test', '$2y$10$cDYAjrH6f/Q9SMjd5/EiNOxWzG1M/3BbNQO3NNU/0WBWzs8IxpAoe', 'Test', 'Guy', 'testguy@gmail.com', '555-555-5555', DEFAULT),
    (DEFAULT, 'Test', '$2y$10$cDYAjrH6f/Q9SMjd5/EiNOxWzG1M/3BbNQO3NNU/0WBWzs8IxpAoe', 'Test', 'Guy', 'testguy@gmail.com', '555-555-5555', DEFAULT),
    (DEFAULT, 'Test', '$2y$10$cDYAjrH6f/Q9SMjd5/EiNOxWzG1M/3BbNQO3NNU/0WBWzs8IxpAoe', 'Test', 'Guy', 'testguy@gmail.com', '555-555-5555', DEFAULT),
    (DEFAULT, 'Test', '$2y$10$cDYAjrH6f/Q9SMjd5/EiNOxWzG1M/3BbNQO3NNU/0WBWzs8IxpAoe', 'Test', 'Guy', 'testguy@gmail.com', '555-555-5555', DEFAULT),
    (DEFAULT, 'Test', '$2y$10$cDYAjrH6f/Q9SMjd5/EiNOxWzG1M/3BbNQO3NNU/0WBWzs8IxpAoe', 'Test', 'Guy', 'testguy@gmail.com', '555-555-5555', DEFAULT),*/