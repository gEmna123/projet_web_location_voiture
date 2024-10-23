-- Supprimer la base de données si elle existe
DROP DATABASE IF EXISTS school;

-- Créer une nouvelle base de données
CREATE DATABASE school CHARACTER SET utf8 COLLATE utf8_general_ci;

-- Utiliser la base de données nouvellement créée
USE school;

-- Créer la table des utilisateurs
CREATE TABLE users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    login VARCHAR(50) NOT NULL,
    password VARCHAR(50) NOT NULL
) ENGINE=InnoDB;

-- Créer la table des filières
CREATE TABLE filiere (
    idFiliere INT PRIMARY KEY AUTO_INCREMENT,
	codeFiliere VARCHAR(10) NOT NULL,
    libFiliere VARCHAR(255) NOT NULL
) ENGINE=InnoDB;

-- Créer la table des étudiants
CREATE TABLE student (
    numcin INT(8) UNSIGNED ZEROFILL PRIMARY KEY NOT NULL,
    nom VARCHAR(50) NOT NULL,
    prenom VARCHAR(50) NOT NULL,
    email VARCHAR(50) UNIQUE NOT NULL,
    sexe CHAR(1) CHECK (sexe IN ('H', 'F')),
    classe INT NOT NULL,
    FOREIGN KEY (classe) REFERENCES filiere(idFiliere)
) ENGINE=InnoDB;

-- Insérer des données dans les tables
INSERT INTO users VALUES (null,'ben rkaya','moez','moez',md5('moez'));
INSERT INTO users VALUES (null,'ben foulen','foulen','admin',md5('admin'));

INSERT INTO filiere VALUES (null,'CS','Licence en ingénierie des systèmes informatiques');
INSERT INTO filiere VALUES (null,'SE','Electronique, Electrotechnique et Automatique');
INSERT INTO filiere VALUES (null,'IRS','Licence en ingénierie des systèmes informatiques');
INSERT INTO filiere VALUES (null,'MR-SIIVA','Mastère de Recherche - Option Sicences Images');
INSERT INTO filiere VALUES (null,'MR-GL','Mastère de Recherche - Option Génie Logiciel');
INSERT INTO filiere VALUES (null,'IDL','Ingénierie de Développement du Logiciel');
INSERT INTO filiere VALUES (null,'IDISC','Ingénierie et Développement des Infrastructures
et des Services de Communications');

INSERT INTO filiere VALUES (null,'ISEOC','Ingénierie des Systèmes Embarqués et Objets Connectés');
INSERT INTO student (numcin, nom, prenom, email, sexe, classe) 
VALUES (07094210, 'Smith', 'Jane', 'jane@example.com', 'F', 2);
INSERT INTO student (numcin, nom, prenom, email, sexe, classe) 
VALUES (07094212, 'Johnson', 'Michael', 'michael@example.com', 'H', 3);
INSERT INTO student (numcin, nom, prenom, email, sexe, classe) 
VALUES (07094213, 'Williams', 'Emily', 'emily@example.com', 'F', 1);

-- Afficher les données des tables
SELECT * FROM users;
SELECT * FROM filiere;
SELECT * FROM student;
