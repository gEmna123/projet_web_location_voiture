<?php 
require_once "securite.php";
require_once "connection.php";
if(isset($_GET["id"])){
$ref=$_GET["id"];

if($_POST){
   extract($_POST);
    
    $datestart = $_POST["datestart"];
    $dateend = $_POST["dateend"];
    if($datestart>$dateend || strtotime($datestart) < strtotime(date('Y-m-d'))){
        $_SESSION["info"] = "Invalid date(s)";
        header("location:booking.php?id=$ref");
        exit();
    }


    $query = "SELECT * FROM rentedcars WHERE car_id = '$ref'";
    echo $query;
    $result = mysqli_query($con, $query);

    if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $datestartB = $row["rent_start_date"];
        $dateendB = $row["car_return_date"];
        echo $datestartB ."    ".
        $dateendB ;
        if (($dateend>=$datestartB && $datestart<=$datestartB)    || ($datestart>=$datestartB && $dateend<=$dateendB)     ||   ($datestart<=$dateendB && $dateend>= $dateendB)){
            $_SESSION["info"] = "Car not available in this period";
            header("location:booking.php?id=$ref");
            exit();
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
        
        if (($dateend>=$datestartB && $datestart<=$datestartB)    || ($datestart>=$datestartB && $dateend<=$dateendB)     ||   ($datestart<=$dateendB && $dateend>= $dateendB)){
            $_SESSION["info"] = "Driver not available in this period";
            header("location:booking.php?id=$ref");
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
        echo $query1;
        header("Location: facture.php?booking_id=$booking_id&customer_username=$customer_username&driver=$driver&datestart=$datestart&dateend=$dateend&tot_price=$tot_price");
        exit();}
        
        

    

    
    
    
    
    


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
    <link rel="stylesheet" href="css/style.css"> 
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&family=Oswald:wght@700&display=swap" rel="stylesheet">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">  
</head>
<body class="bodyLOGIN" >
<div class="wrapperL">
<form method ="post" >    
    <h1>Pass your reservation</h1>
    
        
      
        
        
<div class="input-box">

    <select name="driver">
    <option class="options" value="0">Without Driver</option>
    <?php
    $sql = "SELECT * FROM driver where driver_id<>'0'";
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
        
       
    
                 
        
            
         
            
            
            
   <label for="start">Start date:</label>   
            <div class="input-box">
          
       
        <input type="date" id="start" name="datestart"  required></div>
        
            
        <label for="End">End date:</label>

         <div class="input-box">
          
<input type="date" id="start" name="dateend" required></div>
        
        

 
            
      <div class="input-box" >
        <button type="submit" class="btnL">Register</button>


      </div>
      <span><?php echo"$info"?>    </span>

         
</form>   
    </div>
    </div>

    
    
    
   
    
    
    
    
    
    
    
    
    
    
    

    </body>
    
</html> 