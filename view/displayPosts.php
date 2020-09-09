<?php $title = "Billets à lire"; ?>

<?php ob_start(); ?>

<section>
    <h2 class='titleSection'> Tous les chapitres</h2>
    <?php foreach ($posts as $post) { ?>
        <article class="contentPosts">
            <div class="titleTickets">
                <h3 class="titleTicket"><a href="index.php?objet=post&amp;id=<?= $post->getId(); ?>"><?= $post->getTitle();?></a></h3>
                <p class="dateInfos">
                   publié le <?= $post->getCreationDate();?>
                </p>
            </div>
            <div class="postContent">
                <?= substr($post->getContent(),0 ,1000), ' ' ;?>
                
                <a class="more" href="index.php?objet=post&amp;id=<?= $post->getId(); ?>">...afficher plus</a>
                
            </div>
        </article>
    <?php } ?>
</section>

<?php 
    $content = ob_get_clean(); 

    require_once('template.php');
?>
