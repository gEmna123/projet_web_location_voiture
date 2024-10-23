<?php 
require_once "connection.php";
require_once "securite.php";
$nom=$_SESSION['user']['customer_name'];

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


    <title>my booking</title>

</head>
<body>
    <!--<nav class="nav"  >
        <a href="#" class="nav__logo"><i class="bi bi-car-front-fill"></i>
            GoMyCar</a>
        <div class="nav-links" id="nav-links">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="index.php" class="nav__link">home</a>
                </li>
                <li class="nav__item">
                    <a href="#about" class="nav__link">about us</a>
                </li> 
                <li class="nav__item">
                    <a href="#start" class="nav__link">get started</a>
                </li>
                <li class="nav__item">
                    <a href="#pop" class="nav__link">popular</a>
                </li>

               
                <li class="nav__item">
                    <a href="#cars" class="nav__link">Cars</a>
                </li>
                <li>
                    <a class="HV" href="#"></a>
                    <ul class="dropdown">
                        <li><a href="#">My bookings</a></li>
                        <li><a href="#">Return now</a></li>
                        <li><a href="#">Settings</a></li>
                    </ul>
                </li>
          

            </ul>
           


        </div>
      
      
        <div class="btn">
            <div class="loginbtn" >
                <i class="bi bi-arrow-right-circle"></i>
            </div >
            <div class="menubtn" id="menu">
              <hr class="one">
              <hr class="two">
              <hr class="three">
            </div>
        </div>
        </nav>-->
        <?php include "menu.php"?>

        <section class="book">
<?php $login_customer = $_SESSION['user']['customer_username']; 
$req = "SELECT * FROM rentedcars rc, cars c
WHERE rc.customer_username='$login_customer' AND c.car_id=rc.car_id AND rc.return_status='R'";
$result1 = mysqli_query($con,$req);

if (mysqli_num_rows($result1) > 0) {
?>
    <h1>Your Bookings</h1>
    <p > Hope you enjoyed our service </p>
<div class='tab'>
<table>
<tr class="champ">
<th>Car</th>
<th>Start Date</th>
<th>End Date</th>
<th>Number of Days</th>
<th>Total Amount</th>
</tr>
<?php
    while($row = mysqli_fetch_assoc($result1)) {
?>
<tr>
<td><?php echo $row["car_name"]; ?></td>
<td><?php echo $row["rent_start_date"] ?></td>
<td><?php echo $row["rent_end_date"]; ?></td>


<td><?php echo $row["no_of_days"]; ?> </td>


<td> <?php echo $row["total_amount"]; ?> Dt</td>
</tr>
<?php        } ?>
            </table></div>
             
    <?php } else {
        ?>
    <div>
    <h1 >You have not rented any cars till now!</h1>
    <p> Please rent cars in order to view your data here. </p>
  </div>

        <?php
    } ?>
  </section>

</body>
</html>