<?php
include "../connect.php";
$phone = filterRequest("phone");
$userVerifyCode = filterRequest("verifycode");
$stmt = $con -> prepare("SELECT * FROM users WHERE users_phone = '$phone' AND users_verify_code = '$userVerifyCode'");
$stmt -> execute();
$count = $stmt ->rowCount();
if($count > 0){
    $data = array("users_approve" => "1");
    updateData("users", $data, "users_phone = '$phone'");

}else{
    printFailure("Verify Code is not Valid.");
}
?>