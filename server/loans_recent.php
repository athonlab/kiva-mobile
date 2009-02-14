<?php

// Query params
if (isset($_GET['page'])) {
  $page_no = $_GET['page'];
} else {
  $page_no = 1;
}

$json_request_url = "http://api.kivaws.org/v1/loans/newest.json?page=$page_no";
// echo "$request_url\n\n";
$json_response = file_get_contents($json_request_url);
$json_decoded = json_decode($json_response, true);

//print_r($json_decoded);

foreach($json_decoded['loans'] as $loan) {
  print_r($loan);
  exit;
}

?>