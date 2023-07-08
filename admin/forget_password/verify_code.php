<?php

include "../../connect.php";

$email  = filterRequest("email");

$verfiy = filterRequest("verifycode");


$stmt = $con->prepare("SELECT * FROM `admin` WHERE 
admin_email = '$email' AND admin_verify_code = '$verfiy' ");

$stmt->execute();

$count = $stmt->rowCount();

printResult($count);
