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
  <link rel="stylesheet" href="style.css" />
  <link rel="shortcut icon" href="img/weblog.jpg" type="image/x-icon">
    <title>Add Student</title>
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
              <a href="admindashboard.php"><i class="fas fa-home"></i>Dashboard</a>
            </li>
            <li>
              <a href="admindashboard.php" ><i class="fas fa-key"></i></i>Change Password</a>
            </li>
            <li>
                <a href="admindashboard.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
              </li>
          </ul>
        </div>
      </nav>

      <h1 class="heading"><a href="student.php"><i class="fas fa-arrow-left" style="color:black;font-weight: 300px;"></i></a> Add Student</h1>
      <div class="table_borde">
        <h3 class="table_heading"> Add Student</h3><hr style="border-top: 2px solid black;">
        <form method="post" action="addstudentbackend.php">
        <div class="Studadd">
            <div class="student_detail">
                <label for="sub code">Addmission No.</label>
                <input type="text" name="addmissionno" id="cap1" onblur="capitalized()">
            </div>
            <div class="student_detail">
                <label for="sub code">Name</label>
                <input type="text" name="name">
            </div>
            <div class="student_detail" style="margin-top: 15px;">
                <label for="Branch">Branch</label>   
                <select name="sub_branch">
          <?php
          include 'connection.php';
          $queary="select name from branch";
          $showdata=mysqli_query($conn,$queary);
          while($data=mysqli_fetch_array($showdata)){
          ?>
                    <option><?php echo $data['name']; ?> </option>
                    <?php
                  }
                  ?> 
          </select>
            </div>       
        </div>
        <div class="Studadd">
            <div class="student_detail" style="margin-top: 15px;">
                <label for="Semester">Semester</label>
                <select name="semester">
                    <option>1</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                    <option>6</option>
                </select>
            </div>
            <div class="student_detail">
                <label for="sub code">Roll No</label>
                <input type="text" name="rollno">
            </div>
            <div class="student_detail">
                <label for="sub code">Father Name</label>
                <input type="text" name="fathername">
            </div>       
        </div>
        <div class="Studadd">
            <div class="student_detail" style="margin-top: 15px;">
                <label for="Semester">Current Status</label>
          <select name="currentstatus">
              <option>Regular</option>
              <option>Defaulter</option>
             
          </select>
            </div>
            <div class="student_detail" style="margin-top: 15px;">
                <label for="Semester">Session</label>
                <select name="session">
                    <option>2020-2021</option>
                    <option>2021-2022</option>
                   
                </select>
            </div>
            <div class="student_detail" style="margin-top: 15px;">
                <label for="Semester">Status</label>
                <select name="status">
                    <option>Active</option>
                    <option>Inactive</option>
                   
                </select>
            </div>       
        </div>
        <div class="button_class">
            <input type="submit" value="Submit" style="background-color: blue;">
            <input type="reset" value="Reset">
          </div>
          </form>
      </div>
      </body>
      <script>
          function capitalized(){
              var x =document.getElementById('cap1');
              x.value=x.value.toUpperCase();
          }
    </script>
      </html>









