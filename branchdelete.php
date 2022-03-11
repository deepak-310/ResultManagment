<?php
include 'connection.php';
$id= $_GET['sr'];
$deletequery = "DELETE FROM `branch` WHERE sr='$id'";
$query = mysqli_query($conn,$deletequery);
if($query){
?>
<script>
    alert("Branch Deleted Succesfully")
</script>
<META HTTP-EQUIV="Refresh" CONTENT="0; URL=http://localhost/ResultManagment/branch.php">
<?php 
}
else{
?>
<script>
    alert("Error")
</script>
<?php
header('location:branch.php'); 
}



?>