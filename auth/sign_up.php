<?php
include "../connect.php";

$username   = filterRequest("username");
$password   = sha1("password");
$email      = filterRequest("email");
$phone      = filterRequest("phone");
$verifycode = rand(10000, 99999);

$stmt = $con->prepare("SELECT * FROM users WHERE users_email = ? OR users_phone = ?");
$stmt->execute(array($email, $phone));
$count = $stmt->rowCount();

if ($count > 0) {
    printFailure("Phone Or Email is already exists");
} else {
    $data = array(
        "users_name"           => $username,
        "users_email"          => $email,
        "users_phone"          => $phone,
        "users_password"       => $password,
        "users_verify_code"    => $verifycode,
        "users_approve"        => 1,
    );
    // sendMail($email, "Verify Code ShopSavvy","Verify Code is $verifycode");
    insertData("users", $data);
}
