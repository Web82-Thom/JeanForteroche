<?php $title = "Page Administrateur"; ?>

<?php ob_start(); ?>

<div class="adminPage">
    <div class="blockAdmin">                
        <h3 id="titleAdmin">Administrateur</h3>
        <p class="welcomeAdmin">
            Bonjour Mr <?= $_SESSION['pseudo']; ?>, cette page vous est consacrée pour gerer votre site.
        </p>
    </div>
    <div class="blockAdmin">
        <h3>Creation d'un chapitre</h3>
        <p>
            <a id="addPost" href="index.php?objet=post&action=add">
                Ajouter un chapitre <i class="fas fa-plus"></i>
            </a>
        </p>
    </div>
    <div class="blockAdmin">
        <h3>Modifier ou suprimer un chapitre</h3>
        <div>
            <table >
                <thead>
                    <tr>
                        <th>
                            Titre du chapitre
                        </th>
                        <th>
                            Contenu
                        </th>
                        <th>
                            Lire
                        </th>
                        <th>
                            Modifier
                        </th>
                        <th>
                            Supprimer
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
        <?php foreach ($posts as $post) { ?>
            <div class="tableCommentContent">
                <table id="tableContent">
                    <tbody>
                        <tr>
                            <td>
                                <a class="adminLink" href="index.php?objet=post&amp;id=<?= $post->getId(); ?>">
                                    <?= $post->getTitle(); ?>
                                </a>
                            </td>
                            <td id="aaa">
                                <a class="adminLink" href="index.php?objet=post&amp;id=<?= $post->getId(); ?>">
                                    <?= substr( $post->getContent(),0, 210), '...'; ?>
                                </a>
                            </td>
                            <td>
                                <a class="adminLink" href="index.php?objet=post&amp;id=<?= $post->getId(); ?>">
                                    <button class="buttonActionAdmin"><i class="fab fa-readme"></i></button>
                                </a>
                            </td>
                            <td>
                                <a class="adminLink" href="index.php?objet=post&amp;&action=update&id=<?= $post->getId(); ?>">
                                    <button class="buttonActionAdmin"><i class="fas fa-keyboard"></i></button>
                                </a>
                            </td>
                            <td>
                                <a class="adminLink" href="index.php?objet=post&amp;&action=delete&id=<?= $post->getId(); ?>">
                                    <button class="buttonActionAdmin"><i class="fas fa-trash-alt"></button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php } ?>
    </div>
    <div class="blockAdmin">
        <h3>Tous les commentaires</h3>
        <div class="tableCommentHead">
            <table>
                <thead>
                    <tr>
                        <th>
                            Contenu 
                        </th>
                        <th>
                            Auteur
                        </th>
                        <th>
                            Modifier
                        </th>
                        <th>
                            Signalement
                        </th>
                        <th>
                            Supprimer
                        </th>
                    </tr>
                </thead>
            </table>
        </div>
        <?php foreach ($comments as $comment) { ?>
            <div class="tableCommentContent">
                <table>
                    <tbody>
                        <tr>
                            <td>
                                <?= substr(htmlspecialchars($comment->getComment()),0 ,20), '....'; ?>
                            </td>
                            <td>
                                <?= htmlspecialchars($comment->getAuthor());?>
                            </td>
                            <td>
                                <a class="adminLink" href="index.php?objet=post&action=updateComment&id=<?= $comment->getId(); ?>&postId=<?= $comment->getPostId(); ?>">
                                    <button class="buttonActionAdmin"><i class="fas fa-keyboard"></i></button>
                                </a>
                            </td>
                            <td>
                                <a class="adminLinkReport" href="index.php?objet=post&action=unReportComment&id=<?= $comment->getId(); ?>" onclick="window.location.reload(false)">
                                    <?php if ($comment->getreport() == 1)  echo 'ATTENTION, cliqué ici pour aprouver'; ?>
                                </a>
                            </td>
                            <td>
                                <a class="adminLinkDelete" href="index.php?objet=post&action=deleteComment&id=<?= $comment->getId(); ?>&postId=<?= $comment->getPostId(); ?>">
                                    <button class="buttonActionAdmin"><i class="fas fa-trash-alt"></i></button>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        <?php } ?>
    </div>
</div>
    
<?php
    $content = ob_get_clean(); 

    require_once("template.php");
?>
