<?php
include "../../connect.php";

$username   = filterRequest("username");
$password   = sha1($_POST['password']);
$email      = filterRequest("email");
$phone      = filterRequest("phone");
$verifycode = rand(10000, 99999);

$stmt = $con->prepare("SELECT * FROM delivery WHERE delivery_email = ? OR delivery_phone = ?");
$stmt->execute(array($email, $phone));
$count = $stmt->rowCount();

if ($count > 0) {
    printFailure("Phone Or Email is already exists");
} else {
    $data = array(
        "delivery_name"           => $username,
        "delivery_email"          => $email,
        "delivery_phone"          => $phone,
        "delivery_password"       => $password,
        "delivery_verify_code"    => $verifycode,
    );
    // sendMail($email, "Verify Code ShopSavvy","Verify Code is $verifycode");
    insertData("delivery", $data);
}
