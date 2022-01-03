<?php
require_once('../../includes/connect.php');

date_default_timezone_set('Asia/Manila');
$time =  date('Y-m-d H:i:s');

if(isset($_GET['request'])){

    $req = $_GET['request'];
  
    switch($req){
        case 'single_res' : 
        $sql = "SELECT * from tableinventory where status = 1 and seats >= :seats AND ID NOT IN (SELECT ID FROM  reservation WHERE reservation_date = :res_date and status = 'reserved') LIMIT 1";
        $query = $db->prepare($sql);
        $data = [
            "seats" => $_POST['selectnumberofpeople'],
            "res_date" => $_POST['res_date']
        ];
        $query->execute($data);
        if($query->rowCount() > 0){
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $id = create_reservation($db,$row,$_POST);
            if($id){
                return print_r(json_encode(array("response" => 1, "message" => "showing result", "list" => "Referrence number for your reservation : "  . $_POST['ref'], "timestamp" => $time)));
            }
        };
        return print_r(json_encode(array("response" => 1, "message" => "No available reservation on the time and date you have chosen.", "timestamp" => $time)));
        case 'food_res':
        $json = json_decode($_POST['foods']);
        $sql = "SELECT * from tableinventory where status = 1 and seats >= :seats AND ID NOT IN (SELECT ID FROM  reservation WHERE reservation_date = :res_date and status = 'reserved') LIMIT 1";
        $query = $db->prepare($sql);
        $data = [
            "seats" => $_POST['selectnumberofpeople'],
            "res_date" => $_POST['res_date']
        ];
        $query->execute($data);
        if($query->rowCount() > 0){
            $row = $query->fetch(PDO::FETCH_ASSOC);
            $id = create_reservation($db,$row,$_POST);
            if($id){
                $err = Array();
                foreach($json as $singular)
                    {
                        array_push($err,insertComponents($db,$id,$singular));
                    }
            }
            return print_r(json_encode(array("response" => 1, "message" => "showing result", "list" => "Referrence number for your reservation : "  . $_POST['ref'], "timestamp" => $time)));
        }
    }
}

function insertComponents($db,$id,$json){
    $sql = "INSERT INTO reservation_food(reservation_id,product_id,quantity)VALUES(:res_id,:res_product,:res_quantity)";
    $query = $db->prepare($sql);
    $data = [
        "res_id" => $id,
        "res_product" => $json->id,
        "res_quantity" => $json->quantity
    ];
    if($query->execute($data)){
        return;
    }
    return false;
}

function create_reservation($db,$row,$post){
        $sql = "INSERT INTO reservation(`reservation_ref`,`reservation_name`,`reservation_type`,`contact`,`guest_count`,`table_number`,`reservation_date`,`reservation_time`,`status`,`instruction`,`user_id`)
                VALUES(:ref,:res_name,:res_type,:contact,:guest,:table_number,:res_date,:res_time,:stats,:ins,:user)";
        $query = $db->prepare($sql);
        $data = [
            "table_number" => $row['table_number'],
            "res_type" => $post['selectreservation'] === 1 ? "table_reservation" : "food_reservation",
            "res_name" => $post['name'],
            "res_date" => $post['res_date'],
            "res_time" => $post['res_time'],
            "stats" => "reserved",
            "contact" => $post['cnum'],
            "guest" => $post['selectnumberofpeople'],
            "ref" => $post['ref'],
            "ins" => isset($post['text_instruction']) ? $post['text_instruction'] : null,
            "user" => $post['user_id']
        ];
        if($query->execute($data)){
            return $db->lastInsertId();
        }
        return false;
}