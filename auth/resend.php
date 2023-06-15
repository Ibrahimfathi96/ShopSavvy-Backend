<?php
include "../connect.php";

$email      = filterRequest("email");
$verifycode = rand(10000, 99999);
$data = array(
    "users_verify_code" => "$verifycode"
);

updateData("users", $data, "users_email = '$email'");
// sendMail($email, "Verify Code ShopSavvy","Verify Code is $verifycode");