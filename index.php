<?php
session_start();
if(isset($_SESSION['status3'])){
    ?>
    <script>
    alert("<?php echo $_SESSION["status3"]?>")
    </script>
    <?php
    unset($_SESSION['status3']);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
    />
    <link rel="shortcut icon" href="img/weblog.jpg" type="image/x-icon">
    <title>Home</title>

    <style>
    .color{
    color: rgb(13, 217, 217);
        } 
    
    </style>
</head>
<body>
    <div class="navigation">
        <div>
            <img src="img/logo3.png" class="logo">
        </div>
        <div class="nav_contaner">
            <ul>
              <li>
                <a href="#" class="link home_link"><i class="fas fa-home"></i> Home</a>
              </li>
              <li>
                <a href="#" class="link login_link"><i class="fas fa-sign-in-alt"></i> Login</a>
              </li>
            </ul>
          </div>
    </div>
    <div class="main_body">
    <div class="main"> 
        <div class="text">
            <h1>WELCOME TO PCACS</h1>
            <p>
              We are permanently affiliated to the University of Mumbai and recognized by U.G.C.
              under 2(f) and 12(B).<br> The college is ISO 9001:2015 certified and
              is accredited by NAAC with the prestigious ‘A’ Grade in all the three cycles of accreditation.
            </p>
            <a href="https://pcacs.ac.in/" target="_blank" class="Visti">Visti us to know More</a>
        </div>
    </div>
    <div class="login hidden">
        <div class="left">
            <div class="head">
                <img src="img/logo3.png" class="logo log-logo">
                <button id="teach" class="btn btn_teacher color">Teacher</button>
                <button id="admin" class="btn btn_admin ">Admin</button>
            </div>
            <div class="details">
                <h2 style="font-size: 30px;font-family: Roboto;">Sign In</h2>
                <p class="sign-desc">Sign in to continue to our application</p>
                <form action="login.php" method="post">
                    <input type="text" name="email" placeholder=" Your@email.com " required><i class="fas fa-envelope"></i>
                    <br><input type="password" name="password" placeholder=" Password " required><i class="fas fa-lock"></i>
                    <br><input type="submit" class="submit" value="SIGN IN" >                
                </form>
            </div>
        </div>
        <div class="right">
            <img src="img/login.PNG" class="img_3">
        </div>
    </div>
</div>
<div class="overlay hidden"></div>
<script src="script.js"></script>

</body>
</html>