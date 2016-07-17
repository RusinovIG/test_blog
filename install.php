<?php
require 'bootstrap.php';

/** @var \TestBlog\Core\DB\Driver $dbDriver */
$dbDriver = $container['db_driver'];

$dbDriver->execute("
    CREATE TABLE IF NOT EXISTS `posts` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `title` varchar(100) NOT NULL,
        `content` text NOT NULL,
        `created_at` TIMESTAMP NOT NULL,
        PRIMARY KEY (`id`)
    ) ENGINE=InnoDB;
    CREATE TABLE IF NOT EXISTS `comments` (
        `id` int(11) NOT NULL AUTO_INCREMENT,
        `post_id` int(11) NOT NULL,
        `text` varchar(500) NOT NULL,
        `created_at` TIMESTAMP NOT NULL,
        PRIMARY KEY (`id`),
        FOREIGN KEY (post_id) 
            REFERENCES posts(id)
            ON DELETE CASCADE ON UPDATE RESTRICT
    ) ENGINE=InnoDB;
");