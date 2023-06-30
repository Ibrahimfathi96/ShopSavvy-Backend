<?php
include "../connect.php";
$userId = filterRequest("userId");
getAllData("ordersview", "orders_user_id = '$userId' ORDER BY `ordersview`.`orders_datetime` DESC");
?>