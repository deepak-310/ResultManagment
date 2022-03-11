
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
    <title>Add Branch</title>
</head>
<body>
     <!-- Navigation bar -->
     <nav class="navbar">
        <div class="logo_contaner">
          <a href="admindashboard.php"><img src="img/logo3.png" class="logo" /> </a>
        </div>
        <div class="nav_contaner">
          <ul>
            <li>
              <a href="admindashboard.php"><i class="fas fa-home"></i>Dashboard</a>
            </li>
            <li>
              <a href="admindashboard.php" ><button id="c_password"><i class="fas fa-key"></i></i>Change Password</button></a>
            </li>
            <li>
                <a href="admindashboard.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
              </li>
          </ul>
        </div>
      </nav> 
        <!-- add button -->
        <h1 class="heading"><a href="branch.php"><i class="fas fa-arrow-left" style="color:black;font-weight:300px;font-size:30px;  color: rgb(68, 66, 66);margin-right:10px"></i></a>Add Branch</h1>
        <div class="addbranch" style="display: flex;align-items: center;justify-content: center;" >
        <div class="border">
        <h3 style="color: gray;margin: 10px;font-size: 20px;">Add Branch</h3> <hr>
        <form action="addbranchbackend.php" method="post">
          <div class="add_branch_contaner" style="box-shadow:none; ">
            <div class="adduser">
                <label for="Name"> Branch Name</label><br>
                <input type="text" name="branchname" id="cap1" onblur="capitalized()">
            </div>
            <div class="adduser">
              <label>Semester</label><br>
              <input type="number" name="semester"><br>
          </div>
          <div class="adduser">
            <label>Status</label><br>
            <select style="width: 100%;height: 35px; padding: 5px;" name="status">
              <option selected>Active</option>
              <option>Inactive</option>
            </select>
          </div>
            <!-- <div class="dailog_btn"> -->
            <div class="button_class">
         <input type="submit" value="Add Branch" style="background-color: blue;">
         <input type="reset" value="Reset">
       </div>
            <!-- </div> -->
          </div>
</form>
        </div>
        </div>
      

</body>
<script>
          function capitalized(){
              var x =document.getElementById('cap1');
              x.value=x.value.toUpperCase();
          }
    </script>
</html>