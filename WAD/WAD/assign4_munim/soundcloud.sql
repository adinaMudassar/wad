CREATE DATABASE soundCloud;
USE soundCloud;

CREATE TABLE IF NOT EXISTS users (
                                     userId int(8) NOT NULL,
                                     userName varchar(55) NOT NULL,
                                     password varchar(55) NOT NULL,
                                     firstName varchar(255) NOT NULL,
                                     lastName varchar(255) NOT NULL,
                                     email varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

ALTER TABLE users ADD PRIMARY KEY (userId);
ALTER TABLE users ADD UNIQUE KEY (email);

ALTER TABLE users MODIFY userId int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;

CREATE TABLE IF NOT EXISTS album (
                                     albumId int(8) NOT NULL,
                                     albumName varchar(55) NOT NULL,
                                     albumPhoto varchar(55) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

ALTER TABLE album ADD PRIMARY KEY (albumId);
ALTER TABLE album ADD UNIQUE KEY (albumName);

ALTER TABLE album MODIFY albumId int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;

CREATE TABLE IF NOT EXISTS songs (
                                     songId int(8) NOT NULL,
                                     songName varchar(55) NOT NULL,
                                     songPhoto varchar(55) NOT NULL,
                                     songAudio varchar(55) NOT NULL,
                                     albumName varchar(55) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

ALTER TABLE songs ADD PRIMARY KEY (songId);
ALTER TABLE songs ADD UNIQUE KEY (songName);
ALTER TABLE songs ADD FOREIGN KEY (albumName) REFERENCES album(albumName);

ALTER TABLE songs MODIFY songId int(8) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=0;