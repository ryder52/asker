CREATE DATABASE IF NOT EXISTS asker;
USE asker;

CREATE TABLE IF NOT EXISTS Users
(
    id INTEGER AUTO_INCREMENT NOT NULL,
    name VARCHAR(20) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
) COMMENT='Registered users';

CREATE TABLE IF NOT EXISTS Questions
(
    id INTEGER AUTO_INCREMENT NOT NULL,
    room VARCHAR(10) NOT NULL,
    text TEXT NOT NULL,
    likes INTEGER DEFAULT 0,
    dislikes INTEGER DEFAULT 0,
    answered BOOL DEFAULT false,
    answer TEXT,
    author VARCHAR(20) NOT NULL,
    PRIMARY KEY (id)
) COMMENT='Asked questions';

CREATE TABLE IF NOT EXISTS Rooms
(
    id VARCHAR(10) NOT NULL UNIQUE,
    name VARCHAR(255) NOT NULL,
    author INTEGER NOT NULL,
    PRIMARY KEY (id)
) COMMENT='Created rooms';
