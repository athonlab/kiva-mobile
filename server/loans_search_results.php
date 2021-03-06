<?php
require_once('kiva_display_blocks.php');
include('bpxml-header.php');

// filters
if (isset($_GET['status'])) {
  if ($_GET['status'] != '') {
    $status = $_GET['status'];
    $query_params .= "status=$status&";
  }
}

if (isset($_GET['gender'])) {
  if ($_GET['gender'] != '') {
    $gender = implode($_GET['gender'], ',');
    $query_params .= "gender=$gender&";
  }
}

if (isset($_GET['sector'])) {
  if ($_GET['sector'] != '') {
    $sector = $_GET['sector'];
    $query_params .= "sector=$sector&";
  }
}

if (isset($_GET['country_code'])) {
  if ($_GET['country_code'] != '') {
    $country_code = $_GET['country_code'];
    $query_params .= "country_code=$country_code&";
  }
}

if (isset($_GET['q'])) {
  if ($_GET['q'] != '') {
    $q = $_GET['q'];
    $query_params .= "q=$q&";
  }
}

// params
if (isset($_GET['sort_by'])) {
  $sort_by = $_GET['sort_by'];
  $query_params .= "sort_by=$sort_by&";
}

if (isset($_GET['page'])) {
  $page = $_GET['page'];
  $query_params .= "page=$page&";
}

//echo $query_params;

$json_request_url = "http://api.kivaws.org/v1/loans/search.json?$query_params";
// echo "$request_url\n\n";
$json_response = file_get_contents($json_request_url);

include('json_error_handling.php');

$json_decoded = json_decode($json_response, true);

//print_r($json_decoded);
?>

<module>
  <header layout="simple">
    <layout-items>
      <block class="title">Search results</block>
    </layout-items>
  </header>

<?php
foreach($json_decoded['loans'] as $loan) {
  //print_r($loan);
  // echo "/loan_detail?show=$load_id";
  // http://kiva.org/app.php?page=businesses&action=about&id=<id>
  // http://www.kiva.org/img/80w80h/<id>.jpg
  _show_loan($loan);
}
?>

</module>

<?php
 include('bpxml-footer.php');
?>