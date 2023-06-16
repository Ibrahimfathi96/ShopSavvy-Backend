<?php
include"../connect.php";
$itemsId = filterRequest('itemsId');
$usersId = filterRequest('usersId');


$stmt = $con->prepare("SELECT COUNT(cart.cart_id) 
   AS itemscount FROM  cart WHERE cart_user_id = $usersId AND cart_items_id = $itemsId");

   $stmt-> execute();
   $count = $stmt->rowCount();
   $data = $stmt->fetchColumn();
   if($count>0){
    echo json_encode(array("status" => "success","data" => $data));
   }else{
    echo json_encode(array("status" => "success","data" => "0"));
   }


?>