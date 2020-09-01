<?php $title = "modification des Commentaires"; ?>

<?php ob_start(); ?>

<?php foreach ($comments as $comment) { ?>
    <div id="form">
        <form method="POST" action="index.php?objet=post&action=updateComment&id=<?= $comment->getId(); ?>&postId=<?= $comment->getPostId(); ?>">
            <h2 id="formTitle">Modification de commentaire</h2>    
            <div class="labelTitle">
                <h3><label for="author">Auteur</label></h3>
                <input type="text" id="author" name="author" <?php echo 'value="' . $comment->getAuthor() . '"'; ?>/>
            </div>
            <div class="labelContent">
                <h3><label for="comment">Commentaire</label></h3>
                <textarea id="mytextarea" name="comment"><?= $comment->getComment(); ?></textarea>
            </div>
                <button type="submit" id="formButton" value="Modifier le commentaire">Modifier le commentaire</button>
        </form>
    </div>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require_once('template.php');
