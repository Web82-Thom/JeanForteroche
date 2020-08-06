<?php session_start(); ?>
    
    

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <?php include("head.php"); ?>
    </head>
        
    <body>
    <?php include("menu.php") ?>
            <?= $content ?>
        <?php include("footer.php") ?>
    </body>
</html>