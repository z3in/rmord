<?php

require_once('../../includes/connect.php');

date_default_timezone_set('Asia/Manila');


$req = isset($_GET['request']) ? $_GET['request'] : "";
$time =  date('Y-m-d H:i:s');
switch($req){
    case 'check_reservation' : 
        return;


    case 'update_order' : 
        $sql = "UPDATE order_transactions SET `status` =  :stats WHERE ID = :id";
        $result = $db->prepare($sql);
        $data['id'] = $_GET['id'];
        $data['stats'] = $_GET['stats'];
        $result->execute($data);
        if($result){
                return print_r(json_encode(array("response" => 1, "message" => "Status has been changed!", "timestamp" => $time)));
        }
        return print_r(json_encode(array("response" => 0, "message" => "something went wrong. unable place order!", "timestamp" => $time)));

    case 'view_order': 
        $result = viewAllOrders($db);
        $response = Array();
        if($result->rowCount() > 0){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                array_push($response,$row);
            }
            return print_r(json_encode(array("response" => 1, "message" => "Showing Result", "list"=> $response, "timestamp" => $time)));
        }
        return print_r(json_encode(array("response" => 1, "message" => "No Result Found.", "timestamp" => $time)));
    case 'view_all_order': 
        $result = viewOrders($db);
        $response = Array();
        if($result->rowCount() > 0){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                array_push($response,$row);
            }
            return print_r(json_encode(array("response" => 1, "message" => "Showing Result", "list"=> $response, "timestamp" => $time)));
        }
        return print_r(json_encode(array("response" => 1, "message" => "No Result Found.", "timestamp" => $time)));
    case 'place_order':
        $data = json_decode(file_get_contents('php://input'), true);
        $result = placeOrder($db,$data);
        if($result){
            $res = updateCart($db,$result,$data['user_id'],$data['payment_ref']);
            if($res){
                return print_r(json_encode(array("response" => 1, "message" => "Order Placed! Ref # : " . $res, "timestamp" => $time)));
                }
        }
        return print_r(json_encode(array("response" => 0, "message" => "something went wrong. unable place order!", "timestamp" => $time)));
}

function selectAvailableTables($db){
    $sql = "SELECT * FROM registration";
        $result = $db->prepare($sql);
    $result->execute();
    return $result;
}

function viewAllOrders($db){
    $sql = "SELECT * FROM order_transactions ORDER BY date_created DESC";
        $result = $db->prepare($sql);
    $result->execute();
    return $result;
}

function viewOrders($db){
    $sql = "SELECT * FROM order_transactions where `user_id` = :user";
        $result = $db->prepare($sql);
    $data['user'] = $_GET['user_id'];
    $result->execute($data);
    return $result;
}



function placeOrder($db,$data){
    $sql = "INSERT INTO order_transactions(totalamount,`status`,quantity,coord_lat,coord_long,payment_ref,`user_id`)VALUES(:total,:stat,:quantity,:lat,:long,:payment,:user)";
    $result = $db->prepare($sql);
    $params = [
        "total" => $data['total_amount'],
        "stat" => $data['status'],
        "quantity" => $data['quantity'],
        "lat" => $data['coord_lat'],
        "long" => $data['coord_long'],
        "payment" => $data['payment_ref'],
        "user" => $data['user_id']
    ];
    if($result->execute($params)){
        return $db->lastInsertId();
    }
    return false;
}

function updateCart($db,$trans,$user,$pay){
    $sql = "UPDATE cart SET `status` = :stat,transaction_id = :trans WHERE `user_id` = :user";
    $result = $db->prepare($sql);
    $params = [
        "user" => $user,
        "trans" => $trans,
        "stat" => "purchased"
    ];
    if($result->execute($params)){
        $ref = str_replace("pay_","",$pay);
        return $ref;
    }
    return false;
}