<?php
require_once('../includes/auth.php');
include('../includes/connect.php');
$Series = $_POST['Series'];
$Names = $_POST['Names'];
$Creditcardno = $_POST['Creditcardno'];
$Expmonth = $_POST['Expmonth'];
$Expyear = $_POST['Expyear'];
$CCV = $_POST['CCV'];
$DateExpired= $_POST['DateExpired'];

// query
$sql = "UPDATE `billing` SET `Names`=:Names, `Creditcardno`=:Creditcardno, `Expmonth`=:Expmonth, `Expyear`=:Expyear, `CCV`=:CCV , `DateExpired`=:DateExpired WHERE `Series`=:Series";
$q = $db->prepare($sql);
$q->execute(array(':Series' => $Series':Names' => $Names, ':Creditcardno' => $Creditcardno, ':Expmonth' => $Expmonth, ':Expyear' => $Expyear, ':CCV' => $CCV, ':DateExpired'=>$DateExpired);
header("location:../form_billing.php");
?>
