<?php
include "../../connect.php";
$orderId = filterRequest("orderId");
$userId  = filterRequest("userId");
$type    = filterRequest("orderType");
if ($type == 0) {
    $data = array(
        "orders_status" => 2,
    );
} else {
    $data = array(
        "orders_status" => 4,
    );
}

updateData("orders", $data, "orders_id = $orderId AND orders_status = 1");
InsertAlerts("Alert", "your order has been prepared", $userId, "user$userId", "none", "refreshPendingOrder");
if ($type == 0) {
    sendGCM("Alert", "There is an order needs an approval.", "delivery", "none", "none");
}
