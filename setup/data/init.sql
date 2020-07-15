use database;

CREATE TABLE `author` (
`email` varchar(255) primary key
, `name` varchar(255) not null
, `password_hash` varchar(255) not null
)
