<?php $title = "Supprimer des billets"; ?>

<?php ob_start(); ?>
<h2 id="titleListTicket"><?= htmlspecialchars($post->getTitle()); ?></h2>

<div class="contentPosts">
    <h3 class="titleTicket"><?= htmlspecialchars($post->getTitle()); ?> publié le <?= $post->getCreation_date();?></h3>
        <div id="post">
            <p class="postText"><?= htmlspecialchars($post->getContent());?></p>
            <p class="linkComment"><em><a class="link"href="index.php?objet=post&action=deleted&id=<?= $post->getId(); ?>">supprimer</a></em></p>
        </div>  
</div>    

<?php $content = ob_get_clean(); ?>

<?php require_once('template.php');
