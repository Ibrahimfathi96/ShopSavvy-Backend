<?php
include "../../connect.php";

$email      = filterRequest("email");
$verifycode = rand(10000, 99999);
$data       = array(
    "delivery_verify_code" => "$verifycode"
);

updateData("delivery", $data, "delivery_email = '$email'");
// sendMail($email, "Verify Code ShopSavvy","Verify Code is $verifycode");