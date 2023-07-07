<?php
include "../../connect.php";
getAllData("ordersview", "1 = 1 AND orders_status = 2 ORDER BY `ordersview`.`orders_datetime` DESC");
