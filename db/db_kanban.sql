-- MySQL Script generated by MySQL Workbench
-- Tue Nov 26 15:21:12 2024
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema db_kanban
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema db_kanban
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `db_kanban` DEFAULT CHARACTER SET utf8 ;
USE `db_kanban` ;

-- -----------------------------------------------------
-- Table `db_kanban`.`usuarios`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_kanban`.`usuarios` (
  `id_usuario` INT(11) NOT NULL AUTO_INCREMENT,
  `nome` VARCHAR(255) NULL DEFAULT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id_usuario`))
ENGINE = InnoDB
AUTO_INCREMENT = 2
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `db_kanban`.`tarefas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `db_kanban`.`tarefas` (
  `id_tarefa` INT(11) NOT NULL AUTO_INCREMENT,
  `descricao` TEXT NULL DEFAULT NULL,
  `setor` VARCHAR(255) NULL DEFAULT NULL,
  `prioridade` VARCHAR(255) NULL DEFAULT NULL,
  `situacao` VARCHAR(255) NULL DEFAULT NULL,
  `id_usuario` INT(11) NOT NULL,
  `dataCadastro` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  PRIMARY KEY (`id_tarefa`),
  INDEX `fk_tarefas_usuarios_idx` (`id_usuario` ASC) VISIBLE,
  CONSTRAINT `fk_tarefas_usuarios`
    FOREIGN KEY (`id_usuario`)
    REFERENCES `db_kanban`.`usuarios` (`id_usuario`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
AUTO_INCREMENT = 5
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
