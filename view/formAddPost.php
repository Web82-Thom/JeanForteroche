<?php $title = "Admin-Rédaction"; ?>

<?php ob_start(); ?>

<h3>TinyMCE traitement des Chapitres et envoie du fichier</h3>
    <div id ="form">
        <form method="post" action="index.php?objet=post&action=add">
            <p><label for="textarea" >Rédaction :</label></p>
            <p><input type="text" placeholder="Titre" name ="title" <?php if (isset($post)) {echo 'value="' . $post->getTitle(). '"';} ?>></p>
            <p><textarea id="mytextarea" placeholder ="Contenu" name ="content"><?php if (isset($post)) {echo $post->getContent();} ?></textarea></p>
            <p><input type="submit" value ="Envoyer un nouveau post!"></p>
        </form>
    </div>

<?php $content = ob_get_clean(); ?>

<?php require_once('template.php');