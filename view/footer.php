<footer>
	<ul id="menuFooter">
		<li><a href="index.php?objet=home">Présentation</a></li>
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
	<div id=infosFooter>
		<p id="webCreator">
			Ce site à été réalisé, pour un projet openclassroom du parcour DWJ, par ORTA Thomas.
		</p>
		<p>
			<a href="http://jigsaw.w3.org/css-validator/check/referer">
				<img style = "border: 0; width: 88px; height: 31px" src = "http://jigsaw.w3.org/css-validator/images/vcss-blue" alt="CSS Valide !" />
			</a>
		</p>
	</div>
</footer>
