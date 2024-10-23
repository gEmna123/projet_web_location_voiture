<?php 

require_once "connection.php";
session_start();

$search = ""; 
$info ="";
if(isset($_GET['search'])) {
	$search = $_GET['search'];
   ## header("location:index.php #cars");
}
// Requête SQL avec la clause WHERE pour la recherche
$req = "SELECT * FROM cars 
WHERE car_name LIKE '%$search%' OR fule LIKE '%$search%' OR car_nameplate LIKE '%$search%'" ;  
$result1 = mysqli_query($con, $req);
mysqli_query($con, "SET NAMES 'utf8'");
$count = mysqli_num_rows($result1);
if (isset($_SESSION['info'])) {
    $info = $_SESSION['info'];
    unset($_SESSION['info']); }




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
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>GoMyCar</title>

</head>
<body>
    <!--<nav class="nav">
        <a href="#" class="nav__logo"><i class="bi bi-car-front-fill"></i>
            GoMyCar</a>
        <div class="nav-links" id="nav-links">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="#home" class="nav__link">home</a>
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

            </ul>
           


        </div>
      
      
        <div class="btn">
            <div class="loginbtn" >
                <a href="login.php "><i class="bi bi-person"></i></a>
            </div >
            <div class="menubtn" id="menu">
              <hr class="one">
              <hr class="two">
              <hr class="three">
            </div>
           
            
          </div>


    </nav>-->
    <?php include "menu.php"?>


<header class="header" id="header">
    <div class="vid" id="home">
        <video autoplay="autoplay" muted="" loop="infinite" src="img/audi voiture edit2.mp4"></video></div> 
        <div class="content"><?php if (!empty($info)) echo '<span class="msg">' . $info . "</span>"; ?>
 <h1>Drive the best cars in town</h1>
            
        <h2 class="go">GoMyCar</h2>
        <div class="down"><a href="#cars"><i class="bi bi-chevron-double-down"></i></a></div>
        </div>   
</header>
<section class="about" id="about">
    <div class="about-img">
        <img src="img/ABOUT2.png" alt="">
        <div class="box"><p>At Go MY Car, we offer  comfortable driver services</p></div>
    </div>
    <div class="about-text">
        <h1>Welcome to Go MY Car : </h1>
        <h2>Delivering Excellence in Car Rentals</h2>
        <p>MY Car is a company dedicated to providing an exceptional car rental experience. Our mission is to offer our customers a diverse range of high-quality vehicles, coupled with top-notch customer service.</p>
    </div>
</section>



<section class="pop" id="pop">
<h1 class="section__title"> The most popular ranted cars</h1>
<P class="soustitre">You can find all you want...</P>
<div class="listG">

<?php   
            $sql1 = "SELECT c.*
            FROM (
                SELECT car_id, COUNT(*) AS total_rentals
                FROM rentedcars
                GROUP BY car_id
                ORDER BY total_rentals DESC
                LIMIT 5
            ) AS top_rented
            JOIN cars c ON top_rented.car_id = c.car_id;";
            $result = mysqli_query($con,$sql1);

            if(mysqli_num_rows($result) > 0) {
                while($row1 = mysqli_fetch_assoc($result)){
                    $car_id = $row1["car_id"];
                    $car_name = $row1["car_name"];
                    $price = $row1["priceDay"];
                    $nb = $row1["nbplace"];
                    $fule = $row1["fule"];
                    $car_img = $row1["car_img"];
               
                    ?>
        <div class="item" >
            <div class="carname"> <?php echo $car_name; ?></div>
            <img src="<?php echo $car_img; ?>" alt="voiture">
            <div class="info">
                <span><i class="bi bi-person"></i>  <?php echo $nb; ?>palces</span>
                <span><i class="bi bi-ev-station">  <?php echo $fule; ?></i></span>
                <span style=" width: 100%;        margin-bottom: 0.5rem;
"><i class="bi bi-coin"></i> <?php echo $price; ?> DT / Day</span></div>
                <?php  if(isset($_SESSION['user'])){?>
                <a href="booking.php?id=<?php echo($car_id) ?>"><div class="rent">RENT</div></a>
                <?php }else{?>
                    <a href="login.php?id=<?php echo($car_id) ?>"><div class="rent">RENT</div></a>
                    <?php }?>
                  </div> <?php 
                 }?>

                <?php 
                 }?>
    </div>

    
  
                </section >

<section class="carsSection" id="cars">
    <h1 class="chose"> Chose your car</h1>
    <div class="rech" style="    justify-content: right;">
	<div class="search" >
	<form method="GET">
        <input type="text" name="search" placeholder="Searsh">
        <button type="submit" >Search</button>
    </form>
	</div>
    </div>
    <div class="listCARS">

    <?php   
    


            if(mysqli_num_rows($result1) > 0) {
                while($row1 = mysqli_fetch_assoc($result1)){
                    $car_id = $row1["car_id"];
                    $car_name = $row1["car_name"];
                    $price = $row1["priceDay"];
                    $nb = $row1["nbplace"];
                    $fule = $row1["fule"];
                    $car_img = $row1["car_img"];
               
                    ?>
        <div class="itemCars" >
            <div class="carname"> <?php echo $car_name; ?></div>
            <img src="<?php echo $car_img; ?>" alt="voiture">
            <div class="info">
                <span><i class="bi bi-person"></i>  <?php echo $nb; ?>palces</span>
                <span><i class="bi bi-ev-station">  <?php echo $fule; ?></i></span>
                <span style=" width: 100%;        margin-bottom: 0.5rem;
"><i class="bi bi-coin"></i> <?php echo $price; ?> DT / Day</span></div>
                <?php  if(isset($_SESSION['user'])){?>
               <a href="booking.php?id=<?php echo($car_id) ?>"> <div class="rent">RENT</div></a>
                <?php }else{?>
                    <a href="login.php?id=<?php echo($car_id) ?>"><div class="rent">RENT</div></a>
                    <?php }?>
                  </div> <?php 
                 }?>

                <?php 
                 }?>
    </div>

    
  
                </section >



<script src="script.js"></script>
</body>

</html>
