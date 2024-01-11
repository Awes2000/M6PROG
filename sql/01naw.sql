USE m6prog_db;



CREATE TABLE `naw` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `naam` VARCHAR(100) NOT NULL,
  `straat` VARCHAR(100) NOT NULL,
  `huisnummer` VARCHAR(6) NOT NULL,
  `postcode` VARCHAR(6) NOT NULL,
  `email` VARCHAR(120) NOT NULL,
  PRIMARY KEY (`id`)
) 
