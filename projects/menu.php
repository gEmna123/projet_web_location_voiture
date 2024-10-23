<?php
$login = $_SESSION['user']['login'];
?>
<nav>
<h3>
<?php echo "Utilisateur: $login <br>(connecté)"; ?>
</h3>
<ul>
	<li><a href="dashbord.php" class="active">Accueil</a></li>
	<li><a href="filiere.php">Filières</a></li>
	<li><a href="etudiant">Etudiants</a></li>
	<li><a href="logout.php">Déconnexion</a></li>
</ul>
</nav>