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


  <!-- Jquary link -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<!-- Css link -->
  <link rel="stylesheet" href="style.css" />
    <title>Subject</title>
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
      <h1 class="heading"><a href="subject.php"><i class="fas fa-arrow-left" style="color:rgb(112, 112, 112);font-weight: 100px;font-size: 25px;"></i></a> Add Subject</h1>

      <div class="subject_border">
        <h3 style="color: gray;margin: 10px;font-size: 20px;">Add Subject</h3>
        <hr>
        <form action="addsubjectbackend.php" method="post">
       <div class="select_dropdown">
       <div class="sub_branch">
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
         <div class="sub_semester">
          <label for="Semester">Semester</label>
          <select name="sub_semester">
              <option>1</option>
              <option>2</option>
              <option>3</option>
              <option>4</option>
              <option>5</option>
              <option>6</option>
          </select>
         </div>
         <div class="sub_semester">
          <label for="Semester">Status</label>
          <select name="status">
              <option>Active</option>
              <option>Inactive</option>
             
          </select>
         </div>
       </div>
       <div class="sub_details">
         <div class="sub_detail">
           <label for="sub code" >Subject Code</label><br>
           <input type="text" name="sub_code" id="cap1" onblur="capitalized()">
         </div>
         <div class="sub_detail">
           <label for="sub name">Subject Name</label><br>
           <input type="text" name="sub_name" id="cap2">
         </div>
         <div class="sub_detail">
           <label form="theory">Theory Marks</label><br>
           <input type="number" name="sub_theroy">
         </div>
         <div class="sub_detail">
           <label for="sub practical">Practical Marks</label><br>
           <input type="number" name="sub_practical" >
         </div>
         <div class="sub_detail">
          <label for="sub practical">Internal Marks</label><br>
          <input type="number" name="sub_internal">
         </div>
       </div>
       <div class="button_class">
         <input type="submit" value="Submit" style="background-color: blue;">
         <input type="reset" value="Reset">
       </div>
      </form>
      </div>

      <script>
          function capitalized(){
              var x =document.getElementById('cap1');
              x.value=x.value.toUpperCase();
          }
         
    </script>
</body>
</html>
