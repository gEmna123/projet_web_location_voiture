<?php
require_once 'securite.php';
require_once 'connection.php';
if (isset($_GET['id'])) {  
    $id = trim($_GET["id"]);
    $query = "Update rentedcars set return_status='R', car_return_date=NOW() where id ='$id'";
    $result = mysqli_query($con, $query);
    $_SESSION['info'] = "Car returned succesfully";
    header("location: return.php");
    exit;
}else{
  $_SESSION['info'] = "return Failed";
  header("location: return.php");
  exit;


}
?>