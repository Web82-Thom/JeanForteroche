<?php $title = "Login"; ?>

<?php ob_start(); ?>

<section id="formConnection">
    <h2 class="titleSection">Formulaire de connection</h2>
    <form id="formConnectionContent" method="post" action="index.php?objet=admin&action=login">
        <p>
            Veuillez remplir les champs avec vos identifiants de connection.
        </p>
        <label for="email">Renseignez votre email : </label>
        <input type="email" name="email" id="email" placeholder="Email" />
        <br />
        <label for="password">Votre Mot de passe : </label>
        <input type="password" name="password" id="password" placeholder="Mot de passe" />
        <button id="formButton" type="submit" name="submit" value="Se connecter">Se connecter</button>
    </form>
</section>

<?php 
    $content = ob_get_clean(); 

    require_once('template.php'); 
?>

<script src="js/formConnection.js"></script>
<script src="js/main.js"></script>