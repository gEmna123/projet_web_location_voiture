<?php
require_once "securite.php";
require_once "connection.php";
// Récupérer toutes les informations de réservation à partir des paramètres de l'URL
$booking_id = $_GET['booking_id'];
$customer_username = $_GET['customer_username'];
$driver = $_GET['driver'];
$datestart = $_GET['datestart'];
$dateend = $_GET['dateend'];
$tot_price = $_GET['tot_price'];
if ($driver!=0){
$sql = "SELECT driver_name FROM driver where driver_id='$driver'";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);

$driver= $row['driver_name'];}
else{$driver="None";}
// Afficher les informations de réservation dans la facture
?>

<html>
<head>
    <title>Facture</title>
    <link rel="stylesheet" href="css/style.css">   
</head>
<body >
    <div class="fact">
        <h1>Rent Confirmed</h1>
        <div class="invoice-details">
            <p>Customer: <?php echo $customer_username; ?></p>
            <p>Driver ID: <?php echo $driver; ?></p>
            <p>Start Date: <?php echo $datestart; ?></p>
            <p>End Date: <?php echo $dateend; ?></p>
        </div>
        <div class="invoice-total">
            <p>Total Amount: <?php echo $tot_price; ?></p>
        </div>
        <button class="back"> <a href="index.php">back</a></button>

    </div>
</body>
</html>
