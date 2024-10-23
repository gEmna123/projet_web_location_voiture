
<?php
require_once 'securite.php';
require_once 'connection.php';
if (isset($_GET['id'])) {  
    $id = trim($_GET["id"]);
    $query = "delete FROM cars where car_id='$id'";
    $result = mysqli_query($con, $query);
        
    if ($result) {
        $_SESSION['info'] = "Car deleted successfully";
        header("location: cars.php");
        exit;
    } else {
        $_SESSION['info'] = "You can't delete this car because it is related to old booking(s) !! Please delete them before ";
        header("location: cars.php");
        exit;
    }

}
?>

