CREATE TABLE users (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE music (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    artist VARCHAR(50) NOT NULL UNIQUE,
    album VARCHAR(50) NOT NULL UNIQUE,
    genre VARCHAR(50) NOT NULL UNIQUE,
    yearReleased VARCHAR(50) NOT NULL UNIQUE,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);