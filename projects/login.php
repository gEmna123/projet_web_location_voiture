<?php
require_once 'connexion.php';
session_start(); 
$info = "";

if ($_POST) {  
    if (empty(trim($_POST["login"])) || empty(trim($_POST["password"]))) {
        $_SESSION['info'] = "Veuillez remplir tous les champs";
        header("location: index.php");
        exit;
    } 
	else {
        $login = trim($_POST["login"]);
        $password = trim($_POST["password"]);
        
        $query = "SELECT * FROM users WHERE login='$login' AND password=md5('$password')";
        $result = mysqli_query($con, $query);
        $count = mysqli_num_rows($result);

        if ($count == 1) 
		{
			//récupération de l'Utilisateur dans une session
			$row = mysqli_fetch_assoc($result);
            $_SESSION['user'] =$row;
			// Utilisateur trouvé, redirige vers la page de redirection
            header("location: dashbord.php");
			exit;
        } 
		else 
		{
            // Utilisateur non trouvé, affiche un message d'erreur
            $_SESSION['info'] = "User not found";
			header("location: index.php");
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
    <title>Connexion</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="container">
    <form class="login-formE" method="POST">
        <h2>Connexion</h2>
        <label>Login</label>
        <input type="text" id="login" name="login">
        <label>Password</label>
        <input type="password" id="password" name="password"><br>
        <button type="submit">Connexion</button>
        <?php if (!empty($info)) echo "<span>" . $info . "</span>"; ?>
    </form>
</div>
</body>
</html>
