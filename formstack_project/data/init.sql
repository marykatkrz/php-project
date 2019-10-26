CREATE DATABASE users;

  use users;

  CREATE TABLE users (
    id INT(11) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    firstname VARCHAR(50) NOT NULL,
    lastname VARCHAR(50) NOT NULL,
    age INT(3),
    location VARCHAR(100),
    date TIMESTAMP,
    lastmodified TIMESTAMP,
  );

