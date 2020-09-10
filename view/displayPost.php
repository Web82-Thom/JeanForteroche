<?php $title = htmlspecialchars($post->getTitle()); ?>

<?php ob_start(); ?>

<article class="contentPosts"> 
    <div class="titleTickets">
        <h3 class="titleTicket"><?= $post->getTitle(); ?></h3>
        <p class="dateInfos">
            publié le <?= $post->getCreationDate();?>
        </p> 
    </div>
    <div class="postContent">
        <p class="postText">
            <?= $post->getContent();?>
        </p>
    </div>
</article>
<section id="formAddComment">
    <h3 id="formTitle">Ajouter votre commentaires</h3>
    <p>
        Chères Lecteurs et Lectrices, je vous invite à partager vos commentaires. 
    </p>
    <div id="citation">
        <q>
            Le respect mutuel est le fondement de la véritable harmonie.
        </q>
        <em>
            - Dalaï Lama -
        </em>
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
            <button id="submitComment" type="submit">Poster votre commentaire</button>
        </div>
    </form>
</section>
<section id="AllCommentDisplay">
<h2 class='titleSection'> Tous les commentaires</h2>
    <?php foreach ($comments as $comment) { ?>
        <div id="commentDisplay">
            <div id="commentAuthorContent">
                <p id="commentAuthor">
                    <strong><?= htmlspecialchars($comment->getAuthor()); ?></strong>
                </p>
                <p class="dateInfos">
                    publié le <?= $comment->getCommentDate(); ?>
                </p>
            </div>
            <p id="commentContent">
                <?= htmlspecialchars($comment->getComment()); ?>
            </p>
            <div id="actionComment">
                <p>
                    <a id="report" class="adminLink" href="index.php?objet=post&amp;action=reportComment&id=<?= $comment->getId() ; ?>&postId=<?= $post->getId(); ?>" onclick="return(confirm('Etes-vous sûr de vouloir signaler ce commentaire ?')); window.location.reload(false)" ><?php if ($comment->getReport() == 1) { echo ''; } else { echo 'Signaler';} ?></a>
                </p>
                <p>
                    <a class="adminLink" href="index.php?objet=post&amp;action=updateComment&id=<?= $comment->getId(); ?>&postId=<?= $comment->getPostId(); ?>"><?php if (isset($_SESSION['firstAdmin']) && $_SESSION['firstAdmin'] == 1) { echo 'Modifier'; } else { echo '';} ?></a>
                </p>
                <p id="reportSignal">
                    <?php if ($comment->getReport() == 1) { echo 'Commentaire signalé'; } ?>
                </p> 
            </div>    
        </div>
    <?php } ?>
</section>

<script src="js/formAddComment.js"></script>
<script src="js/main.js"></script>

<?php 
    $content = ob_get_clean(); 

    require_once('template.php');
?>


