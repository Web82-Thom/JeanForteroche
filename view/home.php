<?php $title = "Accueil"; ?>

<?php ob_start(); ?>

<section id="contentPresentation">
    <div id="photoAuthor">
        <div id="contentPhoto">
            <img src="images\photoAuthor.jpg" alt="JeanForteroche" class="photoAuthor" />
        </div>
    </div>
    
    <div id="contentText">
        <h3>A propos de moi ...</h3>
        <p>
            Bienvenue sur mon blog! Je m'appel Jean Forteroche, acteur et écrivain fictif, je suis né à Toulouse le 2 Mars 1982, issu d'une famille modeste composé de 4 enfants. Mon papa travaillait pour l'aérospatial et ma mère infirmiére libéral. Nous avons toujours eu la chance de pouvoir voyager, ce qui m'a permit de découvrir une partie du monde et développer chez moi une envie irresitible de partager en écrivant.
        </p>
        <p>
            Je souhaite partager avec vous mon prochain roman, "Billet simple pour l'Alaska". J'innove et je publier par épisode en ligne sur mon propre site. Vous trouverez <a href="#">ici</a> mes billets. Bonne lecture et partager vos commentaires!!
        </p>
    </div>

</section>

<section id="experience">
    <h3>"Billet simple pour l'Alaska"</h3>
    <div id="oneLibrary">
        <div id="nameBookOne">
            <div id="imgBook">
                <img src="images\librairie2.jpg" alt="Billet simple pour l'Alaska">
            </div>
        </div>
        <div id="infosBookOne">
            <h4>Résumé</h4>
            <p id="abstract">
                En attendant la barge chargée de les mener au nouveau site, les habitants disent adieu à la terre – cette terre où plane l'esprit des ancêtres, cette boue où les petites filles dessinent des histoires ... Adieu à la toundra pelée, à la station de radio locale où Jo-Jo, le DJ, passe sans fin des vieux disques, aux chemins de planches et aux mélopées yupik ... Tyler, le premier esquimau de la planète allergique au froid, Dennis dit «l'Embrouille», Angelic, Panika, Josh, Junior et les autres – tous sentent pourtant que Salmon Bay n'a pas dit son dernier mot.
            </p>
            <p>
                Avant la grande traversée, pour le meilleur peut-être, le village leur réserve un cataclysmique chant du départ ...
            </p>
        </div>
    </div>

</section>

<?php 

$content = ob_get_clean(); 

require_once("template.php"); 

?>