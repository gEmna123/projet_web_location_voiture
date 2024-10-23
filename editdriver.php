<?php 
require_once "securite.php";
require_once "connection.php";
if($_GET) {
    extract($_GET);
    }
$req = "SELECT * FROM driver where driver_id='$id' ";
$result1 = mysqli_query($con,$req);
while($row = mysqli_fetch_assoc($result1)) {
   
    $namedriver=$row["driver_name"] ;
    $drivernumber=$row["dl_number"]; 
       
     $driverphone=$row["driver_phone"];
     $driveraddress=$row["driver_address"] ;
        
     $drivergender=$row["driver_gender"];
     $av=$row["driver_availability"]; 
}


if($_POST){
    extract($_POST);

   
$req2 = "UPDATE driver SET driver_name = '$driver_name', 
dl_number = '$dl_number', 
driver_phone = '$driver_phone', 
driver_address = '$driver_address', 
driver_gender = '$driver_gender', 
driver_availability = '$driver_availability' 
WHERE driver_id = '$id'";
echo $req2;
$result = mysqli_query($con, $req2);

if ($result) {
    $_SESSION['info'] = "Driver edited successfully";
    header("location: admdriver.php");
    exit;
} 
else 
{
    $_SESSION['info'] = "Editing failed";
    header("location: admdriver.php");
    exit;
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit driver</title>
   <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/icone.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<?php include "menu.php"?>

<body>

<div class="container">
    <form class="login-form" method="POST">
        <h2>Edite Driver</h2>
        <label>Name </label>
        <input type="text" value="<?php echo $namedriver?>" name="driver_name">
        <label>Number </label>
        <input type="number" value="<?php echo $drivernumber?>" name="dl_number">
		<label>Phone</label>
        <input type="number" value="<?php echo $driverphone?>" name="driver_phone">
		<label>Addressr</label>
        <input type="text" value="<?php echo $driveraddress?>" name="driver_address">
        <label>Gender</label>
        <input type="text" value="<?php echo $drivergender?>" name="driver_gender">
		<label>Availability</label>
        <input type="radio" <?php if($av == 'yes') echo "checked"; ?> name="driver_availability" value="yes">YES
        <input type="radio" <?php if($av == 'no') echo "checked"; ?> name="driver_availability" value="no">NO
        <div class="btns"><button type="submit">Edit</button>
        <a href="admdriver.php" >back</a></div>
        <?php if (!empty($info)) echo "<span>" . $info . "</span>"; ?>

    </form>
</div>
</div>
</body>

</html>