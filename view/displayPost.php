<?php $title = htmlspecialchars($post->getTitle()); ?>

<?php ob_start(); ?>

<div class="contentPosts">
    <div class="titleTickets">
        <h3 class="titleTicket"><?= $post->getTitle(); ?></h3>
        <em class="dateInfos">publié le <?= $post->getCreationDate();?></em> 
    </div>
    <div class="postContent">
        <p class="postText">
            <?= $post->getContent();?>
        </p>
    </div>
</div>
<div id="formAddComment">
    <h3 id="formTitle">Ajouter votre commentaires</h3>
    <p>
        Chères Lecteurs et Lectrices, je vous invite à partager vos commentaires. 
    </p>
    <div id="citation">
        <q>
            Le respect mutuel est le fondement de la véritable harmonie.
            <em>
                - Dalaï Lama -
            </em>
        </q>
    </div>
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
            <button type="submit">Poster votre commentaire</button>
        </div>
    </form>
</div>
<div id="AllCommentDisplay">
    <?php foreach ($comments as $comment) { ?>
        <div id="commentDisplay">
            <div id="commentAuthorContent">
                <p id="commentAuthor">
                    <strong><?= htmlspecialchars($comment->getAuthor()); ?></strong>
                </p>
                <em class="dateInfos">publié le <?= $comment->getCommentDate(); ?></em>
            </div>
            <p id="commentContent">
                <?= htmlspecialchars($comment->getComment()); ?>
            </p>
            <div id="actionComment">
                <p>
                    <a class="adminLink" href="index.php?objet=post&action=reportComment&id=<?= $comment->getId() ; ?>&postId= <?= $post->getId(); ?>" onclick="return(confirm('Etes-vous sûr de vouloir signaler ce commentaire ?'));" onclick="window.location.reload(false)" ><?php if ($comment->getReport() == 1) { echo ''; } else { echo 'Signaler';} ?></a>
                </p>
                <p>
                    <a class="adminLink" href="index.php?objet=post&action=updateComment&id=<?= $comment->getId(); ?>&postId=<?= $comment->getPostId(); ?>"><?php if (isset($_SESSION['firstAdmin']) && $_SESSION['firstAdmin'] == 1) { echo 'Modifier'; } else { echo '';} ?></a>
                </p>
                <p id="reportSignal">
                    <?php if ($comment->getReport() == 1) { echo 'Commentaire signalé'; } ?>
                </p> 
            </div>    
        </div>
    <?php } ?>
</div>
    

       
<?php 
$content = ob_get_clean(); 

require_once('template.php');
?>
