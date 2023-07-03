<?php
include "../connect.php";
$userId = filterRequest("userId");
getAllData("ordersview", "orders_user_id = '$userId' AND orders_status = 4 ORDER BY `ordersview`.`orders_datetime` DESC");
?>

// 0 -> wait, 1-> preparing, 2-> with delivery man, 3-> on the way, 4-> archive