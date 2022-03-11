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
  <style>
      .Addusers{
        display: flex;
        align-items: center;
        justify-content: center;
        flex-direction: column;
        margin-top: -20px;
      }
     
      .adduser input,select{
          width: 50rem;
          height: 30px;
          margin-bottom: 6px;
          
      }
  </style>
    <title>Edit User</title>
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

      <h1 class="heading"><a href="user.php"><i class="fas fa-arrow-left" style="color:black;font-weight: 300px;"></i></a> Edit User</h1>
      <div class="subject_border">
        <h3 style="color: gray;margin: 10px;font-size: 20px;">Edit User</h3>
        <hr>
        <form action="" method="post">
       <div class="Addusers">
          <?php
            include 'connection.php';
            $id= $_GET['sr'];
            $showquery="select * from user where sr={$id}";
            $showdata=mysqli_query($conn,$showquery);
            $adata=mysqli_fetch_array($showdata);
            if(isset($_POST['update'])){
              $idupdate= $_GET['sr'];
              $username = $_POST['username'];
              $mobile =$_POST['mobile'];
              $email = $_POST['email'];
              $password =$_POST['password'];
              $type = $_POST['type'];

              $query=" update user set sr='$idupdate',name='$username',mobile='$mobile',email='$email',password='$password',type='$type' where sr='$idupdate'";

              $res =mysqli_query($conn,$query);

              if($res){
                ?>
                <script>
                  alert("User Updated Successfully")
                </script>
                <?php
                 header("location:user.php");
              }else{
                ?>
                <script>
                  alert("User Not Updated")
                </script>
                <?php 
              }
            }
          ?>
            <div class="adduser">
                <label for="Name">Name</label><br>
                <input type="text" name="username" value="<?php echo $adata['name']; ?>">
            </div>
            <div class="adduser">
                <label for="Name">Mobile</label><br>
                <input type="number" name="mobile" value="<?php echo $adata['mobile']; ?>">
            </div>
            <div class="adduser">
                <label for="Name">Email</label><br>
                <input type="email" name="email" value="<?php echo $adata['email']; ?>">
            </div>
            <div class="adduser">
                <label for="Name">Password</label><br>
                <input type="password" name="password" value="<?php echo $adata['password']; ?>">
            </div>

         <div class="adduser">
          <label for="Semester">Type</label><br>
          <select  name="type" style="height: 35px;" value="<?php echo $adata['type']; ?>">
              <option>Admin</option>
              <option>Teacher</option>
              <option>Principle</option>
             
          </select>
         </div>
       </div>
       <div class="button_class">
         <input type="submit" value="Update" name="update" style="background-color: blue;">
         <input type="reset" value="Reset">
       </div>
      </form>
      </div>
    </body>
      </html>
