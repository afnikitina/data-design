-- set UTF-8 charset
ALTER DATABASE anikitina CHARACTER SET utf8 COLLATE utf8_unicode_ci;

DROP TABLE IF EXISTS `like`;
DROP TABLE IF EXISTS tweet;
DROP TABLE IF EXISTS profile;

-- create a root table
CREATE TABLE profile (
	profileId BINARY(16) NOT NULL,
	profileActivationToken CHAR(32),
	profileAtHandle VARCHAR(32) NOT NULL,
	profileEmail VARCHAR(128) NOT NULL,
	profileHash CHAR(97) NOT NULL,
	profilePhone VARCHAR(32),
	-- create unique indexes
	UNIQUE(profileAtHandle),
	UNIQUE(profileEmail),
	-- create the primary key for the entity
	PRIMARY KEY(profileId)

);

-- create the tweet entity
CREATE TABLE tweet (
	tweetId BINARY(16) NOT NULL,
	tweetProfileId BINARY(16) NOT NULL,
	tweetContent VARCHAR(140) NOT NULL,
	tweetDate DATETIME(6) NOT NULL,
	INDEX(tweetProfileId),
	FOREIGN KEY(tweetProfileId) REFERENCES profile(profileId),
	PRIMARY KEY(tweetId)
);

-- create the like entity
CREATE TABLE `like` (
	likeProfileId BINARY(16) NOT NULL,
	likeTweetId BINARY(16) NOT NULL,
	likeDate DATETIME(6) NOT NULL,
	INDEX(likeProfileId),
	INDEX(likeTweetId),
	FOREIGN KEY(likeProfileId) REFERENCES profile(profileId),
	FOREIGN KEY(likeTweetId) REFERENCES tweet(tweetId),
	PRIMARY KEY(likeProfileId, likeTweetId)
);
