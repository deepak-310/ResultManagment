<?php
include 'connection.php';
    $sub_branch = $_POST['sub_branch'];
    $sub_semester = $_POST['sub_semester'];
    $sub_code = $_POST['sub_code'];
    $sub_name = $_POST['sub_name'];
    $sub_theroy = $_POST['sub_theroy'];
    $sub_practical = $_POST['sub_practical'];
    $sub_internal = $_POST['sub_internal'];
    $status = $_POST['status'];
    if($status=="Active"){
      $status=1;
    }
    else{
      $status=0;
    }

    $query = "INSERT into subjects values(NULL,'$sub_branch','$sub_semester','$status','$sub_code','$sub_name','$sub_theroy','$sub_practical','$sub_internal')";
    
    if (mysqli_query($conn, $query)) {
        ?>
        <script>
          alert('subject Added Successfully');
        </script>
          <?php
          header("location:subject.php");
      } else {
        ?>
        <script>
          alert(' Error');
        </script>
          <?php
      }
      
    mysqli_close($conn);
?>

