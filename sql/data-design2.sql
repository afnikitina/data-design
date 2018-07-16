-- set UTF-8 charset
ALTER DATABASE anikitina CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS users;
DROP TABLE IF EXISTS articles;
DROP TABLE IF EXISTS comments;

-- create the user entity
CREATE TABLE users (
	userId BINARY(16) NOT NULL,
	userEmail VARCHAR(128) NOT NULL,
	userHash CHAR(97) NOT NULL,
	userName VARCHAR(92),
	-- create unique indexes
	UNIQUE(userEmail),
	INDEX(userName(20)),
	-- create the primary key for the entity
	PRIMARY KEY(userId)

);

-- create the article entity
CREATE TABLE articles (
	articleId BINARY(16) NOT NULL,
	articleAuthor VARCHAR(92) NOT NULL,
	articleCategory VARCHAR(20) NOT NULL,
	articleContent VARCHAR(7000),
	articleDate DATE NOT NULL,
	articleTitle VARCHAR(92),
	INDEX(articleAuthor(20)),
	INDEX(articleCategory(4)),
	INDEX(articleTitle(20)),
	INDEX(articleDate),
	PRIMARY KEY(articleId)
);

-- create the comment entity
CREATE TABLE comments (
	commentId BINARY(16) NOT NULL,
	commentContent VARCHAR(250),
	commentDate DATE NOT NULL,	INDEX(commentDate),
	FOREIGN KEY(commentArticleId) REFERENCES article(articleId),
	FOREIGN KEY(commentUserId) REFERENCES user(userId),
	PRIMARY KEY(commentId)
);