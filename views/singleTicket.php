<?php $title = "Billet Simple"; ?>


<?php ob_start(); ?>
<?php foreach($posts as $post); ?>

<h2>Mes billets en ligne</h2>
<p>Mes derniers billets</p>
<h3><?= $post->title(); ?></h3> <!--getters dans post.php*/ -->
<time><?= $post->cretion_date(); ?><time>


<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>

