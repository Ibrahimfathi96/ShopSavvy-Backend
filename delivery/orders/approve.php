<?php
include "../../connect.php";
$orderId = filterRequest("orderId");
$userId  = filterRequest("userId");
$deliveryId  = filterRequest("deliveryId");

$data = array(
    "orders_status"   => 3,
    "orders_delivery" => $deliveryId,
);
updateData("orders", $data, "orders_id = $orderId AND orders_status = 2");
InsertAlerts("Approval", "your order is on the way to you", $userId, "user$userId", "none", "refreshPendingOrder");
sendGCM("Alert", "The order has been approved by delivery man","services", "none","none");
sendGCM("Alert", "The order has been approved by delivery man no".$deliveryId,"delivery", "none","none");