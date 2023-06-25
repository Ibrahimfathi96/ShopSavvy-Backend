<?php
include "../connect.php";
$userId = filterRequest("userId");
$locationId = filterRequest("locationId");
$ordersType = filterRequest("ordersType");
$ordersDeliveryPrice = filterRequest("ordersDeliveryPrice");
$ordersPrice = filterRequest("ordersPrice");
$couponId = filterRequest("couponId");
$paymentMethod = filterRequest("paymentMethod");
$couponDiscount = filterRequest("couponDiscount");
$totalPrice = $ordersPrice + $ordersDeliveryPrice;

//check counpon
$now = date("Y-m-d H:i:s");
$checkCoupon = getData("coupon", "coupon_id = '$couponId' 
AND coupon_expired > '$now' AND coupon_count > 0 ", null, false);
if ($checkCoupon > 0) {
    $totalPrice = $totalPrice - ($ordersPrice * ($couponDiscount  / 100));
}

$data = array(
    "orders_user_id" => $userId,
    "orders_location" => $locationId,
    "orders_type" => $ordersType,
    "orders_price_delivery" => $ordersDeliveryPrice,
    "orders_price" => $ordersPrice,
    "orders_coupon" => $couponId,
    "orders_total_price" => $totalPrice,
    "orders_payment_method" => $paymentMethod,
);

$count = insertData("orders", $data, false);
if ($count > 0) {
    $stmt = $con->prepare("SELECT MAX(orders_id) FROM orders ");
    $stmt->execute();
    $maxId = $stmt->fetchColumn();
    $data  = array("cart_orders" => $maxId);
    updateData("cart", $data, "cart_user_id = $userId AND cart_orders = 0 ");
}
