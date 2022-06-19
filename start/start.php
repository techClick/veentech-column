<?php
  header ("Access-Control-Allow-Headers: *");
  header ("Access-Control-Allow-Origin: *");
  // header ("Access-Control-Expose-Headers: Content-Length, X-JSON");
  // header ("Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS");
  // header("Content-Type: application/json");
  require_once($_SERVER['DOCUMENT_ROOT'].'/HRA01/globals.php');
  require_once($_SERVER['DOCUMENT_ROOT'].'/HRA01/dbconnect.php');

  $message = json_decode(file_get_contents('php://input'), true);
  $sql = "INSERT INTO VeentechStart ( name, email, phone, type, country ) VALUES ( '".$message['name']."'
    , '".$message['email']."' , '".$message['phone']."' , '".$message['type']."', '".$message['country']."')";
  $result = mysqli_query( $con , $sql ) or die (getAPIReturn('error', 'Veentech-Start DB connect fail 1'));

  $headers = "From: Veentech";
  $emailBody = 'Type: '.$message['type'].PHP_EOL.'Country: '.$message['country'].PHP_EOL.
    'Name: '.$message['name'].PHP_EOL.'Email: '.$message['email'].PHP_EOL.'Phone: '.$message['phone'];
  $subject = 'START';
  mail($emails, $subject, $emailBody, $headers);

  echo (getAPIReturn('success', true));
?>