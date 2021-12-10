<?php
require_once('../includes/auth.php');
include('../includes/connect.php');
$Series = $_POST['Series'];
$ProductName = $_POST['ProductName'];
$CategoryID = $_POST['CategoryID'];
$SubCategoryID = $_POST['SubCategoryID'];
$ProductPrice = $_POST['ProductPrice'];
$SRP = $_POST['SRP'];
$filepath = "app/upload/" . $_FILES["Photo"]["name"];

if(move_uploaded_file($_FILES['Photo']['tmp_name'], '../'.$filepath)){

          echo 'Files has uploaded';
};

// query
$sql = "INSERT INTO `product`(`Series`,`ProductName`, `CategoryID`, `SubCategoryID`, `ProductPrice`, `SRP`, `photo` ) VALUES (:Series, :ProductName, :CategoryID, :SubCategoryID, :ProductPrice, :SRP, :photo)";
$q = $db->prepare($sql);
$q->execute(array(':Series' => $Series, ':ProductName' => $ProductName, ':CategoryID' => $CategoryID, ':SubCategoryID' => $SubCategoryID, ':ProductPrice' => $ProductPrice, ':SRP' => $SRP, ':photo' => $filepath));
header("location:../product.php");
?>
