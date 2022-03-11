<?php
include 'connection.php';
$id= $_GET['sr'];
$deletequery = "DELETE FROM `subjects` WHERE sr='$id'";
$query = mysqli_query($conn,$deletequery);
if($query){
?>
<script>
    alert("subject Deleted Succesfully")
</script>
<?php
header('location:subject.php'); 
}else{
    ?>
<script>
    alert("subject Not deleted")
</script>
<?php
header('location:subject.php'); 
}



?>