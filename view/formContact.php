<?php $title = "Formulaire de contact"; ?>

<?php ob_start(); ?>

<div id="formContact">
    <form method="POST" id="formContent" action="index?objet=contact">
        <h2>Contacter moi !</h2>
        <input id="inputContactName" type="text" name="name" placeholder="Nom" size="30"><br>
        <input id="inputContactFirstName" type="text" name="firstName" placeholder="Prénom" size="30"><br>
        <input id="inputContactEmail" type="email" name="email" placeholder="Votre Email" size="30" maxlength="50"><br>
        <input id="inputContactTitle" type="text" name="title" placeholder="Titre" size="30"><br>
        <textarea id="inputContactMessage" type="text" name="message" rows="10" cols="30" placeholder="Votre message" maxlength="150"></textarea><br>
        <button id="buttonSend" type="submit" name="mailForm" title="Envoyer"> Envoyer votre message</button>
        <p id="echoMessageContact"><?php if (isset($message)) { echo $msg; } ?></p>
    </form>
</div>

<?php
$content = ob_get_clean(); 

require_once('template.php'); 
?>