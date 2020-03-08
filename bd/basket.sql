DROP DATABASE IF EXISTS basket;
CREATE DATABASE  IF NOT EXISTS basket;
USE basket;

DROP TABLE IF EXISTS `pabellon`;
CREATE TABLE IF NOT EXISTS `pabellon`(
    `id`			INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `ciudad`		VARCHAR(30),
	`nombre`		VARCHAR(30),
    `totalEspec`	INT UNSIGNED
);
INSERT INTO `pabellon` VALUES
(1,'Georgia','State Farm Arena', '18118'),
(2,'Massachusets', 'TD Garden', '18624'),
(3,'New York', 'Barclays Center', '17732'),
(4,'Carolina del Norte', 'Spectrum Center', '19077'),
(5,'Illinois', 'United Center', '20917'),
(6,'Florida', 'American Airlines Arena', '19600');

DROP TABLE IF EXISTS `torneo`;
CREATE TABLE `torneo` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `nombre`			VARCHAR(40),
  `fecha_inicio`	TIMESTAMP DEFAULT  CURRENT_TIMESTAMP,
  `fecha_fin`		TIMESTAMP DEFAULT  CURRENT_TIMESTAMP
) ;

INSERT INTO `torneo` VALUES 
(NULL,'NBA','2020-09-28','2020-10-21'),
(NULL,'PLAYOFF','2020-04-18','2020-06-04'),
(NULL,'Finales','2020-06-25','2020-07-01'),
(NULL,'NCAA','2020-07-25','2020-08-18');

DROP TABLE IF EXISTS `equipo`;
CREATE TABLE IF NOT EXISTS `equipo`(
    `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `nombrEquipo`	VARCHAR(30),
    `ciudad`		VARCHAR(30),
    `pabellon_id`	INT UNSIGNED,
    
	FOREIGN KEY (`pabellon_id`) REFERENCES `pabellon` (`id`)
	ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO `equipo` VALUES
(1,'Atlanta Hawks','Atlanta (Georgia)', 1),
(2,'Boston Celtics','Boston (Massachusets)', 2),
(3,'Brooklyn Nets','New York City (New York)', 3),
(4,'Charlotte Hornets','Charlotte (Carolina del Norte)', 4),
(5,'Chicago Bulls','Chicago (Illinois)', 5),
(6,'Miami Heat','Miami (Florida)', 6);

DROP TABLE IF EXISTS `jugadores`;
CREATE TABLE `jugadores` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `nombre`			VARCHAR(40),
  `apellidos`		VARCHAR(40),
  `equipo_id`		INT UNSIGNED,
  `nacionalidad`	VARCHAR(20),
  `fechaNac` 		DATE,
  `draft`			VARCHAR(20),
  
   FOREIGN KEY (`equipo_id`) REFERENCES `equipo` (`id`)
   ON DELETE CASCADE ON UPDATE CASCADE
) ;

INSERT INTO `jugadores` VALUES 
(NULL,'Jeffrey Demarco','Teague',1,'Estados Unidos','1988-06-10', '2009 / 19º'),
(NULL,'Vincent Lamar','Carter',1,'Estados Unidos','1977-01-26', '1998 / 5º'),

(NULL,'Jaylen','Brown',2,'Estados Unidos','1996-10-24', '2016 / 3º'),
(NULL,'Carsen','Edwards',2,'Estados Unidos','1998-03-12', '2019 / 33º'),

(NULL,'Spencer','Dinwiddie',3,'Estados Unidos','1993-04-06', '2014 / 38º'),
(NULL,'Garrett Bartholomew','Temple',3,'Estados Unidos','1986-05-08', 'No seleccionado'),

(NULL,'Caleb','Martin',4,'Estados Unidos','1995-09-28', '2019 / No seleccionado'),
(NULL,'Cody','Martin',4,'Estados Unidos','1995-09-28', '2019 / 36º'),

(NULL,'Denzel','Valentine',5,'Estados Unidos','1993-11-16', '2016 / 14º'),
(NULL,'Zachary','LaVine',5,'Estados Unidos','1995-03-10', '2014 / 13º'),

(NULL,'Jae','Crowder',6,'Estados Unidos','1990-07-06', '2012 / 34º'),
(NULL,'Jimmy','Butler',6,'Estados Unidos','1989-09-14', '2011 / 30º');

DROP TABLE IF EXISTS `localE`;
CREATE TABLE `localE` (
	`id`	INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    `equipo_id` INT UNSIGNED,
    
   FOREIGN KEY (`equipo_id`) REFERENCES `equipo` (`id`)
   ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO `localE` VALUES 
(NULL,'1'),
(NULL,'2'),
(NULL,'3');

DROP TABLE IF EXISTS `visitante`;
CREATE TABLE `visitante` (
	`id`	INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `equipo_id` INT UNSIGNED,
  
    
   FOREIGN KEY (`equipo_id`) REFERENCES `equipo` (`id`)
   ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO `visitante` VALUES 
(NULL,'4'),
(NULL,'5'),
(NULL,'6');

DROP TABLE IF EXISTS `partidos`;
CREATE TABLE `partidos` (
  `id` INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  `local_id`			INT UNSIGNED,
  `visitante_id`		INT UNSIGNED,
  `fecha_hora`			TIMESTAMP,
  `puntos_local`		INT UNSIGNED,
  `puntos_visitante` 	INT UNSIGNED,
  `pabellon_id`			INT UNSIGNED,
  
   FOREIGN KEY (`pabellon_id`) REFERENCES `pabellon` (`id`)
   ON DELETE CASCADE ON UPDATE CASCADE,
      FOREIGN KEY (`local_id`) REFERENCES `localE` (`id`)
   ON DELETE CASCADE ON UPDATE CASCADE,
      FOREIGN KEY (`visitante_id`) REFERENCES `visitante` (`id`)
   ON DELETE CASCADE ON UPDATE CASCADE
) ;

INSERT INTO `partidos` VALUES 
(NULL, 1, 3, '2020-07-01', 80, 76, 4),
(NULL, 2, 1, '2020-08-04', 43, 54, 2),
(NULL, 3, 2, '2020-10-09', 120, 90, 3),
(NULL, 3, 1, '2020-10-17', 92, 102, 5),
(NULL, 1, 2, '2020-12-01', 98, 76, 1);

DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users(

	id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(50),
    email VARCHAR(50) UNIQUE,
    password CHAR(60),
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS roles;
CREATE TABLE IF NOT EXISTS roles(

	id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(20),
    description VARCHAR(100),
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

DROP TABLE IF EXISTS roles_users;
CREATE TABLE IF NOT EXISTS roles_users(

	id INT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
	user_id INT UNSIGNED,
    role_id INT UNSIGNED,
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (role_id) REFERENCES roles(id) ON DELETE CASCADE ON UPDATE CASCADE,
	created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    update_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

INSERT INTO roles VALUES
(1, 'Administrador', 'Todos los privilegios de la aplicación', default, default),
(2, 'Editor', 'Sólo podrá consultar, modificar y añadir información. No podrá eliminar', default, default),
(3, 'Registrado', 'Sólo podrá realizar consultas', default, default);
    
