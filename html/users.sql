DROP DATABASE IF EXISTS users;
CREATE DATABASE users;
USE users;

CREATE TABLE IF NOT EXISTS _users(
    id INT AUTO_INCREMENT PRIMARY KEY,
    name            VARCHAR(255) NOT NULL, 
    email           VARCHAR(255) NOT NULL
);
CREATE TABLE IF NOT EXISTS user_details (
    user_id INT PRIMARY KEY, -- Use user_id as the primary key
    fname VARCHAR(255) NOT NULL,
    lname VARCHAR(255) NOT NULL,
    phone VARCHAR(20) NOT NULL,
    street_address TEXT NOT NULL,
    city VARCHAR(100) NOT NULL,
    state VARCHAR(100) NOT NULL,
    zip VARCHAR(20) NOT NULL,
    FOREIGN KEY (user_id) REFERENCES _users(id)
);

