
<?php
session_start();
include 'connection.php';  
$subject=$_POST['subject'];
$branch=$_POST['branch']; 
$sem=$_POST['semester'];
$for=$_POST['for'];   
$count= count($_POST['roll']);
$data=$_POST;
echo "<pre>";    
var_dump($data);
if($for=="Internal")
{
    for($i=0;$i<$count;$i++)
    {
        $query = "INSERT into internal_marks values('{$_POST['roll'][$i]}','{$_POST['name'][$i]}','$branch',$sem,'$subject',{$_POST['marks'][$i]})";
        if (mysqli_query($conn, $query)) {
          $_SESSION['status4']="internal Marks Added Succesfully";
              
          } else {
            $_SESSION['status4']="Error marks not added";
           
          }
    }
    header("location:teacherdashboard.php");

}
elseif($for=="Practical")
{
    for($i=0;$i<$count;$i++)
    {
        $query = "INSERT into practical_marks values('{$_POST['roll'][$i]}','{$_POST['name'][$i]}','$branch',$sem,'$subject',{$_POST['marks'][$i]})";
        if (mysqli_query($conn, $query)) {
            $_SESSION['status4']="Practicl Marks Added Succesfully";

          } else {
            $_SESSION['status4']="Error marks not added";
          }
          header("location:teacherdashboard.php");
    }
    
}
elseif($for=="Theory")
{
    for($i=0;$i<$count;$i++)
    {
        $query = "INSERT into theory_marks values('{$_POST['roll'][$i]}','{$_POST['name'][$i]}','$branch',$sem,'$subject',{$_POST['marks'][$i]})";
        if (mysqli_query($conn, $query)) {
          $_SESSION['status4']="Theory Marks Added Succesfully";
              
          } else {
            $_SESSION['status4']="Error marks not added";
          }
    }
    header("location:teacherdashboard.php");

}