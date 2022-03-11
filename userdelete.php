<?php
include 'connection.php';
$id= $_GET['sr'];
$deletequery = "DELETE FROM `user` WHERE sr='$id'";
$query = mysqli_query($conn,$deletequery);
if($query){
?>
<script>
    alert("User Deleted Succesfully")
</script>
<?php
header('location:user.php'); 
}else{
    ?>
<script>
    alert("User Not deleted")
</script>
<?php
header('location:user.php'); 
}



?>