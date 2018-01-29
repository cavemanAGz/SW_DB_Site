-- Main Tables Created using MySQL workbench

---- NEW TABLES ---
CREATE TABLE IF NOT EXISTS `swdb_planets` (
  `pid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `plan_name` VARCHAR(255) NOT NULL,
  `climate` TEXT NULL,
  `population` BIGINT NOT NULL,
  `notes` TEXT NULL,
  PRIMARY KEY (`pid`),
  UNIQUE INDEX `plan_id_UNIQUE` (`pid` ASC),
  UNIQUE INDEX `plan_name_UNIQUE` (`plan_name` ASC))
ENGINE = InnoDB;

-- Insert characters table
CREATE TABLE IF NOT EXISTS `swdb_characters` (
  `cid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `f_name` VARCHAR(255) NOT NULL,
  `l_name` VARCHAR(255) NOT NULL,
  `call_sign` VARCHAR(255) NULL,
  `title` VARCHAR(255) NULL,
  `Gender` VARCHAR(25) NULL,
  `iconic` TINYINT NULL,
  `Planets_pid` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`cid`, `Planets_pid`),
  UNIQUE INDEX `char_id_UNIQUE` (`cid` ASC),
  INDEX `fk_Characters_Planets1_idx` (`Planets_pid` ASC),
  CONSTRAINT `fk_Characters_Planets1`
    FOREIGN KEY (`Planets_pid`)
    REFERENCES `swdb_planets` (`pid`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- Insert vehicles table
CREATE TABLE IF NOT EXISTS `swdb_vehicles` (
  `vid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `vehic_name` VARCHAR(255) NOT NULL,
  `type` VARCHAR(255) NOT NULL,
  `about` TEXT NULL,
  `iconic` TINYINT NOT NULL DEFAULT 0,
  `Planets_pid` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`vid`, `Planets_pid`),
  INDEX `fk_Vehicles_Planets1_idx` (`Planets_pid` ASC),
  CONSTRAINT `fk_Vehicles_Planets1`
    FOREIGN KEY (`Planets_pid`)
    REFERENCES `swdb_planets` (`pid`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- Insert Species table
CREATE TABLE IF NOT EXISTS `swdb_species` (
  `sid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `spec_name` VARCHAR(255) NULL,
  `spec_desc` TEXT NULL,
  `swdb_planets_pid` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`sid`, `swdb_planets_pid`),
  UNIQUE INDEX `species_id_UNIQUE` (`sid` ASC),
  UNIQUE INDEX `species_name_UNIQUE` (`spec_name` ASC),
  INDEX `fk_swdb_species_swdb_planets1_idx` (`swdb_planets_pid` ASC),
  CONSTRAINT `fk_swdb_species_swdb_planets1`
    FOREIGN KEY (`swdb_planets_pid`)
    REFERENCES `swdb_planets` (`pid`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;

-- Insert Organizations table
CREATE TABLE IF NOT EXISTS `swdb_organizations` (
  `oid` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `type` VARCHAR(255) NOT NULL,
  `about` TEXT NULL,
  PRIMARY KEY (`oid`),
  UNIQUE INDEX `org_id_UNIQUE` (`oid` ASC))
ENGINE = InnoDB;

-- Begin many to many relation table inserts
-- Insert character vehicle relation table
CREATE TABLE IF NOT EXISTS `swdb_rel_char_vehicle` (
  `swdb_vehicles_vid` INT UNSIGNED NOT NULL,
  `swdb_characters_cid` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`swdb_vehicles_vid`, `swdb_characters_cid`),
  INDEX `fk_swdb_rel_char_vehicle_swdb_characters1_idx` (`swdb_characters_cid` ASC),
  CONSTRAINT `fk_swdb_rel_char_vehicle_swdb_vehicles1`
    FOREIGN KEY (`swdb_vehicles_vid`)
    REFERENCES `swdb_vehicles` (`vid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_swdb_rel_char_vehicle_swdb_characters1`
    FOREIGN KEY (`swdb_characters_cid`)
    REFERENCES `swdb_characters` (`cid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- Insert character organization relation table
CREATE TABLE IF NOT EXISTS `swdb_rel_char_org` (
  `swdb_characters_cid` INT UNSIGNED NOT NULL,
  `swdb_organizations_oid` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`swdb_characters_cid`, `swdb_organizations_oid`),
  INDEX `fk_swdb_rel_char_org_swdb_organizations1_idx` (`swdb_organizations_oid` ASC),
  CONSTRAINT `fk_swdb_rel_char_org_swdb_characters1`
    FOREIGN KEY (`swdb_characters_cid`)
    REFERENCES `swdb_characters` (`cid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_swdb_rel_char_org_swdb_organizations1`
    FOREIGN KEY (`swdb_organizations_oid`)
    REFERENCES `swdb_organizations` (`oid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- Insert character species relation table
CREATE TABLE IF NOT EXISTS `swdb_rel_char_spec` (
  `swdb_characters_cid` INT UNSIGNED NOT NULL,
  `swdb_species_sid` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`swdb_characters_cid`, `swdb_species_sid`),
  INDEX `fk_swdb_rel_char_spec_swdb_species1_idx` (`swdb_species_sid` ASC),
  CONSTRAINT `fk_swdb_rel_char_spec_swdb_characters1`
    FOREIGN KEY (`swdb_characters_cid`)
    REFERENCES `swdb_characters` (`cid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_swdb_rel_char_spec_swdb_species1`
    FOREIGN KEY (`swdb_species_sid`)
    REFERENCES `swdb_species` (`sid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;

-- Insert organization adversaries relation table
CREATE TABLE IF NOT EXISTS `swdb_rel_org_adver` (
  `swdb_organizations_oid` INT UNSIGNED NOT NULL,
  `swdb_organizations_oid1` INT UNSIGNED NOT NULL,
  PRIMARY KEY (`swdb_organizations_oid`, `swdb_organizations_oid1`),
  INDEX `fk_swdb_rel_org_adver_swdb_organizations2_idx` (`swdb_organizations_oid1` ASC),
  CONSTRAINT `fk_swdb_rel_org_adver_swdb_organizations1`
    FOREIGN KEY (`swdb_organizations_oid`)
    REFERENCES `swdb_organizations` (`oid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_swdb_rel_org_adver_swdb_organizations2`
    FOREIGN KEY (`swdb_organizations_oid1`)
    REFERENCES `swdb_organizations` (`oid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;
