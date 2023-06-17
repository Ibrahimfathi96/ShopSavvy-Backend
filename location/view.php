<?php
include"../connect.php";

$userId = filterRequest("userId");
getAllData("location", "location_user_id = $userId ");