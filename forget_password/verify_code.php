<?php

include "../connect.php";

$email  = filterRequest("email");

$verfiy = filterRequest("verifycode");


$stmt = $con->prepare("SELECT * FROM users WHERE 
users_email = '$email' AND users_verify_code = '$verfiy' ");

$stmt->execute();

$count = $stmt->rowCount();

printResult($count);