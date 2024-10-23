<?php
require_once("connection.php");
session_start();
if($_POST){
    extract($_POST);
    if(empty(trim($login)) || empty(trim($password)))
    {
        $_SESSION["info"]  = "Champs vide(s)";
        header("location:login.php");
        exit;
    }
    else{
        $login = trim($_POST["login"]);
        $password = trim($_POST["password"]);
        $query = "select * from customers where customer_username = '$login' and customer_password='$password' ;";
        $result = mysqli_query($con,$query);
        $count = mysqli_num_rows($result);
        if($count == 1){
            header("location:userhome.php");
            $row = mysqli_fetch_assoc($result);
            $_SESSION["user"] = $row;
            exit;
        }
        else{
            $query = "select * from employee where employee_username = '$login' and employee_password='$password'";
            $result = mysqli_query($con,$query);
            $count = mysqli_num_rows($result);
            if($count == 1){
            header("location:adminhome.php");
            $row = mysqli_fetch_assoc($result);
            $_SESSION["admin"] = $row;
            exit;}
        
            else{
            $_SESSION["info"]  = "Login/password invalid";
            header("location:login.php");
            exit;
            }
        }

    }
}

$info ="";
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
    <title>Login</title>
   <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="img/icone.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

</head>
<body class='bodyLOGIN'>
 
    <div class="wrapperL">
        <form method ="post" >
            <h1>Login</h1>
            <div class="input-box">
                <input type="texte" placeholder="Username" required name="login">
                <i class="bi bi-person-fill"></i>
            </div>


            <div class="input-box">
                <input type="password" placeholder="Password" required name="password">
                <i class="bi bi-lock-fill"></i>
            </div>


            <button type="submit" class="btnL">Login</button>

            <div class="register-link">
                <p>Don't have an account?<a href="Sign-up.php">Register</a></p>
            </div>
            <span> <?php echo"$info"     ?> </span>
        </form>
    </div>
</body>
</html>