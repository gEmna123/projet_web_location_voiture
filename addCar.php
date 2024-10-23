<?php 
require_once "securite.php";
require_once "connection.php";



if($_POST){
    extract($_POST);

   
$req2 = "insert into cars values('', '$car_name', '$car_nameplate', 
 '$car_img',
$priceDay, 
$nbplace, 
 '$fule', 
 '$car_availability' )
;";
echo $req2;
$result = mysqli_query($con, $req2);

if ($result) {
    $_SESSION['info'] = "Car added successfully";
    header("location: cars.php");
    exit;
} 
else 
{
    $_SESSION['info'] = "Add failed";
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
    <title>add car</title>
   <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/icone.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<?php include "menu.php"?>

<body>

<div class="container">
    <form class="login-form ADD" method="POST">
        <h2  >Add car</h2>
        <label for="car_name">Name </label>
<input type="text" id="car_name" name="car_name" placeholder="Name">
<label for="car_nameplate">Plate </label>
<input type="text" id="car_nameplate" name="car_nameplate" placeholder="Plate">
<label for="car_img">Image Source </label>
<input type="text" id="car_img" name="car_img" placeholder="Image URL">
<label for="priceDay">Price/Day</label>
<input type="number" id="priceDay" name="priceDay" placeholder="Price per day">
<label for="nbplace">Place's number</label>
<input type="number" id="nbplace" name="nbplace" placeholder="Number of places">
<label for="fule">Fuel</label>
<input type="text" id="fule" name="fule" placeholder="Fuel type">

		<label>Availability</label>
        <input type="radio" value="yes" name="car_availability" >YES
        <input type="radio" value="no" name="car_availability" >NO
        <div class="btns"><button type="submit">Add</button>
        <a href="cars.php" >back</a></div>
        <?php if (!empty($info)) echo "<span>" . $info . "</span>"; ?>

    </form>
</div>
</div>
</body>

</html>