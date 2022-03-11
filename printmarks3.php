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
    <title>Print Marks</title>
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
              <a href="teacherdashboard.php"><i class="fas fa-home"></i>Dashboard</a>
            </li>
            <li>
              <a href="teacherdashboard.php" id="logn-btn"><i class="fas fa-key"></i></i>Change Password</a>
            </li>
            <li>
                <a href="#login"><i class="fas fa-sign-out-alt"></i>Logout</a>
              </li>
          </ul>
        </div>
      </nav>

    <!-- Marks Entry text -->
    <h1 class="heading"><a href="printmarks.php"><i class="fas fa-arrow-left" style="color:black;font-weight: 300px;"></i></a>Print Marks</h1>
    <form action="excel.php" method="post">
    <div class="table_borde">
        <h3 class="table_heading"><i class="fas fa-keyboard"></i>Print Marks</h3><hr style="border-top: 2px solid black;">
        <div class="selected_content">
            <div class="session">
                <label for="Session">Session</label>
                <input type="text" name="session" value="<?php echo $_POST['session']; ?>" readonly>
            </div>
            <div class="session">
                <label for="Branch">Branch</label>
                <input type="text" name="branch" value="<?php echo $_POST['branch']; ?>" readonly>
            </div>
            <div class="session">
                <label for="Semester">Semester</label>
                <input type="text" name="semester" value="<?php echo $_POST['semester']; ?>" readonly>
            </div>
            <div class="session">
                <label for="Subject">Subject</label>
                <input type="text" name="subject" value="<?php echo $_POST['subject']; ?>" readonly>
            </div>
            <div class="session">
                <label for="for">For</label>
                <input type="text" name="for" value="<?php echo $_POST['for']; ?>" readonly>
            </div>
        </div>
        <div class="table_content" id="marks_table">
            <table class="Marks_entry_table">
              <tr>
                <th>Roll No</th>
                <th>Name</th>
                <th><?php echo $_POST['for']; ?></th>
              </tr>
             
              <?php
               include 'connection.php';
               $branchname=$_POST['branch'];
               $sub=$_POST['subject'];
               $sem =$_POST['semester'];
               $for=$_POST['for'];
               if($for=="Internal"){
                   $for='internal_marks';
               }
               elseif($for=="Practical"){
                   $for='practical_marks';
               }
               else {
                   $for='theory_marks';
               }
               $selectquery ="select * from $for where branch='{$branchname}' and sem='{$sem}' and subject='{$sub}'";
               $query= mysqli_query($conn,$selectquery);
               
               while($result=mysqli_fetch_array($query))
               {
               ?>
               
               <tr>
               <td><input type="number" name="roll[]" style="border:none;background-color:transparent" value="<?php echo $result['roll_no']; ?>" readonly></td>
               <td><input type="text" name="name[]"style="border:none;background-color:transparent" value="<?php echo $result['name']; ?>" readonly></td>
               <td><input type="number" name="marks[]" style="border:none;background-color:transparent" value="<?php echo $result['marks']; ?>" readonly></td> 
               </tr>

               <?php } ?>
                     
            </table>
        </div>
    </div>
    
    <div class="marks_entry_btn">
      <button type="submit" class="print_btn" name="creat_excel" id="creat_excel">Print </button>
    </div>
    </form>
   
    
    <script>
      $(document).ready(function(){
        $('#creat_excel').click(function(){
          var excel_data =$('#marks_table').html();
          var page = "excel.php?data=" +excel_data;
          window.location="marksentry1.php";        
        });
      })
    </script>
</body>
</html>