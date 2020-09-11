<?php $title = "Formulaire de contact"; ?>

<?php ob_start(); ?>

<section id="formContact">
    <h2 class="titleSection">Formulaire de contact</h2>
    <form method="POST" action="index?objet=contact">
        <h2>Contactez moi !</h2>
        <div id="formContactInput">
            <input id="inputContactName" type="text" name="name" placeholder="Nom" size="30"><br>
            <input id="inputContactFirstName" type="text" name="firstName" placeholder="Prénom" size="30"><br>
            <input id="inputContactEmail" type="email" name="email" placeholder="Votre Email" size="30" maxlength="50"><br>
            <input id="inputContactTitle" type="text" name="title" placeholder="Titre" size="30"><br>
            <textarea id="inputContactMessage" name="message" rows="10" cols="30" placeholder="Votre message" maxlength="150"></textarea><br>
        </div>
        <button id="formButton" type="submit" name="mailForm" title="Envoyer" >Envoyer votre message</button>
    </form>
</section>

<script src="js/formContact.js"></script>
<script src="js/main.js"></script>

<?php
    $content = ob_get_clean(); 

    require_once('template.php'); 
?>

