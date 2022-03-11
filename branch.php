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
    <title>Branch</title>
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
      <h1 class="heading"> Branch</h1>

      <div class="table_borde">
        <h3 class="table_heading"><i class="fas fa-code-branch" style="margin-right: 5px;"></i> Branch</h3><hr style="border-top: 2px solid black;">
        
        <div class="btn_class">
        <a href="addbranch.php"><button class="add_btn" id="AddBtn">+ Add Branch</button><a>
      </div>
      <div class="table_content" id="marks_table">
        <table class="Marks_entry_table">
          <tr>
            <th>Sr.</th>
            <th>Branch Name</th>
            <th>Semester</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          <?php

            include 'connection.php';
            $selectquery ="select * from branch";
            $query= mysqli_query($conn,$selectquery);
            $nums=mysqli_num_rows($query);
            $i=1;
            while($res =mysqli_fetch_array($query))
            {
              
          ?>
          <tr>
            <td><?php echo $i;$i=$i+1; ?></td>
            <td><?php echo $res['name']; ?></td>
            <td><?php echo $res['sem']; ?></td>
            <td>
              <?php
              if($res['status']==1){
                echo '<p class="active_btn">Active</p>';
              }
              else{
                echo '<p style="background-color: red; padding: 5px 20px;
                border-radius: 5px;
                margin-left: 10px;
                color: white;width: 50px;">Inactive</p>';
              }
             ?></td>
            <td>
            <a href="editbranch.php?sr=<?php echo $res['sr']; ?>" data-toggle="tooltip" data-placement="bootom" title="UPDATE"><button class="edit_btn"><i class="fas fa-edit"></i></button></a>
            <a href="branchdelete.php?sr=<?php echo $res['sr']; ?>" data-toggle="tooltip" data-placement="bootom" title="DELETE"><button class="delet_btn"><i class="fas fa-trash-alt"></i></button></a>
            </td>
          </tr>

          <?php
        
        } ?>

        </table>
    </div>
      </div>
     

 <!-- =============================java script code======================= -->
<script src="script2.js"></script>  

</body>
</html>