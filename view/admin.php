<?php $title = "Admin"; ?>

<?php ob_start(); ?>

<h3 id="titleAdmin">Administrateur</h3>
<p>Bonjour Mr Forteroche</p>
<h4>Creation d'un chapitre</h4>
<a href="index.php?objet=post&action=add">Ajouter un poste</a> <br>
<h4>Modifier ou suprimer un post</h4>
<?php foreach ($posts as $post) { ?>
    
<table id="table">
               
    <tr>
        <td><?= (htmlspecialchars($post->title()));?></td>
        <td><a href="#">Modifier</a></td>
        <td><a href="index.php?objet=post&action=delete&postId=<?=$post->id();?>">Supprimer</a></td>
        
    </tr>
  
</table>   

<?php } ?>

<?php
$content = ob_get_clean(); 

require_once('template.php'); 

?>