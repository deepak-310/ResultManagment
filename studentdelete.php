<?php
include 'connection.php';
$id= $_GET['sr'];
$deletequery = "DELETE FROM `student` WHERE sr='$id'";
$query = mysqli_query($conn,$deletequery);
if($query){
?>
<script>
    alert("Student Deleted Succesfully")
</script>
<?php
header('location:student.php'); 
}else{
    ?>
<script>
    alert("Student Not deleted")
</script>
<?php
header('location:student.php'); 
}



?>