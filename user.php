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
    <title>User</title>
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
              <a href="admindashboard.php" ><i class="fas fa-key"></i></i>Change Password</a>
            </li>
            <li>
                <a href="admindashboard.php"><i class="fas fa-sign-out-alt"></i>Logout</a>
              </li>
          </ul>
        </div>
      </nav>

      <h1 class="heading"> User</h1>
      <div class="table_borde">
        <h3 class="table_heading"> User</h3><hr style="border-top: 2px solid black;">
        <div class="btn_class">
          <a href="adduser.php"><button class="add_btn" id="AddBtn"> <i class="fas fa-user-plus" style="margin-right: 5px;"></i>Add User</button></a>
        
      </div>
      <div class="table_content" id="marks_table">
        <table class="Marks_entry_table">
          <tr>
            <th>Sr.</th>
            <th>Name</th>
            <th>Mobile No</th>
            <th>Email</th>
            <th>Type</th>
            <th>Action</th>
          </tr>
          <?php

            include 'connection.php';
            $selectquery ="select * from user";
            $query= mysqli_query($conn,$selectquery);
            $nums=mysqli_num_rows($query);
            while($res =mysqli_fetch_array($query))
            {
            ?>
            <tr>
            <td><?php echo $res['sr']; ?></td>
            <td><?php echo $res['name']; ?></td>
            <td><?php echo $res['mobile']; ?></td>
            <td><?php echo $res['email']; ?></td>
            <td><?php echo $res['type']; ?></td>
            <td>
            <a href="edituser.php?sr=<?php echo $res['sr']; ?>" data-toggle="tooltip" data-placement="bootom" title="UPDATE"><button class="edit_btn"><i class="fas fa-edit"></i></button></a>
            <a href="userdelete.php?sr=<?php echo $res['sr']; ?>" data-toggle="tooltip" data-placement="bootom" title="DELETE"><button class="delet_btn"><i class="fas fa-trash-alt"></i></button></a>
            </td>
          </tr>

           <?php } ?>
            
        </table>
    </div>
      </div>
      <!-- delete branch from -->
      <div class="delete_dialog" id="delete_dialog">
        <div class="delete_content">
        <h2>Confirm</h2>
        <p>Are you sure do you rally want to delete this record</p>
        <div class="dailog_btn">
        <button class="delete_btn">Delete</button>
        <button class="cancel_btn" id="delete_close">Cancel</button>
      </div>
      </div>
      </div>
<script>
$(document).ready(function(){
  $('[data-toggle="tooltip"]').tooltip();
});
</script>
</body>
</html>

