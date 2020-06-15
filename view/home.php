<?php $title = "Acceuil"; ?>


<?php ob_start(); ?>
<?php include('menu.php'); ?>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>