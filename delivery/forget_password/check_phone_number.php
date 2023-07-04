<?php
include "../../connect.php";
$phone = filterRequest("phone");

$verfiycode     = rand(10000, 99999);

$stmt = $con->prepare("SELECT * FROM delivery WHERE delivery_phone = ? ");
$stmt->execute(array($phone));
$count = $stmt->rowCount();
printResult($count);

if ($count > 0) {
    $data = array("delivery_verify_code" => $verfiycode);
    updateData("delivery", $data, "delivery_phone = '$phone'", false);
    // sendEmail($email, "Verfiy Code Ecommerce", "Verfiy Code $verfiycode");
}
