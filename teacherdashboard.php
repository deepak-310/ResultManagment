<?php
session_start();
if(!isset($_SESSION["email"]))
{
  header("location:index.php");
  unset($_SESSION['email']);
}
if(isset($_SESSION['status'])){
?>
<script>
alert("<?php echo $_SESSION["name"]?> login successful")
</script>
<?php
unset($_SESSION['status']);
}
if(isset($_SESSION['status4'])){
  ?>
  <script>
  alert("<?php echo $_SESSION['status4']?> ")
  </script>
  <?php
  unset($_SESSION['status4']);
  }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
  />
    <link rel="stylesheet" href="style.css" />
    <link rel="shortcut icon" href="img/weblog.jpg" type="image/x-icon">

    <title>Teacher Dashboard</title>
</head>
<body>
     <!-- Navigation bar -->
     <nav class="navbar">
        <div class="logo_contaner">
          <a href="home.html"><img src="img/logo3.png" class="logo" /> </a>
        </div>
        <div class="nav_contaner">
          <ul>
            <li>
              <a href="#"><i class="fas fa-home"></i>Dashboard</a>
            </li>
            <li>
              <a href="#login" ><button id="c_password"><i class="fas fa-key"></i></i>Change Password</button></a>
            </li>
            <li>
                <a href="logout.php" onclick="return checklogout()"><i class="fas fa-sign-out-alt"></i>Logout</a>
            </li>
            <li>
              <a href="#"><i class="fas fa-user"></i> <?php echo $_SESSION["name"]?></a>
            </li>
          </ul>
        </div>
      </nav>
<!-- Heading  -->
      <h1 class="heading"> Dashboard</h1>

<!-- Dashboard options -->
<div class="dashboard_contaner">
<div class="dashboard">
    <h3>Marks Entry</h3>
    <div class="option">
        <a href="marksentry1.php"> <p>More info <i class="fas fa-arrow-circle-right"></i></p></a>
    </div>
</div>
<div class="dashboard" style="background-color: #1D9344;">
    <h3>Result</h3>
    <div class="option" style="background-color: #16843B;">
        <a href="result.php"> <p>More info <i class="fas fa-arrow-circle-right"></i></p></a>
    </div>
</div>
<div class="dashboard" style="background-color: rgba(233, 69, 68, 1);">
    <h3>Print Marks</h3>
    <div class="option" style="background-color: rgba(211, 63, 59, 1);">
        <a href="printmarks.php"> <p>More info <i class="fas fa-arrow-circle-right"></i></p></a>
    </div>
</div>
</div>
<!-- change password form -->
<?php
include 'connection.php';
$email=$_SESSION["email"];
if(isset($_POST['change'])){
    $oldpass=$_POST['oldpass'];
    $newpass=$_POST['newpass'];
    $confirmpass=$_POST['confirmpass'];
    if($newpass==$confirmpass){
      $selectquery ="select * from user where email='$email'";
      $query= mysqli_query($conn,$selectquery);
      $nums=mysqli_num_rows($query);
      $res =mysqli_fetch_array($query);
      if($oldpass==$res['password']){
        if($oldpass==$newpass){
          ?>
        <script>
        alert("Old password and new password are same")
        </script>
        <?php
        }
        else{
          $query2="update user set password='$newpass' where email='$email'";
          $res2 =mysqli_query($conn,$query2);
          if($res){
            ?>
            <script>
              alert(" password change Successfully")
            </script>
            <?php
          }else{
            ?>
            <script>
              alert("Not Updated")
            </script>
            <?php 
          }
        }
      }
      else{
        ?>
        <script>
        alert("Old password is not maching")
        </script>
        <?php
      }

      

    }
    else{
      ?>
      <script>
      alert("Please Write new and confirm password same")
      </script>
      <?php
    }
}


?>
<div class="change_password">
  <form method="post">
  <div class="change_password_containt">
    <h1 class="heading">Change Password</h1>
    <label>Old Password</label><br>
    <input type="password" name="oldpass" placeholder="Type Old Password" required><br>
    <label>New Password</label><br>
    <input type="password" name="newpass" placeholder="Type Password" required><br>
    <label>Confirm Password</label><br>
    <input type="text" name="confirmpass" placeholder="Confirm Password" required><br>
    <div class="dailog_btn">
      <button type="submit" name="change" class="delete_btn" style="background-color: turquoise;">CHANGE</button>
      <button class="cancel_btn" id="changepasswordCancel">Cancel</button>
    </div>
  </div>
</form>
</div>  
<script src="script2.js"></script>   
<script>
  function checklogout(){
    return confirm("Are you sure you want to logout?")
  }
</script> 
</body>
</html>