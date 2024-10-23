<?php
require_once 'securite.php';
require_once 'connexion.php';
$search = ""; 
$info ="";
// Vérifie si une recherche a été soumise
if(isset($_GET['search'])) {
	$search = $_GET['search'];
}
// Requête SQL avec la clause WHERE pour la recherche
$query = "SELECT numcin,nom, prenom, sexe, email, codeFiliere,classe FROM student s , filiere f
where f.idFiliere = s.classe 
and(numcin LIKE '%$search%' OR nom LIKE '%$search%' OR prenom LIKE '%$search%' OR email LIKE '%$search%')";  
$res = mysqli_query($con, $query);
mysqli_query($con, "SET NAMES 'utf8'");
$count = mysqli_num_rows($res); 
// Récupérer les erreurs
if (isset($_SESSION['info'])) {
    $info = $_SESSION['info'];
    unset($_SESSION['info']); 
}
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Etudiant</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="principal">
<?php require_once 'menu.php'; ?>
<div class="content">
<div class="top">
	<a href ="addEtudiant.php">Nouveau</a>
	<div class="search">
	<form method="GET">
        <input type="text" name="search" placeholder="chercher">
        <button type="submit">Chercher</button>
    </form>
	</div>

</div>
<?php if (!empty($info)) echo "<span>" . $info . "</span>"; ?>
<table>
	<tr>
		<th>Carte identité</th>
		<th>Nom&Prénom</th>
		<th>Email</th>
		<th>Sexe</th>
		<th>Filière</th>
		<th colspan="2">Actions</th>
	</tr>
	<?php
	if ($count>0)
    {
	while ($rows = mysqli_fetch_assoc($res))
	{ 
	?>   
		<tr>
			<td><?php echo $rows['numcin']; ?></td>	
			<td><?php echo $rows['nom'].' '.$rows['prenom']; ?></td> 			
			<td><?php echo $rows['email']; ?></td> 
			<td><?php echo $rows['sexe']; ?></td> 
			<td><?php echo $rows['codeFiliere']; ?></td> 
			<td>
			<a onclick="return confirm('Etes-vous sûr de vouloir modifier cet étudiant')"
			href="updateEtudiant.php?
			cin=<?php echo $rows['numcin'] ?>
			&nom=<?php echo $rows['nom']?>
			&prenom=<?php echo $rows['prenom']?>
			&email=<?php echo $rows['email']?>
			&sexe=<?php echo $rows['sexe']?>
			&classe=<?php echo $rows['classe']?>">modifier</a>
			</td>
			<td>
			<a onclick="return confirm('Etes-vous sûr de vouloir supprimer cet étudiant')"
			href="deleteEtudiant.php?cin=<?php echo $rows['numcin'] ?>">supprimer</a>
			</td>
		</tr>
    <?php 
	}// fin while
	}//fin if
	else
		echo "<tr><td colspan='7'><h4>Aucun étudiant</h4></td></tr>";
	?> 
</table>
</div>
</body>
</html>
