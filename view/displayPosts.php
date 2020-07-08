<?php $title = "Billets à lire"; ?>

<?php ob_start(); ?>
<h2 id="titleListTicket">liste des Billets</h2>
<?php foreach ($posts as $post) { ?>
<div class="contentPosts">
<h3 class="titleTicket"><a href="index.php?objet=post&amp;id=<?= $post->id(); ?>"><?= htmlspecialchars($post->title());?></a> publié le <?= $post->creation_date();?></h3>
    <div id="post">
        <p class="postText"><?= $post->content();?></p>
        <p class="linkComment"><em><a class="link" href="../view/comment.php">Commentaires</a></em></p>
    </div>  
</div>    

<?php } ?>
<?php $content = ob_get_clean(); ?>

<?php require_once('template.php');
