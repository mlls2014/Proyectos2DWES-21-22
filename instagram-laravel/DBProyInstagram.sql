CREATE DATABASE IF NOT EXISTS instagram_laravel;
USE instagram_laravel;

CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role` varchar(20) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `surname` varchar(200) DEFAULT NULL,
  `nick` varchar(100) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100)DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO users VALUES(NULL, 'user', 'Víctor', 'Robles', 'victorroblesweb', 'victor@victor.com', null, 'pass', null, null, CURTIME(), CURTIME());
INSERT INTO users VALUES(NULL, 'user', 'Juan', 'Lopez', 'juanlopez', 'juan@juan.com', null, 'pass', null, null, CURTIME(), CURTIME());
INSERT INTO users VALUES(NULL, 'user', 'Manolo', 'Garcia', 'manologarcia', 'manolo@manolo.com', null, 'pass', null, null, CURTIME(), CURTIME());

CREATE TABLE IF NOT EXISTS images(
id              bigint(20) unsigned NOT NULL AUTO_INCREMENT,
user_id         bigint(20) unsigned NOT NULL,
image_path      varchar(255),
description     text,
created_at      datetime,
updated_at      datetime,
CONSTRAINT pk_images PRIMARY KEY(id),
CONSTRAINT fk_images_users FOREIGN KEY(user_id) REFERENCES users(id)
)ENGINE=InnoDb;

INSERT INTO images VALUES(NULL, 1, 'test.jpg', 'descripción de prueba 1', CURTIME(), CURTIME());
INSERT INTO images VALUES(NULL, 1, 'playa.jpg', 'descripción de prueba 2', CURTIME(), CURTIME());
INSERT INTO images VALUES(NULL, 1, 'arena.jpg', 'descripción de prueba 3', CURTIME(), CURTIME());
INSERT INTO images VALUES(NULL, 3, 'familia.jpg', 'descripción de prueba 4', CURTIME(), CURTIME());


CREATE TABLE IF NOT EXISTS comments(
id              bigint(20) unsigned NOT NULL AUTO_INCREMENT,
user_id         bigint(20) unsigned NOT NULL,
image_id        bigint(20) unsigned NOT NULL,
content         text,
created_at      datetime,
updated_at      datetime,
CONSTRAINT pk_comments PRIMARY KEY(id),
CONSTRAINT fk_comments_users FOREIGN KEY(user_id) REFERENCES users(id),
CONSTRAINT fk_comments_images FOREIGN KEY(image_id) REFERENCES images(id)
)ENGINE=InnoDb;

INSERT INTO comments VALUES(NULL, 1, 4, 'Buena foto de familia!!', CURTIME(), CURTIME());
INSERT INTO comments VALUES(NULL, 2, 1, 'Buena foto de PLAYA!!', CURTIME(), CURTIME());
INSERT INTO comments VALUES(NULL, 2, 4, 'que bueno!!', CURTIME(), CURTIME());

CREATE TABLE IF NOT EXISTS likes(
id              bigint(20) unsigned NOT NULL AUTO_INCREMENT,
user_id         bigint(20) unsigned NOT NULL,
image_id        bigint(20) unsigned NOT NULL,
created_at      datetime,
updated_at      datetime,
CONSTRAINT pk_likes PRIMARY KEY(id),
CONSTRAINT fk_likes_users FOREIGN KEY(user_id) REFERENCES users(id),
CONSTRAINT fk_likes_images FOREIGN KEY(image_id) REFERENCES images(id)
)ENGINE=InnoDb;

INSERT INTO likes VALUES(NULL, 1, 4, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 2, 4, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 3, 1, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 3, 2, CURTIME(), CURTIME());
INSERT INTO likes VALUES(NULL, 2, 1, CURTIME(), CURTIME());