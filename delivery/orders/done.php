<?php
include "../../connect.php";
$orderId = filterRequest("orderId");
$userId  = filterRequest("userId");

$data = array(
    "orders_status" => 4,
);
updateData("orders", $data, "orders_id = $orderId AND orders_status = 3");
InsertAlerts("Approval", "your order has been delivered successfully.", $userId, "user$userId", "none", "refreshPendingOrder");
sendGCM("Alert", "The order has been delivered successfully to the customer.","services", "none","none");