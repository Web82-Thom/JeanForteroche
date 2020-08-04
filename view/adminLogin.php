<?php $title = "Login"; ?>

<?php ob_start(); ?>
<div id="formConnection">
    
    <form id="formConnectionContent"method="post" action="index.php?objet=admin">
    <p>Veuillez remplir les champs avec vos identifiants de connection.</p>
        <label for="em">Renseignez votre email : </label>
        <input type="email" name="email" id="em" placeholder="Email"><br />
        <label for="password">Votre Mot de passe : </label>
        <input type="password" name="password" id="password" placeholder="Mot de passe">
        <input type="submit" name="submit" value="Se connecter">
    </form>
</div>

<?php 
$content = ob_get_clean(); 

require_once('template.php'); 
?>