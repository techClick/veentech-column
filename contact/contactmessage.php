<?php
  header ("Access-Control-Allow-Headers: *");
  header ("Access-Control-Allow-Origin: *");
  require_once($_SERVER['DOCUMENT_ROOT'].'/Veentech/globals.php');
  require_once($_SERVER['DOCUMENT_ROOT'].'/Veentech/dbconnect.php');

  $message = json_decode(file_get_contents('php://input'), true);
  $sql = "INSERT INTO VeentechContact ( company, email, subject, message ) VALUES ( '".$message['company']."'
    , '".$message['email']."' , '".$message['subject']."' , '".$message['text']."')";
  $result = mysqli_query( $con , $sql ) or die (getAPIReturn('error', 'Contact message DB connect fail 1'));

  $headers = "From: Veentech";
  $emailBody = 'Company: '.$message['company'].PHP_EOL.'Email: '.$message['email'].PHP_EOL
    .PHP_EOL.$message['text'];
  $subject = 'CONTACT: '.$message['subject'];
  mail($emails, $subject, $emailBody, $headers);

  echo (getAPIReturn('success', true));
?>