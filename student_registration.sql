CREATE DATABASE student_registration;

USE student_registration;

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_name VARCHAR(100),
    class VARCHAR(50),
    parent_name VARCHAR(100),
    contact_number VARCHAR(15),
    course VARCHAR(100),
    branch VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255)
);

INSERT INTO admin (username, password)
VALUES ('admin', 'admin123');