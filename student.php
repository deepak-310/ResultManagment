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
    <title>Student</title>
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
      <h1 class="heading"> Students</h1>
   
      <div class="table_borde">
        <h3 class="table_heading"> Student</h3><hr style="border-top: 2px solid black;">
        <div class="btn_class">
          <a href="addstudent.php"><button class="add_btn" id="AddBtn">+ Add Student</button></a>
          <a href="uploadstudent.php"><button class="add_btn" id="AddBtn">Upload File</button></a>
        
      </div>
      <div class="table_content" id="marks_table">
        <table class="Marks_entry_table">
          <tr>
            <th>Sr.</th>
            <th>Roll No</th>
            <th>Addmission No.</th>
            <th>Name</th>
            <th>Branch</th>
            <th>Semester</th>
            <th>Father's Name</th>
            <th>Current Status</th>
            <th>Session</th>
            <th>Status</th>
            <th>Action</th>
          </tr>
          <?php
include 'connection.php';
$selectquery ="select * from student";
$query= mysqli_query($conn,$selectquery);
$nums=mysqli_num_rows($query);
$i=1;
while($res =mysqli_fetch_array($query))
{
?>
          <tr>
              <td><?php echo $i;$i++; ?></td>
              <td><?php echo $res['roll_no']; ?></td>
              <td><?php echo $res['addmission_no']; ?></td>
              <td><?php echo $res['name']; ?></td>
              <td><?php echo $res['branch']; ?></td>
              <td><?php echo $res['semester']; ?></td>
              <td><?php echo $res['father_name']; ?></td>
              <td><?php echo $res['current_status']; ?></td>
              <td><?php echo $res['session']; ?></td>
              <td><?php echo $res['status']; ?></td>
          
              <td>
<a href="editstudent.php?sr=<?php echo $res['sr']; ?>" data-toggle="tooltip" data-placement="bootom" title="UPDATE"><button class="edit_btn"><i class="fas fa-edit"></i></button></a>
<a href="studentdelete.php?sr=<?php echo $res['sr']; ?>" data-toggle="tooltip" data-placement="bootom" title="DELETE"><button class="delet_btn"><i class="fas fa-trash-alt"></i></button></a>
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
        const trigger = document.querySelector('.delet_btn'); 
        const dailog =document.querySelector('#delete_dialog');
        const cancelbtn=document.querySelector('#delete_close');
      
        // delete branch funtions
        trigger.addEventListener('click',function(){
          openModal();
      
          });
        cancelbtn.addEventListener('click',function(){
          closeModal();
        });
        dailog.addEventListener('click', function(e){
          if(e.target !== this) return;
          closeModal();
      });
      
      document.addEventListener('keydown', function(e){
          if(e.key === 'Escape') {
              closeModal();
          }
      });
      
      function openModal() {
          dailog.classList.add('active');
      }
      function closeModal() {
          dailog.classList.remove('active');
      }

      </script>
</body>
</html>
