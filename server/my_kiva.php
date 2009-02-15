<?php
require_once('kiva_display_blocks.php');
include('bpxml-header.php');

//////////////////
// MY CODE
//////////////////

$lender_id = 'matt';
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
      <block class="title">My Kiva</block>
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

foreach($json_decoded['loans'] as $loan) {
  // print_r($loan);
  // http://kiva.org/app.php?page=businesses&action=about&id=<id>
  // http://www.kiva.org/img/80w80h/<id>.jpg 
  list($lat, $lon) = split(' - ', $loan['location']['geo']['pairs']);
  $country = $loan['location']['country'];
  $city = $loan['location']['town'];
?>
  <map>
    <center>
      <latitude>37.3919</latitude>
      <longitude>-122.0302</longitude>
    </center>
    <map-zoom>10</map-zoom>
    <map-mode>map</map-mode>
    <map-showtraffic>false</map-showtraffic>
    <map-point>
    <location>
      <latitude><? echo $lat ?></latitude>
      <longitude><? echo $lon ?></longitude>
      <city><? echo $city ?></city>
      <country><? echo $country ?></country>
    </location>
    
<?
    _show_loan_on_map($loan);
?>
    </map-point>
  </map>
<?

}
?>
</module>
</module>
<?
 include('bpxml-footer.php');
?>