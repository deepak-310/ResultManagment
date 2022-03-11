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
<style>
    .session input{
        width: 15rem;
    }
</style>
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

      <h1 class="heading"><a href="result.php"><i class="fas fa-arrow-left" style="color:black;font-weight: 300px;"></i></a> Result</h1>

      <div class="table_borde">
        <h3 class="table_heading">Result</h3><hr style="border-top: 2px solid black;">
        <div class="selected_content">
            <div class="session">
                <label for="Session">Session</label><br>
                <input type="text" value="<?php echo $_POST['session']; ?>" readonly>
            </div>
            <div class="session">
                <label for="Branch">Branch</label><br>
                <input type="text" value="<?php echo $_POST['branch']; ?>" readonly>
            </div>
            <div class="session">
                <label for="Semester">Semester</label><br>
                <input type="text" value="<?php echo $_POST['semester']; ?>" readonly>
            </div>
            <div class="btn_class">
                <a href="marksentry2.php"><button class="add_btn" style="margin-left: 5rem;padding: 10px 20px;margin-top: 1rem;">Submit</button></a>               
            </div>         
        </div>
        <div class="table_content" id="marks_table">
            <table class="Marks_entry_table">
              <tr>
                <th>Sr.</th>
                <th>Roll No</th>
                <th>Addmission No.</th>
                <th>Name</th>
                <th>Branch</th>
                <th>Semester</th>
                <th>Current Status</th>
                <th>Session</th>
                <th>Status</th>
                <th>Action</th>
              </tr>
              <tr>
                <?php
                include 'connection.php';
                $session=$_POST['session'];
                $sem=$_POST['semester'];
                $branch=$_POST['branch'];
                $selectquery ="select * from student where session='$session' and semester='$sem' and branch='$branch';";
                $query= mysqli_query($conn,$selectquery);
                $nums=mysqli_num_rows($query);
                $i=1;
                while($res =mysqli_fetch_array($query))
                {

                ?>
                <td><?php echo $i;$i++; ?></td>
              <td><?php echo $res['roll_no']; ?></td>
              <td><?php echo $res['addmission_no']; ?></td>
              <td><?php echo $res['name']; ?></td>
              <td><?php echo $res['branch']; ?></td>
              <td><?php echo $res['semester']; ?></td>
              <td><?php echo $res['current_status']; ?></td>
              <td><?php echo $res['session']; ?></td>
              <td><?php echo $res['status']; ?></td>
                <td>
                  <a href="resultpdf.php?sr=<?php echo $res['sr'];?>" target="_blank" data-toggle="tooltip" data-placement="bootom" title="RESULT "><button class="edit_btn" style="background-color: rgb(17, 180, 180);"><i class="fas fa-file"></i></button></a>
                 <a href="marks.php?sr=<?php echo $res['sr'];?>"> <button type="submit" class="delet_btn" style="background-color: blue;">Marks</button></a>
                </td>
              </tr>
              <?php } ?>
            </table>
        </div>

    </div>
    <script src="script2.js"></script> 
      </body>
      </html>
