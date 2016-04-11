/** 
 * This file contains all the JavaScript stubs we will be using for interactive UI elements.
 * These functions represent a layer of logic where the client makes a request to the API
 * for some action. Not all of the endpoints are included because some of them are done
 * server-side in PHP rather than using JavaScript.
 */

/**
 * Authenticiation
 */
function registerAccount(username, password, firstName, lastName) {}

function login(username, password) {}

function logout() {}

function deactivateAccount(password) {}

function changeUsername(username) {}

function changePassword(password) {}

/**
 * User
 */
function reportUser(userId) {}

function blockUser(userId) {}

function unblockUser(userId) {}

function followUser(userId) {}

function unfollowUser(userId) {}

//TODO: update profile info

function uploadResume(filename) {}

function enablePremium(cardNumber) {}

function disablePremium() {}

/**
 * Image
 */
function uploadImage(filename) {}

function uploadFile(filename) {}

/**
 * Post
 */
function createPost(headline, message, imageId) {}

function updatePost(postId, headline, message, imageId) {}

function deletePost(postId) {}

function likePost(postId) {}

function unlikePost(postId) {}

/**
 * Post comment
 */
function createPostComment(postId, comment) {}

function updatePostComment(commentId, comment) {}

function deletePostComment(commentId) {}

/**
 * Company
 */
function createCompany(name, type, headline, imageId) {}

function updateCompany(companyId, name, type, headline, imageId) {}

function deleteCompany(companyId, password) {}

function enableCompanyPremium(companyId) {}

function disableCompanyPremium(companyId) {}

function addEmployeeToCompany(companyId, userId) {}

function removeEmployeeFromCompany(companyId, userId) {}

/**
 * Skill
 */
function addSkill(title) {}

function removeSkill(title) {}

function endorseSkill(skillId) {}

function unendorseSkill(skillId) {}