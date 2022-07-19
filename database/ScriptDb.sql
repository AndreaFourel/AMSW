-- DB creation
CREATE DATABASE AMSW;
USE AMSW;

-- tables creation
CREATE TABLE countrys (
    id_country CHAR(3) PRIMARY KEY NOT NULL,
    name VARCHAR(50) NOT NULL,
    leadership VARCHAR(50) NOT NULL,
    currency VARCHAR(50) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE characters (
    id_character INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    birth_date DATE NOT NULL,
    country_id CHAR(3) NOT NULL,
    FOREIGN KEY (country_id) REFERENCES countrys(id_country)
) ENGINE = InnoDB;

CREATE TABLE agents (
    id_agent INT PRIMARY KEY NOT NULL,
    id_code VARCHAR(50) NOT NULL,
    FOREIGN KEY (id_agent) REFERENCES characters (id_character)
) ENGINE = InnoDB;

CREATE TABLE contacts (
    id_contact INT PRIMARY KEY NOT NULL,
    code_name VARCHAR(50) NOT NULL,
    FOREIGN KEY (id_contact) REFERENCES characters (id_character)
) ENGINE = InnoDB;

CREATE TABLE targets (
    id_target INT PRIMARY KEY NOT NULL,
    code_name VARCHAR(50) NOT NULL,
    FOREIGN KEY (id_target) REFERENCES characters (id_character)
) ENGINE = InnoDB;

CREATE TABLE skills (
    id_skill INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    description VARCHAR(500)
) ENGINE = InnoDB;

CREATE TABLE mission_types (
    id_mission_type INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE mission_status (
    id_status INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
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
    agent_id INT NOT NULL,
    skill_id INT NOT NULL,
    PRIMARY KEY (agent_id, skill_id),
    FOREIGN KEY (agent_id) REFERENCES agents (id_agent),
    FOREIGN KEY (skill_id) REFERENCES skills (id_skill)
) ENGINE = InnoDB;

CREATE TABLE missions_agents (
    agent_id INT NOT NULL,
    mission_id INT NOT NULL,
    PRIMARY KEY (agent_id, mission_id),
    FOREIGN KEY (agent_id) REFERENCES agents (id_agent),
    FOREIGN KEY (mission_id) REFERENCES missions (id_mission)
) ENGINE = InnoDB;

CREATE TABLE missions_contacts (
    contact_id INT NOT NULL,
    mission_id INT NOT NULL,
    PRIMARY KEY (contact_id, mission_id),
    FOREIGN KEY (contact_id) REFERENCES contacts (id_contact),
    FOREIGN KEY (mission_id) REFERENCES missions (id_mission)
) ENGINE = InnoDB;

CREATE TABLE missions_targets (
    target_id INT NOT NULL,
    mission_id INT NOT NULL,
    PRIMARY KEY (target_id, mission_id),
    FOREIGN KEY (target_id) REFERENCES targets (id_target),
    FOREIGN KEY (mission_id) REFERENCES missions (id_mission)
) ENGINE = InnoDB;

CREATE TABLE missions_stashes (
    stash_code CHAR(5) NOT NULL,
    mission_id INT NOT NULL,
    PRIMARY KEy (stash_code, mission_id),
    FOREIGN KEY (stash_code) REFERENCES stashes (stash_code),
    FOREIGN KEY (mission_id) REFERENCES missions (id_mission)
) ENGINE = InnoDB;

CREATE TABLE users (
    id_user INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    mail VARCHAR(200) NOT NULL,
    password CHAR(60) NOT NULL,
    creation_date DATETIME
) ENGINE = InnoDB;

CREATE TABLE roles (
    id_role INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE users_roles (
    user_id INT NOT NULL,
    role_id INT NOT NULL,
    PRIMARY KEY (user_id, role_id),
    FOREIGN KEY (user_id) REFERENCES users (id_user),
    FOREIGN KEY (role_id) REFERENCES roles (id_role)
) ENGINE = InnoDB;

-- insert data into AMSW database

INSERT INTO
    countrys (id_country, name, leadership, currency)
VALUES
       ('AMK', 'Ankh-Morpork', 'oligarchie', 'AM$'),
       ('LAN', 'Lancre', 'monarchie', 'penny'),
       ('UBW', 'Uberwald', 'principautés', 'couronne'),
       ('AGT', 'Empire agatéen', 'empire', 'rhinu'),
       ('EPH', 'Ephèbe', 'tyrannie', 'obolus'),
       ('JOH', 'Royaume de Jolhimôme', 'monarchie', 'toon'),
       ('OMN', 'Omnia', 'théocracie autocratique', 'obol'),
       ('KLA', 'Klatch', 'monarchie', 'dinar'),
       ('SHE', 'Sto Hélit', 'duché', 'brass'),
       ('TSO', 'Tsort', 'monarchie', 'para'),
       ('KRU', 'Krull', 'asstrophilosophie', 'toman'),
       ('XXX', 'XXXX ou Quadrix', 'république démocratique', 'squid');

INSERT INTO
    characters (first_name, last_name, birth_date, country_id)
VALUES
       ('Esméralda', 'Ciredutemps', '1890-01-26', 'LAN'),
       ('Léonard', 'Quirm', '1920-03-03', 'AMK'),
       ('Claude Maximilien Harmoni Transpire', 'Planteur', '1940-07-30', 'AMK'),
       ('Claude Maximilien Harmoni Transpire', 'Plhata', '1940-07-30', 'OMN'),
       ('Claude Maximilien Harmoni Transpire', 'Planthara', '1940-07-30', 'AGT'),
       ('Claude Maximilien Harmoni Transpire', 'Plang-Plang', '1940-07-30', 'XXX'),
       ('Jeanson', 'Bergholt Stuttelet', '1912-12-20', 'EPH'),
       ('Samuel', 'Vimaire', '1960-05-13', 'AMK'),
       ('Angua', 'Von Uberwald', '1975-08-03', 'UBW'),
       ('Deux', 'Fleurs', '1975-04-12', 'AGT'),
       ('Giamo', 'Casanabo', '1930-06-12', 'UBW'),
       ('Carotte', 'Fondeurenfersson', '1975-06-03', 'LAN'),
       ('Cohen', 'Le Barbare', '1880-02-20', 'AGT'),
       ('Gytha', 'Ogg', '1900-01-01', 'LAN'),
       ('Magrat', 'Goussedail', '1969-09-05', 'LAN'),
       ('Suzanne', 'Sto Hélit', '1980-06-06', 'SHE'),
       ('71 heures', 'Ahmed', '1961-10-01', 'KLA'),
       ('Rincevent', 'Maje', '1935-11-11', 'AMK'),
       ('Lu', 'Tze', '1898-04-29', 'AGT');

INSERT INTO
    agents (id_agent, id_code)
VALUES
       (1, 'Mémé'),
       (8, 'Sam'),
       (9, 'La louve'),
       (12, 'Le nain'),
       (16, 'L''instit'),
       (19, 'Le sage'),
       (17, '71h');

--add profession column to contacts table
ALTER TABLE contacts
ADD profession VARCHAR(500);

INSERT INTO
    contacts (id_contact, code_name, profession)
VALUES
       (3, 'Planteur Je-m''tranche-la-gorge', 'vendeur de marchandises douteuses'),
       (4, 'Plhata Je-me-tranche-la-main', 'vendeur de sucreries et de yaourts vivants'),
       (5, 'Planthara Je-m''éventre-honorablement', 'vendeur de vieux œufs, des gâteaux de riz et des boulettes de porc sur une baguette'),
       (6, 'Plang-Plang J''avale-ma-sarbacane', 'vendeur de bière non fermentée'),
       (11, 'L''amant enragé', 'deuxième plus grand amant du monde, menteur éhonté, soldat de fortune, fin bretteur, réparateur d''escabeaux'),
       (14, 'Nounou', 'sorcière');

INSERT INTO
    targets (id_target, code_name)
VALUES
       (2, 'Le bricoleur'),
       (7, 'Bougre-de-Sagouin'),
       (15, 'Bonnet de nuit sans coiffe'),
       (13, 'Le héro'),
       (18, 'Le mage raté'),
       (10, 'Le touriste');

-- modify one entry
UPDATE contacts
SET profession = 'vendeur de vieux oeufs, des gâteaux de riz et des boulettes de porc sur une baguette'
WHERE id_contact = 5;

INSERT INTO
    skills (name, description)
VALUES
       ('Tétologie', 'Imposer sa propre volonté par la seule force du regard et de la conviction à un autre individu. Par exemple: convaincre quelqun qu''il est une grenouille plutôt que de vraiment le métamorphoser en batracien ou encore de soigner par l''effet placebo'),
       ('L''emprunt', 'Entrer dans l''esprit des animaux pour leur emprunter leur corps sous réserve d''abandonner temporairement le sien (en prenant soin de laisser une note « chus pas morte » près de son corps pour éviter tout malentendu)'),
       ('Invisibilité', 'Se rendre invisible (parfois par accident) aux esprits non magiques'),
       ('Passe-muraille', 'Se rendre immatériel et traverser n''importe quel obstacle'),
       ('Porte-clefs', 'Ouvrir n''importe quelle serrure'),
       ('La Bête', 'Energie agressive utilisé lors des combats de rues et qui suggère souvent qu''agir contre les lois rendrait le monde meilleur et plus juste'),
       ('Descendance royale', 'Charisme exceptionnel et une aptitude à planter des épées dans la roche et à les retirer sans difficulté'),
       ('Loup-garou', 'Se transfomer en loup-garou une semaine par mois à la pleine lune'),
       ('Assassin', 'On y fait appel pour mettre définitivement un terme à la vie d’une tierce personne au moyen de dague, d''arbalète ou du poison, mais certainement pas des explosifs ou des armes lourdes'),
       ('Alchimie', 'Capacité de convaincre les rois et seigneurs qu''on peut changer le plomb en or et que tout ce dont on a besoin et une subvention pour poursuivre les recherches'),
       ('Héro Barbare', 'Un profil de lutteur, un quotient intellectuel inversement proportionnel, des prouesses inégalées au combat, une volonté de fer'),
       ('Garde', 'Personne qui s’occupe de préserver la paix, arrêtant les personnes qui vont là où elles ne doivent pas aller et leur courant après si elles le font vraiment, mène également des enquêtes'),
       ('Déjà fu', 'Art martial dans lequel les mains bougent dans le temps comme dans l''espace. Ceci est mieux décrit comme "le sentiment que vous avez déjà reçu un coup de pied dans la tête de cette façon"');

-- modify entry's
UPDATE skills
SET description = 'Personne qui s''occupe de préserver la paix, arrêtant les personnes qui vont là où elles ne doivent pas aller et leur courant après si elles le font vraiment, mène également des enquêtes'
WHERE id_skill = 12;

UPDATE skills
SET description = 'On y fait appel pour mettre définitivement un terme à la vie d''une tierce personne au moyen de dague, d''arbalète ou du poison, mais certainement pas des explosifs ou des armes lourdes'
WHERE id_skill = 9;

INSERT INTO
    mission_types (name)
VALUES ('Surveillance'),
       ('Assasinat'),
       ('Infiltration'),
       ('Sabotage'),
       ('Enlèvement'),
       ('Sauvetage');

INSERT INTO
    mission_status (status, color)
VALUES
    ('En préparation', 'F2F225'),
    ('En cours', '0A4664'),
    ('Terminé', '75B424'),
    ('Echec', 'FE2D00'),
    ('Gros fiasco', '000000');






