<?php
include"../connect.php";

$userId = filterRequest("userId");
$data = getAllData("cartview","cart_user_id = $userId",null,false);

$stmt = $con->prepare("SELECT SUM(itemsprice) AS totalprice, SUM(itemscount) AS totalcount FROM cartview
WHERE cartview.cart_user_id = $userId
GROUP BY cart_user_id");

$stmt->execute();
$countprice = $stmt->fetch(PDO::FETCH_ASSOC);
echo json_encode(array(
    "status"     => "success",
    "data"       =>  $data,
    "countprice" => $countprice,
));
