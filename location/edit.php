<?php
include"../connect.php";
$table  = "location";
$locationId = filterRequest("location_id");
$userId     = filterRequest("userId");
$name   = filterRequest("name");
$city       = filterRequest("city");
$street     = filterRequest("street");
$lat        = filterRequest("lat");
$long       = filterRequest("long");
$data       = array(
    "location_name"    => $name,
    "location_city"    => $city ,
    "location_street"  => $street,
    "location_lat"     => $lat,
    "location_long"    => $long,
);

updateData($table, $data, "location_id = $locationId");
