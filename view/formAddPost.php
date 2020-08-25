<?php $title = "Admin-Rédaction"; ?>

<?php ob_start(); ?>
    <div id ="form">
        <form method="post" action="index.php?objet=post&action=add">
            <h2>Rédaction de vos chapîtres</h2>
            <div class="labelTitle">
                <h3><label for="title">Titre :</label></h3>
                <p><input type="text" placeholder="Indiquer le Titre" name ="title" <?php if (isset($post)) {echo 'value="' . $post->getTitle(). '"';} ?>></p>
            </div>
            <div class="labelContent">
                <h3><label for="content">Contenu :</label></h3>
                <p><textarea id="mytextarea" placeholder ="Rédiger votre chapître" name ="content"><?php if (isset($post)) {echo $post->getContent();} ?></textarea></p>
            </div>
                <button class="formButton" type="submit" value ="Envoyer un nouveau post!">Envoyer un nouveau post!</button>
        </form>
    </div>
    
  <script>
    tinymce.init({
      selector: 'textarea',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
    });
  </script>

<?php $content = ob_get_clean(); ?>

<?php require_once('template.php');