<?php
include "../connect.php";
$userId = filterRequest("userId");
getAllData("orders", "orders_user_id = '$userId'");
?>