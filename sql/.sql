DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS post;
DROP TABLE IF EXISTS comments;

CREATE TABLE user (
	userId BINARY(16) NOT NULL,
	userActivationToken CHAR(32),
	userEmail VARCHAR(128) NOT NULL,
	userName VARCHAR(32) NOT NULL,
	userImage VARCHAR(1024),
	userHash CHAR(128) NOT NULL,
	userSalt CHAR(64) NOT NULL,
	UNIQUE (userEmail),
	UNIQUE (userName),
	INDEX (userEmail),
	INDEX (userName),
	PRIMARY KEY (userId)
);

CREATE TABLE post (
	postId BINARY(16) NOT NULL,
	postuserId BINARY(16) NOT NULL,
	postTitle VARCHAR(140) NOT NULL,
	postDetail VARCHAR(6000) NOT NULL,
	postSubject VARCHAR(140) NOT NULL,
	postLocation VARCHAR(140),
	postDateTime DATETIME(6) NOT NULL,
	INDEX (postTitle),
	INDEX (postSubject),
	INDEX (postSubject),
	INDEX (postLocation),
	FOREIGN KEY (postuserId) REFERENCES user (userId),
	PRIMARY KEY (postId)
);

CREATE TABLE comments (
	CommentsId BINARY(16) NOT NULL,
	commentsPostId BINARY(16) NOT NULL,
	commentsUserId BINARY(16) NOT NULL,
	commentsCommentId BINARY(16),
	commentsDetail VARCHAR(6000) NOT NULL,
	commentsDateTime DATETIME(6) NOT NULL,
	FOREIGN KEY (commentsPostId) REFERENCES post (postId),
	FOREIGN KEY (commentsUserId) REFERENCES user (userId),
	FOREIGN KEY (commentsCommentId) REFERENCES comments (CommentsId),
	PRIMARY KEY (CommentsId)
);

