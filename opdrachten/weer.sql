CREATE SCHEMA 'weer';
USE 'weer';

CREATE TABLE 'weeromstandigheden'
(
    `idWeeromstandighedenPerDag` INT UNSIGNED NOT NULL AUTO_INCREMENT,
    `datum` DATE NOT NULL,
    `aantalGraden` DECIMAL NOT NULL,
    `windkracht` INT NOT NULL,
    `regenInMilimeters` DECIMAL,
    `plaats` VARCHAR(125) NOT NULL,
    PRIMARY KEY (`idWeeromstandighedenPerDag`),
    UNIQUE INDEX `idweeromstandighedenPerDag_UNIQUE` (`idWeeromstandighedenPerDag` ASC) VISIBLE,
)