<?php
include "../connect.php";
$email = filterRequest("email");

$verfiycode     = rand(100000, 999999);

$stmt = $con->prepare("SELECT * FROM users WHERE users_email = ? ");
$stmt->execute(array($email));
$count = $stmt->rowCount();
printResult($count);

if ($count > 0) {
    $data = array("users_verify_code" => $verfiycode);
    updateData("users", $data, "users_email = '$email'", false);
    // sendEmail($email, "Verfiy Code Ecommerce", "Verfiy Code $verfiycode");
}
