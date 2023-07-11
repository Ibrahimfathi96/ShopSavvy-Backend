<?php
include "../../connect.php";

getAllData("ordersview", "1 = 1 AND orders_status != 0 AND orders_status != 4  ORDER BY `ordersview`.`orders_datetime` DESC");
?>