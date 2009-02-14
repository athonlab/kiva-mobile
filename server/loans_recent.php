<?php

// Code goes here!
$page_no = $_GET['page'];
$request_url = "http://api.kivaws.org/v1/loans/newest.json?page=$page_no";

$json = file_get_contents($request_url);
var_dump(json_decode($json, true));

?>