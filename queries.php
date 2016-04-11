<?php 
/*
 * This file contains all of the query language for our API in one location.
 */
 
/* /auth/register.php -- creates a new user */
$query = 'INSERT INTO user VALUES (UUID(), DEFAULT, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, DEFAULT, ?, DEFAULT)';

/* /auth/login.php -- verifies the password, then stores the session id if successful */
$query = "SELECT id, firstName, lastName, password FROM user WHERE username = ?";
$query = "UPDATE user SET sessionId = ? WHERE id = ?";
 
/* /auth/logout.php -- reset the session id to NULL */
$query = "UPDATE user SET sessionId = NULL WHERE id = ?";

/* /auth/deactivate.php -- verifies the password, then deactivates a user account */
$query = "DELETE FROM user WHERE id = ?";

/* /auth/authenticate.php -- Validates session cookie and updates session data */
$query = "SELECT username, firstName, lastName, sessionId FROM user WHERE id = ?";

/* /auth/changeusername -- Changes a user's username */
$query = "UPDATE user SET username = ? WHERE id = ?";

/* /auth/changepassword -- Changes a user's password */
$query = "UPDATE user SET password = ? WHERE id = ?";

/* /auth/forgotpassword -- Resets a user's password to a temporary password if the correct security answer is provided */
$query = "SELECT securityAnswer FROM user WHERE id = ?";
$query = "UPDATE user SET password = ? WHERE id = ?";

/* /user -- Returns info for a user id */
$query = "SELECT ".userProperties()." FROM user WHERE id = ?";

/* /user/visitors -- Returns a list of visitors (premium) */
$query = "SELECT ".userProperties().", profileVisit.createdAt AS visitedAt FROM user, profileVisit 
    WHERE profileVisit.destinationUserId = ? && profileVisit.originUserId = user.id
    ORDER BY profileVisit.createdAt DESC";

/* /user/visit -- Records the first visit a user makes to another user's profile */
$query = "INSERT INTO profileVisit VALUES (UUID(), DEFAULT, ?, ?)";

/* /user/report -- Reports a user */
$query = "INSERT INTO userReport VALUES (UUID(), DEFAULT, ?, ?, ?)";

/* /user/block -- Blocks a user */
$query = "INSERT INTO userBlock VALUES (UUID(), DEFAULT, ?, ?)";

/* /user/unblock -- Unblocks a user */
$query = "DELETE FROM userBlock WHERE originUserId = ? AND destinationUserId = ?";

/* /user/followers -- Returns a list of followers for a user */
$query = "SELECT ".userProperties().", follower.createdAt AS followedAt FROM user, follower 
    WHERE follower.destinationUserId = ? && follower.originUserId = user.id 
    ORDER By follower.createdAt DESC";

/* /user/follow -- Follows a user */
$query = "INSERT INTO follower VALUES (UUID(), DEFAULT, ? ?)";

/* /user/unfollow -- Unfollows a user */
$query = "DELETE FROM follower WHERE originUserId = ? AND destinationUserId = ?";

/* /user/update -- Updates profile info */
$query = "UPDATE user SET firstName = ?, lastName = ?, email = ?, phoneNumber = ?, birthday = ?, profileImageId = ?, resumeFileId = ? WHERE id = ?";

/* /user/premium (PUT) -- Enables premium for a user account */
$query = "UPDATE user SET isPremium = TRUE WHERE id = ?";

/* /user/premium (DELETE) -- Disables premium for a user account */
$query = "UPDATE user SET isPremium = FALSE where id = ?";

/* /user/skills (GET) -- Returns a list of skills for a user */
$query = "SELECT * FROM skill WHERE originUserId = ? ORDER BY name";

//For each skill...
$query = "SELECT * FROM endorsement WHERE skillId = ? ORDER BY createdAt DESC";

/* /image (GET) -- Returns an image url for the requested id */
$query = "SELECT path FROM image WHERE id = ?";

/* /image (POST) -- Uploads an image */
$query = "INSERT INTO image VALUES (UUID(), DEFAULT, ?)";

/* /file (GET) -- Returns a file url for the requested id */
$query = "SELECT path FROM file WHERE id = ?";

/* /file (POST) -- Uploads a file */
$query = "INSERT INTO file VALUES (UUID(), DEFAULT, ?)";

/* /feed (GET) -- Returns a list of posts */
$query = "SELECT * FROM post ORDER BY createdAt";

/* /post (GET) -- Returns info for the requested post id */
$query = "SELECT * FROM post WHERE id = ?";             //Get post
$query = "SELECT * FROM postLike WHERE postId = ?";     //Get likes
$query = "SELECT * FROM comment WHERE postId = ? ORDER BY createdAt DESC";  //Get comments
$query = "SELECT * FROM commentLike WHERE commentId = ?";   //Get comment likes

/* /post (POST) -- Creates a new post */
$query = "INSERT INTO post VALUES (UUID(), DEFAULT, ?, ?, ?)";

/* /post (PUT) -- Updates a post */
$query = "UPDATE post SET comment = ?, link = ? WHERE id = ?";

/* /post (DELETE) -- Deletes a post */
$query = "DELETE FROM post WHERE id = ?";

/* /post/like (PUT) -- Likes a post */
$query = "INSERT INTO postLike VALUES (UUID(), DEFAULT, ?, ?)";

/* /post/like (DELETE) -- Unlikes a post */
$query = "DELETE FROM postLike WHERE id = ?";

/* /company (GET) -- Returns info for a company */
$query = "SELECT ".companyProperties()." FROM company WHERE id = ?";

/* /company (POST) -- Creates a new company */
$query = "INSERT INTO company VALUES (UUID(), DEFAULT, ?, ?, ?, DEFAULT, DEFAULT, DEFAULT)";

/* /company (PUT) -- Updates info for a company */
$query = "UPDATE company SET name = ?, birthday = ?, profileImageId = ?";

/* /company (DELETE) -- Deletes a company */
$query = "DELETE FROM company WHERE id = ?";

/* /company/premium (PUT) -- Enabled premium for a company */
$query = "UPDATE company SET isPremium = TRUE, creditCardNumber = ? WHERE id = ?";

/* /company/premium (DELETE) -- Disalbes premium for a company */
$query = "UPDATE company SET isPremium = FALSE, creditCardNumber = DEFAULT WHERE id = ?";

/* /company/visit (PUT) -- Records the first visit of a user to a company profile */
$query = "INSERT INTO companyVisit VALUES (UUID(), DEFAULT, ?, ?)";

/* /company/visitors (GET) -- Returns a list of a visitors to a company profile (premium) */
$query = "SELECT * FROM companyVisit ORDER BY createdAt DESC";  //Get list of user ids
$query = "SELECT ".userProperties()." FROM user WHERE id = ?";  //Get user info for each user id

/* /company/employees (GET) -- Returns a list of employees for a company */
$query = "SELECT * FROM employment WHERE companyId = ? && endedAt IS NULL ORDER BY startedAt DESC";
$query = "SELECT ".userProperties()." FROM user WHERE id = ?";  //Get user info for each user id

/* /company/employee (POST) -- Adds an employee to a company */
$query = "INSERT INTO employment VALUES (UUID(), DEFAULT, ?, ?, ?, ?, ?)";

/* /company/employee (DELETE) -- Removes an employee from a company */
$query = "DELETE FROM employment WHERE id = ?";

/* /search (GET) -- Returns a list of different entities including users & companies */
$query = "SELECT ".userProperties()." FROM user WHERE username LIKE ? OR firstName LIKE ? OR lastName LIKE ?";
$query = "SELECT ".companyProperties()." FROM company WHERE name LIKE ?";

/* /skill (POST) -- Adds a skill to a user */
$query = "INSERT INTO skill VALUES (UUID(), DEFAULT, ?, ?)";

/* /skill (DELETE) -- Removes a skill from a user */
$query + "DELETE FROM skill WHERE id = ?";

/* /skill/endorse (PUT) -- Endorses a skill for a user */
$query = "INSERT INTO endorsement VALUES (UUID(), DEFAULT, ?, ?)";

/* /skill/endorse (DELETE) -- Unendorses a skill for a user */
$query = "DELETE FROM endorsement WHERE id = ?";