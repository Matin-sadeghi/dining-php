<?php

use resDataBase\DataBase;

if(session_status()==PHP_SESSION_NONE){
    session_start();
}  
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $setting["title"] ?></title>
    <link rel="shortcut icon" href="http://localhost/restaurant/<?php echo $setting["icon"] ?>" type="image/x-icon" />
    <link rel="stylesheet" href="http://localhost/restaurant/public/css/app/css/main.css">
    <link rel="stylesheet" href="http://localhost/restaurant/public/css/app/font-awesome-4.7.0/css/font-awesome.min.css">

</head>

<body>
    <!-- start navbar section -->
    <nav class="navbar">
        <input hidden type="checkbox" id="check" class="checkbox">
        <div class="hamburger-menu">
            <label for="check" class="menu">
            <div class="menu-line menu-line-1"></div>
            <div class="menu-line menu-line-2"></div>
            <div class="menu-line menu-line-3"></div>
        </label>
        </div>
        <div class="navbar-navigation">
            <div class="navbar-navigation-left">
                <img class="left-img left-img-1" src="http://localhost/restaurant/<?php echo $setting["menu_image_1"] ?>" alt="">
                <img class="left-img left-img-2" src="http://localhost/restaurant/<?php echo $setting["menu_image_2"] ?>" alt="">
                <img class="left-img left-img-3" src="http://localhost/restaurant/<?php echo $setting["menu_image_3"] ?>" alt="">
            </div>
            <div class="navbar-navigation-right">
                <ul class="nav-list">
                <?php if(isset($_SESSION["user"])){
                    $db = new DataBase();
                    $user = $db->select("SELECT * FROM `users` WHERE `id`=?",[$_SESSION["user"]])->fetch();
                    if($user["permission"]=="admin"){?>
                    <li class="nav-list-item"><a  href="http://localhost/restaurant/admin" class="nav-list-link">پنل ادمین</a> </li>

                    <?php }
                } ?>
                    <?php foreach($menus as $menu){ ?>
                    <li class="nav-list-item"><a href="<?php echo $menu["url"] ?>" class="nav-list-link"><?php echo $menu["name"] ?></a> </li>
                    <?php }?>
                 
                </ul>
              
            </div>

        </div>
    </nav>

    <!-- end navbar section -->


    <!-- start site header -->
    <header style="background: linear-gradient(rgba(0, 0, 0, 0.8), rgba(0, 0, 0, 0.6)), url(http://localhost/restaurant/<?php echo $setting["main_image"] ?>) center no-repeat;" class="header">
        <div class="brand">
        <a href="http://localhost/restaurant/home" class="logo"><img  style="width: 75px;height: 70px;border-radius:100%" src="http://localhost/restaurant/<?php echo $setting["logo"] ?>"></a>

            <div>
                <h1 class="main-name"><?php echo $setting["restaurant_name"] ?></h1>
                <p class="sub-name"><?php echo $setting["sub_name"] ?></p>
            </div>
        </div>
        <div class="header-banner">
            <h1 class="main-heading"><?php echo $setting["first_heading"] ?></h1>
            <h3 class="sub-heading"><?php echo $setting["secound"] ?></h3>
            <button type="button" class="main-btn"><?php echo $setting["main_btn"] ?></button>
        </div>
    </header>
    <!-- end site header -->
