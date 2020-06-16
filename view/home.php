<?php $title = "Acceuil"; ?>


<?php ob_start(); ?>
<?php include('menu.php'); ?>
<div id="contentPresentation">
    <div id="photoAuthor">
        <div id="contentPhoto">
            <img src="public\images\photoAuthor.jpg" alt="JeanForteroche" class="photoAuthor" />
        </div>
    </div>

</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>