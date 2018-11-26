DROP TABLE IF EXISTS Subscriptions;
DROP TABLE IF EXISTS VoteOnPost;
DROP TABLE IF EXISTS VoteOnComment;
DROP TABLE IF EXISTS Posts;
DROP TABLE IF EXISTS Comments;
DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Channels;


CREATE TABLE Users (
	id 							INTEGER PRIMARY KEY,
	username 				VARCHAR(15) UNIQUE NOT NULL,
	name 						VARCHAR NOT NULL,
	email 					VARCHAR UNIQUE NOT NULL,
	password 				VARCHAR NOT NULL,
	cake_day 				DATE NOT NULL
);

CREATE TABLE Channels (
	id 							INTEGER PRIMARY KEY,
	name 						VARCHAR(50) NOT NULL,
	description 		VARCHAR NOT NULL,
	creation_day 		DATE NOT NULL
);

CREATE TABLE Posts (
	id 							INTEGER PRIMARY KEY,
	title 					VARCHAR(50) NOT NULL,
	content 				VARCHAR,
	link 						VARCHAR,
	date 						DATE NOT NULL,
	user_id 				INT NOT NULL,
	channel_id 			INT NOT NULL,
	FOREIGN KEY(user_id)	REFERENCES Users(id),
	FOREIGN KEY(channel_id)	REFERENCES Channels(id)
);

CREATE TABLE Comments (
	id 							INTEGER PRIMARY KEY,
	content 				VARCHAR,
	user_id 				INT NOT NULL,
	post_id 				INT NOT NULL,
	date				 		DATE NOT NULL,
	parent_id				INT,
	FOREIGN KEY(parent_id)	REFERENCES Comments(id)
);

CREATE TABLE Subscriptions (
	user_id 				INT NOT NULL,
	channel_id 			INT NOT NULL,
	PRIMARY KEY(user_id, channel_id),
	FOREIGN KEY(user_id)	REFERENCES Users(id),
	FOREIGN KEY(channel_id)	REFERENCES Channels(id)
);

CREATE TABLE VoteOnPost (
	user_id 				INT NOT NULL,
	post_id 				INT NOT NULL,
	value						INT NOT NULL,
	PRIMARY KEY(user_id, post_id),
	FOREIGN KEY(user_id)	REFERENCES Users(id),
	FOREIGN KEY(post_id)	REFERENCES Posts(id)
);

CREATE TABLE VoteOnComment (
	user_id 				INT NOT NULL,
	comment_id 			INT NOT NULL,
	value						INT NOT NULL,
	PRIMARY KEY(user_id, comment_id),
	FOREIGN KEY(user_id)	REFERENCES Users(id),
	FOREIGN KEY(comment_id)	REFERENCES Comments(id)
);
