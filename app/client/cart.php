<?php

require_once('../../includes/connect.php');

date_default_timezone_set('Asia/Manila');
$time =  date('Y-m-d H:i:s');

$req = isset($_GET['request']) ? $_GET['request'] : "";

switch($req){
    case 'add' : 
        $sql = "INSERT INTO cart (product_id,`status`,`user_id`)VALUES(:prod,:stat,:user)";
        $result = $db->prepare($sql);

        $data = [
            "user" => $_GET['user_id'],
            "stat" => "pending",
            "prod" => $_GET['product_id']
        ];
        if($result->execute($data)){
            return print_r(json_encode(array("response" => 1, "message" => "Product added!", "timestamp" => $time)));
        }

        return print_r(json_encode(array("response" => 0, "message" => "something went wrong. unable to add to cart", "timestamp" => $time)));
    case 'list':
        $sql = "SELECT * FROM cart LEFT JOIN product ON cart.product_id = product.ID WHERE `user_id` = :user";
        $result = $db->prepare($sql);

        $data = [
            "user" => $_GET['user_id']
        ];
        
        $response = Array();
        $result->execute($data);

        if($result->rowCount() > 0){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                array_push($response,$row);
            }
            return print_r(json_encode(array("response" => 1, "message" => "Showing Result", "list"=> $response, "timestamp" => $time)));
        }
        return print_r(json_encode(array("response" => 1, "message" => "No Result Found.", "timestamp" => $time)));
}