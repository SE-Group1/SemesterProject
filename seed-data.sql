DROP TABLE IF EXISTS `message`;
DROP TABLE IF EXISTS `follower`;
DROP TABLE IF EXISTS `connection`;
DROP TABLE IF EXISTS `profileVisit`;
DROP TABLE IF EXISTS `commentLike`;
DROP TABLE IF EXISTS `comment`;
DROP TABLE IF EXISTS `postLike`;
DROP TABLE IF EXISTS `post`;
DROP TABLE IF EXISTS `endorsement`;
DROP TABLE IF EXISTS `skill`;
DROP TABLE IF EXISTS `employment`;
DROP TABLE IF EXISTS `companyVisit`;
DROP TABLE IF EXISTS `company`;
DROP TABLE IF EXISTS `user`;
DROP TABLE IF EXISTS `image`;

CREATE TABLE `image` (
    id varchar(36) NOT NULL PRIMARY KEY,
    path varchar(40) NOT NULL
) ENGINE=INNODB;

CREATE TABLE `user` (
    id varchar(36) NOT NULL PRIMARY KEY,
    createdAt timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    username varchar(15) NOT NULL UNIQUE,
    password varchar(256) NOT NULL,
    firstName varchar(15) NOT NULL,
    lastName varchar(15) NOT NULL,
    email varchar(30),
    phoneNumber varchar(15),
    birthday datetime,
    secretQuestion varchar(50),
    secretAnswer varchar(12),
    profileImageId varchar(36),
    FOREIGN KEY (profileImageId) REFERENCES image (id)
    
    /* priveleges, sessionId */
) ENGINE=INNODB;

/* Note: we can use UUID() to generate UUIDs with SQL -- need hardcoded ones for the seed data though */
INSERT INTO `user` VALUES
    ('801eb2c2-f0aa-11e5-a8c2-14b34953c3d9', DEFAULT, 'TestUser', '$2y$10$cDYAjrH6f/Q9SMjd5/EiNOxWzG1M/3BbNQO3NNU/0WBWzs8IxpAoe', 'Test', 'User', 'testuser@gmail.com', '111-111-1111', NULL, NULL, NULL, NULL),
    ('801ee0a8-f0aa-11e5-a8c2-14b34953c3d9', DEFAULT, 'JacobMuchow', '$2y$10$cDYAjrH6f/Q9SMjd5/EiNOxWzG1M/3BbNQO3NNU/0WBWzs8IxpAoe', 'Jacob', 'Muchow', 'jacob.muchow@hookedup.com', '222-222-2222', NULL, NULL, NULL, NULL);
    
CREATE TABLE `message` (
    id varchar(36) NOT NULL PRIMARY KEY,
    createdAt timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    originUserId varchar(36) NOT NULL,
    destinationUserId varchar(36) NOT NULL,
    message varchar(300) NOT NULL,
    FOREIGN KEY (originUserId) REFERENCES user (id),
    FOREIGN KEY (destinationUserId) REFERENCES user (id)
) ENGINE=INNODB;

CREATE TABLE `follower` (
    id varchar(36) NOT NULL PRIMARY KEY,
    createdAt timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    originUserId varchar(36) NOT NULL,
    destinationUserId varchar(36) NOT NULL,
    FOREIGN KEY (originUserId) REFERENCES user (id),
    FOREIGN KEY (destinationUserId) REFERENCES user (id)
) ENGINE=INNODB;

CREATE TABLE `connection` (
    id varchar(36) NOT NULL PRIMARY KEY,
    createdAt timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    originUserId varchar(36) NOT NULL,
    destinationUserId varchar(36) NOT NULL,
    /* status */
    FOREIGN KEY (originUserId) REFERENCES user (id),
    FOREIGN KEY (destinationUserId) REFERENCES user (id)
) ENGINE=INNODB;

CREATE TABLE `profileVisit` (
    id varchar(36) NOT NULL PRIMARY KEY,
    createdAt timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    originUserId varchar(36) NOT NULL,
    destinationUserId varchar(36) NOT NULL,
    FOREIGN KEY (originUserId) REFERENCES user (id),
    FOREIGN KEY (destinationUserId) REFERENCES user (id)
) ENGINE=INNODB;

CREATE TABLE `post` (
    id varchar(36) NOT NULL PRIMARY KEY,
    createdAt timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    originUserId varchar(36) NOT NULL,
    comment varchar(800) NOT NULL,
    link varchar(150),
    FOREIGN KEY (originUserId) REFERENCES user (id)
) ENGINE=INNODB;

CREATE TABLE `postLike` (
    id varchar(36) NOT NULL PRIMARY KEY,
    createdAt timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    postId varchar(36) NOT NULL,
    originUserId varchar(36) NOT NULL,
    FOREIGN KEY (postId) REFERENCES post (id),
    FOREIGN KEY (originUserId) REFERENCES user (id)
) ENGINE=INNODB;

CREATE TABLE `comment` (
    id varchar(36) NOT NULL PRIMARY KEY,
    createdAt timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    postId varchar(36) NOT NULL,
    originUserId varchar(36) NOT NULL,
    message varchar(150) NOT NULL,
    FOREIGN KEY (postId) REFERENCES post (id),
    FOREIGN KEY (originUserId) REFERENCES user (id)
) ENGINE=INNODB;

CREATE TABLE `commentLike` (
    id varchar(36) NOT NULL PRIMARY KEY,
    createdAt timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    commentId varchar(36) NOT NULL,
    originUserId varchar(36) NOT NULL,
    FOREIGN KEY (commentId) REFERENCES comment (id),
    FOREIGN KEY (originUserId) REFERENCES user (id)
) ENGINE=INNODB;

CREATE TABLE `skill` (
    id varchar(36) NOT NULL PRIMARY KEY,
    createdAt timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    name varchar(40) NOT NULL,
    originUserId varchar(36) NOT NULL,
    FOREIGN KEY (originUserId) REFERENCES user (id)
) ENGINE=INNODB;

CREATE TABLE `endorsement` (
    id varchar(36) NOT NULL PRIMARY KEY,
    createdAt timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    skillId varchar(36) NOT NULL,
    originUserId varchar(36) NOT NULL,
    FOREIGN KEY (skillId) REFERENCES skill (id),
    FOREIGN KEY (originUserId) REFERENCES user (id)
) ENGINE=INNODB;

CREATE TABLE `company` (
    id varchar(36) NOT NULL PRIMARY KEY,
    createdAt timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    name varchar(100) NOT NULL,
    birthday datetime,
    managerUserId varchar(36) NOT NULL,
    profileImageId varchar(36),
    creditCardNumber varchar(16) NOT NULL,
    isPremium bool NOT NULL DEFAULT FALSE,
    FOREIGN KEY (managerUserId) REFERENCES user (id),
    FOREIGN KEY (profileImageId) REFERENCES image (id)
) ENGINE=INNODB;

CREATE TABLE `employment` (
    id varchar(36) NOT NULL PRIMARY KEY,
    createdAt timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    companyId varchar(36) NOT NULL,
    userId varchar(36) NOT NULL,
    startedAt datetime,
    endedAt datetime,
    title varchar (30),
    FOREIGN KEY (companyId) REFERENCES company (id),
    FOREIGN KEY (userId) REFERENCES user (id)
) ENGINE=INNODB;

CREATE TABLE `companyVisit` (
    id varchar(36) NOT NULL PRIMARY KEY,
    createdAt timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
    companyId varchar(36) NOT NULL,
    originUserId varchar(36) NOT NULL,
    FOREIGN KEY (companyId) REFERENCES company (id),
    FOREIGN KEY (originUserId) REFERENCES user (id)
) ENGINE=INNODB;