-- DB creation
CREATE DATABASE AMSW;
USE AMSW;

-- tables creation
CREATE TABLE country (
    id CHAR(3) PRIMARY KEY NOT NULL,
    name VARCHAR(50) NOT NULL,
    leadership VARCHAR(50) NOT NULL,
    currency VARCHAR(50) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE person (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    birth_date DATE NOT NULL,
    country_id CHAR(3) NOT NULL,
    FOREIGN KEY (country_id) REFERENCES country(id)
) ENGINE = InnoDB;

CREATE TABLE agent (
    agent_id INT PRIMARY KEY NOT NULL,
    id_code VARCHAR(50) NOT NULL,
    FOREIGN KEY (agent_id) REFERENCES person (id)
) ENGINE = InnoDB;

CREATE TABLE contact (
    contact_id INT PRIMARY KEY NOT NULL,
    code_name VARCHAR(50) NOT NULL,
    profession VARCHAR(255),
    FOREIGN KEY (contact_id) REFERENCES person (id)
) ENGINE = InnoDB;

CREATE TABLE target (
    target_id INT PRIMARY KEY NOT NULL,
    code_name VARCHAR(50) NOT NULL,
    FOREIGN KEY (target_id) REFERENCES person (id)
) ENGINE = InnoDB;

CREATE TABLE skill (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    description VARCHAR(255)
) ENGINE = InnoDB;

CREATE TABLE mission_type (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE mission_status (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    status VARCHAR(50) NOT NULL,
    color VARCHAR(10) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE stash (
    stash_code CHAR(5) PRIMARY KEY NOT NULL,
    name VARCHAR(50) NOT NULL,
    address VARCHAR(100) NOT NULL,
    type VARCHAR(50) NOT NULL ,
    country_id CHAR (3) NOT NULL,
    FOREIGN KEY (country_id) REFERENCES country (id)
) ENGINE = InnoDB;

CREATE TABLE mission (
    id INT(11) PRIMARY KEY NOT NULL AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    description VARCHAR(255) NOT NULL,
    code_name VARCHAR(50) NOT NULL,
    start_date DATETIME,
    end_date DATETIME,
    country_id CHAR(3) NOT NULL,
    skill_id INT(11) NOT NULL,
    mission_type_id INT(11) NOT NULL,
    status_id INT(11) NOT NULL,
    FOREIGN KEY (country_id) REFERENCES country (id),
    FOREIGN KEY (skill_id) REFERENCES skill (id),
    FOREIGN KEY (mission_type_id) REFERENCES mission_type (id),
    FOREIGN KEY (status_id) REFERENCES mission_status (id)
) ENGINE = InnoDB;

CREATE TABLE agent_skill (
    agent_id INT NOT NULL,
    skill_id INT NOT NULL,
    PRIMARY KEY (agent_id, skill_id),
    FOREIGN KEY (agent_id) REFERENCES agent (agent_id),
    FOREIGN KEY (skill_id) REFERENCES skill (id)
) ENGINE = InnoDB;

CREATE TABLE mission_agent (
    agent_id INT NOT NULL,
    mission_id INT NOT NULL,
    PRIMARY KEY (agent_id, mission_id),
    FOREIGN KEY (agent_id) REFERENCES agent (agent_id),
    FOREIGN KEY (mission_id) REFERENCES mission (id)
) ENGINE = InnoDB;

CREATE TABLE mission_contact (
    contact_id INT NOT NULL,
    mission_id INT NOT NULL,
    PRIMARY KEY (contact_id, mission_id),
    FOREIGN KEY (contact_id) REFERENCES contact (contact_id),
    FOREIGN KEY (mission_id) REFERENCES mission (id)
) ENGINE = InnoDB;

CREATE TABLE mission_target (
    target_id INT NOT NULL,
    mission_id INT NOT NULL,
    PRIMARY KEY (target_id, mission_id),
    FOREIGN KEY (target_id) REFERENCES target (target_id),
    FOREIGN KEY (mission_id) REFERENCES mission (id)
) ENGINE = InnoDB;

CREATE TABLE mission_stash (
    stash_code CHAR(5) NOT NULL,
    mission_id INT NOT NULL,
    PRIMARY KEy (stash_code, mission_id),
    FOREIGN KEY (stash_code) REFERENCES stash (stash_code),
    FOREIGN KEY (mission_id) REFERENCES mission (id)
) ENGINE = InnoDB;

CREATE TABLE user (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    mail VARCHAR(200) NOT NULL,
    password CHAR(60) NOT NULL,
    creation_date DATETIME
) ENGINE = InnoDB;

CREATE TABLE role (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE user_role (
    user_id INT NOT NULL,
    role_id INT NOT NULL,
    PRIMARY KEY (user_id, role_id),
    FOREIGN KEY (user_id) REFERENCES user (id),
    FOREIGN KEY (role_id) REFERENCES role (id)
) ENGINE = InnoDB;

-- insert data into AMSW database

INSERT INTO
    country (id, name, leadership, currency)
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
    person (first_name, last_name, birth_date, country_id)
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
    agent (agent_id, id_code)
VALUES
       (1, 'Mémé'),
       (8, 'Sam'),
       (9, 'La louve'),
       (12, 'Le nain'),
       (16, 'L''instit'),
       (19, 'Le sage'),
       (17, '71h');



INSERT INTO
    contact (contact_id, code_name, profession)
VALUES
       (3, 'Planteur Je-m''tranche-la-gorge', 'vendeur de marchandises douteuses'),
       (4, 'Plhata Je-me-tranche-la-main', 'vendeur de sucreries et de yaourts vivants'),
       (5, 'Planthara Je-m''éventre-honorablement', 'vendeur de vieux oeufs, des gâteaux de riz et des boulettes de porc sur une baguette'),
       (6, 'Plang-Plang J''avale-ma-sarbacane', 'vendeur de bière non fermentée'),
       (11, 'L''amant enragé', 'deuxième plus grand amant du monde, menteur éhonté, soldat de fortune, fin bretteur, réparateur d''escabeaux'),
       (14, 'Nounou', 'sorcière');

INSERT INTO
    target (target_id, code_name)
VALUES
       (2, 'Le bricoleur'),
       (7, 'Bougre-de-Sagouin'),
       (15, 'Bonnet de nuit sans coiffe'),
       (13, 'Le héro'),
       (18, 'Le mage raté'),
       (10, 'Le touriste');


INSERT INTO
    skill (name, description)
VALUES
       ('Tétologie', 'Imposer sa propre volonté par la seule force du regard et de la conviction à un autre individu. Par exemple: convaincre quelqun qu''il est une grenouille plutôt que de vraiment le métamorphoser en batracien ou encore de soigner par l''effet placebo'),
       ('L''emprunt', 'Entrer dans l''esprit des animaux pour leur emprunter leur corps sous réserve d''abandonner temporairement le sien (en prenant soin de laisser une note « chus pas morte » près de son corps pour éviter tout malentendu)'),
       ('Invisibilité', 'Se rendre invisible (parfois par accident) aux esprits non magiques'),
       ('Passe-muraille', 'Se rendre immatériel et traverser n''importe quel obstacle'),
       ('Porte-clefs', 'Ouvrir n''importe quelle serrure'),
       ('La Bête', 'Energie agressive utilisé lors des combats de rues et qui suggère souvent qu''agir contre les lois rendrait le monde meilleur et plus juste'),
       ('Descendance royale', 'Charisme exceptionnel et une aptitude à planter des épées dans la roche et à les retirer sans difficulté'),
       ('Loup-garou', 'Se transfomer en loup-garou une semaine par mois à la pleine lune'),
       ('Assassin', 'On y fait appel pour mettre définitivement un terme à la vie d''une tierce personne au moyen de dague, d''arbalète ou du poison, mais certainement pas des explosifs ou des armes lourdes'),
       ('Alchimie', 'Capacité de convaincre les rois et seigneurs qu''on peut changer le plomb en or et que tout ce dont on a besoin et une subvention pour poursuivre les recherches'),
       ('Héro Barbare', 'Un profil de lutteur, un quotient intellectuel inversement proportionnel, des prouesses inégalées au combat, une volonté de fer'),
       ('Garde', 'Personne qui s''occupe de préserver la paix, arrêtant les personnes qui vont là où elles ne doivent pas aller et leur courant après si elles le font vraiment, mène également des enquêtes'),
       ('Déjà fu', 'Art martial dans lequel les mains bougent dans le temps comme dans l''espace. Ceci est mieux décrit comme "le sentiment que vous avez déjà reçu un coup de pied dans la tête de cette façon"');


INSERT INTO
    mission_type (name)
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

INSERT INTO
    stash (stash_code, name, address, type, country_id)
VALUES
       ('AMK01', 'Le Tambour Rafistolé', 'Rue du Filigrane', 'chambre raisonnablement insalubre', 'AMK'),
       ('AMK02', 'La Tête de Troll', 'Les Ombres', 'remise glauque', 'AMK'),
       ('AMK03', 'Le Seau', 'Rue des Orfèvres', 'endroit calme', 'AMK'),
       ('LAN01', 'La Grange', 'Trou-d''Ucques', 'grange isolée', 'LAN'),
       ('LAN02', 'La Fromagerie', 'Rue du Bleu de Lancre à Ohulan Cutash', 'abris de caractère', 'LAN'),
       ('LAN03', 'La Cabane', 'Forêt de Skund', 'maison en pain d''épice', 'LAN'),
       ('UBW01', 'La Mine', 'Route des Diligences à Kondom', 'mine de graisse', 'UBW'),
       ('UBW02', 'Le Croc', 'Rue de la Mélasse', 'repaire de vampires', 'UBW'),
       ('AGT01', 'Le Port', 'Port de Bès-Pélargic à Hung-Hung', 'hangar vide', 'AGT'),
       ('AGT02', 'Le Temple', 'Rue de la Grande Muraille à Hung-Hung', 'chambre richement décorée', 'AGT'),
       ('EPH01', 'Le Labyrinthe', 'Rue des Esclaves', 'ruines d''une fameuse bibliothèque', 'EPH'),
       ('JOH01', 'Le Tombeau', 'Route de Tsort', 'pièce secrète dans une pyramide', 'JOH'),
       ('KRU01', 'L''Observatoire', 'Rue des Etoiles', 'chambre de disciple', 'KRU'),
       ('XXX01', 'La Poche', 'Rue des Kangourous', 'Poche marsupialle', 'XXX'),
       ('XXX02', 'Le Mouchoir', 'Foutenlair', 'vestibule secret à l''opéra de Foutenlair', 'XXX');

INSERT INTO
    mission (title, description, code_name, start_date, end_date, country_id, skill_id, mission_type_id, status_id)
VALUES
       ('Trouver et ramener Léonard Quirm', 'Léonard Quirm, le plus grand génie du Disque Monde, a été kidnappé par les iksiens. Il faut le trouver et le ramèner à Ankh-Morpork',
        'Sauver le bricoleur', '2012-03-03 12:00', '2012-03-13 10:00', 'XXX', 8, 6, 3),
       ('Tuer Bougre-de-Sagouin Jeanson', 'Bougre-de-Sagouin Jeanson, sans conteste le plus pitoyable architecte et ingénieur du multivers, a tracé des nouveaux plans. Cela ne peut plus continuer, il a déjà causé trop de dégats. Le trouver, le tuer et détruire ses plans',
        'Sauver le patrimoine', '1999-06-12 05:30', '1999-06-14 04:30', 'EPH', 9, 2, 3),
       ('Surveiller le bagage', 'Trouver Deuxfleurs, touriste imperturbable. Son bagage est un objet magique vivant et plutôt agressif. Le surveiller et rapporter tous ses faits et gestes.',
        'Mission Deuxfleurs', '2001-12-20 13:00', '2012-05-20 11:00', 'KRU', 3, 1, 5);

INSERT INTO
    agent_skill (agent_id, skill_id)
VALUES
    (1, 1),
    (1, 2),
    (8, 12),
    (8, 6),
    (9, 12),
    (9, 8),
    (12, 12),
    (12, 7),
    (16, 3),
    (16, 4),
    (16, 5),
    (17, 9),
    (17, 12),
    (17, 6),
    (19, 13),
    (19, 3);

INSERT INTO
    mission_agent (agent_id, mission_id)
VALUES
    (9, 1),
    (12, 1),
    (17, 2),
    (16, 3),
    (8, 3);


INSERT INTO
    mission_contact (contact_id, mission_id)
VALUES
    (6, 1);

INSERT INTO
    mission_target (target_id, mission_id)
VALUES
    (2, 1),
    (7, 2),
    (13, 3);












