<?php

require_once('../../includes/connect.php');

date_default_timezone_set('Asia/Manila');
$time =  date('Y-m-d H:i:s');

$sql = "SELECT * FROM registration WHERE username = :username";
$result = $db->prepare($sql);

$data = [
    "username" => $_POST['username'],
];

$result->execute($data);

if($result->rowCount() > 0){
    $row = $result->fetch(PDO::FETCH_ASSOC);
    if(!$row['validated']){
        return print_r(json_encode(array("response" => 0, "message" => "Account is being validated by Admin. We will send an email once the verification is complete!", "timestamp" => $time)));
    }
    if(password_verify($_POST['pw'],$row['password'])){
        return print_r(json_encode(array("response" => 1, "message" => "Login Successful!", "user"=> $row, "timestamp" => $time)));
    }
    return print_r(json_encode(array("response" => 0, "message" => "Username and Password did not Match!", "timestamp" => $time)));
}

return print_r(json_encode(array("response" => 0, "message" => "Username is not registered!", "timestamp" => $time)));