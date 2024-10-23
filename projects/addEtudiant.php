<?php
require_once 'securite.php';
require_once 'connexion.php';
//Requête SQL pour récupérer les filieres
$query = "SELECT * FROM filiere";  
$res = mysqli_query($con, $query);
mysqli_query($con, "SET NAMES 'utf8'");
//message d'information 
$info = "";
//récupérer les variables du formulaire
if ($_POST) 
{
	 if(empty(trim($_POST["numcarte"]))||
		empty(trim($_POST["nom"]))||
		empty(trim($_POST["prenom"]))||
		empty(trim($_POST["email"]))) {
		$_SESSION['info'] = "Veuillez remplir tous les champs";
		header("location: addEtudiant.php");
		exit;
	} 
	else 
	{
		$numcarte = trim($_POST["numcarte"]);
		$nom = trim($_POST["nom"]);
		$prenom = trim($_POST["prenom"]);
		$email = trim($_POST["email"]);
		$sexe = trim($_POST["sexe"]);
		$classe = trim($_POST["classe"]);
		// Requête pour insérer la nouvelle filière dans la base de données
		$query = "INSERT INTO student VALUES ('$numcarte','$nom','$prenom','$email','$sexe','$classe')";
		$result = mysqli_query($con, $query);
		if ($result) 
		{
			$_SESSION['info'] = "Nouvau étudiant ajouté avec succès";
			header("location: etudiant.php");
			exit;
		} 
		else 
		{
			$_SESSION['info'] = "Error deleting record: " . mysqli_error($con);
			header("location: addEtudiant.php");
			exit;
		}
	}
}
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
    <title>Nouveau étudiant</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="principal">
<?php require_once 'menu.php'; ?>
<div class="content">
    <form class="login-form" method="POST">
        <h2>Nouvelle fiche étudiant</h2>
        <label>Carte d'identité</label>
        <input type="text" placeholder="Carte d'identité" name="numcarte">
        <label>Nom</label>
        <input type="text" placeholder="Nom" name="nom">
		<label>Prénom</label>
        <input type="text" placeholder="Prénom" name="prenom">
		<label>Email</label>
        <input type="email" placeholder="Email" name="email">
		<label>Sexe</label>
        <input type="radio" checked name="sexe" value="H">H
		<input type="radio" name="sexe" value="F">F
		<label>Classe</label>
        <select name="classe">
		<?php
		while ($rows = mysqli_fetch_assoc($res)){
		?>
		<option value="<?php echo $rows['idFiliere']?>"><?php echo $rows['codeFiliere']?></option>
		<?php
		}
		?>
		</select>
        <button type="submit">Enregistrer</button>
        <?php if (!empty($info)) echo "<span>" . $info . "</span>"; ?>
    </form>
</div>
</div>
</body>
</html>
