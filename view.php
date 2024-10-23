<?php 
require_once "connection.php";
require_once "securite.php";
$search = ""; 
$info ="";
if(isset($_GET['search'])) {
	$search = $_GET['search'];
}
#$req = "SELECT * FROM rentedcars rc, driver d, customers c, cars WHERE c.customer_username = rc.customer_username 
#AND rc.car_id = cars.car_id AND d.driver_id = rc.driver_id AND car_name LIKE '%$search%'  OR customer_name LIKE '%$search%'";
$req = "SELECT * FROM rentedcars rc, driver d, customers c, cars WHERE c.customer_username = rc.customer_username AND rc.car_id = cars.car_id AND d.driver_id = rc.driver_id";

// Requête SQL avec la clause WHERE pour la recherche
 
$result1 = mysqli_query($con, $req);
mysqli_query($con, "SET NAMES 'utf8'");

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


    <title>View</title>



</head>
<body>
<?php include "menu.php"?>

<section class="book">

<h1 class="t">View</h1>
<?php if (!empty($info)) echo '<span class="msg">' . $info . "</span>"; ?>
<?php  
#$req = "SELECT * FROM cars; ";
#$result1 = mysqli_query($con,$req);

if (mysqli_num_rows($result1) > 0) {
?>
<div class='tab' style="width:90%;">
<table>
<tr class="champ">
<th >Rent ID</th>
    <th >Car</th>
  <th >Customer Name</th>
  <th >Driver</th>
  <th >Rent Start Date</th>
  <th >Rent End Date</th>
  <th >Booking Date</th>
  <th >Total Amount</th>
<th colspan="2">Action</th>
</tr>
<?php
while($row = mysqli_fetch_assoc($result1)) {
?>

<tr>
<td><?php echo $row["id"]; ?></td>    
<td><?php echo $row["car_name"]; ?></td>
<td><?php echo $row["customer_name"]; ?></td>
<td><?php echo $row["driver_name"]; ?></td>
<td><?php echo $row["rent_start_date"] ?></td>
<td><?php echo $row["rent_end_date"]; ?></td>
<td><?php echo $row["booking_date"]; ?></td>
<td><?php echo $row["total_amount"]; ?> DT</td>
<td align="center"><a onclick="return confirm('Are you sure you want to delete this BOOKING ?')" href="deleteAdmView.php?id=<?php echo($row["id"]); ?>"><img class="action"src="img/supp.png" alt=""></a></td>
                        

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