<?php
session_start();
include 'connection.php';
if($_SERVER["REQUEST_METHOD"]=="POST")
{
    $email=$_POST["email"];
    $password=$_POST['password'];
    $sql="select * from user where email='".$email."' AND password='".$password."' ";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_array($result);

    if($row["type"]=="Teacher")
    {
        $_SESSION["name"]=$row['name'];
        $_SESSION["email"]=$email;
        $email=$_SESSION['email'];
        $_SESSION['status']="login";
        header("location:teacherdashboard.php");
    }

    elseif($row["type"]=="Admin")
    {
        $_SESSION["name"]=$row['name'];
        $_SESSION["email"]=$email;
        $_SESSION['status2']="login";
        header("location:admindashboard.php");
    }

    else{
        $_SESSION['status3']="Invalid username or password";
        header("location:index.php");
    }
    ?>
<script>
  alert('Email or password is incorrect');  
</script>
<?php
}

?>