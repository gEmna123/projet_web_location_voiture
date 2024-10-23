<?php
require_once 'securite.php';
require_once 'connexion.php';
$info="";
// Vérifiez les champs de l'url
if($_GET) {
extract($_GET);
// Vérifiez les champs du formulaire
if ($_POST) {
extract($_POST);
      $_SESSION['info']  = "Veuillez remplir tous les champs.";
else
{
    $query = "UPDATE filiere SET codeFiliere = '$code', libFiliere = '$lib' WHERE idFiliere = '$id'";
    $result = mysqli_query($con, $query);
    if ($result) {
    $_SESSION['info'] = "Filière mise à jour avec succès";
    header("location: filiere.php");
    exit;
    } 
    else 
    {
    $_SESSION['info'] = "Mise à jour échouée";
    header("location: filiere.php");
    exit;
    }
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
    <title>Mise à jour des filières</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="principal">
<?php require_once 'menu.php'; ?>
<div class="content">
    <form class="login-form" method="POST">
        <h2>Mise à jour de la filière</h2>
        <label>Code filière</label>
        <input type="text" value="<?php echo $code?>" name="code">
        <label>Nom filière</label>
        <input type="text" value="<?php echo $lib?>" name="lib">
        <button type="submit">Mettre à jour</button>
        <?php if (!empty($info)) echo "<span>" . $info . "</span>"; ?>
    </form>
</div>
</div>
</body>
</html>
