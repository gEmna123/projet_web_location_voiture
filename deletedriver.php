<?php
require_once 'securite.php';
require_once 'connection.php';
if (isset($_GET['id'])) {  
    $id = trim($_GET["id"]);
    $query = "delete FROM driver where driver_id='$id'";
    $result = mysqli_query($con, $query);
        
    if ($result) {
        $_SESSION['info'] = "Driver deleted successfully";
        header("location: admdriver.php");
        exit;
    } else {
        $_SESSION['info'] = "You can't delete this driver because it is related to old booking(s) !! Please delete them before ";
        header("location: admdriver.php");
        exit;
    }

}
?>
