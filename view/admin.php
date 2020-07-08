<?php $title = "Admin"; ?>

<?php ob_start(); ?>

<h3>Admin</h3>
<a href="index.php?objet=post&action=add">Ajouter un poste</a>
<?php 

$content = ob_get_clean(); 

require_once('template.php'); 

?>