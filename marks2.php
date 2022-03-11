<?php
session_start();
if(!isset($_SESSION["email"]))
{
  header("location:index.php");
}
?>
<?php
  error_reporting(0);
  include 'connection.php';
  $id= $_GET['sr'];
  $showquery="select * from student where sr={$id}";
  $showdata=mysqli_query($conn,$showquery);
  $adata=mysqli_fetch_array($showdata);
  $roll_no=$adata['roll_no'];
  $branch=$adata['branch'];
  $sem=$adata['semester'];
  $showquery2="select * from subjects where branch='$branch' and semester=$sem";
  $showdata2=mysqli_query($conn,$showquery2);

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
    <title>Marks</title>
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

      <h1 class="heading"><a href="adminresult.php"><i class="fas fa-arrow-left" style="color:black;font-weight: 300px;font-size: 20px;"></i></a> Marks</h1>
      
      <div class="table_borde">
        <h3 class="table_heading">Marks</h3><hr style="border-top: 2px solid black;">
        <div class="student_details">
            <div class="detail">
                <h3>Addmission No :</h3>
                <h3><?php echo $adata['addmission_no']; ?></h3>
            </div>
            <div class="detail">
                <h3>Name :</h3>
                <h3><?php echo $adata['name']; ?></h3>
            </div>
            <div class="detail">
                <h3>Roll No :</h3>
                <h3><?php echo $roll_no ?></h3>
            </div>

        </div>
        <div class="table_content" id="marks_table">
            <table class="Marks_entry_table" style="margin-top: 20px;">
              <tr>
                <!-- <th>Sr.</th> -->
                <th>Subject Code</th>
                <th>Subject Name</th>
                <th>Theory</th>
                <th>Practical</th>
                <th>Internal</th>
                <th>Total</th>
              </tr>
              <?php
                  while($adata2=mysqli_fetch_array($showdata2)){

                  ?>
              <tr>
                  
                <!-- <td>1</td> -->
                <td><?php echo $adata2['sub_code']; ?></td>
                <td><?php echo $adata2['sub_name']; ?></td>
                <?php
                $subject=$adata2['sub_name'];
                $showquery3="SELECT * from internal_marks WHERE roll_no='$roll_no' and branch='$branch' and subject='$subject';";
                $showdata3=mysqli_query($conn,$showquery3);
                $adata3=mysqli_fetch_array($showdata3);

                $showquery4="SELECT * from practical_marks WHERE roll_no='$roll_no' and branch='$branch' and subject='$subject';";
                $showdata4=mysqli_query($conn,$showquery4);
                $adata4=mysqli_fetch_array($showdata4);

                $showquery5="SELECT * from theory_marks WHERE roll_no='$roll_no' and branch='$branch' and subject='$subject';";
                $showdata5=mysqli_query($conn,$showquery5);
                $adata5=mysqli_fetch_array($showdata5);


                ?>
                
                <td><?php
                if($adata3['marks']!=null){
                  echo $adata3['marks'];
                }else{
                  echo "-";
                }
                ?>
                </td>
                <td><?php 
                 if($adata4['marks']!=null){
                  echo $adata4['marks'];
                }else{
                  echo "-";
                }
                 ?>
                 </td>
                <td><?php 
                 if($adata5['marks']!=null){
                  echo $adata5['marks'];
                }else{
                  echo "-";
                }
                 ?></td>
                <td><?php 
                
                $total=$adata3['marks']+$adata4['marks']+$adata5['marks'];
                echo $total;
                ?></td>

                
              </tr>
              <?php
                 }
                 ?>
                
             
            </table>
        </div>

    </div>

    <script src="script2.js"></script> 
      </body>
      </html>