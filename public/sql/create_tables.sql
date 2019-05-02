CREATE SCHEMA postOfToday;

CREATE SCHEMA videoOfToday;


CREATE TABLE videoOfToday.videos (
     id MEDIUMINT NOT NULL AUTO_INCREMENT,
     url VARCHAR(255) UNIQUE NOT NULL,
     path VARCHAR(255) UNIQUE NOT NULL,
     video_type VARCHAR(100) NOT NULL,
     total_rate bigint NOT NULL,
     uploadDate datetime,
     title VARCHAR(255) NOT NULL,
     user  VARCHAR(255) NOT NULL,
     PRIMARY KEY (id)
);

CREATE TABLE videoOfToday.lastUploadDateUsers (
     id MEDIUMINT NOT NULL AUTO_INCREMENT,
     user  VARCHAR(255) UNIQUE NOT NULL,
     lastUploadDate datetime,
     PRIMARY KEY (id)
);


CREATE TABLE videoOfToday.votedVideos (
     id MEDIUMINT NOT NULL AUTO_INCREMENT,
     user  VARCHAR(255) NOT NULL,
     idVideo MEDIUMINT NOT NULL,
     PRIMARY KEY (id)
);


CREATE TABLE videoOfToday.best_videos (
     id MEDIUMINT NOT NULL AUTO_INCREMENT,
     url VARCHAR(255) UNIQUE NOT NULL,
     path VARCHAR(255) UNIQUE NOT NULL,
     video_type VARCHAR(100) NOT NULL,
     total_rate bigint NOT NULL,
     uploadDate datetime,
     title VARCHAR(255) NOT NULL,
     user  VARCHAR(255) NOT NULL,
     PRIMARY KEY (id)
);
