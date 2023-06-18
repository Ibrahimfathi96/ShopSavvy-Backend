<?php
include"../connect.php";
$couponName = filterRequest("counponName");
$now = date("Y-m-d H:i:s");
getData("coupon","coupon_name = '$couponName' AND coupon_expired > '$now' ");
?>