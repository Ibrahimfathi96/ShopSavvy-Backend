<?php
include "../../connect.php";

$email      = filterRequest("email");
$verifycode = rand(10000, 99999);
$data = array(
    "admin_verify_code" => "$verifycode"
);

updateData("admin", $data, "admin_email = '$email'");
// sendMail($email, "Verify Code ShopSavvy","Verify Code is $verifycode");