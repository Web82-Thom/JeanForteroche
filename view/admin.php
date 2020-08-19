<?php $title = "Page Administrateur"; ?>

<?php ob_start(); ?>
    <div class="adminPage">
        <h3 id="titleAdmin">Administrateur</h3>
        <p class="welcomeAdmin">Bonjour Mr <?=  $_SESSION['pseudo']; ?>, cette page vous est consacrée pour gerer votre site.</p>
        
        <h3>Creation d'un chapitre</h3>
            <ul>
                <li><a class="adminLink" href="index.php?objet=post&action=add">Ajouter un chapitre</a></li><br>
            </ul>

        <h3>Modifier ou suprimer un chapitre</h3>
        <div>
            <div class="">
                <table class="">
                    <thead>
                        <tr class="">
                            <th>Titre du chapitre</th>
                            <th>Contenu</th>
                            <th>Lire / Modifier</th>
                            <th>Supprimer</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <?php foreach ($posts as $post) { ?>
                <div class="tableCommentContent">
                    <table id="tableContent">
                        <tbody>
                            <tr class="">
                                <td><?= htmlspecialchars($post->getTitle()); ?></td>
                                <td><?= htmlspecialchars($post->getContent());?></td>
                                <td><a class="adminLink" href="index.php?objet=post&action=update&id=<?= $post->getId(); ?>"><button><i class="fab fa-readme"></i> / <i class="fas fa-keyboard"></i></a></button></ul></td>
                                <td><a class="adminLink" href="index.php?objet=post&action=delete&id=<?= $post->getId(); ?>"><button><i class="fas fa-trash-alt"></a></button></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
        </div>

        <h3>Tous les commentaires</h3>
        <div>
            <div class="tableCommentHead">
                <table>
                    <thead>
                        <tr>
                            <th>Contenu </th>
                            <th>Auteur</th>
                            <th>Lire / Modifier</th>
                            <th>Supprimer</th>
                            <th>Signalement</th>
                        </tr>
                    </thead>
                </table>
            </div>
            <?php foreach ($comments as $comment) { ?>
                <div class="tableCommentContent">
                    <table>
                        <tbody>
                            <tr>
                                <td><?= substr(htmlspecialchars($comment->getComment()),0 ,20), '....';  ?></td>
                                <td><?= htmlspecialchars($comment->getAuthor());?></td>
                                <td><a class="adminLink" href="index.php?objet=post&action=updateComment&id=<?= $comment->getId(); ?>&postId=<?= $comment->getPostId(); ?>"><button><i class="fab fa-readme"></i> / <i class="fas fa-keyboard"></i></a></button></ul></td>
                                <td><a class="adminLinkDelete" href="index.php?objet=post&action=deleteComment&id=<?= $comment->getId(); ?>&postId=<?= $comment->getPostId(); ?>"><button><i class="fas fa-trash-alt"></i></button></a></td>
                                <td><a class="adminLinkReport" href="index.php?objet=post&action=unReportComment&id=<?= $comment->getId(); ?>" onclick="window.location.reload(false)"><?php if ($comment->getreport() == 1) { echo 'ATTENTION, cliqué ici pour aprouver'; }?></a></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            <?php } ?>
        </div>
    </div>
    
<?php
$content = ob_get_clean(); 

require_once('template.php');
?>
