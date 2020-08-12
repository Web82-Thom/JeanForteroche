<?php $title = "modification des Commentaires"; ?>

<?php ob_start(); ?>

<?php foreach ($comment as $comments) { ?>
    <div id="formUpdateComment">
        <h3 id="formTitle">Modification de commentaire</h3>
        <form id="formContent" method="POST" action="index.php?objet=post&action=updateComment&id=<?= $comments->getId(); ?>">
            <div>
                <label for="author">Auteur</label><br />
                <input type="text" id="author" name="author" <?php echo 'value="' . $comments->getAuthor() . '"'; ?>/>
            </div>
            <div>
                <label for="comment">Commentaire</label><br />
                <textarea id="comment" name="comment"><?= $comments->getComment(); ?></textarea>
            </div>
            <div>
                <input type="submit" value="Modifier le commentaire"/>
            </div>
        </form>
    </div>
<?php } ?>

<?php $content = ob_get_clean(); ?>

<?php require_once('template.php');