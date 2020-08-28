<?php $title = "Billets à lire"; ?>

<?php ob_start(); ?>

<div>
    <?php foreach ($posts as $post) { ?>
        <div class="contentPosts">
            <div class="titleTickets">
                <h3 class="titleTicket"><a href="index.php?objet=post&amp;id=<?= $post->getId(); ?>"><?= $post->getTitle();?></h3></a> 
                <p>
                    <em class="dateInfos">publié le <?= $post->getCreationDate();?></em>
                </p>
            </div>
            <div class="postContent">
                <?= substr($post->getContent(),0 ,1000), '...' ;?>
            </div>
            
        </div> 
    <?php } ?>
</div>

<?php 
$content = ob_get_clean(); 

require_once('template.php');
?>
