<?php $title = "Billets à lire"; ?>

<?php ob_start(); ?>

<h2 id="titleListTicket">liste des Billets</h2>
<?php foreach ($posts as $post) { ?>
    <div class="contentPosts">
        <h3 class="titleTicket"><a href="index.php?objet=post&amp;id=<?= $post->getId(); ?>"><?= htmlspecialchars($post->getTitle());?></h3></a> 
        <em class="dateInfos">publié le <?= $post->getCreationDate();?></em>
        <div id="post">
            <p class="postText"><?= $post->getContent();?></p>
        </div>  
    </div>    
<?php } ?>

<?php 
$content = ob_get_clean(); 

require_once('template.php');
 ?>
