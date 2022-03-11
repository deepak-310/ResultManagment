<?php
 include 'connection.php';
    $adm_no = $_POST['addmissionno'];
    $name = $_POST['name'];
    $branch = $_POST['branch'];
    $semester = $_POST['semester'];
    $roll_no = $_POST['rollno'];
    $father_name = $_POST['fathername'];
    $current_status = $_POST['currentstatus'];
    $session = $_POST['session'];
    $status = $_POST['status'];

    $query = "INSERT into student values(NULL,'$adm_no','$name','$branch','$semester','$roll_no','$father_name','$current_status','$session','$status')";
    
    if (mysqli_query($conn, $query)) {
        ?>
        <script>
          alert('Student Added Successfully');
        </script>
          <?php
          header("location:student.php");
      } else {
        ?>
        <script>
          alert(' Error');
        </script>
          <?php
      }
    mysqli_close($conn);
?>

