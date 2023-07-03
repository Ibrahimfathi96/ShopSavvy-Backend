<?php
include "./connect.php";
$orderId        = filterRequest("orderId");
$rating         = filterRequest("rating");
$ratingComment  = filterRequest("ratingComment");

$data =  array(
    "orders_rating " => $rating,
    "orders_rating_note " => $ratingComment,
);
updateData("orders", $data,  "orders_id = $orderId");
