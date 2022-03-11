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
    <title>Edit Student</title>
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

      <h1 class="heading"><a href="student.php"><i class="fas fa-arrow-left" style="color:black;font-weight: 300px;"></i></a> Edit Student</h1>
      <div class="table_borde">
        <h3 class="table_heading"> Edit Student</h3><hr style="border-top: 2px solid black;">
        <form method="post" action="">
        <div class="Studadd">
        <?php
            include 'connection.php';
            $id= $_GET['sr'];
            $showquery="select * from student where sr={$id}";
            $queary2="select name from branch  GROUP BY name";
            $showdata2=mysqli_query($conn,$queary2);
            $showdata=mysqli_query($conn,$showquery);
            $adata=mysqli_fetch_array($showdata);
            if(isset($_POST['update'])){
              $idupdate= $_GET['sr'];
              $admno = $_POST['addmissionno'];
              $name = $_POST['name'];
              $branch =$_POST['branch'];
              $semester = $_POST['semester'];
              $rollno =$_POST['rollno'];
              $fathername = $_POST['fathername'];
              $currentstatus = $_POST['currentstatus'];
              $session = $_POST['session'];
              $status = $_POST['status'];
              echo $idupdate; 
              echo $admno;

              $query=" update student set addmission_no='$admno',name='$name',branch='$branch',semester='$semester',roll_no='$rollno',father_name='$fathername',current_status='$currentstatus',session='$session' , status='$status' where sr='$idupdate'";

              $res =mysqli_query($conn,$query);

              if($res){
                  echo "updated";
                ?>
                <script>
                  alert("Student Updated Successfully")
                </script>
                <?php
                 header("location:student.php");
              }else{
                  echo " not updated";
                ?>
                <script>
                  alert("Student Not Updated")
                </script>
                <?php 
              }
            }
          ?>
            <div class="student_detail">
                <label for="sub code">Addmission No.</label>
                <input type="text" name="addmissionno" value="<?php echo $adata['addmission_no']; ?>">
            </div>
            <div class="student_detail">
                <label for="sub code">Name</label>
                <input type="text" name="name"  value="<?php echo $adata['name']; ?>">
            </div>
            <div class="student_detail" style="margin-top: 15px;">
                <label for="Branch">Branch</label>   
          <select name="branch"  value="<?php echo $adata['branch']; ?>">
          <?php
                  while($adata2=mysqli_fetch_array($showdata2)){
                    ?>
                    <option><?php echo $adata2['name']; ?> </option>
                    <?php
                  }
                  ?>
          </select>
            </div>       
        </div>
        <div class="Studadd">
            <div class="student_detail" style="margin-top: 15px;">
                <label for="Semester">Semester</label>
                <select name="semester" value="<?php echo $adata['semester']; ?>">
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
                <input type="text" name="rollno" value="<?php echo $adata['roll_no']; ?>">
            </div>
            <div class="student_detail">
                <label for="sub code">Father Name</label>
                <input type="text" name="fathername" value="<?php echo $adata['father_name']; ?>">
            </div>       
        </div>
        <div class="Studadd">
            <div class="student_detail" style="margin-top: 15px;">
                <label for="Semester">Current Status</label>
          <select name="currentstatus" value="<?php echo $adata['currentstatus']; ?>">
              <option>Regular</option>
              <option>Defaulter</option>
             
          </select>
            </div>
            <div class="student_detail" style="margin-top: 15px;">
                <label for="Semester">Session</label>
                <select name="session" value="<?php echo $adata['session']; ?>">
                    <option>2020-2021</option>
                    <option>2021-2022</option>
                   
                </select>
            </div>
            <div class="student_detail" style="margin-top: 15px;">
                <label for="Semester">Status</label>
                <select name="status" value="<?php echo $adata['status']; ?>">
                    <option>Active</option>
                    <option>Inactive</option>
                   
                </select>
            </div>       
        </div>
        <div class="button_class">
            <input type="submit" value="Submit" name="update" style="background-color: blue;">
            <input type="reset" value="Reset">
          </div>
          </form>
      </div>
      </body>
      </html>
