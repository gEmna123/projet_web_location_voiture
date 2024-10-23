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
$query = "SELECT * FROM filiere 
WHERE codeFiliere LIKE '%$search%' OR libFiliere LIKE '%$search%'";  
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
    <title>Filière</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="principal">
<?php require_once 'menu.php'; ?>
<div class="content">
<div class="top">
	<a href ="addFiliere.php">Nouveau</a>
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
		<th>N°</th>
		<th>Code</th>
		<th>Description</th>
		<th colspan="2">Actions</th>
	</tr>
	<?php
	if ($count>0)
    {
	while ($rows = mysqli_fetch_assoc($res))
	{ 
	?>   
		<tr>
			<td><?php echo $rows['idFiliere']; ?></td>	
			<td><?php echo $rows['codeFiliere']; ?></td> 			
			<td><?php echo $rows['libFiliere']; ?></td> 
			<td>
			<a onclick="return confirm('Etes-vous sûr de vouloir modifier cette filière')"
			href="updateFiliere.php?id=<?php echo $rows['idFiliere'] ?>
			&code=<?php echo $rows['codeFiliere']?>
			&lib=<?php echo $rows['libFiliere']?>">modifier</a>
			</td>
			<td>
			<a onclick="return confirm('Etes-vous sûr de vouloir supprimer cette filière')"
			href="deleteFiliere.php?id=<?php echo $rows['idFiliere'] ?>">supprimer</a>
			</td>
		</tr>
    <?php 
	}// fin while
	}//fin if
	else
		echo "<tr><td colspan='4'><h4>Aucune filière</h4></td></tr>";
	?> 
</table>
</div>
</div>
</body>
</html>
