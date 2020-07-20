<?php $title = "Admin"; ?>

<?php ob_start(); ?>

    <div class="adminPage">
        <h3 id="titleAdmin">Administrateur</h3>
        <p class="welcomeAdmin">Bonjour Mr Forteroche, cette page vous est consacrée pour gerer votre site.</p>
        <h4>Creation d'un chapitre</h4>
            <ul>
                <li><a class="adminLink" href="index.php?objet=post&action=add">Ajouter un chapitre</a></li><br>
            </ul>
        <h4>Modifier ou suprimer un chapitre</h4>
        <?php foreach ($posts as $post) { ?>
            <ul>
                <li><?= (htmlspecialchars($post->getTitle()));?><br/>
                <a class="adminLink" href="index.php?objet=post&action=update&id=<?= $post->getId(); ?>">Modifier</a><br/>
                <a class="adminLink" href="index.php?objet=post&action=delete&id=<?= $post->getId(); ?>">Supprimer</a></li>
            </ul>
        <?php } ?>
    </div>
<?php
$content = ob_get_clean(); 

require_once('template.php');
?>