<?php $title = "Page Administrateur"; ?>

<?php ob_start(); ?>
    
    <div class="adminPage">
        <h3 id="titleAdmin">Administrateur</h3>
        <p class="welcomeAdmin">Bonjour Mr <?=  $_SESSION['pseudo']; ?>, cette page vous est consacrée pour gerer votre site.</p>
        
        <h3>Administrateur autoriser</h3>
        <?php foreach ($admins as $admin) { ?>
            <ul>
                <li> Pseudo : <?= htmlspecialchars($admin->getPseudo());?> </li>
                <li> Email : <?= htmlspecialchars($admin->getEmail());?> </li>
                <li> Controle Total : <?= htmlspecialchars($admin->getFirstAdmin());?> </li>
            </ul>
        <?php } ?>
        
        <h3>Creation d'un chapitre</h3>
            <ul>
                <li><a class="adminLink" href="index.php?objet=post&action=add">Ajouter un chapitre</a></li><br>
            </ul>

        <h3>Modifier ou suprimer un chapitre</h3>
        <?php foreach ($posts as $post) { ?>
            <ul>
                <li><?= (htmlspecialchars($post->getTitle())); ?><br/>
                <a class="adminLink" href="index.php?objet=post&action=update&id=<?= $post->getId(); ?>">Modifier</a><br/>
                <a class="adminLink" href="index.php?objet=post&action=delete&id=<?= $post->getId(); ?>">Supprimer</a></li>
            </ul>
        <?php } ?>

        <h3>Tous les commentaires</h3>
        <?php foreach ($comments as $comment) { ?>
            <h4>Auteur : <?= $comment->getAuthor(); ?></h4>
                <li id="listComments">
                    <ul><p>Contenu : <?= $comment->getComment(); ?></p></ul>
                    <ul><a class="adminLink" href="index.php?objet=post&action=deleteComment&id=<?= $comment->getId(); ?>">Supprimer</a></ul>  
                    <ul><a class="adminLink" href="index.php?objet=post&action=updateComment&id=<?= $comment->getId(); ?>">Modifier</a></ul>
                    <ul><p id="reportSignal"><?php if ($comment->getreport() == 1) { echo 'Commentaire signaler'; } ?> </p></ul>
                    <ul><a class="adminLink" href="index.php?objet=post&action=unReportComment&id=<?= $comment->getId(); ?>" onclick="window.location.reload(false)"><?php if ($comment->getreport() == 1) { echo 'aprouver'; } ?></a></ul>
                </li>
        <?php } ?>
    </div>
    
<?php
$content = ob_get_clean(); 

require_once('template.php');
?>