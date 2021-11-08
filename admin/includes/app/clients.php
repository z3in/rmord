<?php

require_once('../../includes/connect.php');

date_default_timezone_set('Asia/Manila');
$time =  date('Y-m-d H:i:s');
$req = isset($_GET['request']) ? $_GET['request'] : "";

switch($req){
    case 'account_list' : 
        $response = Array();
        $result = selectAllUser($db);
        if($result->rowCount() > 0){
            while($row = $result->fetch(PDO::FETCH_ASSOC)){
                array_push($response,$row);
            }
            return print_r(json_encode(array("response" => 1, "message" => "Showing Result", "list"=> $response, "timestamp" => $time)));
        }
        return print_r(json_encode(array("response" => 1, "message" => "No Result Found.", "timestamp" => $time)));
}


function selectAllUser($db){
    $sql = "SELECT * FROM registration";
        $result = $db->prepare($sql);
    $result->execute();
    return $result;
}