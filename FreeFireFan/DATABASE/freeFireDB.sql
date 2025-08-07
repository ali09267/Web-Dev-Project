create database fireFreeDB;
use fireFreeDB;

DROP TABLE IF EXISTS USER;
DROP TABLE IF EXISTS NEWS;

CREATE TABLE USER(
user_id int primary key auto_increment,
user_name varchar(50),
user_email varchar(50),
country varchar(50),
user_password varchar(255),
phone_number varchar(15),
date_of_birth date);

INSERT INTO USER (user_name, user_email, user_password) VALUES 
('admin','admin@gmail.com','$2y$10$hYE.V69s0Z/S94M8ITYZGOddZhONAFX4OWFxqsf7EVMeG/kLj8Gn.');

CREATE TABLE NEWS(
news_id int primary key auto_increment,
title text,
content text,
img varchar(255),
publish_date date);

INSERT INTO news (title, content, img, publish_date) VALUES
('Free Fire x Demon Slayer Collab', 'Fan‑favorite Demon Slayer collab returns with exclusive skins and bundles!', 
'../Images/News/demonSlayer.png', '2025-07-24'),

('New Hero ''Kairos'' Released', 'Kairos enters Free Fire with stealth and speed ability pack.', 
'../Images/News/kairos.png', '2025-07-20'),

('OB44 Update Is Live', 'New UI, weapon rebalances, and Max features welcome the OB44 update.', 
'../Images/News/ob44.png', '2025-07-18'),

('Bermuda Remastered Returns', 'Dive into revamped Bermuda map with better loot and fresh settings.', 
'../Images/News/bermuda.png', '2025-07-15'),

('Summer Royale 2025', 'Summer Royale event brings exclusive skins, emotes, and seasonal deals!',
 '../Images/News/summer.png', '2025-07-10');

DELETE FROM NEWS;

CREATE TABLE ACTOR(
actor_id int primary key auto_increment,
actor_name varchar(50),
actor_img varchar(255),
ability varchar(50));

INSERT INTO ACTOR (actor_name, actor_img, ability) VALUES 
('Alok', '../Images/Characters/alok.png', 'Drop the Beat'),
('Chrono', '../Images/Characters/chrono.png', 'Time Turner'),
('K', '../Images/Characters/k.png', 'Master of All'),
('Skyler', '../Images/Characters/skyler.png', 'Riptide Rhythm'),
('Kelly', '../Images/Characters/kelly.png', 'Dash');
delete from actor;

CREATE TABLE LEADERBOARD (
  player_id INT AUTO_INCREMENT PRIMARY KEY,
  player_name VARCHAR(100) NOT NULL,
  kills INT DEFAULT 0,
  level INT DEFAULT 1,
  region VARCHAR(100),
  player_rank INT,
  updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
);

INSERT INTO LEADERBOARD (player_name, kills, level, region, player_rank)
VALUES 
('BlazeHunter', 134, 45, 'North America', 1),
('GhostSniper', 121, 42, 'Europe', 2),
('DarkWolf', 115, 40, 'Asia', 3),
('ShadowStorm', 98, 38, 'South America', 4),
('FuryFang', 90, 35, 'Asia', 5),
('VenomViper', 88, 34, 'North America', 6),
('PhoenixFire', 82, 32, 'Europe', 7),
('SteelShot', 78, 30, 'Africa', 8),
('SilentBullet', 73, 28, 'Asia', 9),
('CrimsonClaw', 65, 25, 'Australia', 10);

CREATE TABLE CONTACT (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100),
  email VARCHAR(150),
  subject VARCHAR(150),
  message TEXT,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
);


SET SQL_SAFE_UPDATES = 0;
delete from user;

SELECT*FROM USER;
SELECT*FROM NEWS;
SELECT*FROM ACTOR;
SELECT*FROM LEADERBOARD;
SELECT*FROM CONTACT;