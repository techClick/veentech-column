<?php
  $host = "localhost";
  $username = "u745346555_user";
  $password = "delabEGO2345!";
  $db_name = "u745346555_db";
  $returnArray = array(
    "status" => "error",
    "data" => "failed to load DB",
  );
  $con = mysqli_connect( $host, $username, $password, $db_name )
    or die(json_encode($returnArray));
?>
