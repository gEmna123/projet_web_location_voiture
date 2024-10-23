
<?php 
require_once "connection.php";
require_once "securite.php";

$nom = $_SESSION['user']['customer_username']; 

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


    <title>customer home</title>

</head>
<body>
   
       

     
 
 <?php include "menu.php"?>
<section class="homeuser" >
 <h1 class="section__titleU">Welcome <?php echo $nom; ?> </h1>
 <div class="board"> 
     <img src="img/dashm.png" >
      <?php
      $login_customer = $_SESSION['user']['customer_username']; 
      $req = "SELECT * FROM rentedcars rc, cars c
      WHERE rc.customer_username='$login_customer' AND c.car_id=rc.car_id AND rc.return_status='R'";
      
      
      $result1 = mysqli_query($con,$req);
      $count2=mysqli_num_rows($result1);

      
      $req= "SELECT *  FROM rentedcars rc WHERE rc.customer_username='$login_customer' AND return_status='NR' and rent_start_date <= CURDATE();";
      $result = mysqli_query($con, $req);
      $count = mysqli_num_rows($result);
      ?>
 <a href="return.php"><div class="txL"><p class="nombre" > <?php echo $count ;?></p><p>To return</p></div></a>
 <a href="userbooking.php"><div class="txR"><P class="nombre" ><?php echo $count2 ;?></p><p>Bookings</p></div></a>
</div>

 
 </section>

           
            
          




   
    </body>
    </html>