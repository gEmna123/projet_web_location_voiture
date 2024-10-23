<?php

include_once "connection.php";
session_start();
if($_POST){
    extract($_POST);
    if(empty(trim($username))||empty(trim($name)||empty(trim($phone))||empty($email)||empty(trim($adresse))||empty(trim($Rpassword))|| empty(trim($password)))){
        $_SESSION["info"] = "Blank Fields";
        header("location:Sign-up.php");
        exit;
    }else{
        $phone = $_POST["phone"];
        $query="select * from customers where customer_phone='$phone'";
        $result = mysqli_query($con,$query);
        $count = mysqli_num_rows($result);
        if($count != 0){
            $_SESSION["info"] ="Phone already exists";
            header("location:Sign-up.php");
            exit;
        }
        $email = $_POST["email"];
        $query="select * from customers where customer_email='$email'";
        $result = mysqli_query($con,$query);
        $count = mysqli_num_rows($result);
        if($count != 0){
            $_SESSION["info"] ="email already exists";
            header("location:Sign-up.php");
            exit;
        }

        $password = $_POST["password"];
        $Rpassword = $_POST["Rpassword"];
        if($password != $Rpassword){
            $_SESSION["info"] ="Check the password entry";
            header("location:Sign-up.php");
            exit;
        }

        $query = "INSERT INTO `customers` (`customer_username`, `customer_name`, `customer_phone`, `customer_email`, `customer_address`, `customer_password`) VALUES

('$username', '$name', '$phone', '$email', '$adresse', '$password')";
        mysqli_query($con,$query);
        header("userhome.php");
        echo("Bienvenue dans notre page");
        exit;


    }
}
$info="";
if(isset($_SESSION["info"])){
    $info = $_SESSION["info"];
}

unset($_SESSION["info"]);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="css/style.css">

    <link rel="shortcut icon" href="img/icone.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body class="bodyLOGIN sign">

    <div class="wrapperL">
        <form method ="post" class="login-form">
            <h1>Sign up</h1>
            <div class="input-box">
                <input type="texte" placeholder="Username" required name="username">
                <i class="bi bi-person-fill"></i>
            </div>
             <div class="input-box">
                <input type="texte" placeholder="Name" required name="name">
                <i class="bi bi-person-fill"></i>
            </div>

             <div class="input-box">
                <input type="tel" placeholder="Phone" pattern="[0-9]*" required name="phone">
                <i class="bi bi-telephone-fill"></i>
            </div>

            <div class="input-box">
                <input type="email" placeholder="Email" required name="email">
                <i class="bi bi-envelope-at-fill"></i>
            </div>
            <div class="input-box">
                <input type="text" placeholder="Adress" required name="adresse">
                <i class="bi bi-house-door"></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Password" required name="password">
                <i class="bi bi-lock-fill"></i>
            </div>
            <div class="input-box">
                <input type="password" placeholder="Repeat your password" required name="Rpassword">
                <i class="bi bi-lock-fill"></i>
            </div>

            
            <button type="submit" class="btnL">Submit</button>


            <span> <?php echo"$info"     ?> </span>
        </form>
    </div>
</body>
</html>