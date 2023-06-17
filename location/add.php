<?php
include"../connect.php";
$table  = "location";
$userId = filterRequest("userId");
$city   = filterRequest("city");
$street = filterRequest("street");
$lat    = filterRequest("lat");
$long   = filterRequest("long");
$data   = array(
    "location_user_id" => $userId,
    "location_city"    => $city ,
    "location_street"  => $street,
    "location_lat"     => $lat,
    "location_long"    => $long,
);

insertData($table, $data);
