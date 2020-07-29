<?php $title = "Billets à lire"; ?>

<?php ob_start(); ?>
<h2 id="titleListTicket"><?= htmlspecialchars($post->getTitle()); ?></h2>

<div class="contentPosts">
    <h3 class="titleTicket"><?= htmlspecialchars($post->getTitle()); ?></h3>
    <em class="dateInfos">publié le <?= $post->getCreationDate();?></em> 
        <div id="post">
            <p class="postText"><?= htmlspecialchars($post->getContent());?></p>
        
        </div>
    
        
</div> 

<div id="formAddComment">
    <h3 id="formTitle">Ajouter votre commentaires</h3>

    <form id="formContent" method="post" action="index.php?objet=post&action=addComment&id=<?= $postId ?>">
        <div>
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" />
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment"></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
</div>


<?php foreach ($comments as $comment) { ?>
    <div id="commentDisplay">
        <p id="commentAuthor"><strong><?= htmlspecialchars($comment->getAuthor()); ?></strong></p>
        <em class="dateInfos">publié le <?= $comment->getCommentDate(); ?></em>
        <p id="commentContent"><?= htmlspecialchars($comment->getComment()); ?></p>
        <a class="adminLink" href="index.php?objet=post&action=updateComment&id=<?= $comment->getId(); ?>">Modifier</a>
    </div>
<?php } ?>
       

<?php $content = ob_get_clean(); ?>

<?php require_once('template.php');
