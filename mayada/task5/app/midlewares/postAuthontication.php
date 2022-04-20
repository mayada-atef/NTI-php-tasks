<?php

if ($_SERVER['REQUEST_METHOD'] != 'POST') {
    http_response_code(405);
    // .. بطلع خطوه من مكاني 
    include_once "../../../layouts/errorPages/error405.php";
    die;
}
