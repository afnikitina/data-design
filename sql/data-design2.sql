USE anikitina;
-- set UTF-8 charset
ALTER DATABASE anikitina CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS user;
DROP TABLE IF EXISTS article;
DROP TABLE IF EXISTS comment;

-- create the user entity
CREATE TABLE user (
	userId BINARY(16) NOT NULL,
	userEmail VARCHAR(128) NOT NULL,
	userHash CHAR(97) NOT NULL,
	userName VARCHAR(92) NOT NULL,
	-- create unique key
	UNIQUE KEY (userEmail),
	-- create index limiting to the first 20 characters of userName
	-- see Learning PHP, MySQL & JavaScript with JQuery, CSS & HTML by Robin Nixon, 4th Ed., p. 187
	INDEX(userName(20)),
	-- create the primary key for the entity
	PRIMARY KEY(userId)
);

-- create the article entity
CREATE TABLE article (
	articleId BINARY(16) NOT NULL,
	articleAuthor VARCHAR(92) NOT NULL,
	articleCategory VARCHAR(20) NOT NULL,
	articleContent BLOB,
	articleDate DATE NOT NULL,
	articleTitle VARCHAR(92),
	-- create indexes limiting to the specified number of first characters of data field
	-- see Learning PHP, MySQL & JavaScript with JQuery, CSS & HTML by Robin Nixon, 4th Ed., p. 187
	INDEX(articleAuthor(20)),
	INDEX(articleCategory(4)),
	INDEX(articleDate),
	INDEX(articleTitle(20)),
	PRIMARY KEY(articleId)
);

-- create the comment entity
CREATE TABLE comment (
	commentId BINARY(16) NOT NULL,
	commentArticleId BINARY(16) NOT NULL,
	commentUserId BINARY(16) NOT NULL,
	commentContent VARCHAR(250),
	commentDate DATE NOT NULL,
	INDEX(commentDate),
	FOREIGN KEY(commentArticleId) REFERENCES article(articleId),
	FOREIGN KEY(commentUserId) REFERENCES user(userId),
	PRIMARY KEY(commentId)
);
