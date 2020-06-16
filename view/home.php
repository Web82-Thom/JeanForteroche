<?php $title = "Acceuil"; ?>


<?php ob_start(); ?>
<?php include('menu.php'); ?>
<section id="contentPresentation">
    <div id="photoAuthor">
        <div id="contentPhoto">
            <img src="public\images\photoAuthor.jpg" alt="JeanForteroche" class="photoAuthor" />
        </div>
    </div>
    
    <div id="contentText">
            <h3>A propos de moi ...</h3>
            <p>Bienvenur sur mon blog! Je m'appel Jean Forteroche, acteur et écrivain fictif, je suis née à Toulouse le 2 Mars 1982, issu
            d'une famille modeste composé de 4 enfants. Mon papa travaillait pour l'aérospatial et ma mère infirmiére libéral. Nous avons toujours eu la
            chance de pouvoir voyager, ce qui m'a permit de découvrir une partie du monde et développer chez moi une envie irresitible 
            de partager en écrivant.<br \></p>
            <P>Je souhaite partager avec vous mon prochain roman, "Billet simple pour l'Alaska". J'innover et je publier par épisode en ligne sur 
            mon propre site. Vous trouverez <a href="#">ici</a> mes billets. Bonne lecture et partager vos commentaires!!</P>
    </div>

</section>

<section id="experience">
    <h3>Ma librairie</h3>

</section>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>