<?php $title = "Billets à lire"; ?>

<?php ob_start(); ?>
<h2 id="titleListTicket">liste des Billets</h2>

<div class="contentPosts">
<h3 class="titleTicket"><?= htmlspecialchars($post->title());?> publié le <?= $post->creation_date();?></h3>
    <div id="post">
        <p class="postText"><?= $post->content();?></p>
        <p class="linkComment"><em><a class="link" href="../view/comment.php">Commentaires</a></em></p>
    </div>  
</div>    

<?php $content = ob_get_clean(); ?>

<?php require_once('template.php');

/**
 * 
 * lien pour comment.php ressemblera a 
 * <p class="linkComment"><em><a href="index.php?action=post&amp;id=<?= $post['id'] ?>">Commentaires</a></em></p>
 */