# -----------------------------------------------------------------------------
#       DATABASE : BLOG
# -----------------------------------------------------------------------------

DROP DATABASE IF EXISTS BLOG; 

CREATE DATABASE IF NOT EXISTS BLOG;
USE BLOG;


# -----------------------------------------------------------------------------
#       TABLE : BILLET
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS BILLET
 (
   ID INTEGER NOT NULL AUTO_INCREMENT,
   TITRE VARCHAR(255) NOT NULL,
   CONTENU VARCHAR(1000) NOT NULL,
   DATE_CREATION DATETIME NOT NULL,
   PRIMARY KEY (ID)
 ) ENGINE=InnoDB;
 
 
# -----------------------------------------------------------------------------
#       TABLE : COMMENTAIRE
# -----------------------------------------------------------------------------
 
 CREATE TABLE IF NOT EXISTS COMMENTAIRE
 (
   ID INTEGER NOT NULL AUTO_INCREMENT,
   ID_BILLET INTEGER NOT NULL,
   AUTEUR VARCHAR(255) NOT NULL,
   COMMENTAIRE VARCHAR(1000) NOT NULL,
   DATE_COMMENTAIRE DATETIME NOT NULL,
   PRIMARY KEY (ID),
   FOREIGN KEY FK_COMMENTAIRE_BILLET (ID_BILLET) REFERENCES BILLET (ID)  
 ) ENGINE=InnoDB;
 

# -----------------------------------------------------------------------------
#       Insertion des données factices
# ----------------------------------------------------------------------------- 

INSERT INTO BILLET (ID, TITRE, CONTENU, DATE_CREATION) VALUES
(1, 'Bienvenue sur mon blog !', 'Je vous souhaite à toutes et à tous la bienvenue sur mon blog qui parlera de... PHP bien sûr !', '2010-03-25 16:28:41'),
(2, 'Le PHP à la conquête du monde !', 'C\'est officiel, l\'éléPHPant a annoncé à la radio hier soir \"J\'ai l\'intention de conquérir le monde !\".\r\nIl a en outre précisé que le monde serait à sa botte en moins de temps qu\'il n\'en fallait pour dire \"éléPHPant\". Pas dur, ceci dit entre nous...', '2010-03-27 18:31:11');

INSERT INTO COMMENTAIRE (ID, ID_BILLET, AUTEUR, COMMENTAIRE, DATE_COMMENTAIRE) VALUES
(1, 1, 'M@teo21', 'Un peu court ce billet !', '2010-03-25 16:49:53'),
(2, 1, 'Maxime', 'Oui, ça commence pas très fort ce blog...', '2010-03-25 16:57:16'),
(3, 1, 'MultiKiller', '+1 !', '2010-03-25 17:12:52'),
(4, 2, 'John', 'Preum\'s !', '2010-03-27 18:59:49'),
(5, 2, 'Maxime', 'Excellente analyse de la situation !\r\nIl y arrivera plus tôt qu\'on ne le pense !', '2010-03-27 22:02:13');