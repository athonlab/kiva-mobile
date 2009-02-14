<?php

// Query params
$query_params = '';

if (isset($_GET['show'])) {
  $loan_id = $_GET['show'];
}

$json_request_url = "http://api.kivaws.org/v1/loans/$loan_id" . ".json";
// echo "$request_url\n\n";
$json_response = file_get_contents($json_request_url);

include('json_error_handling.php');

$json_decoded = json_decode($json_response, true);

//print_r($json_decoded);

foreach($json_decoded['loans'] as $loan) {
  print_r($loan);
  // http://kiva.org/app.php?page=businesses&action=about&id=<id>
  // http://www.kiva.org/img/80w80h/<id>.jpg 
  $load_id = $loan['id'];
}

?>
<h4>Lenders</h4>
<?
$json_request_url = "http://api.kivaws.org/v1/loans/$loan_id/lenders.json";
// echo "$request_url\n\n";
$json_response = file_get_contents($json_request_url);

include('json_error_handling.php');

$json_decoded = json_decode($json_response, true);

//print_r($json_decoded);

foreach($json_decoded['lenders'] as $lender) {
  print_r($lender);
}
?>

<h4>Journal entries</h4>

<?
$json_request_url = "http://api.kivaws.org/v1/loans/$loan_id/journal_entries.json";
// echo "$request_url\n\n";
$json_response = file_get_contents($json_request_url);

include('json_error_handling.php');

$json_decoded = json_decode($json_response, true);

//print_r($json_decoded);

foreach($json_decoded['journal_entries'] as $journal_entry) {
  print_r($journal_entry);
  // http://www.kiva.org/img/200w200h/<id>.jpg 
}

?>