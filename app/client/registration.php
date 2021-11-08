<?php

require_once('../../includes/connect.php');

date_default_timezone_set('Asia/Manila');
$time =  date('Y-m-d H:i:s');

$filename = generateFilename();
$sqlVerify = "SELECT * FROM registration where username=?";
$check = $db->prepare($sqlVerify);
$check->bindParam(1,$_POST['username']);
$check->execute();
if($check->rowCount() > 0){
    return print_r(json_encode(array("response" => 0, "message" => "Username already exist", "timestamp" => $time)));
}
 
$sql = "INSERT INTO registration (`fname`,lname,mname,username,`street_add`,city_add,zip_add,gender,contact,email,`password`,photo_path)VALUES(:fname,:lname,:mname,:username,:street_add,:city_add,:zip_add,:gender,:cnum,:email,:psw,:photo)";
$result = $db->prepare($sql);

$data = [
    "fname" => $_POST['firstname'],
    "lname" => $_POST['lastname'],
    "mname" => $_POST['middlename'],
    "username" => $_POST['username'],
    "street_add" => $_POST['regstreet'],
    "city_add" => $_POST['regcity'],
    "zip_add" => $_POST['regzip'],
    "cnum" => $_POST['cnum'],
    "gender" => $_POST['gender'],
    "email" => $_POST['email'],
    "psw" => password_hash($_POST['psw'], PASSWORD_DEFAULT),
    "photo" => $filename . ".jpg"
];


$fullpath = "../upload/" . $filename .".jpg";

$img =  base64_decode($_POST['image']);

if(!file_put_contents($fullpath, $img)){
    return print_r(json_encode(array("response" => 0, "message" => "unable to upload file", "timestamp" => $time)));
}
$stmt = $result->execute($data);
if($stmt){
    return print_r(json_encode(array("response" => 1, "message" => "user created", "timestamp" => $time)));
}
return print_r(json_encode(array("response" => 0, "message" => "error creating username", "timestamp" => $time)));

function generateFilename(){
    $bytes = random_bytes(20);
    $filename = bin2hex(($bytes));
    if(!filenameCheck($filename)){
        return $filename;
    }
    generateFilename();
}

function filenameCheck($file){
    $path = '../upload/';
    echo file_exists($path . $file . ".jpg");
    if(file_exists($path . $file . ".jpg")){
        return true;
    }
    return false;
}