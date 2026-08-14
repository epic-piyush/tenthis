SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

CREATE TABLE `users` (
    `id` int(11) NOT NULL,
    `name` varchar(255) NOT NULL,
    `email` varchar(255) NOT NULL,
    `password` varchar(255) NOT NULL,
    `wallet` varchar(255) NOT NULL,
    `refer` varchar(255) NOT NULL,
    `balance` varchar(255) NOT NULL,
    `status` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

ALTER TABLE `users` ADD PRIMARY KEY (`id`);

ALTER TABLE `users` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

COMMIT;

CREATE TABLE `login_details` (
    `id` int(11) NOT NULL,
    `email` varchar(255) NOT NULL,
    `ip` varchar(255) NOT NULL,
    `device` varchar(255) NOT NULL,
    `time` varchar(255) NOT NULL,
    `day` varchar(255) NOT NULL,
    `status` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

ALTER TABLE `login_details` ADD PRIMARY KEY (`id`);

ALTER TABLE `login_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `withdraws` (
    `id` int(11) NOT NULL,
    `email` varchar(255) NOT NULL,
    `amount` varchar(255) NOT NULL,
    `wallet` varchar(255) NOT NULL,
    `time` varchar(255) NOT NULL,
    `day` varchar(255) NOT NULL,
    `balance` varchar(255) NOT NULL,
    `status` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

ALTER TABLE `withdraws` ADD PRIMARY KEY (`id`);

ALTER TABLE `withdraws`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

/*ALTER TABLE `users` ADD `refer` VARCHAR(255) NOT NULL AFTER `wallet`;*/

CREATE TABLE `tasks` (
    `id` int(11) NOT NULL,
    `type` varchar(255) NOT NULL,
    `amount` varchar(255) NOT NULL,
    `title` varchar(255) NOT NULL,
    `link` varchar(255) NOT NULL,
    `validity` varchar(255) NOT NULL,
    `code` varchar(255) NOT NULL,
    `users` varchar(255) NOT NULL,
    `status` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

ALTER TABLE `tasks` ADD PRIMARY KEY (`id`);

ALTER TABLE `tasks` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `tasks_history` (
    `id` int(11) NOT NULL,
    `email` varchar(255) NOT NULL,
    `amount` varchar(255) NOT NULL,
    `task_id` varchar(255) NOT NULL,
    `type` varchar(255) NOT NULL,
    `day` varchar(255) NOT NULL,
    `status` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

ALTER TABLE `tasks_history` ADD PRIMARY KEY (`id`);

ALTER TABLE `tasks_history`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `promotions` (
    `id` int(11) NOT NULL,
    `email` varchar(255) NOT NULL,
    `type` varchar(255) NOT NULL,
    `impressions` varchar(255) NOT NULL,
    `time` varchar(255) NOT NULL,
    `day` varchar(255) NOT NULL,
    `status` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

ALTER TABLE `promotions` ADD PRIMARY KEY (`id`);

ALTER TABLE `promotions`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `feedbacks` (
    `id` int(11) NOT NULL,
    `email` varchar(255) NOT NULL,
    `name` varchar(255) NOT NULL,
    `feed` varchar(255) NOT NULL,
    `time` varchar(255) NOT NULL,
    `day` varchar(255) NOT NULL,
    `status` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

ALTER TABLE `feedbacks` ADD PRIMARY KEY (`id`);

ALTER TABLE `feedbacks`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;


CREATE TABLE `shortlinks` (
    `id` int(11) NOT NULL,
    `user` varchar(255) NOT NULL,
    `short_id` varchar(255) NOT NULL,
    `session_id` varchar(255) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

ALTER TABLE `shortlinks` ADD PRIMARY KEY (`id`);

ALTER TABLE `shortlinks`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

CREATE TABLE `impression` (
    `id` int(11) NOT NULL,
    `user` varchar(255) NOT NULL,
    `short_id` varchar(255) NOT NULL,
    `session_id` varchar(255) NOT NULL,
    `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
    `status` text NOT NULL
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4;

ALTER TABLE `impression` ADD PRIMARY KEY (`id`);

ALTER TABLE `impression`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

INSERT INTO
    users (
        id,
        name,
        email,
        password,
        wallet,
        refer,
        balance,
        status
    )
values (
        1,
        'Admin',
        'tenthis.admin.piyush@tenthis.com',
        '$2y$10$UOx89SPWLmQLteVSX63Aq.29PhMCzzvNS9jH9qjQx4x7Zu6Zd7G16',
        '000',
        'IND1',
        '999',
        'admin'
    );
/*ADMIN@11*/
INSERT INTO
    login_details (
        id,
        email,
        ip,
        device,
        time,
        day,
        status
    )
values (
        1,
        'tenthis.admin.piyush@tenthis.com',
        '000',
        '000',
        '0:0:0',
        '0/0/0',
        'admin'
    );

/*SELECT * FROM `users` ORDER BY `users`.`email` DESC*/
/*
INSERT INTO `tasks`(`type`, `amount`, `title`, `link`, `validity`, `code`, `users`, `status`) 
VALUES ('Youtube','5','ROCKSTAR AAYUSH - Watch Full Video & Subscribe Channel','https://youtube.com/RockstarAayush','10000','ROCKDGT','0','open');

INSERT INTO `tasks`(`type`, `amount`, `title`, `link`, `validity`, `code`, `users`, `status`) 
VALUES ('Shortlink','5','GPLinks - Open link and compelete','gplinks.in','10000','GPHILT','0','open');

INSERT INTO `tasks`(`type`, `amount`, `title`, `link`, `validity`, `code`, `users`, `status`) 
VALUES ('Instagram','2','Instagram - Like Post & Follow Account','https://instagram.com','1000','INSGEE','0','open');

INSERT INTO `tasks`(`type`, `amount`, `title`, `link`, `validity`, `code`, `users`, `status`) 
VALUES ('Shortlink','3','GPLinks.in -  Open & Complete','gplinks.in','5000','HTYERH','0','open');
INSERT INTO `tasks`(`type`, `amount`, `title`, `link`, `validity`, `code`, `users`, `status`) 
VALUES ('Shortlink','3','GPLinks.in -  Open & Complete','gplinks.in','5000','JUGTRE','0','open');
INSERT INTO `tasks`(`type`, `amount`, `title`, `link`, `validity`, `code`, `users`, `status`) 
VALUES ('Shortlink','3','GPLinks.in -  Open & Complete','gplinks.in','5000','OIBGER','0','open');
INSERT INTO `tasks`(`type`, `amount`, `title`, `link`, `validity`, `code`, `users`, `status`) 
VALUES ('Shortlink','3','GPLinks.in -  Open & Complete','gplinks.in','5000','KUDFEQ','0','open');
INSERT INTO `tasks`(`type`, `amount`, `title`, `link`, `validity`, `code`, `users`, `status`) 
VALUES ('Shortlink','3','GPLinks.in -  Open & Complete','gplinks.in','5000','TRGEYU','0','open');
INSERT INTO `tasks`(`type`, `amount`, `title`, `link`, `validity`, `code`, `users`, `status`) 
VALUES ('Shortlink','1','SHORTGIVEAWAY -  Open & Complete(giveaway for first 100 users)','giveaway','5000','GIVE89','0','open');

INSERT INTO `tasks`(`type`, `amount`, `title`, `link`, `validity`, `code`, `users`, `status`) 
VALUES ('Youtube','1','Youtube - Watch Full Video, Like & Comment Your <u>Refer Code</u> for giveaway','https://youtube.com/RockstarAayush','5000','HJEFIR','0','open');

INSERT INTO `tasks`(`type`, `amount`, `title`, `link`, `validity`, `code`, `users`, `status`) 
VALUES ('Instagram','1','Instagram - Link & Comment Your <u>Refer Code</u> for Giveaway','https://instagram.com/RockstarAayush','1000','TENTH94','0','open');
INSERT INTO `tasks`(`type`, `amount`, `title`, `link`, `validity`, `code`, `users`, `status`) 
VALUES ('Instagram','1','Instagram - Link & Comment Your <u>Refer Code</u> for giveaway','https://instagram.com/RockstarAayush','1000','TENIS98','0','open');
INSERT INTO `tasks`(`type`, `amount`, `title`, `link`, `validity`, `code`, `users`, `status`) 
VALUES ('Shortlink','3','GPLinks.in -  Open & Complete','gplinks.in','5000','JTHDBE','0','open');
INSERT INTO `tasks`(`type`, `amount`, `title`, `link`, `validity`, `code`, `users`, `status`) 
VALUES ('Shortlink','3','GPLinks.in -  Open & Complete','gplinks.in','5000','NSJEBD','0','open');
INSERT INTO `tasks`(`type`, `amount`, `title`, `link`, `validity`, `code`, `users`, `status`) 
VALUES ('Shortlink','3','GPLinks.in -  Open & Complete','gplinks.in','5000','WKENDR','0','open');
INSERT INTO `tasks`(`type`, `amount`, `title`, `link`, `validity`, `code`, `users`, `status`) 
VALUES ('Youtube','3','TenthisWeb - Subscribe Channel & Hit bell icon','https://youtube.com/TenhtisWeb','5000','TENTHWAS','0','open');
*/