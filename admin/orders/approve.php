<?php
include "../../connect.php";
$orderId = filterRequest("orderId");
$userId  = filterRequest("userId");

$data = array(
    "orders_status" => 1,
);
updateData("orders", $data, "orders_id = $orderId AND orders_status = 0");
InsertAlerts("Approval", "your order has been approved", $userId, "user$userId", "none", "refreshPendingOrder");
