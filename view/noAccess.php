<?php $title = "Page Administrateur"; ?>

<?php ob_start(); ?>
    <div id="echoAccess">
        <?php echo 'Seul les administrateur peuvent acceder à la page Admin.'; ?>
    </div>
    
<?php
$content = ob_get_clean(); 

require_once('template.php');
?>