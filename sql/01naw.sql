USE m6prog_db;



CREATE TABLE `naw` (
  `id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(100) NOT NULL,
  `via` VARCHAR(100) NOT NULL,
  `numero` VARCHAR(6) NOT NULL,
  `codice_postale` VARCHAR(6) NOT NULL,
  `email` VARCHAR(120) NOT NULL,
  PRIMARY KEY (`id`)
) 
