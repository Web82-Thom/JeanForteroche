<?php  $title = "Admin-Suppression"; ?>

<?php ob_start(); ?>

<div id ="form">
    <form method="post" action="index.php?objet=post&action=delete&id=<?= $post->getId();?>">
        <h2>Suppression du Chapitres <?= $post->getTitle();?></h2>
        <div class="labelTitle">
            <h3><label for="title">Titre :</label></h3>
            <p><input type="text" placeholder="Titre" name ="title" <?php if (isset($post)) {echo 'value="' . $post->getTitle(). '"';} ?>></p>
        </div>
        <div class="labelContent">
            <h3><label for="content">Contenu :</label></h3>
            <p><textarea id="mytextarea" placeholder ="contenu" name ="content"><?php if (isset($post)) {echo $post->getContent();} ?></textarea></p>
        </div>
            <button class="formButton" type="submit" value ="Supprimer">Supprimer le chapître <?= $post->getTitle();?></button>
    </form>
</div>
<script>
    tinymce.init({
    selector: '#mytextarea',
    readonly: true,
    });
</script>

<?php $content = ob_get_clean(); ?>

<?php require_once('template.php');