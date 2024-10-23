<?php 
require_once "securite.php";
require_once "connection.php";



if($_POST){
    extract($_POST);

   
$req2 = "insert into driver values('', '$driver_name', '$dl_number', 
 '$driver_phone',
'$driver_address', 
'$driver_gender', 
 '$driver_availability');";
 echo $req2;
$result = mysqli_query($con, $req2);

if ($result) {
    $_SESSION['info'] = "Driver added successfully";
    header("location: admdriver.php");
    exit;
} 
else 
{
    $_SESSION['info'] = "Add failed";


}
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>add driver</title>
   <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/icone.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<?php include "menu.php"?>

<body>

<div class="container">
    <form class="login-form ADD" method="POST">
        <h2  >Add Driver</h2>
        <label for="driver_name" required>Name </label>
<input type="text" id="driver_name" name="driver_name" placeholder="Name" required>
<label for="dl_number">Dl Number </label>
<input type="text" id="dl_number" name="dl_number" placeholder="DL Number" required>
<label for="driver_phone">Phone </label>
<input type="text" id="driver_phone" name="driver_phone" placeholder="Driver Phone" required>
<label for="driver_address">Address</label>
<input type="text" id="driver_address" name="driver_address" placeholder="Driver Address">
<label for="driver_gender">Gender</label>
<input type="radio" value="Male" name="driver_gender" >Male
        <input type="radio" value="Female" name="driver_gender" >Female
		<label>Availability</label>
        <input type="radio" value="yes" name="driver_availability" >YES
        <input type="radio" value="no" name="driver_availability" >NO
        <div class="btns"><button type="submit">ADD</button>
        <a href="cars.php" >back</a></div>
        <?php if (!empty($info)) echo "<span>" . $info . "</span>"; ?>

    </form>
</div>
</div>
</body>

</html>