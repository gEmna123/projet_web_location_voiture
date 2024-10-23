<?php
require_once 'securite.php';
require_once 'connexion.php';
if (isset($_GET['id'])) {  
    $id = trim($_GET["id"]);
    $query = "DELETE FROM filiere WHERE idFiliere = '$id'";
    $result = mysqli_query($con, $query);
        
    if ($result) {
        $_SESSION['info'] = "Filière supprimée avec succès";
        header("location: filiere.php");
        exit;
    } else {
        $_SESSION['info'] = "Cette filière contient des étudinats";
        header("location: filiere.php");
        exit;
    }

}
?>
