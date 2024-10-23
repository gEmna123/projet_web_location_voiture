<?php 
require_once "securite.php";
require_once "connection.php";
if($_GET) {
    extract($_GET);
    }
$req = "SELECT * FROM cars where car_id='$id' ";
$result1 = mysqli_query($con,$req);
while($row = mysqli_fetch_assoc($result1)) {
   
    $namecar=$row["car_name"] ;
    $plate=$row["car_nameplate"]; 
    
    
     $price=$row["priceDay"];
     $src=$row['car_img'] ;
    
    
     $nbplace=$row["nbplace"];
     $fule=$row["fule"]; 
     $av=$row["car_availability"]; 
}


if($_POST){
    extract($_POST);

   
$req2 = "UPDATE cars SET car_name = '$car_name', 
car_nameplate = '$car_nameplate', 
priceDay = '$priceDay', 
nbplace = '$nbplace', 
fule = '$fule', 
car_availability = '$car_availability' 
WHERE car_id = '$id'";
$result = mysqli_query($con, $req2);

if ($result) {
    $_SESSION['info'] = "Car edited successfully";
    header("location: cars.php");
    exit;
} 
else 
{
    $_SESSION['info'] = "Editing failed";
    header("location: cars.php");
    exit;
}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
   <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/icone.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<?php include "menu.php"?>

<body>

<div class="container">
    <form class="login-form" method="POST">
        <h2>Edite car</h2>
        <img class="im" src="<?php echo $src ?>">
        <label>Name </label>
        <input type="text" value="<?php echo $namecar?>" name="car_name">
        <label>plate </label>
        <input type="text" value="<?php echo $namecar?>" name="car_nameplate">
		<label>Price/Day</label>
        <input type="number" value="<?php echo $price?>" name="priceDay">
		<label>place's number</label>
        <input type="number" value="<?php echo $nbplace?>" name="nbplace">
        <label>Fule</label>
        <input type="text" value="<?php echo $fule?>" name="fule">
		<label>Availability</label>
        <input type="radio" <?php if($av == 'yes') echo "checked"; ?> name="car_availability" value="yes">YES
        <input type="radio" <?php if($av == 'no') echo "checked"; ?> name="car_availability" value="no">NO
        <div class="btns"><button type="submit">Edit</button>
        <a href="cars.php" >back</a></div>
        <?php if (!empty($info)) echo "<span>" . $info . "</span>"; ?>

    </form>
</div>
</div>
</body>

</html>