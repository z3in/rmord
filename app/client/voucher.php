<?php 
require_once('../../includes/connect.php');

date_default_timezone_set('Asia/Manila');
$time =  date('Y-m-d H:i:s');

if(isset($_GET['request'])){

  $req = $_GET['request'];

  switch($req){
    case 'list' : 
      $sql = "SELECT * from voucher";
      $query = $db->prepare($sql);
      $query->execute();
      $response = Array();
      if($query->rowCount() > 0){
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
          array_push($response,$row);
        }
        return print_r(json_encode(array("response" => 1, "message" => "showing result", "list" => $response, "timestamp" => $time)));
      };
      return print_r(json_encode(array("response" => 1, "message" => "no result found", "timestamp" => $time)));
    case 'search' : 
        $sql = "SELECT * from voucher WHERE code=? LIMIT 1";
        $query = $db->prepare($sql);
        $query->bindParam(1,$_GET['code']);
        $query->execute();
        if($query->rowCount() == 1){
          $row = $query->fetch(PDO::FETCH_ASSOC);
          return print_r(json_encode(array("response" => 1, "message" => "showing result", "list" => $row, "timestamp" => $time)));
        };
        return print_r(json_encode(array("response" => 1, "message" => "no result found", "timestamp" => $time)));
    case 'save_voucher':
      $sql = "INSERT INTO voucher(`code`,`percentage`,`amount_limit`,`description`)VALUES(:code,:percent,:amt_limit,:descrip)";
      $query = $db->prepare($sql);
      $data = [
        "code" => $_POST['code'],
        "percent" => $_POST['percent'],
        "amt_limit" => $_POST['amt_limit'],
        "descrip" => $_POST['descrip']
      ];
      
      if($query->execute($data)){
        return print_r(json_encode(array("response" => 1, "message" => "Voucher Saved", "timestamp" => $time)));
      };
      return print_r(json_encode(array("response" => 0, "message" => "something went wrong", "timestamp" => $time)));
    case 'update_voucher':
        $sql = "UPDATE delivery_fee SET code =:code,`percentage`=:percent,`amount_limit`=:amt_limit,`description`=:descrip WHERE ID = :id";
        $query = $db->prepare($sql);
        $data = [
            "code" => $_POST['code'],
            "percent" => $_POST['percent'],
            "amt_limit" => $_POST['amt_limit'],
            "descrip" => $_POST['descrip']
        ];
        
        if($query->execute($data)){
          return print_r(json_encode(array("response" => 1, "message" => "Voucher Updated", "timestamp" => $time)));
        };
        return print_r(json_encode(array("response" => 0, "message" => "something went wrong", "timestamp" => $time)));
  }

}