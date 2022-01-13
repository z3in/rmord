<?php
require_once('../../includes/connect.php');

date_default_timezone_set('Asia/Manila');


$req = isset($_GET['request']) ? $_GET['request'] : "";
$time =  date('Y-m-d H:i:s');
switch($req){
    case 'save_position' : 
        $sql = "INSERT INTO user_role(`position`,`status`,`privilege`)VALUES(:position,:stats,:priv)";
        $result = $db->prepare($sql);
        $data = [
            "position" => $_POST['position'],
            "stats" => "active",
            "priv" => $_POST['privilege']
        ];
        $result->execute($data);
        if($result){
                return print_r(json_encode(array("response" => 1, "message" => "Position Saved!", "timestamp" => $time)));
        }
        return print_r(json_encode(array("response" => 0, "message" => "something went wrong. unable place order!", "timestamp" => $time)));
    case 'view_position' :
        $sql = "SELECT * FROM user_role";
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

        case 'find_user' :
            $sql = "SELECT a.ID,a.Name,a.Email,a.Password,a.Address,a.ContactNo,a.status,b.position,a.Position as position_id,b.privilege FROM employees a LEFT JOIN user_role b ON a.position = b.ID WHERE a.id = ?";
            $result = $db->prepare($sql);
            $result->bindParam(1,$_GET['id']);
            $result->execute();
            if($result->rowCount() > 0){
                $row = $result->fetch(PDO::FETCH_ASSOC);
                return print_r(json_encode(array("response" => 1, "message" => "Showing Result", "list"=> $row, "timestamp" => $time)));
            }
            return print_r(json_encode(array("response" => 1, "message" => "No Result Found.", "timestamp" => $time)));
        case 'update_position':
            $sql = "UPDATE user_role SET position =:position,privilege=:priv WHERE ID = :id";
            $query = $db->prepare($sql);
            $data = [
              "id" => $_POST['id'],
              "position" => $_POST['position'],
              "priv" => $_POST['privilege']
            ];
            
            if($query->execute($data)){
              return print_r(json_encode(array("response" => 1, "message" => "Position Updated", "timestamp" => $time)));
            };
            return print_r(json_encode(array("response" => 0, "message" => "something went wrong", "timestamp" => $time)));

    case 'view_user':
        $sql = "SELECT  a.ID,a.Name,a.Email,a.Password,a.Address,a.ContactNo,a.status,b.position,a.Position as position_id FROM employees a LEFT JOIN user_role b ON a.position = b.ID";

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

        case 'update_user':
            $sql = "UPDATE user_role SET `Name` = :fullname ,`Email` = :email,`Password` = :pass,`Address` = :addr,`ContactNo` = :contact,`Position` =:position,`status` =:stats WHERE ID = :id";
            $query = $db->prepare($sql);
            $data = [
                "id" => $_POST['id'],
                "fullname" => $_POST['name'],
                "email" => $_POST['email'],
                "pass" => $_POST['password'],
                "addr" => $_POST['address'],
                "contact" => $_POST['contact'],
                "position" => $_POST['position'],
                "stats" => 1
            ];
            
            if($query->execute($data)){
              return print_r(json_encode(array("response" => 1, "message" => "User Updated", "timestamp" => $time)));
            };
            return print_r(json_encode(array("response" => 0, "message" => "something went wrong", "timestamp" => $time)));
            case 'save_user' : 
                $sql = "INSERT INTO employees(`Name`,`Email`,`Password`,`Address`,`ContactNo`,`Position`,`status`)VALUES(:fullname,:email,:pass,:addr,:contact,:position,:stats)";
                $result = $db->prepare($sql);
                $data = [
                    "fullname" => $_POST['name'],
                    "email" => $_POST['email'],
                    "pass" => $_POST['password'],
                    "pass" => $_POST['password'],
                    "addr" => $_POST['address'],
                    "contact" => $_POST['contact'],
                    "position" => $_POST['position'],
                    "stats" => 1
                ];
                $result->execute($data);
                if($result){
                        return print_r(json_encode(array("response" => 1, "message" => "New User Saved!", "timestamp" => $time)));
                }
                return print_r(json_encode(array("response" => 0, "message" => "something went wrong. unable place order!", "timestamp" => $time)));
}