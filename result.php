<?php
session_start();
if(!isset($_SESSION["email"]))
{
  header("location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
  />
  <link rel="shortcut icon" href="img/weblog.jpg" type="image/x-icon">

  <link rel="stylesheet" href="style.css" />
    <title>Result</title>
</head>
<body>
     <!-- Navigation bar -->
     <nav class="navbar">
        <div class="logo_contaner">
          <a href="#"><img src="img/logo3.png" class="logo" /> </a>
        </div>
        <div class="nav_contaner">
          <ul>
            <li>
              <a href="teacherdashboard.php"><i class="fas fa-home"></i>Dashboard</a>
            </li>
            <li>
                <a href="teacherdashboard.php" ><button id="c_password"><i class="fas fa-key"></i></i>Change Password</button></a>
            </li>
            <li>
                <a href="teacherdashboard.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
              </li>
          </ul>
        </div>
      </nav> 

      <h1 class="heading"><a href="teacherdashboard.php"><i class="fas fa-arrow-left" style="color:black;font-weight: 300px;"></i></a> Result</h1>
      <?php
        include 'connection.php';
        $queary="select session from student GROUP BY session";
        $queary2="select branch from student GROUP BY branch";
        $queary3="select semester from student GROUP BY semester";
        $showdata=mysqli_query($conn,$queary);
        $showdata2=mysqli_query($conn,$queary2);
        $showdata3=mysqli_query($conn,$queary3);

        if(isset($_POST['submit'])){
            $session=$_POST['session'];
            $branch=$_POST['branch'];
            $semester=$_POST['semester'];

        }
        
        ?>
      
      <form method="POST" action="result2.php">
      <div class="table_borde">
        <h3 class="table_heading">Result</h3><hr style="border-top: 2px solid black;">
        <div class="selected_content">
            <div class="session">
                <label for="Session">Session</label>
                <select name="session">
                <?php
                  while($adata=mysqli_fetch_array($showdata)){
                    ?>
                    <option><?php echo $adata['session']; ?> </option>
                    <?php
                  }
                  ?>   
                </select>
            </div>
            <div class="session">
                <label for="Branch" >Branch</label>
                <select name="branch">
                <?php
                  while($adata2=mysqli_fetch_array($showdata2)){
                    ?>
                    <option><?php echo $adata2['branch']; ?> </option>
                    <?php
                  }
                  ?>
                </select>
            </div>
            <div class="session">
                <label for="Semester">Semester</label>
                <select name="semester">
                <?php
                  while($adata3=mysqli_fetch_array($showdata3)){
                    ?>
                    <option><?php echo $adata3['semester']; ?> </option>
                    <?php
                  }
                  ?>
                </select>
            </div>
            <div class="btn_class">
                <button class="add_btn" name="submit" style="margin-left: 5rem;padding: 10px 20px;">Submit</button>
              </div>
            
        </div>  
    </div>
    </form>
    <script src="script2.js"></script> 
      </body>
      </html>
