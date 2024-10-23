<?php 
require_once "connection.php";
require_once "securite.php";
$search = ""; 
$info ="";
if(isset($_GET['search'])) {
	$search = $_GET['search'];
}

// Requête SQL avec la clause WHERE pour la recherche
$req = "SELECT * FROM cars 
WHERE car_name LIKE '%$search%' OR fule LIKE '%$search%' OR car_nameplate LIKE '%$search%'" ;  
$result1 = mysqli_query($con, $req);
mysqli_query($con, "SET NAMES 'utf8'");
$count = mysqli_num_rows($result1);
if (isset($_SESSION['info'])) {
    $info = $_SESSION['info'];
    unset($_SESSION['info']); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!--fav icon-->
    
   <link rel="shortcut icon" href="img/icone.png" type="image/x-icon">
	<!--font-->
   <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Oswald:wght@700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap.min.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">


    <title>Cars</title>



</head>
<body>
<?php include "menu.php"?>

<section class="book">
<div class="rech">
	<a href ="addCar.php"><i class="bi bi-plus-square"></i>
ADD</a>
	<div class="search">
	<form method="GET">
        <input type="text" name="search" placeholder="Searsh">
        <button type="submit">Search</button>
    </form>
	</div>

</div>
<h1 class="t">Cars</h1>
<?php if (!empty($info)) echo '<span class="msg">' . $info . "</span>"; ?>
<?php  
#$req = "SELECT * FROM cars; ";
#$result1 = mysqli_query($con,$req);

if (mysqli_num_rows($result1) > 0) {
?>
<div class='tab'>
<table>
<tr class="champ">
<th>ID</th>
<th>Car name</th>
<th>plate</th>
<th>price/Day</th>
<th>nbplace</th>
<th>fule</th>
<th>availability</th>
<th colspan="2">Action</th>
</tr>
<?php
while($row = mysqli_fetch_assoc($result1)) {
?>
<tr>
<td><?php echo $row["car_id"]; ?></td>
<td><?php echo $row["car_name"] ?></td>
<td><?php echo $row["car_nameplate"]; ?></td>


<td><?php echo $row["priceDay"]; ?> Dt</td>


<td> <?php echo $row["nbplace"]; ?> </td>
<td> <?php echo $row["fule"]; ?> </td>
<td> <?php echo $row["car_availability"]; ?> </td>
<td align="center"><a onclick="return confirm('Are you sure you want to edit this car ?')" href="edit.php?id=<?php echo ($row["car_id"]);?>"><img class="action" src="img/modif.png" alt=""></a></td>
<td align="center"><a onclick="return confirm('Are you sure you want to delete this car ?')" href="delete.php?id=<?php echo($row["car_id"]); ?>"><img class="action"src="img/supp.png" alt=""></a></td>
                        

</tr>
<?php        } ?>
    </table></div>
     
<?php } else {
?>
<div>
<h1 >You haven't any car</h1>
<p>  </p>
</div>

<?php
} ?>
</section>

</body>
</html>