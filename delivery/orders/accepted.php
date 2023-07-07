<?php
include "../../connect.php";
$deliveryId  = filterRequest("deliveryId");
getAllData("ordersview", "1 = 1 AND orders_status = 3 AND orders_delivery = $deliveryId
 ORDER BY `ordersview`.`orders_datetime` DESC");
