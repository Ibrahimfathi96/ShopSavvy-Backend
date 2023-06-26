<?php
include "../../connect.php";
$orderId = filterRequest("orderId");

$data = array(
    "orders_status" => 1,
);
updateData("orders", $data, "orders_id = $orderId AND orders_status = 0");
