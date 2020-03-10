CREATE DATABASE dbagevir;
USE dbagevir;
CREATE USER 'agevirroot'@'localhost' IDENTIFIED BY 'agerviradmin';
GRANT SELECT, INSERT, UPDATE, DELETE, EXECUTE, SHOW VIEW ON dbagevir.* TO 'agevirroot'@'localhost';