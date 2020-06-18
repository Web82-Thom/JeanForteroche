<?php $title = "Billet Simple"; ?>


<?php ob_start(); ?>

<h2>Mes billets en ligne</h2>
<p>Mes derniers billets</p>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

