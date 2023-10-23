CREATE TABLE chat (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT,
    game_id INT UNSIGNED NULL,
    sender_id INT UNSIGNED NULL,
    text_content TEXT NOT NULL,
    date_time DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
);

INSERT INTO chat (game_id, sender)
VALUES ();

VALUES (5, 'younes.bouchouk@gmail.com', 'mdp123', 'Genzo', '2023-10-16 10:00:00', '2023-10-16 11:00:00')

--------------
-- story 1 --
--------------

-- Création de la base de données --
DROP DATABASE IF EXISTS mySQL;
CREATE DATABASE mySQL CHARACTER SET 'utf8';

-- Utilisation de la base de données --
USE mySQL;

-- Création des tables --
CREATE TABLE users (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT, -- Clé primaire
    email VARCHAR(256) NOT NULL,
    mdp VARCHAR(256) NOT NULL,
    pseudo VARCHAR(256) NOT NULL,
    inscription DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    lastConnexion DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE = InnoDB; -- Utilisation de "InnoDB" pour le moteur de stockage

CREATE TABLE scores (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT, -- Clé primaire
    playerId INT UNSIGNED NULL, -- Clé étrangère
    gameId INT UNSIGNED NULL, -- Clé étrangère
    difficulty ENUM('NOVICE', 'FACILE', 'INTERMEDIAIRE', 'DIFFICILE', 'EXTREME') NOT NULL,
    scores INT NOT NULL,
    timeParty DATETIME NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE = InnoDB; 

CREATE TABLE messages (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT, -- Clé primaire
    gameId INT UNSIGNED NULL, -- Clé étrangère
    userId INT UNSIGNED NULL, -- Clé étrangère
    messages TEXT NOT NULL,
    timeMessage DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
    PRIMARY KEY (id)
) ENGINE = InnoDB; 

CREATE TABLE game (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT, -- Clé primaire
    gameName VARCHAR(40) NOT NULL,
    PRIMARY KEY (id)
) ENGINE = InnoDB;
--------------
-- story 2 --
--------------

-- Ajout des contraintes de clés étrangères --
ALTER TABLE scores ADD FOREIGN KEY (playerId) REFERENCES users(id) ON DELETE SET NULL ON UPDATE SET NULL;
ALTER TABLE scores ADD FOREIGN KEY (gameId) REFERENCES game(id) ON DELETE SET NULL ON UPDATE SET NULL;
ALTER TABLE messages ADD FOREIGN KEY (gameId) REFERENCES game(id) ON DELETE SET NULL ON UPDATE SET NULL;
ALTER TABLE messages ADD FOREIGN KEY (userId) REFERENCES users(id) ON DELETE SET NULL ON UPDATE SET NULL;
 
-- ajout des users --
INSERT INTO users
VALUES (1,'aoges@orange.fr', 'test1234','Dark Vador','2023-10-17 09:31:21' ,'2023-10-17 09:31:40'),
    (2,'joachim.thibout@fourmi', 'test1234','Antking','2023-10-17 10:31:21' ,'2023-10-17 11:31:40'),
    (3,'nico.dobosz@gmail.com','test1234','Bartaaaaa','2023-10-17 09:31:00','2023-10-17 09:31:01'),
    (4,'magniez.thibaud@gmail.com','test1234','thib0','2023-10-17 09:32:00','2023-10-17 09:32:01'), 
    (5,'younes.bouchouk@gmail.com','mdp123','Genzo','2023-10-17 09:32:00','2023-10-17 09:32:01');

-- ajout du game --    
INSERT INTO game
VALUES(1,'MemoryGame');
-- Ajout des 25 scores --
INSERT INTO scores
VALUES (1, 1, 1,'EXTREME', 180,'2023-05-24 15:30:15'),
        (2, 1, 1,'EXTREME', 221,'2024-06-26 17:34:52'),
        (3, 1, 1,'EXTREME', 324,'2024-07-27 19:37:32'),
        (4, 1, 1,'EXTREME', 176,'2024-08-28 06:43:18'),
        (5, 1, 1,'EXTREME', 235,'2024-09-29 23:21:14');

INSERT INTO scores
VALUES (6, 2, 1,'FACILE', 200,'2023-05-24 15:30:15'),
        (7, 2, 1,'FACILE', 180,'2024-06-26 17:34:52'),
        (8, 2, 1,'FACILE', 160,'2024-07-27 19:37:32'),
        (9, 2, 1,'FACILE', 140,'2024-08-28 06:43:18'),
        (10, 2, 1,'FACILE', 120,'2024-09-29 23:21:14');        

INSERT INTO scores
VALUES (11, 3, 1,'NOVICE', 256,'0001-01-01 01:01:01'),
        (12, 3, 1,'FACILE', 64,'1111-11-11 11:11:11'),
        (13, 3, 1,'INTERMEDIAIRE', 16,'2222-02-22 22:22:22'),
        (14, 3, 1,'DIFFICILE', 4,'3333-03-03 03:03:03'),
        (15, 3, 1,'EXTREME', 1,'4444-04-04 04:04:04');

INSERT INTO scores
VALUES (16, 4, 1, 'NOVICE', 216, '0001-01-01 01:01:01'),
        (17, 4, 1, 'FACILE', 54, '1001-10-01 01:11:10'),
        (18, 4, 1, 'INTERMEDIAIRE', 176, '2002-02-22 02:22:20'),
        (19, 4, 1, 'DIFFICILE', 445, '3033-03-03 03:33:33'),
        (20, 4, 1, 'EXTREME', 194, '4404-04-04 04:44:44');

INSERT INTO scores
VALUES(21, 5, 1, 'NOVICE', 21600, '0001-01-01 01:01:01'),
    (22, 5, 1, 'FACILE', 5400, '1001-10-01 01:11:10'),
    (23, 5, 1, 'INTERMEDIAIRE', 17600, '2002-02-22 02:22:20'),
    (24, 5, 1, 'DIFFICILE', 44500, '3033-03-03 03:33:33'),
    (25, 5, 1, 'EXTREME', 19400, '4404-04-04 04:44:44');

-- 25 messages --
INSERT INTO messages (gameId, userId, messages, timeMessage)
VALUES  (1, 1, "Bonjour, comment ça va", '2013-10-16 00:00:00'),
        (1, 2, "Salut, ça va et toi", '2013-10-16 00:00:00'),
        (1, 1, "Ça va merci, on joue ?", '2013-10-16 00:00:00'),
        (1, 3, "Hello, je vous rejoins", '2013-10-16 00:00:00'),
        (1, 4, "Salut les élèves", '2013-10-16 00:00:00'),
        (1, 5, "Hey les dudes", '2013-10-16 00:00:00'),
        (1, 4, "Salut Joachim", '2013-10-16 00:00:00'),
        (1, 5, "Salut, jouons sans plus attendre !", '2013-10-16 00:00:00'),
        (1, 1, "gg", '2013-10-16 00:00:00'),
        (1, 2, "gg", '2013-10-16 00:00:00'),
        (1, 3, "gg", '2013-10-16 00:00:00'),
        (1, 4, "gg", '2013-10-16 00:00:00'),
        (1, 5, "gg les dudes", '2013-10-16 00:00:00'),
        (1, 1, "Joachim j'te croyais plus fort", '2013-10-16 00:00:00'),
        (1, 2, "Pareil, tu nous a menti sur ton niveau", '2013-10-16 00:00:00'),
        (1, 5, "Non les dudes, y'avais des fourmis sur mon clavier", '2013-10-16 00:00:00'),
        (1, 4, "Joachim tu ne changera donc jamais", '2013-10-16 00:00:00'),
        (1, 5, "Vraiment, 3 d'entre elles se sont échappés", '2013-10-16 00:00:00'),
        (1, 1, "Courage pour les retrouver", '2013-10-16 00:00:00'),
        (1, 5, "J'vais les chercher, je reviens après les dudes", '2013-10-16 00:00:00'),
        (1, 1, "Bon courage", '2013-10-16 00:00:00'),
        (1, 2, "Bon courage", '2013-10-16 00:00:00'),
        (1, 3, "Bon courage", '2013-10-16 00:00:00'),
        (1, 4, "Bon courage", '2013-10-16 00:00:00'),
        (1, 5, "Merci !", '2013-10-16 00:00:00')
;
--------------
-- story 3 --
--------------
INSERT INTO users
VALUES (6,'exemple.cours@gmail.com', 'test1234','Kevin','2023-10-17 12:31:21' ,'2023-10-17 13:31:40');

USE mySQL;
ALTER TABLE users ADD CONSTRAINT uniqueEmailEtMdp UNIQUE (email, mdp);
ALTER TABLE users ADD CONSTRAINT uniquePseudo UNIQUE (pseudo);
--------------
-- story 4 --
--------------

-- modification mdp --
UPDATE users
SET mdp = 'testChangement'
WHERE id = 4;

-- modification email --
UPDATE users
SET email = 'aoges62@gmail.com', 
WHERE id = 1 AND mdp = 'test1234';
--------------
-- story 5 --
--------------

-- renvoie des info utilisateur --
SELECT * 
FROM users
WHERE email = "younes.bouchouk@gmail.com" 
AND mdp = "mdp123";
--------------
-- story 6 --
--------------

-- deja fait plus haut --
INSERT INTO game
VALUES(1,'MemoryGame');
--------------
-- story 7 --
--------------

-- affichage des scores de mes utilisateurs --
SELECT G.gameName, U.pseudo, S.difficulty, S.scores
FROM scores AS S
INNER JOIN users AS U
	ON U.id = S.playerId
INNER JOIN game AS G
	ON G.id = S.gameId
ORDER BY G.gameName, S.difficulty, S.scores ASC;

--------------
-- story 8 --
--------------

-- affichage des scores avec filtres --
SELECT G.gameName, U.pseudo, S.difficulty, S.scores
FROM scores AS S
INNER JOIN users AS U
	ON U.id = S.playerId
INNER JOIN game AS G
	ON G.id = S.gameId
WHERE S.playerId = 1 AND U.pseudo = 'Dark Vador'
ORDER BY G.gameName, S.difficulty, S.scores ASC;

--------------
-- story 9 --
--------------

SELECT *
FROM scores
WHERE playerId = 1
AND difficulty = 'EXTREME'

-- si il n'y a pas de game avec la difficulté 'Extrême'
INSERT INTO scores
VALUES (1, 1, 1, 'EXTREME', 200, 'YYYY-MM-DD HH:MM:SS')

-- sinon
UPDATE scores
SET scores = 439 AND timeParty = 'YYYY-MM-DD HH:MM:SS'
WHERE id = 1

--------------
-- story 10 --
--------------

INSERT INTO messages (gameId, userId, messages, timeMessage)
VALUES  (1, 1, "J'y vais aussi, tchuss", '2013-10-16 00:00:27');

--------------
-- story 11 --
--------------

SELECT M.messages, M.timeMessage, pseudo, M.userId = 1 as isSender
FROM messages AS M 
INNER JOIN users AS U
	ON U.id = M.userId
WHERE M.timeMessage >= NOW() - INTERVAL 1 DAY
--------------
-- story 12 --
--------------

SELECT U.pseudo, S.scores
FROM scores AS S
INNER JOIN users AS U
	ON U.id = S.playerId
WHERE pseudo LIKE "%a%";
