<?php  

include 'connection.php';
$branchname=$_POST['branch'];
$sem =$_POST['semester'];
$for=$_POST['for'];
$sub=$_POST['subject'];
if($for=="Internal"){
    $for='internal_marks';
    }
elseif($for=="Practical"){
    $for='practical_marks';
    }
else {
    $for='theory_marks';
    }

$selectquery ="select * from $for where branch='{$branchname}' and sem='{$sem}' and subject='{$sub}'";
$query= mysqli_query($conn,$selectquery);
$html='<table><tr><td>RollNo</td><td>Name</td><td>Subjects</td><td>Marks</td></tr>';
while($row=mysqli_fetch_assoc($query)){
    $html.='<tr><td>'.$row['roll_no'].'</td><td>'.$row['name'].'</td><td>'.$row['subject'].'</td><td>'.$row['marks'].'</td></tr>';
}
$html.='</table>';


 //excel.php  
 header('Content-Type: application/vnd.ms-excel');  
 header('Content-disposition: attachment; filename='.rand().'.xls');
 echo $html;  
  
 ?>  
