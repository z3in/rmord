<?php

require_once('../../includes/connect.php');

date_default_timezone_set('Asia/Manila');
$time =  date('Y-m-d H:i:s');

$sql = "SELECT a.ID,a.ProductName,a.CategoryID,a.ProductPrice,a.SRP,a.photo,b.CategoryName FROM product a LEFT JOIN category b ON b.ID = a.CategoryID";
$result = $db->prepare($sql);
$result->execute();

$response = Array();

if($result->rowCount() > 0){
    while($row = $result->fetch(PDO::FETCH_ASSOC)){
        array_push($response,$row);
    }
    return print_r(json_encode(array("response" => 1, "message" => "Showing Result", "list"=> $response, "timestamp" => $time)));
}
return print_r(json_encode(array("response" => 1, "message" => "No Result Found.", "timestamp" => $time)));