<?php
include "../connect.php";
$phone = filterRequest("phone");

$verfiycode     = rand(10000, 99999);

$stmt = $con->prepare("SELECT * FROM users WHERE users_phone = ? ");
$stmt->execute(array($phone));
$count = $stmt->rowCount();
printResult($count);

if ($count > 0) {
    $data = array("users_verify_code" => $verfiycode);
    updateData("users", $data, "users_phone = '$phone'", false);
    // sendEmail($email, "Verfiy Code Ecommerce", "Verfiy Code $verfiycode");
}
