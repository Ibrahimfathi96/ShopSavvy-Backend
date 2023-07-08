<?php
include "../../connect.php";
$email = filterRequest("email");
$userVerifyCode = filterRequest("verifycode");
$stmt = $con -> prepare("SELECT * FROM admin WHERE admin_email = '$email' AND admin_verify_code = '$userVerifyCode'");
$stmt -> execute();
$count = $stmt ->rowCount();
if($count > 0){
    $data = array("admin_approve" => "1");
    updateData("admin", $data, "admin_email = '$email'");

}else{
    printFailure("Verify Code is not Valid.");
}
?>