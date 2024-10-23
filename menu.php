<nav class="nav"  >
        <a href="#" class="nav__logo"><i class="bi bi-car-front-fill"></i>
            GoMyCar</a>
        <div class="nav-links" id="nav-links">
            <ul class="nav__list">
                <li class="nav__item">
                    <a href="index.php #home" class="nav__link">home</a>
                </li>
                <li class="nav__item">
                    <a href="index.php #about" class="nav__link">about us</a>
                </li> 
                <li class="nav__item">
                    <a href="index.php #start" class="nav__link">get started</a>
                </li>
                <li class="nav__item">
                    <a href="index.php #pop" class="nav__link">popular</a>
                </li>

               
                <li class="nav__item">
                    <a href="index.php #cars" class="nav__link">Cars</a>
                </li>
                <?php  if(isset($_SESSION['user'])){ $nom=$_SESSION['user']['customer_name']; ?>
                <div class="btnuuserdown">
                    <li>
                    <a class="HV" href="userhome.php"><?php echo $nom; ?>  ▾</a>
                    <ul class="dropdown">
                        <li><a href="userbooking.php">My bookings</a></li>
                        <li><a href="return.php">Return now</a></li>
                        <li><a href="#">Settings</a></li>
                    </ul>
                </li>
                </div>
                <?php }?>
                <?php  if(isset($_SESSION['admin'])){ $nom=$_SESSION['admin']['employee_name']; ?>
                <div class="btnuuserdown">
                    <li>
                    <a class="HV" href="adminhome.php"><?php echo $nom; ?>  ▾</a>
                    <ul class="dropdown">
                        <li><a href="cars.php">Cars</a></li>
                        <li><a href="admdriver.php">Drivers</a></li>
                        <li><a href="view.php">View</a></li>
                    </ul>
                </li>
                </div>
                <?php }?>

          

            </ul>
            
           


        </div>
      
        <?php  if(isset($_SESSION['user']) ||isset($_SESSION['admin']) ){  ?>
            <div class="btn">
            <div class="loginbtn" >
            <a href="logout.php"><i class="bi bi-arrow-right-circle"></i></a>
            </div >
            <div class="menubtn" id="menu">
              <hr class="one">
              <hr class="two">
              <hr class="three">
            </div>
            <?php } else {?>


           <div class="btn">
            <div class="loginbtn" >
                <a href="login.php "><i class="bi bi-person"></i></a>
            </div >
            <div class="menubtn" id="menu">
              <hr class="one">
              <hr class="two">
              <hr class="three">
            </div>
            <?php }?>

        </div>
        </nav>
