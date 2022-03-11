<?php
  include 'connection.php';    
        $username = $_POST['username'];
        $mobile =$_POST['mobile'];
        $email = $_POST['email'];
        $password =$_POST['password'];
        $type = $_POST['type'];
      
        $query = "INSERT into user values(NULL,'$username','$mobile','$email','$password','$type')";
        
        if (mysqli_query($conn, $query)) {
          ?>
          <script>
            alert('User Added Successfully');
          </script>
            <?php
            header("location:user.php");
        } else {
          ?>
          <script>
            alert(' Error');
          </script>
            <?php
        }
  mysqli_close($conn);
  ?>