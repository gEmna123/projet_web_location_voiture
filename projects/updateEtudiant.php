<?php
require_once 'securite.php';
require_once 'connexion.php';
$info="";
// Vérifiez les champs de l'url
if($_GET) {
extract($_GET);
if ($_POST) {
// Vérifiez les champs du formulaire
extract($_POST);
if(empty($nom) || empty($prenom) || empty($email) || empty($sexe) || empty($classe)) 
    $_SESSION['info']  = "Veuillez remplir tous les champs.";
else
{
    $query = "UPDATE student SET 
    nom = '$nom', prenom = '$prenom', email = '$email', sexe = '$sexe', classe = '$classe' 
    WHERE numcin = '$cin'";
    $result = mysqli_query($con, $query);
    if ($result) {
        $_SESSION['info'] = "Etudiant mit à jour avec succès";
        header("location: etudiant.php");
        exit;
    } 
    else 
    {
        $_SESSION['info'] = "Mise à jour échouée";
        header("location: etudiant.php");
        exit;
    }
}
}
}
// Sélectionnez toutes les classes pour charger le select
$sql = "SELECT * FROM filiere";
$res = mysqli_query($con, $sql);
// Récupérer les erreurs apres le button
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
    <title>Mise à jour des étudints</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="principal">
<?php require_once 'menu.php'; ?>
<div class="content">
    <form class="login-form" method="POST">
        <h2>Mise à jour de l'étudiant</h2>
        <input type="hidden" value="<?php echo $cin?>" name="numcarte">
        <label>Nom</label>
        <input type="text" value="<?php echo $nom?>" name="nom">
		<label>Prénom</label>
        <input type="text" value="<?php echo $prenom?>" name="prenom">
		<label>Email</label>
        <input type="email" value="<?php echo $email?>" name="email">
		<label>Sexe</label>
        <input type="radio" <?php if($sexe == 'H') echo "checked"; ?> name="sexe" value="H">H
        <input type="radio" <?php if($sexe == 'F') echo "checked"; ?> name="sexe" value="F">F
		<label>Classe</label>
        <select name="classe">
        <?php 
        while ($row = mysqli_fetch_assoc($res)) {
        ?>
        <option value="<?php echo $row['idFiliere']; ?>" 
        <?php if($row['idFiliere'] == $classe) echo "selected"; ?>>
            <?php echo $row['codeFiliere']; ?>
        </option>
        <?php } ?>
        </select>
        <button type="submit">Mettre à jour</button>
        <?php if (!empty($info)) echo "<span>" . $info . "</span>"; ?>
    </form>
</div>
</div>
</body>
</html>
