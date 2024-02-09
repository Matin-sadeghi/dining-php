<?php
namespace resDataBase;
require_once (realpath(dirname(__FILE__)."/DataBase.php"));
use resDataBase\DataBase;
class CreateDB extends DataBase{

    public $tables=array(
        "CREATE TABLE `categories` (
            `id` int(11) NOT NULL AUTO_INCREMENT ,
            `name` varchar(200) COLLATE utf8_persian_ci NOT NULL,
            `parent_id`  int(11) DEFAULT NULL,
            `created_at` datetime NOT NULL,
            `updated_at` datetime DEFAULT NULL,
            PRIMARY KEY (`id`),
            FOREIGN KEY(`parent_id`) REFERENCES `categories`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
          ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",
          "CREATE TABLE `articles`(
              `id` INT(11) NOT NULL AUTO_INCREMENT,
              `title` VARCHAR(256) NOT NULL COLLATE utf8_persian_ci,
              `body` VARCHAR(256) NOT NULL COLLATE utf8_persian_ci,
              `materiales` VARCHAR(256) NOT NULL COLLATE utf8_persian_ci,
              `cat_id` INT(11) NOT NULL,
              `price` INT(11) NOT NULL,
              `view` INT(11) DEFAULT '0' ,
                `image` varchar(256) COLLATE utf8_persian_ci NOT NULL,
          `state` enum('disable','enable') COLLATE utf8_persian_ci NOT NULL DEFAULT 'disable',
            
              `created_at` datetime NOT NULL,
            `updated_at` datetime DEFAULT NULL,
            PRIMARY KEY(`id`),
            FOREIGN KEY(`cat_id`) REFERENCES `categories`(`id`) ON DELETE CASCADE ON UPDATE CASCADE
          )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",
          "CREATE TABLE `menus`(
              `id` INT(11) NOT NULL AUTO_INCREMENT,
              `name` VARCHAR(256) NOT NULL COLLATE utf8_persian_ci,
              `url` VARCHAR(256) NOT NULL COLLATE utf8_persian_ci,
              `created_at` datetime NOT NULL,
            `updated_at` datetime DEFAULT NULL,
            PRIMARY KEY (`id`)
          )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",
          "CREATE TABLE `users`(
              `id`INT(11) NOT NULL AUTO_INCREMENT,
              `username` VARCHAR(256) NOT NULL COLLATE utf8_persian_ci,
              `email` VARCHAR(256) NOT NULL COLLATE utf8_persian_ci,
              `password` VARCHAR(256) NOT NULL COLLATE utf8_persian_ci,
              `permission` enum('admin','user') NOT NULL COLLATE utf8_persian_ci DEFAULT 'user',
              `created_at` datetime NOT NULL,
            `updated_at` datetime DEFAULT NULL,
               PRIMARY KEY(`id`),
               UNIQUE KEY `email` (`email`)

          )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",
          "CREATE TABLE `comments`(
              `id` INT(11) NOT NULL AUTO_INCREMENT,
              `comment` VARCHAR(256) NOT NULL COLLATE utf8_persian_ci,
              `article_id` INT(11) NOT NULL,
              `user_id` INT(11) NOT NULL,
              `status` enum('unseen','seen','approved') COLLATE utf8_persian_ci NOT NULL DEFAULT 'unseen',
              `created_at` datetime NOT NULL,
            `updated_at` datetime DEFAULT NULL,
            PRIMARY KEY(`id`),
            FOREIGN KEY (`article_id`) REFERENCES `articles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
          FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
          )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",

                  "CREATE TABLE `websetting`(
                    `id` INT(11) NOT NULL DEFAULT 1,
                    `title` VARCHAR(256)  NOT NULL COLLATE utf8_persian_ci,
                    `icon` VARCHAR(256) NOT NULL COLLATE utf8_persian_ci,
                    `logo` VARCHAR(256) NOT NULL COLLATE utf8_persian_ci,
                    `main_image` VARCHAR(256)  COLLATE utf8_persian_ci NOT NULL,
                    `type_of_price` VARCHAR(256) NOT NULL COLLATE utf8_persian_ci,
                    `restaurant_name` VARCHAR(256) NOT NULL COLLATE utf8_persian_ci,
                    `sub_name` VARCHAR(256) NOT NULL  COLLATE utf8_persian_ci,
                    `first_heading` VARCHAR(256) NOT NULL COLLATE utf8_persian_ci,
                    `secound` VARCHAR(256) NOT NULL COLLATE utf8_persian_ci,
                    `main_btn` VARCHAR(256) NOT NULL COLLATE utf8_persian_ci,
                    `chef` VARCHAR(256) NOT NULL COLLATE utf8_persian_ci,
                    `about_chef` VARCHAR(256) NOT NULL COLLATE utf8_persian_ci,
                    `about_chef_image` VARCHAR(256) NOT NULL COLLATE utf8_persian_ci,
                    `about_chef_btn` VARCHAR(256) NOT NULL COLLATE utf8_persian_ci,
                    `article_btn` VARCHAR(256) COLLATE utf8_persian_ci NOT NULL,
                    `copyright` VARCHAR(256) NOT NULL COLLATE utf8_persian_ci,
                    `menu_image_1` VARCHAR(256) NOT NULL COLLATE utf8_persian_ci,
                    `menu_image_2` VARCHAR(256) NOT NULL COLLATE utf8_persian_ci,
                    `menu_image_3` VARCHAR(256) NOT NULL COLLATE utf8_persian_ci,
                    `created_at` datetime NOT NULL,
            `updated_at` datetime DEFAULT NULL
          
         )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",
        "CREATE TABLE `social_media`(
  
            `id` INT(11) NOT NULL AUTO_INCREMENT,
              `name` VARCHAR(256) NOT NULL COLLATE utf8_persian_ci,
              `url` VARCHAR(256) NOT NULL COLLATE utf8_persian_ci,
              `image` VARCHAR(256) NOT NULL COLLATE utf8_persian_ci,
            `created_at` datetime NOT NULL,
            `updated_at` datetime DEFAULT NULL,
            PRIMARY KEY(`id`)
        )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",
        "CREATE TABLE `branches`(
         `id` INT(11) NOT NULL AUTO_INCREMENT,
         `location` VARCHAR(256) NOT NULL COLLATE utf8_persian_ci,
         `telephone` VARCHAR(256) NOT NULL COLLATE utf8_persian_ci,
         `created_at` datetime NOT NULL,
            `updated_at` datetime DEFAULT NULL,
            PRIMARY KEY(`id`)
        )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;",
        "CREATE TABLE `about_us`(
          `id` INT(11) NOT NULL DEFAULT '1',
          `body` text DEFAULT NULL COLLATE utf8_persian_ci,
          `created_at` datetime NOT NULL,
            `updated_at` datetime DEFAULT NULL
        )ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_persian_ci;"
            
    );
    public function run(){
        foreach ($this->tables as $table) {
        $this->createTable($table);
        }
    }
    public function c(){
      $this->update("users",3,["username"],["matin"]);
    }
}



?>