<?php
include"../connect.php";

$itemsId = filterRequest('itemsId');
$usersId = filterRequest('usersId');
$count  = getData("cart", "cart_user_id = $usersId AND cart_items_id = $itemsId");

if($count >0 ) {
    

}else{
    $data  = array(
        "cart_user_id"  => $usersId,
        "cart_items_id" => $itemsId,
    );
    insertData("cart", $data);
}