<?php
include "../connect.php";
$phone = filterRequest("phone");
$userVerifyCode = filterRequest("verifycode");
$stmt = $con -> prepare("SELECT * FROM users WHERE users_phone = '$phone' AND users_verify_code = '$userVerifyCode'");
$stmt -> execute();
$count = $stmt ->rowCount();
printResult($count);
?>