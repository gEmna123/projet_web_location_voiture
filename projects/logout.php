<?php
// On appelle la session
session_start(); 
// On détruit toutes les sessions
session_destroy();
header('location:index.php');
?>