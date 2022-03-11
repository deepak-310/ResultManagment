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
      <h1 class="heading"><a href="branch.php"><i class="fas fa-arrow-left" style="color:black;font-weight:300px;font-size:30px;  color: rgb(68, 66, 66);margin-right:10px"></i></a>Edit Branch</h1>

       <!-- edit baranch form -->
       <div class="editbranch" style="display: flex;align-items: center;justify-content: center;">
          <div class="addbranch" style="display: flex;align-items: center;justify-content: center;" >
              <div class="edit_branch_border">
              <h3 style="color: gray;margin: 10px;font-size: 20px;">Edit Branch</h3> <hr>
                <form action="" method="post">

                <!-- Edit Brnach PHP Code -->
                  <?php
                    include 'connection.php';
                    $branchid= $_GET['sr'];
                    $showquery="select * from branch where sr={$branchid}";
                    $showdata=mysqli_query($conn,$showquery);
                    $adata=mysqli_fetch_array($showdata);
                    if(isset($_POST['editbranchbtn'])){
                      $idupdate= $_GET['sr'];
                      $branchname = $_POST['branchname'];
                      $branchsem =$_POST['semester'];
                      $status = $_POST['brnachstatus'];
                      if($status=="Active"){
                        $status=1;
                      }
                      else{
                        $status=0;
                      }

                      $query=" update branch set sr='$idupdate',name='$branchname',sem='$branchsem',status='$status' where sr='$idupdate'";
        
                      $res =mysqli_query($conn,$query);
        
                      if($res){
                        ?>
                        <script>
                          alert("branch Updated Successfully")
                        </script>
                        <?php
                         header("location:branch.php");
                      }else{
                        ?>
                        <script>
                          alert("branch Not Updated")
                        </script>
                        <?php 
                      }
                    }
                  ?>
                  <div class="edit_branch_contaner">
                    <label>Branch Name</label><br>
                    <input type="text" name="branchname" value="<?php echo $adata['name']; ?>"><br>
                    <label>Semester</label><br>
                    <input type="number" name="semester" value="<?php echo $adata['sem']; ?>"><br>
                    <label>Status</label><br>
                    <select name="brnachstatus" style="width: 100%;height: 35px;" value="<?php echo $adata['status']; ?>">
                      <option>Active</option>
                      <option>Inactive</option>
                    </select>
                    <div class="button_class">
                      <input type="submit" value="Edit Branch" name="editbranchbtn" style="background-color: blue;">
                      <input type="reset" value="Reset">
                    </div>
                  </div>
                </form>
              </div>
            </div>
        </div> 

</body>
</html>