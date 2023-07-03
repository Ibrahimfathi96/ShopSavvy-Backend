<?php
include "../connect.php";
$userId = filterRequest("userId");
getAllData("ordersview", "orders_user_id = '$userId' AND orders_status = 4 ORDER BY `ordersview`.`orders_datetime` DESC");
?>