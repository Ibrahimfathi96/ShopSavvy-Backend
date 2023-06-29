<?php
include "../connect.php";
$orderId = filterRequest("orderId");
getAllData("ordersdetailsview","orders_id = $orderId");
?>