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
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Student</title>

    <style>
     form{
      margin:20px; 
     }
     .btn{
       margin-left:-3px;
       background-color: rgb(13, 217, 217);
       border-color:rgb(13, 217, 217);
     }
    </style>
  
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
      
        <form  method="POST" enctype="multipart/form-data">
         <input type="file" name="import_file" class="form-control" />
         <button class="btn btn-primary mt-3">import</button>  
        </form>
      </div>
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      </body>
     
</html>








