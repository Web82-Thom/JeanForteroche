<?php session_start(); 
$id_session = session_id(); 
foreach ($admins as $admin) { 
    $_SESSION['pseudo'] = htmlspecialchars($admin->getPseudo());
  } ?>
<?php $title = "Admin"; ?>

<?php ob_start(); ?>
    
    <div class="adminPage">
        <h3 id="titleAdmin">Administrateur</h3>
        <p class="welcomeAdmin">Bonjour Mr <?=  htmlspecialchars($admin->getPseudo()); ?>, cette page vous est consacrée pour gerer votre site.</p>
        
        <h4>Administrateur autoriser</h4>
        <?php foreach ($admins as $admin) { ?>
            <ul>
                <li> Pseudo : <?= htmlspecialchars($admin->getPseudo());?> </li>
                <li> Email : <?= htmlspecialchars($admin->getEmail());?> </li>
                <li> Controle Total : <?= htmlspecialchars($admin->getFirstAdmin());?> </li>
            </ul>
        <?php } ?>
        
        <h4>Creation d'un chapitre</h4>
            <ul>
                <li><a class="adminLink" href="index.php?objet=post&action=add">Ajouter un chapitre</a></li><br>
            </ul>

        <h4>Modifier ou suprimer un chapitre</h4>
        <?php foreach ($posts as $post) { ?>
            <ul>
                <li><?= (htmlspecialchars($post->getTitle())); ?><br/>
                <a class="adminLink" href="index.php?objet=post&action=update&id=<?= $post->getId(); ?>">Modifier</a><br/>
                <a class="adminLink" href="index.php?objet=post&action=delete&id=<?= $post->getId(); ?>">Supprimer</a></li>
            </ul>
        <?php } ?>

        <h4>Tous les commentaires</h4>
        <?php foreach ($comments as $comment) { ?>
            <ul>
                <li><p>Auteur : <?= $comment->getAuthor(); ?></p>
                    <p>Contenu : <?= $comment->getComment(); ?></p>
                    <a class="adminLink" href="index.php?objet=post&action=deleteComment&id=<?= $comment->getId(); ?>">Supprimer</a>  
                    <a class="adminLink" href="index.php?objet=post&action=updateComment&id=<?= $comment->getId(); ?>">Modifier</a>
                    if () { 
                        <p>Commentaire signaler</p>

                    }
                   
                </li>
            </ul>
        <?php } ?>

    </div>
<?php
$content = ob_get_clean(); 

require_once('template.php');
?>