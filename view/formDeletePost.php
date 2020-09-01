<?php  $title = "Admin-Suppression du chapitre " . $post->getTitle(); ?>

<?php ob_start(); ?>

<div id ="form">
    <form method="post" action="index.php?objet=post&action=delete&id=<?= $post->getId();?>">
        <h2>Suppression du Chapitres <?= $post->getTitle();?></h2>
        <div class="labelTitle">
            <h3><label for="title">Titre :</label></h3>
            <input type="text" placeholder="Titre" name ="title" <?php if (isset($post)) {echo 'value="' . $post->getTitle(). '"';} ?>>
        </div>
        <div class="labelContent">
            <h3><label for="content">Contenu :</label></h3>
            <textarea id="mytextarea" placeholder ="contenu" name ="content"><?php if (isset($post)) {echo $post->getContent();} ?></textarea>
        </div>
        <button id="formButton" type="submit" value ="Supprimer">Supprimer le chapitre <?= $post->getTitle();?></button>
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