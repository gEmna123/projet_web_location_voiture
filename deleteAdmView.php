<?php
require_once "connection.php";
require_once "securite.php";
//récupérer la valiabe : cin
if($_GET)
{
extract($_GET);
$req = "delete from rentedcars where id = '$id'";
$res =mysqli_query($con, $req);
if($res)
{
    $_SESSION['info'] = "Rent deleted succcesfuly";
    header("location:view.php");
    exit;
}
else
{
    $_SESSION['info'] = "Failed !!";
    header("location:view.php");
    exit;
}
}
?>