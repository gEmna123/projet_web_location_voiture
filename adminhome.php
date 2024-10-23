<?php 
require_once "connection.php";
require_once "securite.php";
$nom = $_SESSION['admin']['employee_username']; 

?><!DOCTYPE html>
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


    <title>Home</title>

</head>
<body>
 
    <?php include "menu.php"?>
   <section class="homeuser" >
    <h1 class="section__titleU">Welcome <?php echo $nom; ?></h1>
    <div class="board"> 
        <img src="img/dashm.png" >
        <?php
      $req = "SELECT * FROM cars; ";
      $result1 = mysqli_query($con,$req);
      $count2=mysqli_num_rows($result1);

      $req2= "SELECT *  FROM driver WHERE driver_id<>'0';";
      $result = mysqli_query($con, $req2);
      $count = mysqli_num_rows($result);
      ?>
         
    <a href="cars.php"><div class="txL"><p class="nombre" ><?php echo $count2 ;?></p><p>cars</p></div></a>
    <a href="admdriver.php"><div class="txR"><P class="nombre" ><?php echo $count ;?></p><p>Drivers</p></div></a>
</div>
   
    
    </section>
</body>
</html>