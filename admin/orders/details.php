<?php
include "../../connect.php";
$orderId = filterRequest("orderId");
getAllData("ordersdetailsview","cart_orders = $orderId");
?>