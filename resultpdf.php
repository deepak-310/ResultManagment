

<?php
    require_once 'FPDF/fpdf.php';
    include 'connection.php';
    $id= $_GET['sr'];
    $showquery="select * from student where sr={$id}";
    $showdata=mysqli_query($conn,$showquery);
    $adata=mysqli_fetch_array($showdata);
    $roll_no=$adata['roll_no'];
    $branch=$adata['branch'];
    $sem=$adata['semester'];
    $showquery2="select * from subjects where branch='$branch' and semester=$sem";
    $showdata2=mysqli_query($conn,$showquery2);
    
    
    $pdf=new FPDF('p','mm','a4');
    $pdf->AddPage();
    $pdf->Image('pillaiimg.png',15,6,180);
    $pdf->Ln(40);
    $pdf->SetFont('arial','','12');
    $pdf->cell('0','10','Final result is authenticated to PCACS Exam Cell ','0','1');
    
    $pdf->SetFont('arial','','16');
    $pdf->cell('0','10','Student Name         :'   .$adata['name'],'0','1');
    $pdf->cell('0','10','Addmission No        :'   .$adata['addmission_no'],'0','1');
    $pdf->SetFont('arial','b','14');
   
    $pdf->cell('0','10','Regular Exam Results','0','1');
    $pdf->Ln(5);
    $pdf->cell('35','10','Subject Code','1','0','C');
    $pdf->cell('45','10','Subject Name','1','0','C');
    $pdf->cell('30','10','Internal','1','0','C');
    $pdf->cell('30','10','Practical','1','0','C');
    $pdf->cell('30','10','Theory','1','0','C');
    $pdf->cell('20','10','Total','1','1','C');
    
    $pdf->SetFont('arial','','14');
    while($adata2=mysqli_fetch_array($showdata2)){
        $pdf->cell('35','10',$adata2['sub_code'],'1','0','C');
        $pdf->cell('45','10',$adata2['sub_name'],'1','0','C');
        $subject=$adata2['sub_name'];
        $showquery3="SELECT * from internal_marks WHERE roll_no='$roll_no' and branch='$branch' and subject='$subject';";
        $showdata3=mysqli_query($conn,$showquery3);
        $adata3=mysqli_fetch_array($showdata3);

        $showquery4="SELECT * from practical_marks WHERE roll_no='$roll_no' and branch='$branch' and subject='$subject';";
        $showdata4=mysqli_query($conn,$showquery4);
        $adata4=mysqli_fetch_array($showdata4);

        $showquery5="SELECT * from theory_marks WHERE roll_no='$roll_no' and branch='$branch' and subject='$subject';";
        $showdata5=mysqli_query($conn,$showquery5);
        $adata5=mysqli_fetch_array($showdata5);

        if($adata3['marks']!=null){
            $pdf->cell('30','10',$adata3['marks'],'1','0','C');
          }else{
            $pdf->cell('30','10','-','1','0','C');
          }
          if($adata4['marks']!=null){
            $pdf->cell('30','10',$adata4['marks'],'1','0','C');
          }else{
            $pdf->cell('30','10','-','1','0','C');
          }
          if($adata5['marks']!=null){
            $pdf->cell('30','10',$adata5['marks'],'1','0','C');
          }else{
            $pdf->cell('30','10','-','1','0','C');
          } 
          $total=$adata3['marks']+$adata4['marks']+$adata5['marks'];
          $pdf->cell('20','10',$total,'1','0','C');
          $pdf->Ln(10);
    }

    $pdf->Output();


?>