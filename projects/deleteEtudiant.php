<?php
require_once 'securite.php';
require_once 'connexion.php';
if (isset($_GET['cin'])) {  
    $cin = trim($_GET["cin"]);
    $query = "DELETE FROM student WHERE numcin = '$cin'";
    $result = mysqli_query($con, $query);
    $_SESSION['info'] = "Etudiant supprimé avec succès";
    header("location: etudiant.php");
    exit;
}
?>
