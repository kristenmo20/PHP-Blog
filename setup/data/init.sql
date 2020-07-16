use database;

CREATE TABLE `author` (
`email` varchar(255) PRIMARY KEY
, `name` varchar(255) NOT NULL
, `password_hash` varchar(255) NOT NULL
);

CREATE TABLE `blogPost` (
    `slug` varchar(40) PRIMARY KEY
    , `post_name` varchar(255) NOT NULL
    , `post_content` text
    , `author`varchar(255) FOREIGN KEY REFERENCES `author`(`email`)
    , `publication_date` date
);