<?php 
include"../connect.php";

$locationId = filterRequest("locationId");

deleteData("location" , "location_id  = $locationId ");