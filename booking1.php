<?php 
//require_once "securite.php";
require_once "connection.php";
session_start();
$ref=$_GET["id"];

if($_POST){
   extract($_POST);
    
    $datestart = $_POST["datestart"];
    $dateend = $_POST["dateend"];
    if($datestart>$dateend){
        $_SESSION["info"] = "Invalid date(s)";
        header("location:booking.php");
        exit;
    }


    $query = "SELECT * FROM rentedcars WHERE car_id = '$ref'";
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $datestartB = $row["rent_start_date"];
        $dateendB = $row["car_return_date"];
        
        if (!($dateend < $datestartB && $datestart > $dateendB)) {
            $_SESSION["info"] = "Car not available in this period";
            header("location:booking.php");
            exit;
        }
    }
    }
    




    $driver = $_POST["driver"];
    if ($driver!=0){
    $query="SELECT * FROM rentedcars where driver_id=$driver ";

    #$query="SELECT * FROM rentedcars WHERE driver_id = '2' AND $dateend> rent_start_date and $datestart < rent_end_date;";
    $result = mysqli_query($con,$query);
    if(mysqli_num_rows($result) > 0){
        
        while ($row = mysqli_fetch_assoc($result)) {
        $datestartB = $row["rent_start_date"];
        $dateendB = $row["car_return_date"];
        
        if (!($dateend <= $datestartB || $datestart >= $dateendB)) {
            $_SESSION["info"] = "Driver not available in this period";
            header("location:booking.php");
            exit;
        }
    }
    

    }
      }

        

        /*if($driver_id != ''){
                
            $query="update driver set driver_availability='no' where driver_id=$driver";
            mysqli_query($con,$query);
        }*/

        $customer_username= $_SESSION["user"]["customer_username"];
        #$id=$_POST["id"];
        $query = "Select * from cars where car_id='$ref'";
        $result = mysqli_query($con,$query);
        $count=mysqli_num_rows($result);
        $row=mysqli_fetch_assoc($result);
        $price = $row["priceDay"];
        
        $timestamp1 = strtotime($datestart);
        $timestamp2 = strtotime($dateend);

        $diff = $timestamp2 - $timestamp1;

        $days = floor($diff / (60 * 60 * 24));
        $tot_price= $days*$price;
        $date = date("Y-m-d H:i:s");




        $query1="INSERT INTO rentedcars (customer_username, car_id, driver_id, booking_date, rent_start_date, 
                rent_end_date, no_of_days, total_amount, return_status) VALUES
                ('$customer_username','$ref','$driver','$date','$datestart','$dateend',$days,'$tot_price','NR')"or die(mysql_error());
        mysqli_query($con,$query1);
        $_SESSION["info"] ="Mrigel";

        }
        

    

    
    
    
    
    


 


$info="";
if(isset($_SESSION["info"])){
    $info=$_SESSION["info"];
    
}
unset($_SESSION["info"]);
?>
<html>
    
  
<head>
    <title> Rent your car </title>
    <link rel="stylesheet" href="css/styleb.css">   
</head>
<body >
<div class="wrapper">
<form method ="post" class="login-form">    
    <h1>Pass your reservation</h1>
    
        
      
        
        
<div class="custom_select">
    <select name="driver">
    <option class="options" value="0">Without Driver</option>
    <?php
    $sql = "SELECT * FROM driver";
    $result = mysqli_query($con,$sql);
   $count = mysqli_num_rows($result);
    if ($count > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            
            echo '<option class="options" value="'.$row["driver_id"].'">'.$row["driver_name"].'</option>';
        
        }
    } else {
        echo "Aucun conducteur trouvé";
    }
    
    ?>
   </select>
   </div>
        
       
    
                 
        
            
         
            
            
            
            
                  <div class="input-box">
          
        <label for="start">Start date:</label>
        <input type="date" id="start" name="datestart"  required></div>
        
            
            
         <div class="input-box">
          
        <label for="End">End date:</label>
<input type="date" id="start" name="dateend" required></div>
        
        
      <label class="check">
         <span class="checkmark"></span>
         <input type="checkbox">Agreed to terms and conditions
         
      </label>
 
            
      <div class="input-box">
        <button type="submit" class="btn">Register</button>
        <span><?php echo"$info"    ?></span>

      </div>
         
</form>   
    </div>
    </div>

    
    
    
   
    
    
    
    
    
    
    
    
    
    
    

    </body>
    
</html> 