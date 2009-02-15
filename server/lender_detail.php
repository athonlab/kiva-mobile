<?php
require_once('kiva_display_blocks.php');
include('bpxml-header.php');

// Query params
$query_params = '';

if (isset($_GET['show'])) {
  $lender_id = $_GET['show'];
}

$json_request_url = "http://api.kivaws.org/v1/lenders/$lender_id" . ".json";
// echo "$request_url\n\n";
$json_response = file_get_contents($json_request_url);

include('json_error_handling.php');

$json_decoded = json_decode($json_response, true);

//print_r($json_decoded);

?>

<module>
  <header layout="simple">
    <layout-items>
      <block class="title">Lender Details</block>
    </layout-items>
  </header>

<?php

foreach($json_decoded['lenders'] as $lender) {
  //print_r($lender);
  // http://www.kiva.org/img/200w200h/<id>.jpg 
  _show_lender_detail($lender);
}
?>
<module>
<header layout="simple">
  <layout-items>
    <block class="title">Loans Given</block>
  </layout-items>
</header>

<?
$json_request_url = "http://api.kivaws.org/v1/lenders/$lender_id/loans.json";
// echo "$request_url\n\n";
$json_response = file_get_contents($json_request_url);

include('json_error_handling.php');

$json_decoded = json_decode($json_response, true);

//print_r($json_decoded);

?>
<map>
  <center>
    <latitude>8</latitude>
    <longitude>2</longitude>
  </center>
  <map-zoom>15</map-zoom>
  <map-mode>map</map-mode>
  <map-showtraffic>false</map-showtraffic>
<?

foreach($json_decoded['loans'] as $loan) {
  // print_r($loan);
  // http://kiva.org/app.php?page=businesses&action=about&id=<id>
  // http://www.kiva.org/img/80w80h/<id>.jpg 
  list($lat, $lon) = split(' ', $loan['location']['geo']['pairs']);
  $country = $loan['location']['country'];
  $city = $loan['location']['town'];
    _show_loan_on_map($loan);
}
?>
</map>

</module>
</module>
<?
 include('bpxml-footer.php');
?>