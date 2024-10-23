<?php 
require_once"securite.php";
require_once"connection.php";
$sql1 = "SELECT * FROM rentedcars rc, driver d, customers c, cars WHERE c.customer_username = rc.customer_username AND rc.car_id = cars.car_id AND d.driver_id = rc.driver_id";
$result1 =mysqli_query($con,$sql1);
$nb=mysqli_num_rows($result1);
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
    <title>Booking</title>


</head>
<body>
 
    <?php include "menu.php"?>
    
<section class="bookings">

        <h1 class="text-center">Bookings</h1>
       
  
    <?php 
    if ($nb > 0) {
?>
    <div style="padding-left: 100px; padding-right: 100px;" >
<table>
  
  <tr>
    <th>Rent ID</th>
    <th>Car</th>
  <th >Customer Name</th>
  <th >Driver</th>
  <th >Rent Start Date</th>
  <th >Rent End Date</th>
  <th >Booking Date</th>
  <th>Total Amount</th>
  <th  class="th-action" >Action</th>
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
<td align="center">
  <a class="action" onclick = "return confirm('Would you like to delete this allocation?')" href="deleteAdmView.php?id=<?php echo $row['id']?>">
    <img src="img/delete.png" alt="">
  </a>
</td>
</tr>
<?php        } ?>
       </table>
       </div> 
        <?php } 
        else {?>
    <div class="container">
      <div class="jumbotron">
        <h1>No booked cars</h1>
        <p> Rent some cars now <?php echo $con->error; ?> </p>
      </div>
    </div>

    <?php } ?> 
    </section>    

