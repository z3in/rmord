<?php 
require_once('../connect.php');

date_default_timezone_set('Asia/Manila');
$time =  date('Y-m-d H:i:s');

if(isset($_GET['request'])){

  $req = $_GET['request'];

  switch($req){
    case 'list' : 
      $sql = "SELECT * FROM registration";
      $query = $db->prepare($sql);
      $query->execute();
      $response = Array();
      if($query->rowCount() > 0){
        while($row = $query->fetch(PDO::FETCH_ASSOC)){
          array_push($response,$row);
        }
        return print_r(json_encode(array("response" => 1, "message" => "showing result", "result" => $response, "timestamp" => $time)));
      };
      return print_r(json_encode(array("response" => 0, "message" => "error getting data", "timestamp" => $time)));
  }
}