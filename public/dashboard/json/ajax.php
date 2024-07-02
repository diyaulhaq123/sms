<?php
include("../../../core/init.php");
$taxpayers = $classAdmin->getTaxpayersData();
// print_r($taxpayers);
// exit;


$data = [];
$row = "";

foreach($taxpayers as $taxpayer){
    $row .= "[$taxpayer[first_name],
        $taxpayer[email],
        $taxpayer[tax_id],
        $taxpayer[phone],
        $taxpayer[type],
        $taxpayer[user_id],
        ]".',';
}

$record = json_decode(json_encode($row, true));


?>


{
  "draw": 1,
  "recordsTotal": 57,
  "recordsFiltered": 57,
  "data": [
   <?php
   echo $record;
   ?>
  ]
}
