<?php
require_once 'securite.php';
require_once 'connexion.php';

// Requête 1
$query1 = "SELECT * FROM filiere";
$result1 = mysqli_query($con, $query1);
$count1 = mysqli_num_rows($result1);
// Requête 2
$query2 = "SELECT * FROM student";
$result2 = mysqli_query($con, $query2);
$count2 = mysqli_num_rows($result2);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de bord</title>
	<link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Oswald:wght@700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="principal">
	<?php require_once 'menu.php'; ?>
	<div class="content">
		<div class="row">
			<div class="col"><h2>Filière(s)</h2>
				<h3><?php echo $count1; ?></h3>
			</div>
			<div class="col"><h2>Etudiant(s)</h2>
				<h3><?php echo $count2; ?></h3>
			</div>
		</div>
	</div>
</div>
</body>
</html>
