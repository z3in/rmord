<?php

require_once('../../includes/connect.php');

$filename = generateFilename();

$sql = "INSERT INTO registration (`name`,username,`address`,gender,contact,email,`password`,photo_path)VALUES(:names,:username,:regaddress,:gender,:cnum,:email,:psw,:photo)";
$result = $db->prepare($sql);

$data = [
    "names" => $_POST['names'],
    "username" => $_POST['username'],
    "regaddress" => $_POST['regaddress'],
    "cnum" => $_POST['cnum'],
    "gender" => $_POST['gender'],
    "email" => $_POST['email'],
    "psw" => password_hash($_POST['psw'], PASSWORD_DEFAULT),
    "photo" => $filename . ".jpg"
];

date_default_timezone_set('Asia/Manila');
$time =  date('Y-m-d H:i:s');


$fullpath = "../upload/" . $filename .".jpg";

if(!move_uploaded_file($_FILES["regid"]["tmp_name"],$fullpath)){
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