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
    INSERT INTO `posts` VALUES('1', 'New post', 'Post content', '2016-07-18 01:04:31');
    INSERT INTO `posts` VALUES('2', 'New post 2', 'Post content 2', '2016-07-18 01:06:31');
    
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
    INSERT INTO `comments` VALUES('1', '1', 'Hey!', '2016-07-18 01:11:06');
    INSERT INTO `comments` VALUES('2', '1', 'Hey guys!', '2016-07-18 01:12:15');
");
