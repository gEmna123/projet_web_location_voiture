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


    <title>return</title>

</head>
<body>
<?php include "menu.php"?>

        <?php $login_customer = $_SESSION['user']['customer_username']; 

    $req = "SELECT c.car_name, rc.rent_start_date, rc.rent_end_date, rc.id FROM rentedcars rc, cars c WHERE rc.customer_username='$login_customer' AND c.car_id=rc.car_id AND rc.return_status='NR'AND rc.rent_start_date <= CURDATE(); ";
    $result1 = mysqli_query($con,$req);?>
    <section class="book">


   <?php if (mysqli_num_rows($result1) > 0) {
?>
        <h1 class="text-center">Return your cars here</h1>
        <p class="text-center"> Hope you enjoyed our service </p>
        
        <?php if (!empty($info)) echo '<span class="msg">' . $info . "</span>"; ?>

    <div class="tab"  >
<table >
<tr>
<th >Car</th>
<th >Rent Start Date</th>
<th >Rent End Date</th>
<th >Action</th>
</tr>
<?php
        while($row = mysqli_fetch_assoc($result1)) {
?>
<tr>
<td><?php echo $row["car_name"]; ?></td>
<td><?php echo $row["rent_start_date"] ?></td>
<td><?php echo $row["rent_end_date"]; ?></td>
<td class="bouton" >
    <div class="btn-return">
        <a href="retourner.php?id=<?php echo $row["id"];?>">Return</a>
    </div>
</td>

</tr>
<?php        } ?>
                </table>
                </div> 
        <?php } else { ?>
      <div >
        <h1 >No cars to return.</h1>
        <p > Hope you enjoyed our service </p>
      </div>
    

            <?php
        } ?>   
</section>
</body>
</html>