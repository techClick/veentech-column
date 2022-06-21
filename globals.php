<?php
  function getAPIReturn($status, $data) {
    return json_encode(array(
      "status" => $status,
      "data" => $data,
    ));
  }
  $dbFailArray = json_encode(array(
    "status" => "error",
    "data" => 'Failed to load DB',
  ));
  $companyEmail = 'cto@zavotech.com';
  $emails = 'Ikechi-CTO <'.$companyEmail.'>';// 'Ikechi-Personal <ikechianya1@gmail.com>, Ikechi-CEO <'.$companyEmail.'>';
?>