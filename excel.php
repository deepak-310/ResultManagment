<?php

header('Content-Type:application/vnd.ms-excel');
header('Conten-disposition: attachment; filename='.rand().'.xls');
echo $_GET['data'];
?>