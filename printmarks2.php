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
    <title>Print Marks</title>
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
                <a href="#login"><i class="fas fa-sign-out-alt"></i>Logout</a>
              </li>
          </ul>
        </div>
      </nav>

      <h1 class="heading"><a href="marksentry1.php"><i class="fas fa-arrow-left" style="color:black;font-weight: 300px;"></i></a>Print Marks</h1>

      <div class="table_borde">
        <h3 class="table_heading"><i class="fas fa-keyboard"></i>Print Marks</h3><hr style="border-top: 2px solid black;">
        <!-- =================PHP Code============================= -->
        <?php
             include 'connection.php';
            $branch_name=$_POST['branch'];
            $semester_no=$_POST['semester'];
            $queary="select sub_name from subjects where branch='{$branch_name}' and semester={$semester_no}";
            $showdata=mysqli_query($conn,$queary);

            if(isset($_POST['submit'])){
              $session=$_POST['session'];
              $branch=$_POST['branch'];
              $semester=$_POST['semester'];       
            }
            ?>

            <!-- ==========================form code================================= -->
        <form action="printmarks3.php" method="post" >
        <div class="selected_content">
            <div class="session">
                <label for="Session">Session</label><br>
                <input type="text" name="session" value="<?php echo $_POST['session']; ?>" readonly>
            </div>
            <div class="session">
                <label for="Branch">Branch</label><br>
                <input type="text" name="branch" value="<?php echo $_POST['branch']; ?>" readonly>
            </div>
            <div class="session">
                <label for="Semester">Semester</label><br>
                <input type="text" name="semester" value="<?php echo $_POST['semester']; ?>" readonly>
            </div>
            <div class="session">
                <label for="Semester">Subjects</label>
                <select style="width: 200px;" name="subject">
                <?php
                  while($adata=mysqli_fetch_array($showdata)){
                    ?>
                    <option><?php echo $adata['sub_name']; ?> </option>
                    <?php
                  }
                  ?> 
                </select>
            </div>
            <div class="session">
                <label for="Semester">For</label>
                <select name="for">
                    <option>Internal</option>
                    <option>Practical</option>
                    <option>Theory</option>
                </select>
            </div>  
            
        </div>
        <div class="btn_class">
           <input type="submit" class="add_btn" style="padding: 10px 20px;" name="submit">
        </div> 
        
        </form>
    </div>
  
    <script src="script2.js"></script> 
      </body>
      </html>
