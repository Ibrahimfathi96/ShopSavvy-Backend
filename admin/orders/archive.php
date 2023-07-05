<?php
include "../../connect.php";
$userId = filterRequest("userId");
getAllData("ordersview", "1 = 1 AND orders_status = 4 ORDER BY `ordersview`.`orders_datetime` DESC");
?>