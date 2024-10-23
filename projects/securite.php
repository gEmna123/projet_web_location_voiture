<?php
    session_start();
    if(!isset($_SESSION['user'])) {
		$_SESSION['info'] = "Accès non autorisé";
        header('location:index.php');
        exit();
    }
?>
