<header>
    <h1>Jean Forteroche</h1>
    <h2 id="titleBook">"Billet simple pour l'Alaska"</h2>
</header>      
<nav id="menu">
    <ul id="menuNavigation">
        <li>
            <a href="index.php?objet=home">Présentation</a>
        </li>
        <li>
            <a href="index.php?objet=post">Liste des chapitres</a>
        </li>
        <li>
            <a href="index.php?objet=contact">Contact</a>
        </li>
        <li class="menuAdmin">
            <a href="index.php?objet=admin&action=login">Admin</a>
            <ul class="sousMenu">
                <li>
                    <a href="index.php?objet=admin&action=destroy"><?php if (isset($_SESSION['firstAdmin'])) {echo 'Se déconnecter';} ?></a>
                </li>
                <li>
                    <a href="index.php?objet=admin&action=login"><?php if (!isset($_SESSION['firstAdmin'])) {echo 'Se connecter';}?></a>
                </li>
            </ul>
        </li>
    </ul>
</nav>
