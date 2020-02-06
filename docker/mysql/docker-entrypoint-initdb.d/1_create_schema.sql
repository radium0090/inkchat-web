DROP USER IF EXISTS 'inkchat'@'%';
CREATE USER 'inkchat'@'%' IDENTIFIED BY 'inkchat';

DROP DATABASE IF EXISTS `inkchat`;
CREATE DATABASE IF NOT EXISTS `inkchat` COLLATE 'utf8_general_ci' ;
GRANT ALL ON `inkchat`.* TO 'inkchat'@'%' ;

FLUSH PRIVILEGES ;
