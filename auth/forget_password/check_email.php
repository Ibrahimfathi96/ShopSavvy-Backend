<?php
include "../connect.php";

$email      = filterRequest("email");
$verifycode = rand(10000, 99999);


$stmt = $con->prepare("SELECT * FROM users WHERE users_email = ? ");
$stmt->execute(array($email));
$count = $stmt->rowCount();
printResult($count);
if ($count > 0) {
    $data = array("users_verify_code"=> $verifycode);
    updateData("users",$data,"users_email = '$email'", false);
    // sendMail($email, "Verify Code ShopSavvy","Verify Code is $verifycode");
}
