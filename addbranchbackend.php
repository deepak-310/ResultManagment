<?php
include 'connection.php';
$branchname=$_POST['branchname'];
$semester=$_POST["semester"];
$status=$_POST["status"];
if($status=="Active"){
  $status=1;
}
else{
  $status=0;
}

$query = "INSERT into branch values(NULL,'$branchname','$semester','$status')";
if (mysqli_query($conn, $query)) {
    ?>
    <script>
      alert('User Added Successfully');
    </script>
      <?php
      header("location:branch.php");
  } else {
    ?>
    <script>
      alert(' Error');
    </script>
      <?php
  }


?>