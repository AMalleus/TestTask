DROP DATABASE IF EXISTS mydb;
CREATE DATABASE IF NOT EXISTS mydb CHARACTER SET utf8 COLLATE utf8_general_ci;
USE mydb;

#DROP TABLE IF EXISTS news;
CREATE TABLE IF NOT EXISTS news
(
	id		smallint unsigned NOT NULL auto_increment,
	title		varchar(255) NOT NULL,
	annonce 	text NOT NULL,
	text		mediumtext NOT NULL,
	author		smallint unsigned NOT NULL, 	#id of author
	headings	text NOT NULL,			#ids of headings
	PRIMARY KEY	(id)
);
#DROP TABLE IF EXISTS authors;
CREATE TABLE IF NOT EXISTS authors
(
	id		smallint unsigned NOT NULL auto_increment,
	name		varchar(100) NOT NULL,
	avatar		varchar(255) NOT NULL, #link	
	signature	text NOT NULL,
	PRIMARY KEY 	(id)
);
#DROP TABLE IF EXISTS headings;
CREATE TABLE IF NOT EXISTS headings
(
	id		smallint unsigned NOT NULL auto_increment,
	name		varchar(100) NOT NULL,
	preid		smallint unsigned NOT NULL,		
	PRIMARY KEY 	(id)
);

INSERT INTO authors (name, avatar, signature) 
	VALUES ("Василий", "аватар1", "От В.В. с любовью");
INSERT INTO authors (name, avatar, signature) 
	VALUES ("Петр Петрович", "аватар24", "Заходите на мой ютуб канал");
INSERT INTO authors (name, avatar, signature) 
	VALUES ("Алиса в сказке", "аватар98", "С уважением, #алисавсказке");
INSERT INTO authors (name, avatar, signature) 
	VALUES ("Хосэ Рональдо", "аватар291", "Всем бобра.");
INSERT INTO authors (name, avatar, signature) 
	VALUES ("Bob Gonzalez", "аватар75", "Best wishes from BG");

INSERT INTO headings (id, name, preid) 
	VALUES (1,"Общество", 0);
INSERT INTO headings (id, name, preid) 
	VALUES (2,"День города", 0);
INSERT INTO headings (id, name, preid) 
	VALUES (3,"Спорт", 0);
INSERT INTO headings (id, name, preid) 
	VALUES (4,"Городская жизнь", 1);
INSERT INTO headings (id, name, preid) 
	VALUES (5,"Выборы", 1);
INSERT INTO headings (id, name, preid) 
	VALUES (6,"Салюты", 2);
INSERT INTO headings (id, name, preid) 
	VALUES (7,"Детская площадка", 2);
INSERT INTO headings (id, name, preid) 
	VALUES (8,"0-3 лет", 7);
INSERT INTO headings (id, name, preid) 
	VALUES (9,"3-7 лет", 7);
INSERT INTO headings (id, name, preid) 
	VALUES (10,"5-7 лет", 9);

INSERT INTO news (title, annonce, text, author, headings)
	VALUES ("Выборы мэра", "1 января состоятся выборы мэра Новосибирска",
	"Эксперты уверяют, что... <br>Избиратели знают и наставивают на... <br>в Новосибирске наконецто...", 4, "5,6"); 
INSERT INTO news (title, annonce, text, author, headings)
	VALUES ("Соревнования по плаванию", "31 декабря ежегодные областные соревнования",
	"Интроверты уверяют, что... <br>Плавцы будут плавать в холодной воде... <br>Болельщики думают, что...", 1, "3");
INSERT INTO news (title, annonce, text, author, headings)
	VALUES ("Детская площадка в Ленинском", "8 марта начинается строительство площадки по улице...",
	"Дети уверяют, что... <br>Родители наверняка уверены в... <br>Жители, говорят, что наконецто...", 4, "10,9,2");
INSERT INTO news (title, annonce, text, author, headings)
	VALUES ("Праздничные Новогодние салюты", "3 января с порта будут запущены салюты",
	"Экстраверты уверяют, что...<br>Городские с радостью отреагируют на добрый жест мэра...<br>А теперь к главному...", 3, "6");
INSERT INTO news (title, annonce, text, author, headings)
	VALUES ("Новый Гипермаркет", "32 декабря состоится праздничное открытие 'Как дома'",
	"Экономики уверяют, что... <br>Праздничные скидки... <br>в Новосибирске наконецто...", 5, "4");
