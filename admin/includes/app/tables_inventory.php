<?php 
require_once('../connect.php');

date_default_timezone_set('Asia/Manila');
$time =  date('Y-m-d H:i:s');

if(isset($_GET['request'])){

  $req = $_GET['request'];

  switch($req){
    case 'list' : 
      $sql = "SELECT a.ID,a.table_number,a.seats,a.description,a.status,b.status_name FROM tableinventory a LEFT JOIN table_status b ON b.ID = a.status ";
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
    case 'table_status':
      $sql = "SELECT * FROM table_status";
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
    case 'save_table':
      $sql = "INSERT INTO tableinventory(table_number,seats,`description`,`status`)VALUES(:tbl,:seats,:descrip,:stat)";
      $query = $db->prepare($sql);
      $data = [
        "tbl" => $_POST['table_number'],
        "seats" => $_POST['seats'],
        "descrip" => $_POST['description'],
        "stat" => $_POST['status']
      ];
      
      if($query->execute($data)){
        return print_r(json_encode(array("response" => 1, "message" => "Table Saved", "timestamp" => $time)));
      };
      return print_r(json_encode(array("response" => 0, "message" => "something went wrong", "timestamp" => $time)));
    case 'update_table':
        $sql = "UPDATE tableinventory SET table_number = :tbl,seats = :seats, `description` = :descrip ,`status`= :stat WHERE ID = :id";
        $query = $db->prepare($sql);
        $data = [
          "id" => $_POST['id'],
          "tbl" => $_POST['table_number'],
          "seats" => $_POST['seats'],
          "descrip" => $_POST['description'],
          "stat" => $_POST['status']
        ];
        
        if($query->execute($data)){
          return print_r(json_encode(array("response" => 1, "message" => "Table Updated", "timestamp" => $time)));
        };
        return print_r(json_encode(array("response" => 0, "message" => "something went wrong", "timestamp" => $time)));
  }

}