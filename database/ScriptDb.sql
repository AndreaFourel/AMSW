CREATE DATABASE AMSW;
USE AMSW;

CREATE TABLE countrys (
    id_country CHAR(3) PRIMARY KEY NOT NULL,
    name VARCHAR(50) NOT NULL,
    leadership VARCHAR(50) NOT NULL,
    currency VARCHAR(50) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE characters (
    id_character INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    birth_date DATE NOT NULL,
    country_id CHAR(3) NOT NULL,
    FOREIGN KEY (country_id) REFERENCES countrys(id_country)
) ENGINE = InnoDB;

CREATE TABLE agents (
    id_agent INT(11) PRIMARY KEY NOT NULL,
    id_code VARCHAR(50) NOT NULL,
    FOREIGN KEY (id_agent) REFERENCES characters (id_character)
) ENGINE = InnoDB;

CREATE TABLE contacts (
    id_contact INT (11)PRIMARY KEY NOT NULL,
    code_name VARCHAR(50) NOT NULL,
    FOREIGN KEY (id_contact) REFERENCES characters (id_character)
) ENGINE = InnoDB;

CREATE TABLE targets (
    id_target INT(11) PRIMARY KEY NOT NULL,
    code_name VARCHAR(50) NOT NULL,
    FOREIGN KEY (id_target) REFERENCES characters (id_character)
) ENGINE = InnoDB;

CREATE TABLE skills (
    id_skill INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    description VARCHAR(500)
) ENGINE = InnoDB;

CREATE TABLE mission_types (
    id_mission_type INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE mission_status (
    id_status INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    status VARCHAR(50) NOT NULL,
    color VARCHAR(10) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE stashes (
    stash_code CHAR(5) PRIMARY KEY NOT NULL,
    name VARCHAR(50) NOT NULL,
    address VARCHAR(100) NOT NULL,
    type VARCHAR(50) NOT NULL ,
    country_id CHAR (3) NOT NULL,
    FOREIGN KEY (country_id) REFERENCES countrys (id_country)
) ENGINE = InnoDB;

CREATE TABLE missions (
    id_mission INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    description VARCHAR(500) NOT NULL,
    code_name VARCHAR(50) NOT NULL,
    start_date DATETIME,
    end_date DATETIME,
    country_id CHAR(3) NOT NULL,
    skill_id INT(11) NOT NULL,
    mission_type_id INT(11) NOT NULL,
    status_id INT(11) NOT NULL,
    FOREIGN KEY (country_id) REFERENCES countrys (id_country),
    FOREIGN KEY (skill_id) REFERENCES skills (id_skill),
    FOREIGN KEY (mission_type_id) REFERENCES mission_types (id_mission_type),
    FOREIGN KEY (status_id) REFERENCES mission_status (id_status)
) ENGINE = InnoDB;

CREATE TABLE agents_skills (
    agent_id INT(11) PRIMARY KEY NOT NULL,
    skill_id INT(11) PRIMARY KEY NOT NULL,
    FOREIGN KEY (agent_id) REFERENCES agents (id_agent),
    FOREIGN KEY (skill_id) REFERENCES skills (id_skill)
) ENGINE = InnoDB;

CREATE TABLE missions_agents (
    agent_id INT(11) PRIMARY KEY NOT NULL,
    mission_id INT(11) PRIMARY KEY NOT NULL,
    FOREIGN KEY (agent_id) REFERENCES agents (id_agent),
    FOREIGN KEY (mission_id) REFERENCES missions (id_mission)
) ENGINE = InnoDB;

CREATE TABLE missions_contacts (
    contact_id INT(11) PRIMARY KEY NOT NULL,
    mission_id INT(11) PRIMARY KEY NOT NULL,
    FOREIGN KEY (contact_id) REFERENCES contacts (id_contact),
    FOREIGN KEY (mission_id) REFERENCES missions (id_mission)
) ENGINE = InnoDB;

CREATE TABLE missions_targets (
    target_id INT(11) PRIMARY KEY NOT NULL,
    mission_id INT(11) PRIMARY KEY NOT NULL,
    FOREIGN KEY (target_id) REFERENCES targets (id_target),
    FOREIGN KEY (mission_id) REFERENCES missions (id_mission)
) ENGINE = InnoDB;

CREATE TABLE missions_stashes (
    stash_code CHAR(5) PRIMARY KEY NOT NULL,
    mission_id INT(11) PRIMARY KEY NOT NULL,
    FOREIGN KEY (stash_code) REFERENCES stashes (stash_code),
    FOREIGN KEY (mission_id) REFERENCES missions (id_mission)
) ENGINE = InnoDB;

CREATE TABLE users (
    id_user INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    mail VARCHAR(200) NOT NULL,
    password CHAR(60) NOT NULL,
    creation_date DATETIME
) ENGINE = InnoDB;

CREATE TABLE roles (
    id_role INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE users_roles (
    user_id INT(11) PRIMARY KEY NOT NULL,
    role_id INT(11) PRIMARY KEY NOT NULL,
    FOREIGN KEY (user_id) REFERENCES users (id_user),
    FOREIGN KEY (role_id) REFERENCES roles (id_role)
) ENGINE = InnoDB;