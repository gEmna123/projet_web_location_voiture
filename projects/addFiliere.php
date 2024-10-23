<?php
require_once 'securite.php';
require_once 'connexion.php';

$info = "";

if ($_POST) {  
    if (empty(trim($_POST["code"])) || empty(trim($_POST["lib"]))) {
        $_SESSION['info'] = "Veuillez remplir tous les champs";
        header("location: addFiliere.php");
        exit;
    } 
	else {
        $code = trim($_POST["code"]);
        $lib = trim($_POST["lib"]);
        // Requête pour insérer la nouvelle filière dans la base de données
        $query = "INSERT INTO filiere (codeFiliere, libFiliere) VALUES ('$code', '$lib')";
        $result = mysqli_query($con, $query);
        
        if ($result) {
            $_SESSION['info'] = "Nouvelle filière ajoutée avec succès";
            header("location: filiere.php");
            exit;
        } else {
            $_SESSION['info'] = "Erreur lors de l'ajout de la filière";
            header("location: addFiliere.php");
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
    <title>Nouvelle filière</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="principal">
<?php require_once 'menu.php'; ?>
<div class="content">
    <form class="login-form" method="POST">
        <h2>Nouvelle filière</h2>
        <label>Code filière</label>
        <input type="text" placeholder="Code filière" name="code">
        <label>Nom filière</label>
        <input type="text" placeholder="Nom filière" name="lib">
        <button type="submit">Enregistrer</button>
        <?php if (!empty($info)) echo "<span>" . $info . "</span>"; ?>
    </form>
</div>
</div>
</body>
</html>
