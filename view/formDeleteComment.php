<?php $title = "Suppression des Commentaires"; ?>

<?php ob_start(); ?>

<?php foreach ($comments as $comment); { ?>
    <div id="form">
        <form method="POST" action="index.php?objet=post&action=deleteComment&id=<?= $comment->getId(); ?>">
            <h2 id="formTitle">Suppression de commentaire</h2>    
            <div class="labelTitle">
                <h3><label for="author">Auteur</label><br /></3>
                <input type="text" id="author" name="author" <?php echo 'value="' . $comment->getAuthor() . '"'; ?>/>
            </div>
            <div class="labelContent">
                <h3><label for="comment">Commentaire</label><br /></h3>
                <textarea id="mytextarea" name="comment"><?= $comment->getComment(); ?></textarea>
            </div>
            <button id="formButton" type="submit" value="Supprimer le commentaire">Supprimer le commentaire</button>
        </form>
    </div>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require_once('template.php');